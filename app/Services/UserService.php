<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function create($data)
    {
        $user = new User;
        $user->name = $data->name;
        $user->email = $data->email;
        $user->password = bcrypt($data->password);
        $user->phone = $data->phone;
        $user->identification_card = $data->identification_card;
        $user->date_of_birth = $data->date_of_birth;
        $user->city = $data->city;
        $user->save();

        return $user;
    }
}
