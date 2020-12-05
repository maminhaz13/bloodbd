<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bloodgroup extends Model
{
    protected $fillable = ['bd', 'bd_title', 'added_by', ];
    //protected $guarded = [''];
    use SoftDeletes;
}
