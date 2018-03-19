<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('cms.auth.reset_password');
    }

    public function reset(Request $request)
    {

        $this->validate($request, $this->rules(), $this->validationErrorMessages());

        $user = Auth::user();
        $username = $user->username;
        $password = $request->current_password;
        if(Auth::attempt(compact('username', 'password'))) {
          $this->resetPassword($user, $request->password);
        }
        else {
          return $this->sendResetFailedResponse($request);
        }

        return $this->sendResetResponse($request);
    }

    protected function rules() {

      return [
            'current_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ];
    }

    protected function validationErrorMessages()
    {
        return [
          'password.required' => 'The new password field is required',
        ];
    }

    protected function resetPassword($user, $password)
    {
        $user->password = Hash::make($password);
        $user->save();
    }

    protected function sendResetResponse($response)
    {
        flash('Password reset successfully')->success();
        return redirect($this->redirectPath());
    }

    protected function sendResetFailedResponse(Request $request)
    {
        return redirect()->back()
                         ->withErrors([
                           'errors' => 'Incorrect current password',
                         ]);
    }
}
