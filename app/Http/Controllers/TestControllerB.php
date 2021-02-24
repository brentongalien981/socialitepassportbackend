<?php

namespace App\Http\Controllers;

use App\Models\MyAuthUser;
use Illuminate\Http\Request;

class TestControllerB extends Controller
{
    
    public function getSampleMyAuthUser(Request $request) {
        $user = MyAuthUser::where('token', $request->input('token'))->get();

        return [
            'user' => $user,
            'msg' => 'CLASS: TestControllerB, METHOD: getSampleMyAuthUser()!',
        ];
    }



    public function testWithToken() {
        return [
            'msg' => 'CLASS: TestControllerB, METHOD: testWithToken()!'
        ];
    }



    public function sayHello() {
        return [
            'msg' => 'hello!'
        ];
    }
}
