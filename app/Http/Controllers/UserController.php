<?php
/**
 * Created by PhpStorm.
 * User: opower
 * Date: 2016/10/16
 * Time: 9:19
 */

namespace App\Http\Controllers;


use App\TmpDat;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
	function initLogin()
	{
		return view("prelgn.login");
	}

	function initRegister()
	{
		return view("prelgn.register");
	}

	function chkLogin(Request $req)
	{
		$nam = $req->input("name");
		$pwd = $req->input("password");
		$user = User::where("name", $nam)->first();
		if(!isset($user) || $user == null)
		{
			//没有指定的用户记录
			$msgTmp = MsgController::ins()->getErrMsg("ErrNoUser");
			$msgAry = [str_replace("%user", $nam, $msgTmp)];
			return redirect()->back()->withErrors($msgAry);
		}
		if($user->password != $pwd)
		{
			//密码错误
			$msgAry = [MsgController::ins()->getErrMsg("ErrWrongPwd")];
			return redirect()->back()->withErrors($msgAry);
		}
		$user->password = "";
		Session::put("user", $user);
		return redirect("shwmn");
	}

	function chkRegister(Request $req)
	{
		$tmpDat = TmpDat::get()->first();
		$user = new User();
		$user->name = $req->input("name");
		$user->password = $req->input("password");
		$user->is_mgr = ($tmpDat->mgr_code == $req->input("mgrCode"));
		$user->profile = "/img/profile/default.jpg";
		$user->save();
		return view("prelgn.login", ["user" => $user->name]);
	}
}