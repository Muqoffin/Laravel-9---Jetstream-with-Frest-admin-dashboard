<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Hash;
use App\Actions\Fortify\CreateNewUser;
use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use Illuminate\Support\Facades\RateLimiter;
use App\Actions\Fortify\UpdateUserProfileInformation;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;

            return Limit::perMinute(5)->by($email.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        Fortify::loginView(function () {
            $data = [
                'title' => 'Login',
                'description' => 'Login to your account',
                'keywords' => 'login, account, '. env('APP_NAME'),
            ];
            return view('auth.login')->with($data);;
        });

        Fortify::registerView(function(){
            $data = [
                'title' => 'Register',
                'description' => 'Register for an account',
                'keywords' => 'register, account, '. env('APP_NAME'),
            ];
            return view('auth.register')->with($data);
        });

        Fortify::requestPasswordResetLinkView(function(){
            $data = [
                'title' => 'Request Password Reset',
                'description' => 'Request a password reset',
                'keywords' => 'request, password, reset, '. env('APP_NAME'),
            ];
            return view('auth.forgot-password')->with($data);
        });

        Fortify::twoFactorChallengeView(function(){
            $data = [
                'title' => 'Two Factor Authentication',
                'description' => 'Two Factor Authentication',
                'keywords' => 'two, factor, authentication, '. env('APP_NAME'),
            ];
            return view('auth.two-factor-challenge')->with($data);
        });

        Fortify::resetPasswordView(function(){
            $data = [
                'title' => 'Reset Password',
                'description' => 'Reset your password',
                'keywords' => 'reset, password, '. env('APP_NAME'),
                'token' => request()->token,
                'email' => request()->email,
            ];
            return view('auth.reset-password')->with($data);
        });

        Fortify::verifyEmailView(function(){
            $data = [
                'title' => 'Verify Email',
                'description' => 'Verify your email address',
                'keywords' => 'verify, email, '. env('APP_NAME')
            ];
            return view('auth.verify-email')->with($data);
        });

        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('email', $request->email)
                            ->orWhere('username', $request->email)
                            ->first();

            if ($user &&
                Hash::check($request->password, $user->password)) {
                return $user;
            }
        });
    }
}
