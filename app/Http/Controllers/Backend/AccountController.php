<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Timezone;

class AccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function account(Request $request)
    {
        $data = [
            'title'       => 'Account',
            'description' => 'Account',
            'keywords'    => 'account, '. env('APP_NAME'),
            'request'     => $request,
            'user'        => $request->user(),
        ];
        return view('backend._account.account',$data);
    }

    public function security(Request $request){
        $data = [
            'title'         => 'Security',
            'description'   => 'This is the security page.',
            'keywords'      => 'security, '.env('APP_NAME'),
            'request'       => $request,
            'user'          => $request->user(),
        ];
        return view('backend._account.security',$data);
    }
}
