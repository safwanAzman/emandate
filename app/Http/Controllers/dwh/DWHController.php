<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Models\MDT_PRNE;


class DWHController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
            return view('pages.homedashboard');
    }


    public function show($id)
    {
        // return view('pages.reportenrp', compact('id'));
    }
    
    
}
