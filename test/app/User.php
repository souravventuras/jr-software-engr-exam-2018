<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{

    protected $table = 'users';

    // use SearchableTrait;

    protected $searchable = [

        'columns' => [

            'users.customer_name' => 3,

            'users.customer_mobile' => 5,

            'users.reference' => 3,

        ]

    ];

    protected $fillable = [
    'name', 'email', 'password',
	];


	protected $hidden = [
	    'password', 'remember_token',
	];

    public function customer_voucher()
    {

    	$this->HasMany('\App\CustomerVoucher');
    }
}
