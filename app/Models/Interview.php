<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'date',
        'description',
        'status',
        'client_id',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function getStatusAttribute($value)
    {
        return $value ? 'Aceptada' : 'Archivada';
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
