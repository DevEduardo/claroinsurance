<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function users($numberItem = 10)
    {
        $users = $this->userService->all($numberItem);
        return view('users.index', compact('users', 'numberItem'));
    }

    public function user(User $user)
    {
        return view('users.update', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        try {
            $this->userService->update($request, $user);
            return redirect("users");
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function delete(User $user)
    {
        try {
            $user->trashed();
            return redirect("users");
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function datatable(Request $request)
    {
        $totalFilteredRecord = $totalDataRecord = $draw_val = "";
        $columns_list = array(
            0 => 'id',
            1 => 'name',
            2 => 'email',
            3 => 'phone',
            4 => 'identification_card',
            5 => 'date_of_birth',
            6 => 'date_of_birth',
            7 => 'city',
        );

        $totalDataRecord = $this->userService->count();

        $totalFilteredRecord = $totalDataRecord;

        $limit_val = $request->input('length');
        $start_val = $request->input('start');
        $order_val = $columns_list[$request->input('order.0.column')];
        $dir_val = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $users = User::whereNotIn('id', [1])
                ->offset($start_val)
                ->limit($limit_val)
                ->orderBy($order_val, $dir_val)
                ->get();
        } else {
            $search_text = $request->input('search.value');

            $users =  User::whereNotIn('id', [1])
                ->where('name', 'LIKE', "%{$search_text}%")
                ->orWhere('identification_card', 'LIKE', "%{$search_text}%")
                ->orWhere('phone', 'LIKE', "%{$search_text}%")
                ->orWhere('email', 'LIKE', "%{$search_text}%")
                ->offset($start_val)
                ->limit($limit_val)
                ->orderBy($order_val, $dir_val)
                ->get();

            $totalFilteredRecord = User::whereNotIn('id', [1])
                ->where('name', 'LIKE', "%{$search_text}%")
                ->orWhere('identification_card', 'LIKE', "%{$search_text}%")
                ->orWhere('phone', 'LIKE', "%{$search_text}%")
                ->orWhere('email', 'LIKE', "%{$search_text}%")
                ->count();
        }

        $data_val = array();
        if (!empty($users)) {
            foreach ($users as $user) {
                
                $dataDelete =  route('user.delete',$user->id);
                $dataedit =  route('user.update',$user->id);

                $postnestedData['#'] = $user->id;
                $postnestedData['Name'] = $user->name;
                $postnestedData['Email'] = $user->email;
                $postnestedData['Phone'] = $user->phone;
                $postnestedData['Identification card'] = $user->identification_card;
                $postnestedData['Date of birth'] = $user->date_of_birth;
                $postnestedData['Edad'] = Carbon::parse($user->date_of_birth)->age;
                $postnestedData['City'] = $user->city;
                $postnestedData['Actions'] = "&emsp;<a href='{$dataDelete}'class='showdata' title='Delete User' ><span class='showdata glyphicon glyphicon-list'></span></a>&emsp;<a href='{$dataedit}' class='editdata' title='Edit User' ><span class='editdata glyphicon glyphicon-edit'></span></a>";

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
}
