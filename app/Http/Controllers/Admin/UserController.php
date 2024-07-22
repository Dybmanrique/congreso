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
    public function create() {
        return view('admin.users.create');
    }
    public function edit(User $user) {
        return view('admin.users.edit', compact('user'));
    }

    public function delete(Request $request)
    {
        try {
            $user = User::find($request->id);

            $user->delete();
            return response()->json([
                'message' => 'Operación realizada',
                'code' => '200'
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'Algo salió mal',
                'code' => '500'
            ]);
        }
    }
}
