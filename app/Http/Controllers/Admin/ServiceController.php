<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Language;
use App\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::orderBy('created_at', 'DESC')->get();
        return view('admin.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'language'   =>'required|exists:languages,id',
           'name'       =>'required',
           'icon'       =>'required|image',
           'featured_image'=>'required|image',
           'attachment_file' =>'required',
        ]);

        $service = new Service();
        $service->adder_id          =Auth::user()->id;
        //$service->updater_id    = $request->updater_id;
        $service->language_id       =$request->language;
        $service->name              =$request->name;
        $service->slug              =Str::slug($request->name, '-');
        $service->short_description =$request->short_description;
        $service->long_description  =$request->long_description;
        //$service->visitor_counter   =$request->visitor_counter;
        $service->status            =$request->status;

        if($request->hasFile('icon')){
            $image              = $request->file('icon');
            $OriginalExtension  = $image->getClientOriginalExtension();
            $image_name         ='icon-'.Str::random(6).Carbon::now()->format('d-m-Y H-i-s') .'.'. $OriginalExtension;
            $destinationPath    = ('uploads/images/service/');
            $resize_image       = Image::make($image->getRealPath());
            $resize_image->save($destinationPath . $image_name);
            $service->icon = $destinationPath . $image_name;
        }
        if($request->hasFile('featured_image')){
            $image              = $request->file('featured_image');
            $OriginalExtension  = $image->getClientOriginalExtension();
            $image_name         ='featured_image-'.Str::random(6).Carbon::now()->format('d-m-Y H-i-s') .'.'. $OriginalExtension;
            $destinationPath    = ('uploads/images/service/');
            $resize_image       = Image::make($image->getRealPath());
            $resize_image->save($destinationPath . $image_name);
            $service->featured_image = $destinationPath . $image_name;
        }
        if($request->hasFile('attachment_file')){
            $image              = $request->file('attachment_file');
            $OriginalExtension  = $image->getClientOriginalExtension();
            $image_name         ='attachment-'.Str::random(6).Carbon::now()->format('d-m-Y H-i-s') .'.'. $OriginalExtension;
            $destinationPath    = ('uploads/images/service/');
            $resize_image       = Image::make($image->getRealPath());
            $resize_image->save($destinationPath . $image_name);
            $service->attachment_file = $destinationPath . $image_name;
        }
        //dd($service->icon);
        try {
            $service->save();
            toast('Sucessfully data inserted!!!!','success');
            return redirect()->route('service.index');
        }catch (\Exception $exception){
            toast('Something going wrong!!!!','error');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $data['languages']=Language::all();
        $data['service'] = $service;
        return view('admin.service.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'language'   =>'required|exists:languages,id',
            'name'       =>'required',
        ]);

        $service->updater_id        =Auth::user()->id;
        $service->language_id       =$request->language;
        $service->name              =$request->name;
        $service->slug              =Str::slug($request->name, '-');
        $service->short_description =$request->short_description;
        $service->long_description  =$request->long_description;
        $service->status            =$request->status;

        if($request->hasFile('icon')){
            if($service->icon != null  && file_exists($service->icon )){
                unlink($service->icon);
            }
            $image              = $request->file('icon');
            $OriginalExtension  = $image->getClientOriginalExtension();
            $image_name         ='icon-'.Str::random(6). Carbon::now()->format('d-m-Y-H-i-s', '-') .'.'. $OriginalExtension;
            $destinationPath    = ('uploads/images/service/');
            $resize_image       = Image::make($image->getRealPath());
            $resize_image->save($destinationPath . $image_name);
            $service->icon = $destinationPath . $image_name;
        }
        if($request->hasFile('featured_image')){
            if($service->featured_image != null  && file_exists($service->featured_image)){
                unlink($service->featured_image);
            }
            $image              = $request->file('featured_image');
            $OriginalExtension  = $image->getClientOriginalExtension();
            $image_name         ='featured_image-'.Str::random(6).Carbon::now()->format('d-m-Y H-i-s') .'.'. $OriginalExtension;
            $destinationPath    = ('uploads/images/service/');
            $resize_image       = Image::make($image->getRealPath());
            $resize_image->save($destinationPath . $image_name);
            $service->featured_image = $destinationPath . $image_name;
        }
        if($request->hasFile('attachment_file')){
            if($service->attachment_file != null  && file_exists($service->attachment_file)){
                unlink($service->attachment_file);
            }
            $image              = $request->file('attachment_file');
            $OriginalExtension  = $image->getClientOriginalExtension();
            $image_name         ='attachment-'.Str::random(6).Carbon::now()->format('d-m-Y H-i-s') .'.'. $OriginalExtension;
            $destinationPath    = ('uploads/images/service/');
            $resize_image       = Image::make($image->getRealPath());
            $resize_image->save($destinationPath . $image_name);
            $service->attachment_file = $destinationPath . $image_name;
        }

        try {
            $service->update();
            toast('Sucessfully data updated!!!!','success');
            return redirect()->route('service.index');
        }catch (\Exception $exception){
            toast('Something going wrong!!!!','error');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        if(file_exists($service->icon))
        {
            unlink($service->icon);
        }
        if(file_exists($service->featured_image))
        {
            unlink($service->featured_image);
        }
        if(file_exists($service->attachment_file))
        {
            unlink($service->attachment_file);
        }
        $service->delete();
        toast('Sucessfully data Deleted!!!!','success');
        return redirect()->route('service.index');
    }
}
