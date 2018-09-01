<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SimpleSearch\Repository\DeveloperRepository;

class DeveloperController extends Controller
{
    protected $developer;

    public function __construct(DeveloperRepository $developer)
    {
        $this->developer = $developer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $developers = $this->developer->getAll();

        return response()->json($developers);
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $developer = $this->developer->find($id);

        $data = [
            'id' => $developer->id,
            'email' => $developer->email,
            'language' => $developer->language,
            'programming_language' => $developer->programmingLanguage
        ];


        if (0 === strpos($request->headers->get('Content-Type'), 'text/xml')) {
            return response()->view('xml.developer', [
                'developer' => $developer,
            ], 200)->header('Content-Type', 'text/xml');
        }

        return response()->json($data);
        
    }


}
