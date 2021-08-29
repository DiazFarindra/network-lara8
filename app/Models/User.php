<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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


    public function status()
    {
        return $this->hasMany(Status::class);
    }

    public function timeline()
    {
        $following = $this->followed->pluck('id');
        return Status::whereIn('user_id', $following)
                            ->orWhere('user_id', $this->id)
                            ->latest()->get();
    }

    public function followed()
    {
        return $this->belongsToMany(
            User::class,
            'follows',
            'user_id',
            'following_user_id'
        )->withTimestamps();
    }

    public function follow(User $user)
    {
        return $this->followed()->save($user);
    }

    public function makeStatus($string)
    {
        $this->status()->create([
            'body' => $string,
            'identifier' => \Str::slug($this->id . \Str::random(31)),
        ]);
    }
}
