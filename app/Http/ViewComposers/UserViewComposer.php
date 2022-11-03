<?php

namespace App\Http\ViewComposers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class UserViewComposer
{

    public function compose(View $view)
    {
        $user = User::find(Auth::user()->id);
        $view->with('user', $user);
    }
}