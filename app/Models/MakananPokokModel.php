<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MakananPokokModel extends Model
{
    use HasFactory;
    protected $table = 'makanan_pokok';
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'harga'];
}
