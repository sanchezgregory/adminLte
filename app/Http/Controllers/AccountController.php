<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function getPassword()
    {
        return view('account.password');
    }

    public function postPassword(Request $request)
    {
        $user = $request->user();

        if (! Hash::check($request->get('current_password'), $user->password)) {
            return redirect()->back()->withErrors([
                'current_password' => 'Password invalido',
            ]);
        }

        $this->validate($request, [
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        $user->password = bcrypt($request->get('password'));
        $user->save();

        return redirect('account')
            ->with('alert', 'Password Cambiado');
    }

    public function editProfile()
    {
        $user = Auth::User();
        return view('account.editProfile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = $request->user();

        $this->validate($request, [
            'username' => 'required|min:6',
        ]);

        $user->fill($request->only(['username']));  // esta una forma de guardar
        $user->username = $request->get('username'); // esta es una forma de hacerlo
        $user->save();

        return redirect('account')
            ->with('alert', 'perfil cambiado');

    }
}
