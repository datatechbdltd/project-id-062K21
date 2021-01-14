<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Package;
use App\Service;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::orderBy('created_at', 'DESC')->get();
        return view('admin.package.index', compact('packages'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $services = Service::all();
        return view('admin.package.create', compact('services'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'service'   =>'required',
            'name'         =>'required',
            'price'        =>'required|numeric|min:1|max:1000000',
            'description'  =>'nullable|max:5000',
            'offer_percent' =>'nullable|numeric|min:0|max:100',
            'color'         =>'nullable',
        ]);
        $package = new Package();
        $package->service_id     =$request->service;
        $package->name           =$request->name;
        $package->price          =$request->price;
        $package->description    =$request->description;
        $package->offer_percent  =$request->offer_percent;
        $package->color          =$request->color;

        try {
            $package->save();
            toast('Sucessfully data inserted!!!!','success');
            return redirect()->route('package.index');
        }catch (\Exception $exception){
            toast('Something going wrong!!!!','error');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        $services = Service::all();
        return view('admin.package.edit', compact('package', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Package $package)
    {
        $request->validate([
            'service'   =>'required',
            'name'         =>'required',
            'price'        =>'required|numeric|min:1|max:1000000',
            'description'  =>'nullable|max:5000',
            'offer_percent' =>'nullable|numeric|min:0|max:100',
            'color'         =>'nullable',
        ]);

        $package->service_id     =$request->service;
        $package->name           =$request->name;
        $package->price          =$request->price;
        $package->description    =$request->description;
        $package->offer_percent  =$request->offer_percent;
        $package->color          =$request->color;

        try {
            $package->update();
            toast('Sucessfully data updated!!!!','success');
            return redirect()->route('package.index');
        }catch (\Exception $exception){
            toast('Something going wrong!!!!','error');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        $package->delete();
        toast('Sucessfully data Deleted!!!!','success');
        return redirect()->route('package.index');
    }
}
