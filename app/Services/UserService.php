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
        $user->rol_id = 2;
        $user->save();

        return $user;
    }

    public function all($numberItem)
    {
        return User::whereNotIn('id', [1])->paginate($numberItem);
    }

    public function update($data, $user)
    {
        $user->name = $data->name;
        // $user->password = bcrypt($data->password);
        $user->phone = $data->phone;
        $user->date_of_birth = $data->date_of_birth;
        $user->city = $data->city;
        $user->update();

        return $user;
    }

    public function count()
    {
        return User::whereNotIn('id', [1])->count();
    }
}
