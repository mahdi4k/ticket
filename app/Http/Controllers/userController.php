<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class userController extends Controller
{
    public function __construct()
    {
        App::setLocale('fa');
        $this->middleware('auth');
    }

    public function index()
    {

        $user = Auth::user();

        return view('auth.UserProfile.profile', compact('user'));

    }

    public function show()
    {
        $user = Auth::user();
        return view('auth.UserProfile.editUserProfile', compact('user'));

    }

    public function update(Request $request ,$profile )
    {


           $validatedData =  $request->validate( [
                 'name' => 'required',
                 'email' => 'required',
                 'job'=>'string|nullable',
                 'city'=>'string|nullable',
                 'phone_number'=>'digits_between:4,15|nullable',
                 'degreeEducation'=>'string|nullable'
             ]) ;
         $user = User::find($profile);
             if ($user){
                 $user->update($request->all());
             }

             return redirect()->back()->with('success','ویرایش با موفقیت انجام شد');
    }

    public function editPassword()
    {
        return view('auth.UserProfile.editPassword');
    }

    public function editUserPassword(Request $request)
    {
        $request->validate( [
            'current-password' => 'required',
            'password' => 'required|string|min:8',

        ]) ;
        $request_data = $request->All();

        $current_password = Auth::User()->password;
        if (Hash::check($request_data['current-password'], $current_password)) {

            $user_id = Auth::User()->id;
            $obj_user = User::find($user_id);
            $obj_user->password = Hash::make($request_data['password']);;
            $obj_user->save();

            return redirect()->back()->with('success','رمز عبور شما با موفقیت عوض شد');
        }else{
            return redirect()->back()->with('failure','مشکلی در تغییر رمز عبور شما پیش آمده است لطفا دوباره تلاش کنید');
        }

    }

}
