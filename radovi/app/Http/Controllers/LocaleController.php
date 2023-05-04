<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{
    public function setEng()
    {
        $this->setLocale('en');
        return $this->returnToDashboard();
    }

    public function setCro()
    {
        $this->setLocale('hr');
        return $this->returnToDashboard();
    }


    private function setLocale(string $locale)
    {
        App::setLocale($locale);
        Session::put('locale', $locale);
    }
    private function returnToDashboard()
    {
        return redirect(route(auth()->user()->getRedirectRoute()));
    }
}
