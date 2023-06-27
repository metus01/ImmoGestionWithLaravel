<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Property extends Model
{
    use HasFactory;
   protected $fillable = 
    [
        'title',
        'description',
        'surface',
        'rooms',
        'bedrooms',
        'price',
        'sold',
        'floor',
        'city',
        'postal_code',
        'address'

    ];
    public function options() : BelongsToMany
    {
        return $this->belongsToMany(Option::class);
    }
    public function getSlug() : string
    {
        return Str::slug($this->title);
    }
}
