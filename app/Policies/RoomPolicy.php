<?php

namespace App\Policies;

use App\Models\Room;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RoomPolicy
{
    //policy to make both admin and employee allowed to update status of room
    public function updateStatus(User $user, Room $room): bool
    {
        return $user->role === 'admin' || $user->role === 'employee';
    }


}
