<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    protected $fillable = ["code", "description", "weight", "openable", "user_id"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
