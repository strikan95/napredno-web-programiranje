<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
