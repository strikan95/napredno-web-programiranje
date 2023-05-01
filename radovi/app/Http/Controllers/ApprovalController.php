<?php

namespace App\Http\Controllers;

use App\Models\User;

class ApprovalController extends Controller
{
    public function approve(User $user)
    {
        $user->approve();
        $user->save();

        return redirect()->back();
    }
}
