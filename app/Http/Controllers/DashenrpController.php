<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MDT_PRNE;

class DashenrpController extends Controller
{
    public function index()
    {   

        return view('pages.dashenrpall');
    }

    public function show($id)
    {
         return view('pages.dashenrpall',compact('id'));

    }

}
