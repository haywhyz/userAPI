<?php

namespace App;

use Illuminate\Auth\Authenticatable;

use Illuminate\Database\Eloquent\Model;


class User extends Model
{
 
    protected $table = 'users';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *	id	name	username	email
     * @var array
     */
    protected $fillable = [
        'name','username', 'email',
    ];

    // /**
    //  * The attributes excluded from the model's JSON form.
    //  *
    //  * @var array
    //  */
    // protected $hidden = [
    //     'password',
    // ];
}
