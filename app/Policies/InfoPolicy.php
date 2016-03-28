<?php

namespace App\Policies;

use App\User;
use App\Info;
use Illuminate\Auth\Access\HandlesAuthorization;

class InfoPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function info_authorize(User $user, Info $info)
    {
        return ($user->id === $info->user_id);
    }


}
