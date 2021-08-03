<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patient';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ktpno',
        'fullname',
        'bornplace',
        'birthdate',
        'gender',
        'phoneno',
        'email',
        'kkno',
        'religion',
        'education',
        'jobdesc',
        'partnername',
        'partnerphone',
        'address',
        'city',
        'maritalstatus',
        'password',
        'regrole',
    ];

}
