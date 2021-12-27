<?php

namespace App\Http\Controllers;

use App\Mail\VerifyMail;
use App\Mail\VerifyPassword;
use App\Models\Admin;
use App\Models\User;
use App\Traits\GeneralTrait;
use Carbon\Carbon;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password as RulesPassword;

class VerificationController extends Controller
{
   use GeneralTrait ;


    // send email to user for verification
    public function verifyuser(Request $request)
    {
        $user= Auth('api')->user();
        if($user && $user->email_verified_at == null){
            Mail::to($user->email)->send(new VerifyMail());
            return $this->returnSuccessMessage('Email sent successfully','201') ;
        }
        else
        {
            return $this->returnError('404','invalid user or verified before');
        }
    }


    // get code from user to verify his email
    public function getcodeemail(Request $request)
    {

        $user= Auth('api')->user();
        if($user && $user->code == $request->code)
        {
            $user->email_verified_at = Carbon::now();
            $user->code = null ;
            $user->save() ;
            return $this->returnSuccessMessage('Verification Done','201') ;
        }
        else
        {
            return $this->returnError('404','Incorrect Code, Try Again') ;
        }
    }


    // send email for user when forget password
    public function forgotPassword(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        if($user){
            Mail::to($user->email)->send(new VerifyPassword());
            return $this->returnData('email',$user->email,'Email sent successfully','201') ;
        }
        else
        {
            return $this->returnError('404','failed to find email');
        }

    }


    // reset new password
    public function reset(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:6',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::where('code',$request->code)->first();
        if ($user) {
            if ($request->password == $request->password_confirmation) {
                $user->password = Hash::make($request->password);
                $user->code = null;
                $user->save();
                return $this->returnSuccessMessage('password reset successfully', '201');
            } else {
                return $this->returnError('404', "password don't match");
            }
        }else{
            return $this->returnError('404', 'the code incorrect');

        }
    }













    public function hi($id){
        $user=User::where('code',$id)->first();
        if ($user){

            $user->email_verified_at = Carbon::now();
            $user->code =null;
            $user->save();
            return '<h2 style="text-align: center;color: darkred">your account verivied successfully</h2>';

        }else{
            return  '<h2 style="text-align: center;color: darkred">Error 404 not found ...  </h2>';
        }
    }




    //    public function sendVerificationEmail(Request $request)
//    {
//        if ($request->user()->hasVerifiedEmail()) {
//            return [
//                'message' => 'Already Verified'
//            ];
//        }
//
//        $request->user()->sendEmailVerificationNotification();
//
//        return ['status' => 'verification-link-sent'];
//    }
//
//
//
//    public function verify(EmailVerificationRequest $request)
//    {
//        if ($request->user()->hasVerifiedEmail()) {
//            return [
//                'message' => 'Email already verified'
//            ];
//        }
//
//        if ($request->user()->markEmailAsVerified()) {
//            event(new Verified($request->user()));
//        }
//
//        return [
//            'message'=>'Email has been verified'
//        ];
//    }











}
