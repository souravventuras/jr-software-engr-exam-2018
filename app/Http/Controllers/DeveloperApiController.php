<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Developer;
use Illuminate\Http\Response;

class DeveloperApiController extends Controller
{
    /**
     * Display a listing of the developer.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $developer = Developer::all();
        foreach ($developer as $key => $value) {
            $developer[$key]->programming_language = $value->programming->toArray();
            $developer[$key]->language = $value->language->toArray();
        }
        return $developer;

    }

    /**
     * Display the specified developer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $developer = Developer::find($id);
       $developer->programming_language = $developer->programming->toArray();
       $developer->language = $developer->language->toArray();
       return $developer;
    }
}
