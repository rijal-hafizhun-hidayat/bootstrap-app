<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfaqModel extends Model
{
    use HasFactory;
    
    protected $table = 'infaq';
    protected $primaryKey = 'id';
    //protected $dateFormat = 'U';
    protected $guarded = [];
}
