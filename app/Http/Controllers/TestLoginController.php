<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class TestLoginController extends Controller
{
    public function getSampleUserInfo(Request $request)
    {
        // $actualToken = "ya29.a0AfH6SMDEu6LSTLaoXbn5EiQx4wKUQ2j8wLrTkBCjqXwl6hN6RLLlUzuBVo-3sGw6x7SKbbJJ2bOh1q6rFOJJ_qYzEW30hOp2fnd9NOk2S2J8MeptPDvRH3zX0YeuCww2hpJuVHD6qCu_8uRlmozIwOX7q-2ywbezJR96EePLE-Ww";
        $actualToken = "ya29.a0AfH6SMB29GVwwOnLwULTkEY7MBu0q_n-WGxjq4Ww2CvVuG2NuwokebINNRZl_3_SirR16RaU1ynJA5Zya5u9XuhxwEUEqrLX-8L0Sq7wNNf5Csx0W8tMIxmqsoHdU_OBYnk-dbzdKXAF5o2SZ1b9Ka0Urw8pxVN_zy7_I4IRkuWf";


        $user = Socialite::driver('google')->userFromToken($actualToken);

        return [
            'objs' => [
                'user' => $user,
                'oauthProvidedUserId' => $user->id,
                'expiresIn' => $user->expiresIn
            ]
        ];

    }



    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->user();

        return [
            'user' => $user,
            '$user->token' => $user->token
        ];
    }
}
