<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;


class Animal extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['avatar', 'name', 'specie', 'race', 'age', 'gender', 'vaccine', 'description', 'status',
        'path'
    ];
    protected $casts = ['age' => 'date', 'gender' => 'boolean', 'vaccine' => 'boolean', 'avatar' => "array"];

    public function avatars():HasMany
    {
        return $this->hasMany(Avatar::class);
    }
}
