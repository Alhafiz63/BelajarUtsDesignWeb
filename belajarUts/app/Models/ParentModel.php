<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentModel extends Model
{
    use HasFactory;

    // Tentukan nama tabel
    protected $table = 'parents';

    // Tentukan kolom yang bisa diisi
    protected $fillable = [
        'student_id',
        'full_name',
        'phone',
        'job',
        'address',
        'relationship'
    ];

    /**
     * Relasi dengan model Student
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
