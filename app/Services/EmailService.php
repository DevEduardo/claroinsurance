<?php

namespace App\Services;

use App\Models\Email;
use App\Models\User;

class EmailService
{
    public function create($data)
    {
        $email = new Email;
        $email->user_id = auth()->user()->id;
        $email->addressee = $data->addressee;
        $email->matter = $data->matter;
        $email->message = $data->message;
        $email->save();

        return $email;
    }

    public function all($numberItem)
    {
        return Email::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->paginate($numberItem);
    }

    public function count()
    {
        return Email::where('user_id', auth()->user()->id)->count();
    }

    public function changeStatus($emailId)
    {
        $email = Email::find($emailId);
        if ($email) {
            $email->status = 'Enviado';
            $email->update();
        }
    }
}
