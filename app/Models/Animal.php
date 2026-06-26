<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;


class Animal extends Model
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = ['avatar', 'name', 'age', 'gender', 'specie_id', 'breed_id', 'vaccine', 'description', 'status',
        'path'
    ];
    protected $casts = ['age' => 'date', 'gender' => 'boolean', 'vaccine' => 'boolean', 'avatar' => "array"];

    public function avatars():HasMany
    {
        return $this->hasMany(Avatar::class);
    }

    public function breed(): BelongsTo
    {
        return $this->belongsTo(Breed::class);
    }

    public function specie(): BelongsTo
    {
        return $this->belongsTo(Specie::class);
    }
}
