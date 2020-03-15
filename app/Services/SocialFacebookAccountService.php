<?php
namespace App\Services;
use App\SocialFacebookAccount;
use App\User;
use Laravel\Socialite\Contracts\User as ProviderUser;
use Illuminate\Http\Request;
class SocialFacebookAccountService
{
    public function createOrGetUser(ProviderUser $providerUser, Request $request)
    {
        $providerUserId = $providerUser->getId();
        $account = SocialFacebookAccount::whereProvider('facebook')
            ->whereProviderUserId($providerUserId)
            ->first();

        $request->session()->put('avatar', $providerUser->avatar);
        $request->session()->put('token', $providerUser->token);
        $request->session()->put('providerUserId', $providerUserId);

        if ($account) {
            return $account->user;
        } else {
            $account = new SocialFacebookAccount([
                'provider_user_id' => $providerUserId,
                'provider' => 'facebook'
            ]);
            $email = $providerUser->getEmail();
            if (empty($email)) {
                // if email is not provided, we generate email based on user id
                $email = "{$providerUserId}@plannthat.com";
            }

            $user = User::whereEmail($email)->first();
            if (!$user) {
                $user = User::create([
                    'email' => $email,
                    'name' => $providerUser->getName(),
                    'password' => md5(rand(1,10000)),
                ]);
            }
            $account->user()->associate($user);
            $account->save();
            return $user;
        }
    }
}
