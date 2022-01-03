<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmailJob;
use App\Mail\UserMail;
use App\Models\Email;
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

    public function datatable(Request $request)
    {
        // $emails = $this->emailService->all($numberItem);
        $totalFilteredRecord = $totalDataRecord = $draw_val = "";
        $columns_list = array(
            0 => 'id',
            1 => 'addressee',
            2 => 'matter',
            3 => 'message',
            4 => 'status',
        );

        $totalDataRecord = $this->emailService->count();

        $totalFilteredRecord = $totalDataRecord;

        $limit_val = $request->input('length');
        $start_val = $request->input('start');
        $order_val = $columns_list[$request->input('order.0.column')];
        $dir_val = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $emails = Email::offset($start_val)
                ->limit($limit_val)
                ->orderBy($order_val, $dir_val)
                ->get();
        } else {
            $search_text = $request->input('search.value');

            $emails =  Email::where('id', 'LIKE', "%{$search_text}%")
                ->orWhere('addressee', 'LIKE', "%{$search_text}%")
                ->offset($start_val)
                ->limit($limit_val)
                ->orderBy($order_val, $dir_val)
                ->get();

            $totalFilteredRecord = Email::where('id', 'LIKE', "%{$search_text}%")
                ->orWhere('addressee', 'LIKE', "%{$search_text}%")
                ->count();
        }

        $data_val = array();
        if (!empty($emails)) {
            foreach ($emails as $email) {

                $postnestedData['#'] = $email->id;
                $postnestedData['addressee'] = $email->addressee;
                $postnestedData['matter'] = $email->matter;
                $postnestedData['message'] = substr(strip_tags($email->message), 0, 50) . ".....";
                $postnestedData['status'] = $email->status;
                $data_val[] = $postnestedData;
            }
        }
        $draw_val = $request->input('draw');
        $get_json_data = array(
            "draw"            => intval($draw_val),
            "recordsTotal"    => intval($totalDataRecord),
            "recordsFiltered" => intval($totalFilteredRecord),
            "data"            => $data_val
        );

        echo json_encode($get_json_data);
    }

    public function create()
    {
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
