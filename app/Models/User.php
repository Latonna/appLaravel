<?php

namespace App\Models;

use App\Http\Requests\UserRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'is_banned',
        'image',
        'tel',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        return $this->is_admin === 1;
    }

    public function isBanned()
    {
        return $this->is_banned === 1;
    }

    public function updateUser(UserRequest $request)
    {
        $params = $request->all();
        unset($params['image']);
        if ($request->has('image')) {
            Storage::delete($this->image);
            $path = $request->file('image')->store('avatars');
            $params['image'] = $path;
        }
        $this->update($params);
    }

    public function ban()
    {
        if (!$this->is_admin && !$this->is_banned) {
            $this->update(['is_banned' => 1]);
            return true;
        }
        return false;
    }


    public function unban()
    {
        if ($this->is_banned) {
            $this->update(['is_banned' => 0]);
            return true;
        }
        return false;
    }

    public function makeAdmin()
    {
        if (!$this->is_admin) {
            $this->update(['is_admin' => 1]);
            return true;
        }
        return false;
    }
}
