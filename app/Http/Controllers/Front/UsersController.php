<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class UsersController extends Controller
{
    public function login()
    {
        return view('frontend.users.login');
    }

    public function Register()
    {
        return view('frontend.users.register');
    }

    public function registerUser(Request $request)
    {
        if ($request->isMethod('post')) {
            Session::forget('error_message');
            Session::forget('success_message');
            $data = $request->all();
            //echo "<pre>" ; print_r($data); die;

            //check if the user is already exist or not
            $userCount = User::where('email', $data['email'])->count();
            if ($userCount > 0) {
                // user already exists
                $message = "Email already exists";
                session::flash('error_message', $message);
                return redirect()->back();
            } else {
                //register the user
                $user = new User();
                $user->name = $data['name'];
                $user->mobile = $data['mobile'];
                $user->email = $data['email'];
                $user->password = bcrypt($data['password']);
                $user->status = 1;
                $user->save();

                //send confirmation email
                // $email = $data['email'];
                // $messageData = [
                //     'email' => $data['email'],
                //     'name' => $data['name'],
                //     'code' => base64_encode($data['email'])
                // ];
                // Mail::send('frontend.email.confirmation', $messageData, function($message) use($email) {
                //     $message->to($email)->subject("Confirm Your Account");
                // });
                // //Redirect with sucess message
                // $message = "Please confirm your email to activate your account";
                // Session::put('success_message', $message);
                // return redirect()->back();


                if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']])){

                    // echo "<pre>" ; print_r(Auth::user()); die;

                        //update user cart with userID
                    if (!empty(Session::get('session_id'))) {
                        $user_id = Auth::user()->id;
                        $session_id = Session::get('session_id');
                        Cart::where('session_id' , $session_id)->update(['user_id' => $user_id]);
                    }
                    //send register email
                    $email = $data['email'];
                    $messageData = ['name' => $data['name'] , 'mobile' => $data['mobile'] , 'email' => $data['email']];
                    Mail::send('frontend.email.register' , $messageData , function($message) use($email){
                        $message->to($email)->subject("Welcome to V-shop website");
                    });

                    return redirect("login");
                }
            }
        }
    }
    //confirm account
    // public function confirmAccount($email)
    // {

    //     Session::forget('error_message');
    //     Session::forget('success_message');

    //     //decode user email
    //       $email = base64_decode($email);

    //       //check user email exists
    //       $userCount = User::where('email' , $email)->count();
    //       if ($userCount >0) {
    //         //user email is already activated or not
    //         $userDetails = User::where('email' , $email)->first();

    //         if ($userDetails->status == 1) {
    //             $message = "Your account is already activated . ";
    //             Session::put('error_message' , $message);
    //             return redirect('Register');
    //         }
    //         else{
    //             //update status to  1 to activate user account
    //             User::where('email' , $email)->update(['status' => 1]);


    //                 //send register email

    //                 $messageData = ['name' => $userDetails['name'] , 'mobile' => $userDetails['mobile'] , 'email' => $userDetails['email']];
    //                 Mail::send('frontend.email.register' , $messageData , function($message) use($email){
    //                     $message->to($email)->subject("Welcome to V-shop website");
    //                 });

    //                 //redirect to register page with sucess message
    //                 $message = "Your email account is activated . You can login now ";
    //                 Session::put('sucess_message' , $message);
    //                 return redirect('login');
    //          }
    //       }else{
    //         abort(404);
    //       }


    // }

    //check if email already exists or not
    public function checkEmail(Request $request)
    {
        //check email already exists
        $data = $request->all();
        $emailCount = User::where('email', $data['email'])->count();
        if ($emailCount > 0) {
            return "false";
        } else {
            return "true";
        }
    }

    public function loginUser(Request $request)
    {
        if ($request->isMethod('post')) {
            Session::forget('error_message');
            Session::forget('success_message');
            $data =  $request->all();
            // echo "<pre>" ; print_r($data); die;
            if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {

                return redirect('/');
            } else {
                $message = "Invalid Username or Password !";
                Session::flash('error_message', $message);
                return redirect()->back();
            }
        }
    }


    public function forgotPassword(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>" ; print_r($data); die;
            $emailCount = User::where('email' , $data['email'])->count();
            if ($emailCount == 0 ) {
                $message = "Email does not exists ";
                Session::flash('error_message' , $message);
                Session::forget('success_message');
                return redirect()->back();
            }
           //Generate random password
           $random_password = str_random(8);

           //Encode / Secure password
           $new_password = bcrypt($random_password);

           //update password
           User::where('email' , $data['email'])->update(['password' => $new_password]);

           //Get User name
           $user_name = User::select('name')->where('email' , $data['email'])->first();

           ///send forgot password email
           $email = $data['email'];
           $name = $user_name->name;
           $messageData = [
            'email' => $email,
            'name'  => $name,
            'password' => $random_password

           ];
           Mail::send('frontend.email.forgot_password', $messageData ,  function($message) use($email){
            $message->to($email)->subject('New Password - V-shop Website');
           });

           //redirect to login page
           $message = "Please check your email for new password";
           Session::flash('success_message' , $message);
           Session::forget('error_message');
           return redirect('login');
        }
        return view('frontend.users.forgot_password');
    }

    //user account details
     public function userAccount()
     {
        return view('frontend.users.user_account');
     }
    //logout user
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
