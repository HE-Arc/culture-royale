<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'lobby_id'];

    public function lobby()
    {
        return $this->belongsTo(Lobby::class);
    }
}
