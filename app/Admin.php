<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = "dev_admin";
    protected $fillable = ['username' , 'password'];
}
