<?php

namespace App\Models;

use App\Traits\FollowsTraits;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, FollowsTraits;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
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


    public function getRouteKeyName()
    {
        return 'username';
    }

    public function gravatar($size = 100)
    {
        // gravatar
        $default = "mm";
        return "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $this->email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
    }

    public function status()
    {
        return $this->hasMany(Status::class);
    }

    public function makeStatus($string)
    {
        $this->status()->create([
            'body' => $string,
            'identifier' => \Str::slug($this->id . \Str::random(31)),
        ]);
    }

    public function timeline()
    {
        $following = $this->followed->pluck('id');
        return Status::with('author')->whereIn('user_id', $following)
                            ->orWhere('user_id', $this->id)
                            ->latest()->get();
    }
}
