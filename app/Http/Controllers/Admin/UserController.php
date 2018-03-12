<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Mail;
use Session;
use Hash;
use App\User;
use Validator;
use App\Http\Requests\AddAdminRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getAdduser()
    {
        return view('auth.adduser');
    }

    public function postAdduser(AddAdminRequest $request)
    {
        $random_password = str_random(8);

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $random_password;
        $user->save();

        $data = array(
            'email' => $user->email,
            'name' => $user->name,
            'password' => $random_password,
        );

        Mail::send('emails.reminder', $data, function ($message) use ($user) {
            $message->from('malisa@whu.edu.cn', 'ED Administrator');

            $message->to($user->email)->subject('You have been appointed as the administrator of ED website!');
        });

        $request->session()->flash('success', 'New Admin Account have been successful added! Just one more step: Please check the email and follow the instructions to complete the sign up process');

        return redirect('auth/adduser');
    }

    public function getChangePassword()
    {
        return view('auth.change-password');
    }

    /*
     * Changing password functionality
     * @return void
     */

    public function postChangePassword(ChangePasswordRequest $request)
    {
        $user = Auth::user();

        if (!Hash::check($request->input('old_password'), $user->password)) {
            return redirect()->back()->withErrors('Old Password is incorrect.');
        } else {
            $user->password = $request->input('password');
            if ($user->first_login == "true") {
                $user->first_login = "false";
            }
            $user->save();
            $request->session()->flash('success', 'Your Password have been changed!');
            return redirect('change-password');
        }

    }
}
