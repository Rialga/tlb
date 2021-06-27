<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Flash;

class GantiPasswordController extends Controller
{
    public function simpan(Request $request)
    {
        $error = Flash::error('Password Gagal Diganti');

        $request->validate([
        'password' => 'required|confirmed|min:6'
      ]);

        unset($error->messages[0]);
      
        $user = Auth::user();
        $user->password = bcrypt($request->password);
        Flash::success('Password Berhasil Diganti');
        $user->save();

        return redirect()->back();
    }
}
