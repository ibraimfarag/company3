<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Image\Manipulations;

class CareerForm extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    public $table = 'career_form';
    public $guarded = ['id', 'created_at', 'updated_at'];


    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
