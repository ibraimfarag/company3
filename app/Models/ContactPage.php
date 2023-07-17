<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactPage extends Model
{
    use HasFactory;
    public $table = 'contact_page';
    protected $fillable = [
        'phone', 'address',
        'address_ar', 'map_location'
    ];
}
