<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Pages;
class employeeController extends Controller
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;
    public function home()
    {

        $data = Pages::getPage('home');


        return $this->response
        
        ->layout('home')
        ->view('product')
        ->data(compact('data'))
        ->output();
    }
}
