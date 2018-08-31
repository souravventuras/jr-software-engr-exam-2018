<?php
/**
 * Created by PhpStorm.
 * User: kamol
 * Date: 8/28/2018
 * Time: 5:39 PM
 */

namespace SimpleSearch\Repository;


use SimpleSearch\Repository\Eloquent\Repository;

class DeveloperRepository extends Repository
{

    public function model()
    {
        return 'App\Models\Developer';
    }

    public function getAll($columns = array('*'))
    {
        return $this->model->with(['programmingLanguage', 'language'])->get();
    }

    public function searchDeveloper($request){
        $programming_language = $request->input('programming_language');
        $language = $request->input('language');

        if($programming_language && $language){
            return $this->model->with(['programmingLanguage', 'language'])->whereHas('language', function ($q)use($language){$q->where('code', $language);})->whereHas('programmingLanguage', function ($q)use($programming_language){$q->where('name', $programming_language);})->get();
        }elseif ($programming_language){
            return $this->model->with(['programmingLanguage', 'language'])->whereHas('programmingLanguage', function ($q)use($programming_language){$q->where('name', $programming_language);})->get();
        }else{
            return $this->model->with(['programmingLanguage', 'language'])->whereHas('language', function ($q)use($language){$q->where('code', $language);})->get();
        }

    }
}