<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PicturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return view("form");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("add-pictures");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
                "title"=>"required|min:3",
                "file"=>"image|required|mimes:jpg,png,jpeg,gif,bmp"
            ]
        );

        if($request->hasFile("file")){
           //get file with extension
           $fileNameWithExtension = $request->file("file")->getClientOriginalName();
           //get filename
           $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
           //get file extension
           $extension = $request->file("file")->getClientOriginalExtension();
           //file to store in database
           $fileNameStore = $fileName."_".time().".".$extension;
           //$path = $request->file("file")->store("public/files",$fileNameStore);
            $request->file("file")->move("pictures", $fileNameStore);
        }else{
            $fileNameStore = "default.png";
        }
        $data = [
            "title"=>$request->title,
            "file"=>$fileNameStore
        ];
        Picture::create($data);
        return back();
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
    public function destroy($id)
    {
        //
    }
    public function findPictures(Request $request){
        $this->validate($request,[
            "title"=>"required|min:3",
        ]);
        $title = strtolower($request->title);
        $pictures = Picture::where("title","LIKE","%".$title."%")->get();

        return view("result",compact("pictures"));
    }
}
