<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use Illuminate\Http\Request;

use App\Models\City;
use App\Traits\PhotoTrait;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     use PhotoTrait;
    public function index()
    {
        //
        $cities=City::get();
        return view('back.cities.index')->with(['cities'=>$cities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('back.cities.add');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
        //
        $data=$request->only('name');
        if($request->hasFile('photo')){
            $path='images/cities';
            $photo=$request->photo;
            $fileName=$this->savePhoto($photo,$path);
            $data['photo']=$fileName;


        }
        City::create($data);
        return redirect()->route('cities.index')->with(['success'=>'the city has added']);
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
        $city=City::find($id);
        if(!$city)
            return redirect()->route('cities.index')->with(['error'=>'the city not found']);
        else
            return view('back.cities.add')->with(['city'=>$city]);
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

        //
        $city=City::find($id);
        if(!$city)
            return redirect()->rout('cities.index')->with(['error'=>'the city not found']);
        else
            $data=$request->only('name');
        if($request->hasFile('photo'))
        {
            $path='images/cities';
            $photo=$request->photo;
            $fileName=$this->savePhoto($photo,$path);
            $data['photo']=$fileName;

        }
        City::where('id',$id)->update($data);


        return redirect()->route('cities.index')->with(['success'=>'the city has updates']);
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
