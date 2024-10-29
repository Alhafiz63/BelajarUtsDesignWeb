<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    // Tentukan nama tabel
    protected $table = 'registrations';

    // Tentukan kolom yang bisa diisi
    protected $fillable = [
        'student_id',
        'registration_date',
        'registration_status'
    ];

    /**
     * Relasi dengan model Student
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
