<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Image\Manipulations;

class Subsidaries extends Model
{
    use HasFactory;
    public $table = 'subsidaries';
    protected $fillable = [
        'bg_image_home', 'bg_image_subsidaries',
        'subsidaries_title', 'subsidaries_title_ar',
        'subsidaries_description', 'subsidaries_description_ar',
        'click_here_to_visit', 'click_here_to_visit_ar', 'link'
    ];

    public function getUrlAttribute()
    {
        return route('page.show', $this);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function img($img_name, $type = "original")
    {
        if ($this->$img_name == null)
            return env('DEFAULT_IMAGE');
        else
            return env("STORAGE_URL") . '/' . \MainHelper::get_conversion($this->$img_name, $type);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('tiny')
            ->fit(Manipulations::FIT_MAX, 120, 120)
            ->width(120)
            ->format(Manipulations::FORMAT_WEBP)
            ->nonQueued();

        $this
            ->addMediaConversion('thumb')
            ->fit(Manipulations::FIT_MAX, 350, 1000)
            ->width(350)
            ->format(Manipulations::FORMAT_WEBP)
            ->nonQueued();

        $this
            ->addMediaConversion('original')
            ->fit(Manipulations::FIT_MAX, 1200, 10000)
            ->width(1200)
            ->format(Manipulations::FORMAT_WEBP)
            ->nonQueued();
    }
}
