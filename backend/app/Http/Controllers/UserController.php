<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function store(Request $request)
    {
        try {
            if (@$request->user_id != null) {
                $updateUser = User::find($request->user_id);
                $updateUser->name = $request->name;
                $updateUser->email = $request->email;
                $updateUser->password = $request->password ? Hash::make($request->password) : $updateUser->password;
                $updateUser->update();

                $address = UserAddress::where('user_id', $request->user_id);
                $address->address = $request->address;
                $address->mobile = $request->mobile;
                $address->user_id = $updateUser->id;
                $address->update();

                Session::forget(['sessionUser', 'sessionUserAddress']);
            } else {
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->save();
                $lastId = DB::getPdo()->lastInsertId();

                $userAddress = new UserAddress();
                $userAddress->address = $request->address;
                $userAddress->mobile = $request->mobile;
                $userAddress->user_id = $lastId;
                $userAddress->save();
                // Or using the Session facade
                Session::put('sessionUser', $user);
                Session::put('sessionUserAddress', $userAddress);
            }
            return view('welcome');
        } catch (Exception $th) {
            throw $th;
        }
    }
}
