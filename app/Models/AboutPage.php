<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutPage extends Model
{
    use HasFactory;
    public $table = 'about_page';
    protected $fillable = [
        'intro', 'intro_ar',
        'description', 'description_ar'
    ];
}
