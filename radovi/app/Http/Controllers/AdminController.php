<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $unapprovedUsers = User::query()->get()->where('approved_at', '=', null);

        return view(
            'admin.dashboard',
            [
                'unapprovedUsers' => $unapprovedUsers
            ]
        );
    }
}
