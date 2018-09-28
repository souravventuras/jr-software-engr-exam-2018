<?php

namespace Leaping\Controller\Api;

use function bar\foo\baz\ConstTest;
use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Cache\Cache;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
use Firebase\JWT\JWT;

class AppController extends Controller
{

    public $successCode = 'success';
    public $errorCode = 'error';

    public function initialize()
    {
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        parent::initialize();
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

    }


    public function isAuthorized($user)
    {
        return true;
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

    public function add_model($models)
    {
        foreach ($models as $model) {
            $this->loadModel($model);
        }
    }

    function createToken($apps)
    {
        $userObj = \Cake\ORM\TableRegistry::get('User');
        $user = $userObj->get($apps['user_id']);
        $server = $_SERVER;
        $key = \Cake\Utility\Security::salt();
        $token = array(
            "iss" => $server['SERVER_NAME'],
            "aud" => "",
            "iat" => time(),
            'user' => $user,
        );
        return  \Firebase\JWT\JWT::encode($token, $key);
    }

    function decodeToken($token){
       $key = \Cake\Utility\Security::salt();
       $data = \Firebase\JWT\JWT::decode($token, $key, array('HS256'));
       return $data;

    }
    /**
     * Random Alpha-Numeric String
     *
     * @param int length
     * @return string
     * @access public
     */
    function randomnum($length)
    {
        $randstr = "";
        srand((double)microtime() * 1000000);
        //our array add all letters and numbers if you wish
        $chars = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
        for ($rand = 0; $rand <= $length; $rand++) {
            $random = rand(0, count($chars) - 1);
            $randstr .= $chars[$random];
        }
        return $randstr;
    }

    public function send_email($options = array())
    {
        $template = $options['template'];
        $email = new \Cake\Mailer\Email();
        $email::configTransport('gmail', [
            'host' => 'ssl://smtp.gmail.com',
            'port' => 465,
            'username' => 'general@b2digitaltechnologies.com',
            'password' => 'B2common',
            'log' => true,
            'tls' => false,
            'context' => [
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                ]
            ]
        ]);
        $email->transport('gmail');
        if (!empty($options['activation'])) {
            $email->viewVars(array('activation' => $options['activation']));
        }
        if (!empty($options['text'])) {
            $email->viewVars(array('text' => $options['text']));
        }
        if (empty($options['from'])) {
            $options['from'] = 'contact@leappinglogic.com';
        }
        $email->setTemplate($template)
            ->setEmailFormat('html')
            ->setTo($options['to'])
            ->setFrom($options['from'], 'Invoice App')
            ->setSubject($options['subject'])
            ->send();
//        $email->template($template, 'abtacus')
//                //->setFrom(['contact@leappinglogic.com' => 'AppRemi'])
//                ->emailFormat('html')
//                ->to($options['to'])
//                ->from('contact@appremi.com')
//                ->subject($options['subject'])
//                ->send();
    }

    public function format_date($date, $from = 'd/m/Y', $to = 'Y-m-d')
    {
        $ex = explode('/', $date);
        if ($from == 'd/m/Y') {
            $con_date = $ex[2] . '-' . $ex[1] . '-' . $ex[0];
            $actual_date = date($to, strtotime($con_date));
        }
        return $actual_date;
    }

    function addNotification($options)
    {
        $this->loadModel('Notification');
        $user = $this->Auth->user();
        $this->Notification->addToLog($options);
    }

    public function uploadImage($type)
    {
        if (!empty($_FILES['file']['name'])) {
            $dir = getcwd() . DS . 'img' . DS . $type . DS;
            $imageName = time() . '_' . $this->randomnum(7) . '_' . str_replace(" ", "", $_FILES['file']['name']);
            move_uploaded_file($_FILES['file']['tmp_name'], $dir . $imageName);
            return $imageName;
        }
    }

    function seoUrl($string)
    {
        //Unwanted:  {UPPERCASE} ; / ? : @ & = + $ , . ! ~ * ' ( )
        $string = strtolower(trim($string));
        //Strip any unwanted characters
        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
        //Clean multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);
        //Convert whitespaces and underscore to dash
        $string = preg_replace("/[\s_]/", "-", $string);
        return trim($string);
    }

    public function getUserInfo($id){
        $this->add_model(array('Leaping.User'));
        if($id){
            $user = $this->User->get($id);

            return $user;
        }
    }

}
