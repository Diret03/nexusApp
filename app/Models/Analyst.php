<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analyst extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone_number'];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
