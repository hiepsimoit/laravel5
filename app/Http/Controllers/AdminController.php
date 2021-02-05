<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AdminController extends Controller
{
    protected function render($view_file, $layout = 'default')
    {
        return view('admin.'.$this->url.'.index',['data'=>$data,'url'=>$this->url,'title'=>$this->titlePage]);
    }
}
