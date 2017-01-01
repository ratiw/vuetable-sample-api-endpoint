<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = [
        'birthdate'
    ];

    protected $appends = [
        'age'
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function getAgeAttribute($value)
    {
        return Carbon::parse($this->attributes['birthdate'])->diffInYears(Carbon::now());
    }
}
