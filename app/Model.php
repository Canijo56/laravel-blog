<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
	//specify which values CANT be mass asigned
    protected $guarded = [];
}
