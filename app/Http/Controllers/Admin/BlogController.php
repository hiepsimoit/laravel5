<?php

namespace App\Http\Controllers\Admin;

use App\blog;

use App\User;
use App\phone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends \App\Http\Controllers\AdminController
{
    public function __construct()
    {
        $this->url = 'blog';
        $this->titlePage = 'Blog';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $data = blog::all();

        return view('admin.'.$this->url.'.index',['data'=>$data,'url'=>$this->url,'title'=>$this->titlePage]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.'.$this->url.'.add',['url'=>$this->url,'title'=>$this->titlePage]);
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
        $this->validate($request, [
            'username' => 'required|max:50',
            'password' => 'min:6|required_with:rePassword|same:rePassword',
            'rePassword' => 'min:6'
        ], [

            ]
        );
        $admin_user = new blogs();
        $admin_user->username = $request->username;
        $admin_user->password = bcrypt($request['password']);
        $admin_user->save();
        return redirect('admin/'.$this->url)->with('message','Thêm thành công!');
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
}
