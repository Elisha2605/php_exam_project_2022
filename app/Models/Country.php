<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Laravel\Scout\Searchable;

class Country extends Model
{
    use HasFactory;
    
    protected $table = 'countries';

    protected $fillable = [
        'name',
        'code',
    ];

    public function users() {
        return $this->belongsTo(User::class);
    }
}
