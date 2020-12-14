<?php

namespace App\Http\Controllers;

use App\gWork;
use App\User;
use Illuminate\Http\Request;

class GWorkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $Gworks = gWork::all();

        return view('Gworks.index', [
            'Gworks' => $Gworks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
         $allUser = User::all();
         return view('Gworks.create',compact('allUser'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        request()->validate([
            'title'=>'required',
            'body' => 'required',
            'user_id'=>'required',
         ]);
        gWork::create($request->all());
        return redirect('/ertebat/gworks')->with('success','کارگروه با موفقیت اضافه شد');
    }

    /**
     * Display the specified resource.
     *
     * @param gWork $gworks
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(gWork $gworks)
    {

        return view('Gworks.show', [
            'gWork' => $gworks,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\gWork  $gWork
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(gWork $gWork)
    {

        $allUser = User::all();

     return view('Gworks.update',compact('allUser','gWork'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\gWork  $gWork
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, gWork $gWork)
    {

        gWork::where('id', $gWork->id)->update($request->except('_token'));
        return  redirect()->back()->with('success','با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\gWork  $gWork
     * @return \Illuminate\Http\Response
     */
    public function destroy(gWork $gWork)
    {
        //
    }
}
