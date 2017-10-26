<?php
namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
class User extends BaseModel implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Notifiable, Authenticatable, Authorizable, CanResetPassword;
    public static $check_attemp = false;
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'address', 'phone_number','status','password'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];
    public $timestamps = true;
    protected $searchAble = [
        'id' => [
            'label' => 'ID',
            'default' => true,
            'sort' => 'numeric',
            'search' => [
                'type' => ''
            ]
        ],
        'name' => [
            'label' => 'Name',
            'default' => true,
            'sort' => 'alpha',
            'search' => [
                'type' => 'text',
            ]
        ],
        'address' => [
            'label' => 'Adress',
            'default' => false,
            'sort' => 'alpha',
            'search' => [
                'type' => 'text',
                'placeholder' => ''
            ]
        ],
        'phone_number' => [
            'label' => 'Phone',
            'default' => true,
            'sort' => 'alpha',
            'search' => [
                'type' => 'text',
                'placeholder' => ''
            ]
        ],
        'email' => [
            'label' => 'Email',
            'default' => true,
            'sort' => 'alpha',
            'search' => [
                'type' => 'text',
                'placeholder' => ''
            ]
        ],
        'status' => [
            'label' => 'Status',
            'default' => true,
            'search' => [
                'type' => 'selectbox',
                'placeholder' => '---',
                'data' => \App\AppConst\Constants::STATUS
            ]
        ]
    ];
    /**
     * Get all children department of current user
     */

}