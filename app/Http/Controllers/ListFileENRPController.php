<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MDT_PRNE;
class ListFileENRPController extends Controller


{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        /* could not use for pagination because of distinct() */
        $file_ENRP = MDT_PRNE::distinct()-> get(['filename']);

        //dd($file_ENRP);
        
         //return view('pages.mainENRP');  
         return view('pages.mainENRP',compact('file_ENRP'));
        
    }

  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $NERPS = MDT_PRNE::paginate(10);
        // $NERPS = MDT_PRNE::find($id);
       // $file_ENRP = MDT_PRNE::where('payrefnum','like','%'.$id.'%')->whereSection('BLOCK2')->paginate(5);
      //  $file_ENRP = MDT_PRNE::distinct()-> get(['filename']) ->paginate(5);


        // dd($file_ENRP);

        // $file_ENRP = MDT_PRNE::where('payrefnum', '=', $NERPS)->whereOr()
        //                 -> where(function ($query) {
        //                     $query->where('section', '=', 'BLOCK2'); }) -> paginate(5);

        //   dd($file_ENRP);
        
       // return view('pages.mainENRP',compact('file_ENRP'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

