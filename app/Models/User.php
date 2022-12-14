<?php

namespace App\Models;



// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Language;
use App\Models\Country;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = "users"; 

    protected $fillable = [
        'name',
        'lastname',
        'email',
        'password',
        'date_of_birth',
        'avatar',
        'bio',
        'created_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public $timestamps = true;

    // relations
    public function languages() {
        return $this->belongsToMany(Language::class, 'user_languages', 'user_id', 'lang_id');
    }
    public function country() {
        return $this->belongsToMany(Country::class, 'user_country', 'user_id', 'country_id');
    }
    public function connection_received() {
        return $this->belongsToMany(User::class, 'user_connections', 'user_to', 'user_from');
    }
    public function connection_request() {
        return $this->belongsToMany(User::class, 'user_connections', 'user_from', 'user_to');
    }
    
    // helper functions
    public function hasAcceptedOrSentRequest(User $user)  
    {
        return $this->connection_received->contains($user->id);
    }
    public function hasRequestFrom(User $user) 
    {
        return $this->connection_request->contains($user->id);
    }

    public function connectionStatus(User $user) {
        if ($this->hasRequestFrom($user) && !$this->hasAcceptedOrSentRequest($user)) {
            return 'Approve';
        } elseif (!$this->hasRequestFrom($user) && $this->hasAcceptedOrSentRequest($user)) {
            return 'Pending';
        } elseif ($this->hasRequestFrom($user) && $this->hasAcceptedOrSentRequest($user)) {
            return 'Connected';
        } else {
            return 'Connect';
        }
    }

}
