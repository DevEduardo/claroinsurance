<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmailJob;
use App\Mail\UserMail;
use App\Services\EmailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    protected $emailService;
    public $data;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    public function emails($numberItem = 10)
    {
        $emails = $this->emailService->all($numberItem);
        return view('emails.index', compact('emails', 'numberItem'));
    }

    public function create() {
        return view('emails.create');
    }

    public function store(Request $request)
    {
        try {
            $this->emailService->create($request);
            
            dispatch(new SendEmailJob($request->all()));

            return view('emails.create');
        } catch (Exception $e) {
            throw $e;
        }
    }
}
