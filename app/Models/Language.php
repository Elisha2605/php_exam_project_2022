<?php

namespace App\Models;

use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'user_id',
        'lang_id',
    ];

    public function users() {
        return $this->belongsToMany(User::class);
    }
}
