<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return view('admin.users.index');
    }
    public function data() {
        return User::with('ejes_tematicos')->get();
    }
}
