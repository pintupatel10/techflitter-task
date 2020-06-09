<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserList;
use Response;

class UserListController extends Controller
{
    public function userList(Request $request)
    {
        $id        = $request->get('id',"");
        $firstName = $request->get('first_name',"");
        $lastName  = $request->get('last_name',"");
        $email     = $request->get('email',"");
        
        $userList  = new UserList;
        
        if (!empty($id)) {
            $userList = $userList->where('id', '=',$id);
        }

        if (!empty($firstName)) {
            $userList = $userList->where('first_name', '=',$firstName);
        }

        if (!empty($lastName)) {
            $userList = $userList->where('last_name', '=',$lastName);
        }

        if (!empty($email)) {
            $userList = $userList->where('email', '=',$email);
        }

        $userList  = $userList->orderBy('updated_at','desc')->paginate(10);

        return view('userlist',compact('userList'));
    }
}