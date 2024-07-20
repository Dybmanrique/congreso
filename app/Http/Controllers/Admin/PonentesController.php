<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PonentesController extends Controller
{
    function index()
    {
        return view('admin.ponentes.index');
    }
}
