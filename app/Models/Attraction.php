<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attraction extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        'destination_id'
    ];
    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
