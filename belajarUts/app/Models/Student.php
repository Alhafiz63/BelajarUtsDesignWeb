<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Tentukan nama tabel
    protected $table = 'students';

    // Tentukan kolom yang bisa diisi
    protected $fillable = [
        'full_name',
        'date_of_birth',
        'gender',
        'address',
        'phone',
        'email',
        'previous_school'
    ];

    /**
     * Relasi dengan model ParentModel
     */
    public function parents()
    {
        return $this->hasMany(ParentModel::class);
    }

    /**
     * Relasi dengan model Registration
     */
    public function registration()
    {
        return $this->hasOne(Registration::class);
    }
}
