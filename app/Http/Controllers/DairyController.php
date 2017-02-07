<?php
/**
 * Created by PhpStorm.
 * User: opower
 * Date: 2016/10/20
 * Time: 18:26
 */

namespace App\Http\Controllers;

use App\Dairy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DairyController extends Controller
{
	function showMain()
	{
		if(!Session::has("user"))
		{
			return redirect("login")->withErrors(
				[
					MsgController::ins()->getErrMsg("ErrOutOfTime")
				]);
		}
		return view("aftlgn.main",
			[
				"user" => Session::get("user"),
				"navTyp" => 1,
				"dairys" => Dairy::orderBy("updated_at", "DESC")->get(),
				"remarks" => []
			]);
	}

	function showDairyList()
	{
		if(!Session::has("user"))
		{
			return redirect("login")->withErrors(
				[
					MsgController::ins()->getErrMsg("ErrOutOfTime")
				]);
		}
		$user = Session::get("user");

		return view("aftlgn.drylist",
			[
				"user" => $user,
				"navTyp" => 2,
				"dairys" => Dairy::where("usr_idx", $user->id)
					->orderBy("updated_at", "DESC")->get(),
				"remarks" => []
			]);
	}

	function newDairy(Request $req)
	{
		if(!Session::has("user"))
		{
			return redirect("login")->withErrors(
				[
					MsgController::ins()->getErrMsg("ErrOutOfTime")
				]);
		}
		$user = Session::get("user");

		$newDry = new Dairy();
		$newDry->title = $req->title;
		$newDry->content = $req->contents;
		$newDry->user = $user->name;
		$newDry->usr_idx = $user->id;
		$newDry->md5 = md5(
			$newDry->title.
			$newDry->content.
			$newDry->user.
			$newDry->usr_idx.
			time());
		$newDry->save();

		echo "<script>location.href='".$_SERVER["HTTP_REFERER"]."'</script>";
	}

	function delDairy(Request $req)
	{
		if(!Session::has("user"))
		{
			return redirect("login")->withErrors(
				[
					MsgController::ins()->getErrMsg("ErrOutOfTime")
				]);
		}

		Dairy::where("md5", $req->md5)->delete();

		echo "<script>location.href='".$_SERVER["HTTP_REFERER"]."'</script>";
	}
}