<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leads extends Model {

    public $fillable = [
        'first_name',
        'last_name',
        'email',
        'opt'
    ];
}
