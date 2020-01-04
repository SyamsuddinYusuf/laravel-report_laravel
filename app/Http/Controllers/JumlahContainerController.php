<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Container;

class JumlahContainerController extends Controller
{
    public function index()
    {
        $container = Container::where('TAHUN', '2019')->paginate(10);

        return view('container', ['container' => $container]);

    }

}
