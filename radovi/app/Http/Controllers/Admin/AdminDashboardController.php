<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class AdminDashboardController extends Controller
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
