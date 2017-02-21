<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent {

	protected $fillable = ["name", "age", "email"];

	public $timestamps = false;
}
