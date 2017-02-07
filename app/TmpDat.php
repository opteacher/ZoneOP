<?php
/**
 * Created by PhpStorm.
 * User: opower
 * Date: 2016/10/20
 * Time: 14:01
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class TmpDat extends Model
{
	protected $table = "tmp_data";

	protected $primaryKey = "id";

	public $timestamps = false;
}