<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreateCase extends Model
{
    //
    protected $table = 'cases';
    protected $fillable = [
        'email', 'first_name', 'last_name', 'birthday', 'gender', 'webpage', 'ssn', 'ilp', 'ethnicity', 'program', 'status',
    ];
}
