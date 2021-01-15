<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\oAuth;
use Illuminate\Http\Request;

class OAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $oauths = oAuth::all();
        return view('admin.o-auth.index', compact('oauths'));
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
     * @param  \App\oAuth  $oAuth
     * @return \Illuminate\Http\Response
     */
    public function show(oAuth $oAuth)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\oAuth  $oAuth
     * @return \Illuminate\Http\Response
     */
    public function edit(oAuth $oAuth)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\oAuth  $oAuth
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, oAuth $oAuth)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\oAuth  $oAuth
     * @return \Illuminate\Http\Response
     */
    public function destroy(oAuth $oAuth)
    {
        //
    }
}
