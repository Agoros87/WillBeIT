<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterInvitationRequest;
use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class RegisterInvitedController extends Controller
{
    public function showForm($token)
    {
        Auth::logout();
        $user = User::where('invitation_token', $token)->firstOrFail();

        return view('invitation.register-invited', compact('user'));
    }


    public function register(UserRegisterInvitationRequest $request, $token)

    {
        $user = User::where('invitation_token', $token)->firstOrFail();


        if ($user->status === 'approved') {
            return redirect()->route('login')->with('status', 'Ya has registrado tu cuenta.');
        }

        $user->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'password' => bcrypt($request->password),
            'status' => 'pending',
            'email_verified_at' => now(),
        ]);

        // Aquí el usuario sigue con estado 'pending'

        return redirect()->route('login')->with('status', 'Tu cuenta está pendiente de verificación.');
    }

}
