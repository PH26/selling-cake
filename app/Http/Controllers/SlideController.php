<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::all();
        return view('admin.slide.index',compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slide.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formInput=$request->except('image');

//        validation
        $this->validate($request,[
            'image'=>'required',

        ]);
//        image upload
        $image = $request->image;
        if($image){
            $imageName = $image->getClientOriginalName();
            $image->move('upload/slide',$imageName);
            $formInput['image']=$imageName;
        }

        Slide::create($formInput);
        return redirect('admin/slide/index')->with('notification', 'The slide created successfully');
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
        $slide = Slide::find($id);
        return view('admin.slide.edit',compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $slide = Slide::find($id);
        $formInput = $request->except('image');

//        image upload
        $image = $request->image;
        if($image){
            $imageName = $image->getClientOriginalName();
            $image->move('upload/slide', $imageName);
            $formInput['image'] = $imageName;
        }
        $slide->update($formInput);
        return redirect('admin/slide/index')->with('notification','The slide updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Slide::destroy($id);
        return redirect('admin/slide/index')->with('notification','The slide deleted successfully');
    }
}
