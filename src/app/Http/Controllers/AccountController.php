<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AccountRequest;

class AccountController extends Controller
{
    public function index() {

    }

    public function registerView() {
        $is_Image = false;

        // image folder作成
        if(!Storage::exists('public/account_images/test')) {
            $result = Storage::makeDirectory('public/account_images/test/' . Auth::id(), 0775, true);
        }

        // image check
        if(Storage::disk('local')->exists('public/account_images/test/' . Auth::id() . '.jpg')) {
            $is_Image = true;
        }

        return view('account/accountregister', ['is_Image'=>$is_Image]);
    }

    public function register(AccountRequest $request) {
        // var_dump($request);exit;
        if ($request->photo) {
            $request->photo->storeAs('public/account_images/test/', Auth::id() . '.jpg');
        }

        return redirect('accountregister')->with('success', '新しいプロフィールを登録しました');
    }
}
