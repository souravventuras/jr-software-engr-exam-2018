<?php

namespace Leaping\Controller\Api;

use Firebase\JWT\JWT;
use Leaping\Controller\Api\AppController;
use Cake\Core\Configure;
use Cake\Core\Configure\Engine\PhpConfig;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

class VehiclesController extends AppController {

    var $uploadPath = WWW_ROOT . 'img' . DS . 'vehicles' . DS;
    var $imgPath = '';

    public function initialize() {
        parent::initialize();
        $this->RequestHandler->ext = 'json';
//        $this->imgPath = 'http://' . $_SERVER['HTTP_HOST'] . '/rrol/' . 'img' . '/';//for server
        $this->imgPath = 'http://' . $_SERVER['HTTP_HOST'] . '/' . 'img' . '/'; //for server
    }

    private function getNadaInfo($vin, $milage) {
        //first of all have to check whether the data is present in cache or not
        if (!empty($vin)) {
            $vehicle = $this->Vehicles->getNadaInfo($vin, $milage);
            if (isset($vehicle->AvgTradeInPlusVinAccMileage)) {
                $vehicleInfo = $vehicle;
                $formatted = array();
                $price = $vehicleInfo->AvgTradeInPlusVinAccMileage;
                $formatted['year'] = (string) $vehicleInfo->VehicleYear;
                $formatted['brand_id'] = $vehicleInfo->MakeCode;
                $formatted['model_id'] = $vehicleInfo->SeriesCode;
                $formatted['mileage'] = (string) $vehicleInfo->AveMileage;
                $formatted['nada_price'] = $price;
                return $formatted;
            } else {
                return false;
            }
        }else{
            return false;
        }
    }

    /*
     * Get Nada info by Vin Number
     * api: http://rrol.local/api/vehicles/nada/{VIN}
     * Method: GET
     */

    public function nada($vin = null,$mileage=null) {
        $this->add_model(array('Vehicles'));
        if (!empty($vin)) {
            $vehicle = $this->Vehicles->getNadaInfo($vin,$mileage);
            if (isset($vehicle->AvgTradeInPlusVinAccMileage)) {
                $vehicleInfo = $vehicle;
                $formatted = array();
                $price = number_format($vehicleInfo->AvgTradeInPlusVinAccMileage, 2);
                $formatted['VehicleYear'] = (string) $vehicleInfo->VehicleYear;
                $formatted['MakeCode'] = $vehicleInfo->MakeCode;
                $formatted['MakeDescr'] = $vehicleInfo->MakeDescr;
                $formatted['SeriesCode'] = $vehicleInfo->SeriesCode;
                $formatted['SeriesDescr'] = $vehicleInfo->SeriesDescr;
                $formatted['BodyCode'] = $vehicleInfo->BodyCode;
                $formatted['BodyDescr'] = $vehicleInfo->BodyDescr;
                $formatted['AveMileage'] = (string) $vehicleInfo->AveMileage;
                $formatted['AverageAuctionPrice'] = $price;

                $response = array('status' => 'SUCCESS', 'data' => $formatted);
            } else {
                $response = $vehicle;
            }
        } else {
            $msg = 'Please give a valid VIN Number.';
            $error = array('code' => 204, 'message' => $msg);
            $response = array('status' => 'ERROR', 'error' => $error);
        }
        $responseResult = json_encode(array('response' => $response));
        $this->response->type('json');
        $this->response->body($responseResult);

        return $this->response;
    }

    /*
     * Add new Vehicle
     * api: http://rrol.local/api/vehicles/create?user_id=34
     * MEthod: POST
     */

    public function create() {
        $query = $this->request->query;
        $user_id = $query['user_id'];
        $this->add_model(array('Vehicles', 'Countries', 'Series', 'Brands', 'Bodies', 'Years', 'Users', 'Dealers', 'Media', 'VehicleDetails'));
        $auth = $this->Users->get($user_id);
        if (!empty($this->request->data)) {
            $data = $this->request->data;
            $param = $this->getNadaInfo($data['vin_number'],$data['milage']); // Get NADA INFO
            if ($param == false) {
                $msg = 'NADA service  is not available now.';
                $error = array('code' => 207, 'message' => $msg);
                $response = array('status' => 'ERROR', 'error' => $error);

                $responseResult = json_encode(array('response' => $response));
                $this->response->type('json');
                $this->response->body($responseResult);

                return $this->response;
            }
            $data = array_merge($data, $param);

            $dealer_data = $this->Dealers->find()->where(['id' => $auth['dealer_id']])->first();
            $data['zipcode'] = $dealer_data['zipcode'];
            $data['latitude'] = $dealer_data['latitude'];
            $data['longitude'] = $dealer_data['longitude'];
            $data['user_id'] = $auth['id'];
            $vehicle = $this->Vehicles->newEntity();
            $vehicle = $this->Vehicles->patchEntity($vehicle, $data);
            $result = $this->Vehicles->save($vehicle);
            $vehicle_id = $result->id;

            $vehicle_detail = $this->VehicleDetails->newEntity();
            $vehicle_detail['vehicle_id'] = $vehicle_id;
            $vehicle_detail = $this->VehicleDetails->patchEntity($vehicle_detail, $data);
            if ($this->VehicleDetails->save($vehicle_detail)) {
                if (isset($_FILES['vin_image']['name'])) {
                    $imgName = $this->vinImage($vehicle);
                    $vehicle_detail->vin_image = $imgName;
                    $conn = ConnectionManager::get('default');
                    $conn->execute('UPDATE vehicles SET vin_image=\'' . $imgName . '\' where id = ' . $vehicle_detail->vehicle_id);
                }
                $response = $this->get($vehicle_id); //get all information for update
                /* $response = array(
                  'status' => 'SUCCESS',
                  'data' => $result
                  ); */
            } else {
                $msg = 'The Vehicle could not be saved. Please, try again.';
                $error = array('code' => 201, 'message' => $msg);
                $response = array('status' => 'ERROR', 'error' => $error);
            }
        }
        $responseResult = json_encode(array('response' => $response));
        $this->response->type('json');
        $this->response->body($responseResult);

        return $this->response;
    }

    /*
     * Add Vin Image when Added new Vehicle
     */

    private function vinImage($vehicle) {
        if (!empty($_FILES['vin_image']['name'])) {
            $directoryPath = $this->uploadPath . $vehicle['id'];
            if (!is_dir($directoryPath)) {
                mkdir($directoryPath);
            }
            $dir = $directoryPath = $this->uploadPath . $vehicle['id'] . DS;
            $this->log($dir, 'error');
            $imageName = time() . '_' . $this->randomnum(7) . '_' . str_replace(" ", "", $_FILES['vin_image']['name']);
            if (move_uploaded_file($_FILES['vin_image']['tmp_name'], $dir . $imageName)) {
                return $imageName;
            }
        }
        return;
    }

    /**
     * @param $makeCode
     * @return array
     */
    protected function _getSeriesByMakeCode($makeCode) {
        $models = $this->Series->find('all', ['keyField' => 'code', 'valueField' => 'value'])
                ->where(['make_code' => $makeCode])
                ->order(['value' => 'ASC']);
        $formattedModelList = array();
        if (!empty($models)) {
            foreach ($models as $model) {
                $formattedModelList[$model->code] = $model->year_code . ' - ' . $model->value;
            }
        }
        return $formattedModelList;
    }

    /*
     * Get Vehicle Info
     * Api: http://rrol.local/api/vehicles/get?user_id=34&vehicle_id=98
     * Method: GET
     */

    public function get($id = null) {
        $query = $this->request->query;
        $user_id = $query['user_id'];
        if (!empty($query['vehicle_id'])) {
            $id = $query['vehicle_id'];
        }
        $this->add_model(array('Vehicles', 'Countries', 'Series', 'Brands', 'Bodies', 'Years', 'Users', 'Dealers', 'Media', 'VehicleDetails', 'Series'));

        $vehicle = $this->Vehicles->find('all')
                        ->where(['Vehicles.id' => $id])
                        ->contain(['Vdetails', 'Brands', 'Model'])->first();

        if ($vehicle) {
            $vehicle = $this->Vehicles->parseVehicle($vehicle);
            $brands = $this->Brands->find('list', ['keyField' => 'code', 'valueField' => 'value'])
                            ->order(['value' => 'ASC'])->distinct('value');
            $years = $this->Years->find('list', ['keyField' => 'code', 'valueField' => 'value'])
                            ->order(['value' => 'DESC'])->distinct('value');
            $models = array();
            if (!empty($vehicle['brand_id'])) {
                $models = $this->_getSeriesByMakeCode($vehicle['brand_id']);
            }
            $result = $this->responseData($vehicle); // Get Structured data
            $a_img = $this->getAdditionalImage($id); // Get additional image

            $response = array(
                'status' => 'SUCCESS',
                'vehicle' => $result,
                'additional_img' => $a_img,
                'model' => $models,
                'brand' => $brands,
                'color' => \Cake\Core\Configure::read('Color'),
                'FuelType' => \Cake\Core\Configure::read('FuelType'),
                'GearType' => \Cake\Core\Configure::read('GearType'),
                'VehicleType' => \Cake\Core\Configure::read('VehicleType'),
                'year' => $years
            );
            if (empty($query['vehicle_id'])) {
                return $response;
            }
        } else {
            $msg = 'Not Found';
            $error = array('code' => 201, 'message' => $msg);
            $response = array('status' => 'ERROR', 'error' => $error);
        }
        $responseResult = json_encode(array('response' => $response));
        $this->response->type('json');
        $this->response->body($responseResult);

        return $this->response;
    }

    /*
     * Get Model List
     * Api: http://rrol.local/api/vehicles/get_models?user_id=34&brand_id=14
     * Method: GET
     */

    public function getModels() {
        $query = $this->request->query;
        $user_id = $query['user_id'];
        $brand_id = $query['brand_id'];

        $this->viewBuilder()->autoLayout(false);
        $this->add_model(array('Series'));
//        $models = $this->Series->find('list', ['keyField' => 'code', 'valueField' => 'value'])->where(['make_code' => $brand_id])->order(['value' => 'DESC'])->distinct('value')->toArray();
        $models = $this->_getSeriesByMakeCode($brand_id);
        if ($models) {
            $response = array('status' => 'SUCCESS', 'model' => $models);
        } else {
            $msg = 'Not Found';
            $error = array('code' => 201, 'message' => $msg);
            $response = array('status' => 'ERROR', 'error' => $error);
        }
        $responseResult = json_encode(array('response' => $response));
        $this->response->type('json');
        $this->response->body($responseResult);

        return $this->response;
    }

    /*
     * Edit Vehicle
     * Api: http://rrol.local/api/vehicles/edit?user_id=34&vehicle_id=98
     * Method: POST
     */

    public function edit() {
        $query = $this->request->query;
        $user_id = $query['user_id'];
        $id = $query['vehicle_id'];
        $vehicle_detail = '';
        $this->add_model(array('Vehicles', 'Countries', 'Series', 'Brands', 'Bodies', 'Years', 'Users', 'Dealers', 'Media', 'VehicleDetails'));
        $auth = $this->Users->get($user_id);
        if (!empty($id)) {
            $vehicle = $this->Vehicles->find('all')
                    ->where(['Vehicles.id' => $id])
                    ->contain(['Vdetails'/* => function ($q) {
                          return $q->autoFields(false)
                          ->select(['color','fuel_type','gear_type']);
                          } */
                        , 'Brands', 'Model'])
                    ->first();
            $vehicle_detail = $this->VehicleDetails->find('all')->where(['vehicle_id' => $id])->first();
        }
        if (!empty($this->request->data)) {
            $data = $this->request->data;
            $dealer_data = $this->Dealers->find()->where(['id' => $auth['dealer_id']])->first();
            $data['zipcode'] = $dealer_data['zipcode'];
            $data['latitude'] = $dealer_data['latitude'];
            $data['longitude'] = $dealer_data['longitude'];
            $data['user_id'] = $auth['id'];
            if (empty($id)) {
                $vehicle = $this->Vehicles->newEntity();
            }
            $vehicle = $this->Vehicles->patchEntity($vehicle, $data);
            $result = $this->Vehicles->save($vehicle);
            $vehicle_id = $result->id;
            if (empty($vehicle_detail['id'])) {
                $vehicle_detail = $this->VehicleDetails->newEntity();
            }
            $vehicle_detail['vehicle_id'] = $vehicle_id;
            foreach ($data as $key => $value) {
                if (in_array($key, array('fuel_type', 'gear_type'))) {
                    $data[$key] = (int) $value;
                }
            }
            $vehicle_detail = $this->VehicleDetails->patchEntity($vehicle_detail, $data);

            if ($result = $this->VehicleDetails->save($vehicle_detail)) {
                if ($this->request->data('vin_image')) {
                    $this->vinImage($vehicle, $this->request->data('vin_image'));
                }
                $result = $this->responseData($vehicle); // Get Structured data
                $a_img = $this->getAdditionalImage($id); // Get additional image
                $response = array('status' => 'SUCCESS', 'data' => $result, 'additional_img' => $a_img);
            } else {
                $msg = 'The Vehicle could not be saved. Please, try again.';
                $error = array('code' => 201, 'message' => $msg);
                $response = array('status' => 'ERROR', 'error' => $error);
            }
        }
        $responseResult = json_encode(array('response' => $response));
        $this->response->type('json');
        $this->response->body($responseResult);

        return $this->response;
    }

    private function responseData($data = null) {
        $dataArr = array();
        $dataArr['id'] = empty($data['id']) == 1 ? '' : $data['id'];
        $dataArr['model_id'] = empty($data['model_id']) == 1 ? '' : $data['model_id'];
        $dataArr['brand_id'] = empty($data['brand_id']) == 1 ? '' : $data['brand_id'];
        $dataArr['year'] = empty($data['year']) == 1 ? '' : $data['year'];
        $dataArr['price'] = empty($data['price']) == 1 ? '' : $data['price'];
        $dataArr['nada_price'] = empty($data['nada_price']) == 1 ? '' : $data['nada_price'];
        $dataArr['description'] = empty($data['description']) == 1 ? '' : $data['description'];
        $dataArr['mileage'] = empty($data['mileage']) == 1 ? '' : $data['mileage'];
        $dataArr['vin_number'] = empty($data['vin_number']) == 1 ? '' : $data['vin_number'];
//        $dataArr['vin_image'] = empty($data['vin_image'])==1?'':$data['vin_image'];
//        $dataArr['image'] = empty($data['image'])==1?'':$data['image'];

        $dataArr['vin_image'] = $data['vin_image'];
        $dataArr['image'] = $data['image'];

        $dataArr['vehicle_type'] = empty($data['vdetail']['vehicle_type']) == 1 ? '' : $data['vdetail']['vehicle_type'];
        $dataArr['color'] = empty($data['vdetail']['color']) == 1 ? '' : $data['vdetail']['color'];
        $dataArr['fuel_type'] = empty($data['vdetail']['fuel_type']) == 1 ? '' : $data['vdetail']['fuel_type'];
        $dataArr['gear_type'] = empty($data['vdetail']['gear_type']) == 1 ? '' : $data['vdetail']['gear_type'];

        // FOR Local Image Path
        $dir = $this->imgPath . 'vehicles' . '/';
        $defaultImageRoot = $this->imgPath;

        // Feature Image
        if ($data->image == null) {
//            $dataArr['image'] = $defaultImageRoot . 'vehicle.png';
            $dataArr['image'] = null;
        } else {
            $dataArr['image'] = $dir . $data->id . '/' . $data->image;
        }
        // VIN image
        if ($data->vin_image == null) {
//            $dataArr['vin_image'] = $defaultImageRoot . 'vin.png';
            $dataArr['vin_image'] = null;
        } else {
            $dataArr['vin_image'] = $dir . $data->id . '/' . $data->vin_image;
        }

        return $dataArr;
    }

    private function getAdditionalImage($id = null) {
        // FOR Local Image Path
        $dir = $this->imgPath . 'vehicles' . '/';
        $defaultImageRoot = $this->imgPath;

        $additional_img = $this->Media->find()->where(['content_id' => $id])->toArray();
        $a_img = array();
        foreach ($additional_img as $content) {
            $a_img[] = $dir . $content['content_id'] . '/' . $content['file_name'];
        }
        return $a_img;
    }

    /*
     * Upload vehicle image
     * api: http://rrol.local/api/vehicles/image_add?user_id=34&type=image&vehicle_id=99
     * params:  GET: user_id, type ( additional,image,vin_image ), vehicle_id
     *          POST: file
     */

    public function imageAdd() {
        $query = $this->request->query;
        $user_id = $query['user_id'];
        $type = $query['type'];
        $id = $query['vehicle_id'];

        $this->add_model(array('Vehicles', 'Media'));
        if ($this->Vehicles->exists(['Vehicles.id' => $id])) {
            $vehicle = $this->Vehicles->get($id);
            if (!empty($this->request->data)) {
                // image upload
                if (!empty($_FILES['file']['name'])) {
                    $directoryPath = $this->uploadPath . $vehicle['id'];
                    if (!is_dir($directoryPath)) {
                        mkdir($directoryPath);
                    }
                    $dir = $directoryPath = $this->uploadPath . $vehicle['id'] . DS;
                    $imageName = time() . '_' . $this->randomnum(7) . '_' . str_replace(" ", "", $_FILES['file']['name']);
                    //move_uploaded_file($_FILES['vin_image']['tmp_name'], $dir . $imageName);

                    if (move_uploaded_file($_FILES['file']['tmp_name'], $dir . $imageName)) {
                        $srcFile1 = $dir . "/" . $type;
                        //unlink($srcFile1);
                        $imagePath = $this->imgPath . 'vehicles' . '/' . $id . '/' . $imageName;
                        if ($type == 'additional') {
                            $nimg = $this->Media->newEntity();
                            $nimg = $this->Media->patchEntity($nimg, array('file_name' => $imageName, 'content_type' => 'vehicles', 'content_id' => $id));
                            if ($this->Media->save($nimg)) {
                                $msg = 'Your Vehicle picture successfully uploaded!';
                                $response = array('status' => 'SUCCESS', 'message' => $msg, 'image_path' => $imagePath);
                            }
                        } else {
                            $vehicle = $this->Vehicles->patchEntity($vehicle, array($type => $imageName));
                            if ($this->Vehicles->save($vehicle)) {
                                $msg = 'Your Vehicle picture successfully uploaded!';
                                $response = array('status' => 'SUCCESS', 'message' => $msg, 'image_path' => $imagePath);
                            }
                        }
                    }
                } else {
                    $msg = 'Your Vehicle picture not successfully uploaded!';
                    $error = array('code' => 202, 'message' => $msg);
                    $response = array('status' => 'ERROR', 'error' => $error);
                }
            }
        } else {
            $msg = 'Not Found';
            $error = array('code' => 201, 'message' => $msg);
            $response = array('status' => 'ERROR', 'error' => $error);
        }

        $responseResult = json_encode(array('response' => $response));
        $this->response->type('json');
        $this->response->body($responseResult);

        return $this->response;
    }

    /**
     *
     */
    public function makeFeatured() {
        $query = $this->request->getQuery();
        $user_id = $query['user_id'];
        $id = $query['vehicle_id'];
        $response['response']['status'] = 'SUCCESS';

        $this->add_model(array('Vehicles', 'Media'));
        if ($this->Vehicles->exists(['Vehicles.id' => $id])) {
            $vehicle = $this->Vehicles->get($id);
            if (!empty($this->request->getData())) {
                $imagePath = $this->request->getData('image_path');
                if ($imagePath) {
                    $fileName = substr($imagePath, strrpos($imagePath, '/', 0) + 1, strlen($imagePath));

                    $vehicle->image = $fileName;
                    if (!$this->Vehicles->save($vehicle)) {
                        $response['response']['status'] = 'ERROR';
                        $response['response']['error'] = 'Featured image save failed! Please try again.';
                    }
                } else {
                    $response['response']['status'] = 'ERROR';
                    $response['response']['error'] = 'Invalid data';
                }
            } else {
                $response['response']['status'] = 'ERROR';
                $response['response']['error'] = 'Invalid data';
            }
        } else {
            $response['response']['status'] = 'ERROR';
            $response['response']['error'] = 'Vehicle not found';
        }
        echo json_encode($response);
    }

    /*
     * Add Vin Image of Specific Vehicle
     * Pending Fuction
     */
    /* public function editVin($id = null)
      {
      if ($id == null) {
      $msg = 'Missing Vehicle Id';
      $error = array(
      'code' => 202,
      'message' => $msg
      );
      $response = array(
      'status' => 'ERROR',
      'error' => $error
      );
      } else {
      $this->add_model(array('Vehicles'));
      if ($this->Vehicles->exists(['Vehicles.id' => $id])) {
      $vehicle = $this->Vehicles->get($id);
      if (!empty($this->request->data)) {
      $file = $this->request->data('file');
      $name = $file['name'];
      $temp = explode('.', $name);
      $extention = array_pop($temp);

      $directoryPath = $this->uploadPath . DS . $id;
      // dd($directoryPath);
      if (!is_dir($directoryPath)) {
      mkdir($directoryPath);
      }
      $dir = $this->uploadPath . DS . $id;
      $imageName = time() . '_' . $this->randomnum(7) . str_replace(" ", "", '.' . $extention);

      if (file_put_contents($dir . "/" . $imageName, $file)) {
      $srcFile1 = $dir . "/" . $vehicle['vin_image'];
      unlink($srcFile1);
      $vehicle = $this->Vehicles->patchEntity($vehicle, array('vin_image' => $imageName));
      if ($this->Vehicles->save($vehicle)) {
      $msg = 'Your Vehicle picture successfully uploaded!';
      $response = array(
      'status' => 'SUCCESS',
      'message' => $msg
      );
      }
      } else {
      $msg = 'Your Vehicle picture not successfully uploaded!';
      $error = array(
      'code' => 202,
      'message' => $msg
      );
      $response = array(
      'status' => 'ERROR',
      'error' => $error
      );
      }
      }
      } else {
      $msg = 'Not Found';
      $error = array(
      'code' => 201,
      'message' => $msg
      );
      $response = array(
      'status' => 'ERROR',
      'error' => $error
      );
      }
      }
      $responseResult = json_encode(array('response' => $response));
      $this->response->type('json');
      $this->response->body($responseResult);

      return $this->response;
      } */

    /*
     * Vehicle List
     * api: http://rrol.local/api/vehicles/index
     * Method: post
     * param: user_id
     */

    public function index() {
        //$query = $this->request->query;
        //$user_id = $query['user_id'];
        $user_id = $this->request->data('user_id');

        $this->add_model(array('Vehicles', 'Dealers', 'Models', 'Brands'));
        $conditions = [];
        $conditions = array_merge(array(
            'Vehicles.user_id' => $user_id, 'Vehicles.status' => 1), $conditions);

        $vehicles = $this->Vehicles->find('all', ['conditions' => $conditions])
                ->select(['Vehicles.id', 'Vehicles.year', 'Vehicles.model_id', 'Vehicles.brand_id', 'Vehicles.price', 'Vehicles.image', 'Vehicles.vin_number'])
                ->orderDesc('Vehicles.id')
                //->limit($options['limit'])
                //->page($options['page'])
                ->toArray();

        if (empty($vehicles)) {
            $msg = 'Not Found.';
            $error = array('code' => 201, 'message' => $msg);
            $response = array('status' => 'ERROR', 'error' => $error);
        } else {
            $formatted['status'] = 'SUCCESS';
            $vehicles = $this->Vehicles->parseVehicle($vehicles);

            // FOR Local
            $dir = $this->imgPath . 'vehicles' . '/';
            $defaultImageRoot = $this->imgPath;
            foreach ($vehicles as $key => $vehicle) {
                $formatted['vehicles'][$key]['id'] = $vehicle->id;
                $formatted['vehicles'][$key]['model'] = $vehicle->model['value'];
                $formatted['vehicles'][$key]['year'] = $vehicle->year;
                $formatted['vehicles'][$key]['make'] = $vehicle->brand['value'];
                $formatted['vehicles'][$key]['price'] = $vehicle->price;
                $formatted['vehicles'][$key]['vin_number'] = $vehicle->vin_number;
                if ($vehicle->image == null) {
                    $formatted['vehicles'][$key]['image'] = $defaultImageRoot . 'vehicle.png';
                } else {
                    $formatted['vehicles'][$key]['image'] = $dir . $vehicle->id . '/' . $vehicle->image;
                }
            }
            $response = $formatted;
        }
        $responseResult = json_encode(array('response' => $response));
        $this->response->type('json');
        $this->response->body($responseResult);

        return $this->response;
    }

    /*
     * Delete
     * Api: http://rrol.local/api/vehicles/delete?user_id=34&vehicle_id=33
     * Method: GET
     */

    public function delete() {
        $query = $this->request->query;
        $user_id = $query['user_id'];
        $id = $query['vehicle_id'];

        $this->add_model(array('Vehicles'));
        $vehicle = $this->Vehicles->get($id);
        if (!empty($vehicle)) {
            $vehicle->status = 2; // Inactive
            if ($this->Vehicles->save($vehicle)) {
                $msg = 'Vehicle Deleted Successfully';
                $response = array('status' => 'SUCCESS', 'message' => $msg);
            } else {
                $msg = 'The Vehicle could not be deleted. Please, try again.';
                $error = array('code' => 206, 'message' => $msg);
                $response = array('status' => 'ERROR', 'error' => $error);
            }
        } else {
            $msg = 'Not Found.';
            $error = array('code' => 201, 'message' => $msg);
            $response = array('status' => 'ERROR', 'error' => $error);
        }
        $responseResult = json_encode(array('response' => $response));
        $this->response->type('json');
        $this->response->body($responseResult);

        return $this->response;
    }

}
