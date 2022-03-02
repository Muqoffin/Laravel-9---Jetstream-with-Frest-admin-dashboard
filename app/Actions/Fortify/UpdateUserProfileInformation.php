<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:2048'],
            'phone' => ['regex:/^([0-9\s\-\+\(\)]*)$/','min:10'],
        ],[
            'name.required' => 'Please enter your name',
            'name.string' => 'Name must be a string',
            'name.max' => 'Name must be less than 255 characters',
            'email.required' => 'Please enter your email',
            'email.email' => 'Please enter a valid email',
            'email.max' => 'Email must be less than 255 characters',
            'email.unique' => 'Email has already been taken',
            'photo.mimes' => 'Photo must be a jpg, jpeg or png file',
            'photo.max' => 'Photo must be less than 2MB',
            'phone.regex' => 'Phone number must be a number',
            'phone.min' => 'Phone number must be at least 10 characters',
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'username' => $input['username'],
                'name' => $input['name'],
                'email' => $input['email'],
                'phone' => $input['phone'],
                'country' => $input['country'],
                'language' => $input['language'],
                'timezone' => $input['timezone'],
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
