<?php

namespace App\Http\Controllers;
use Image;
use Carbon\Carbon;
use App\images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $img = Image::make('home.jpg')->greyscale();

    return $img->response('jpg');
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
        if ($request->hasFile('image')){
                $filename= $request->image->getClientOriginalName();
                $imaged = time().'_'.$filename;
                $userid= Auth::user()->id;
                // $path = storage_path( $userid .'/'. $imaged);
                $request->image->storeAs($userid,$imaged, 'public');
            $data['user_id'] = Auth::user()->id;
        $data['image'] = $userid.'/'.$imaged;

        images::create($data);
        return back();

        }



 }



// Routing
public function printing(Request $request)
{
    $userid= Auth::user()->id;
    $getImage= Images::where('user_id',$userid)->get('image');
    if( ($getImage->count() > 0 )){
 return view('printing',[ 'getImage' => $getImage]);
}else {
return back();
}


}



    /**
     * Display the specified resource.
     *
     * @param  \App\images  $images
     * @return \Illuminate\Http\Response
     */
    public function show(images $images)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\images  $images
     * @return \Illuminate\Http\Response
     */
    public function edit(images $images)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\images  $images
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, images $images)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\images  $images
     * @return \Illuminate\Http\Response
     */
    public function destroy(images $images)
    {
        //
    }
}
