<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadRequest;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('common.upload');

        return view('form.file');
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
    public function store(UploadRequest $request)
    {
        if($request->hasFile('files')){
            $ups = $request->file('files');
            foreach ($ups as $file) {
                $status = $file->storeAs('downloads', $file->getClientOriginalName(), 'public');
            }
        }

        return redirect()->action('UploadController@index', ['Downloads'=>'Загрузки']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy(Request $request)
    {
        if($request->hasFile('files')) {
           $ups = $request->file('files');
                foreach ($ups as $file) {
                    $fname = $file->getClientOriginalName();
                    $fsrc = "downloads/".$fname;

                    \Storage::disk('public')->delete($fsrc);
//                    if (\Storage::exists($fsrc)) {
//                    \Storage::disk('public')->delete($fsrc);
//                     }
                }
        }

        return redirect()->action('UploadController@index', ['Status'=>'Удаление']);
    }
}
