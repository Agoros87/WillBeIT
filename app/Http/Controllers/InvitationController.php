<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserStoreRequest;
use App\Mail\InvitationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\User;
class InvitationController extends Controller
{

    public function show()
    {
        return view('invitation.create');
    }

    public function invite(UserStoreRequest $request)
    {
        $token = Str::uuid();

        $user = User::create([
            'center_id' => auth()->user()->center_id,
            'name' => $request->name ?? 'Nombre por defecto',
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => bcrypt('contraseña_segura'),
            'type' => $request->type,
            'status' => 'send',
            'invited_by' => auth()->id(),
            'invitation_token' => $token,
        ]);
        $user->assignRole('student');


        Mail::to($user->email)->send(new InvitationMail($user));

        return back()->with('success', 'Invitación enviada.');
    }
}
