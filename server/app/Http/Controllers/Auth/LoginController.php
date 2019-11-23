<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/books';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/admin/login');
    }

    public function login(Request $request)
    {
        $email = $request->email;

        try{
            if($user = User::whereEmail($email)->exists()){
                $user->api_token = str_random(60);
                $user->save();
            }else{
                $data = $request->only(['email','name']);
                $user = User::create($data);
                $user->api_token = str_random(60);
                $user->save();
            }
            $message = 'Successfully logged in';

        }catch (\Exception $e){
            $user = [];
            $message = $e->getMessage();
        }


        return response([
            'status'=>1,
            'data'=>$user,
            'message4'=>$message
        ]);
    }
}
