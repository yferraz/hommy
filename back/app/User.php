<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use App\Republic;
use App\Http\Requests\UserRequest;


class User extends Authenticatable
{
    use Notifiable;

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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function createUser(UserRequest $request)
    {
        $this->name = $request->name;
        $this->email = $request->email;
        $this->password = $request->password;
        $this->cpf = $request->cpf;
        $this->dateOfBirth = $request->dateOfBirth;
        $this->phoneNumber = $request->phoneNumber;
        $this->save();
    }

    public function updateUser(Request $request)
    {
        if ($request->name) {
            $this->name = $request->name;
        }
        if ($request->email) {
            $this->email = $request->email;
        }
        if ($request->password) {
            $this->password = $request->password;
        }
        if ($request->cpf) {
            $this->cpf = $request->cpf;
        }
        if ($request->dateOfBirth) {
            $this->dateOfBirth = $request->dateOfBirth;
        }
        if ($request->phoneNumber) {
            $this->phoneNumber = $request->phoneNumber;
        }
        $this->save();
    }

    public function republics()
    {
        return $this->hasMany('App\Republic');
    }
}
