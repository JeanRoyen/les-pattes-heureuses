<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Animal extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'specie', 'race', 'age', 'gender', 'vaccine', 'description', 'status'];
    protected $casts = ['age' => 'date', 'gender' => 'boolean', 'vaccine' => 'boolean'];
}
