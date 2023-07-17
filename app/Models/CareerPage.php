<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerPage extends Model
{
    use HasFactory;
    public $table = 'career_page';
    protected $fillable = [
        'intro', 'intro_ar'
    ];
}
