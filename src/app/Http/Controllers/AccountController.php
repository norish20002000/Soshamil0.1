<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AccountRequest;
use Illuminate\Support\Facades\DB;
use App\Models\SnsAccount;
use App\Models\Sns;

class AccountController extends Controller
{
    public function index() {

    }

    // public function registerInitView(Request $reauest) {
    //     $data['is_Image'] = false;

    //     return view('account/accountregister', $data);
    // }

    /**
     * sns account登録画面表示
     */
    public function registerView(Request $request, $id=0) {
        $data["snsAccountInfo"] = new SnsAccount;

        // sns account取得
        if ($id != 0) {
            $data["snsAccountInfo"] = SnsAccount::find($id);
        } else {
            $data["snsAccountInfo"]->sns_id = 0;
            $data["snsAccountInfo"]->sns_etc_name = "";
            $data["snsAccountInfo"]->account_name = "";
            $data["snsAccountInfo"]->sns_url = "";
            $data["snsAccountInfo"]->sns_comment = "";
       }

        // sns取得
        $data["sns_data"] = Sns::all();

        // image check
        $data['is_Image'] = $this->checkImage($id);

        return view('account/accountregister', $data);
    }

    /**
     * sns account登録
     */
    public function register(AccountRequest $request, $id=0) {
        $data["id"] = $id;
        $photoFlag = $request->photo ? true : false;

        $imagePrePath = "public/account_images/";

        // validate
        $this->accountRegisterValidate($request);

        // sns account情報保存
        if ($id == 0) {
            $id = SnsAccount::create([
                "sns_id" => $request->sns_key,
                "sns_etc_name" =>$request->sns_etc_name,
                "account_name" => $request->account_name,
                "url" => $request->sns_url,
                "comment" => $request->sns_comment,
                "user_id" => Auth::id()
            ])->id;

            // image
            if ($photoFlag) {
                $row = SnsAccount::find($id);
                $row->image_path = $imagePrePath . $id . "/" . $id . ".jpg";
                $row->save();
            }

            $data["id"] = $id;
        } else {
            $sns_account = SnsAccount::find($id);
            $sns_account->sns_id = $request->sns_key;
            $sns_account->sns_etc_name = $request->sns_etc_name;
            $sns_account->account_name = $request->account_name;
            $sns_account->url = $request->sns_url;
            $sns_account->comment = $request->sns_comment;
            if ($photoFlag) {
                $sns_account->image_path = $imagePrePath . $id . "/" . $id . ".jpg";
            }
            $sns_account->save();
        }

        // sns account画像保存
        if ($photoFlag) {
            // image folder作成
            if(!Storage::exists("public/account_images/$id")) {
                $result = Storage::makeDirectory("public/account_images/$id", 0775, true);
            }

            $request->photo->storeAs("public/account_images/$id", $id . '.jpg');
        } else {

        }

        return redirect()->route("accountregister", $data)->with("success", "新しいSNSアカウントを登録しました");
    }

    /**
     * アカウントリスト
     */
    public function getSnsAccount(Request $request) {
        // sns_accounts with sns_name取得
        $accountList = response()->json(SnsAccount::where("status", 0)->with("sns:sns_id,sns_name")->get());

        return $accountList;
    }

    /**
     * post list 画面
     * @param Request
     * @param account_id
     */
    public function accountPreview(Request $request, $id) {
        $data["is_Image"] = $this->checkImage($id);

        $data["snsAccountInfo"] = SnsAccount::with("sns:sns_id,sns_name")->find($id);
        $data["userId"] = Auth::id() ? Auth::id() : 0;
        // $data["sns_id"] = $snsAccountInfo->sns_id;
        // $data["sns_etc_name"] = $id != 0 ? $snsAccountInfo->sns_etc_name : "";
        // $data["account_name"] = $id != 0 ? $snsAccountInfo->account_name : "";
        // $data["sns_url"] = $id != 0 ? $snsAccountInfo->url : "";
        // $data["sns_comment"] = $id != 0 ? $snsAccountInfo->comment : "";
// var_dump($snsAccountInfo->sns->sns_name);exit;

        return view("account/accountpostlist", $data);
    }

    private function accountRegisterValidate($request) {
        $validationData = $request->validate([
            "account_name" => "required",
        ]);
    }

    /**
     * image check
     */
    private function checkImage($id) {
        if(Storage::disk('local')->exists("public/account_images/$id/" . $id . '.jpg')) {
            return true;
        } else {
            return false;
        }
    }

    private function getSnsAccountInfo() {

    }

    private function registeSnsAccount() {

    }
}
