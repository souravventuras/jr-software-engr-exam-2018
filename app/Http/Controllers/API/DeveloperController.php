<?php

namespace App\Http\Controllers\API;

use App\Developer;
use App\Http\Controllers\Controller;
use App\Http\Resources\DeveloperCollection;

class DeveloperController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return DeveloperCollection
     */
    public function index()
    {
        return new DeveloperCollection(Developer::paginate(10));
    }
}
