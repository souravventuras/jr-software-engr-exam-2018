<?php

namespace App\Http\Controllers\API;

use App\Developer;
use App\Http\Controllers\Controller;
use App\Http\Resources\DeveloperResource;
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

    /**
     * Display the specified resource.
     *
     * @param Developer $developer
     * @return DeveloperResource
     */
    public function show(Developer $developer)
    {
        if (strpos(request()->headers->get('Content-Type'), 'application/xml') === 0)
        {
            return response()->xml($developer);
        }

        return new DeveloperResource($developer);
    }
}
