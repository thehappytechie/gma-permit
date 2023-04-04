<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Rules\Password;
use Illuminate\Support\Facades\Auth;

class ForcePasswordChangeController extends Controller
{
    public function edit(Request $request, $id)
    {
        $user = User::findOrFail($id);
        return view('password-change.edit', compact(['user', 'request']));
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'password' => ['required', 'string', new Password(), 'confirmed'],
        ]);

        $user = User::find($id);
        if ($request->password) {
            $user->force_password_change = 0;
            $user->password = $request->password;
        }
        $user->save();

        session()->flash('success', 'Password changed successfully.');
        return redirect()->route('dashboard');
    }
}
