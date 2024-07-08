<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInput extends Model
{
    use HasFactory;

    // Menentukan tabel yang digunakan oleh model ini
    protected $table = 'user_inputs';

    // Menentukan kolom-kolom yang boleh diisi secara massal
    protected $fillable = ['created_at'];

    // Menonaktifkan timestamps default karena kita hanya menggunakan kolom created_at
    public $timestamps = false;
}
