<?php

namespace App\Models;

use App\Helpers\MainHelper;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class HomePage extends Model
{
    use HasFactory;
    public $table = 'home_page';
    protected $fillable = [
        'logo_D',
        'bg_1', 'bg_2',
        'text', 'text_ar',
        'industries_icon', 'industries_text', 'industries_text_ar',
        'industries_icon2', 'industries_text2', 'industries_text2_ar',
        'industries_icon3', 'industries_text3', 'industries_text3_ar'
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

    public function img($img_name, $type = "original", $new_extension = "webp")
    {
        if ($this->$img_name == null)
            return env('DEFAULT_IMAGE');
        else
            return env("STORAGE_URL") . '/' . MainHelper::get_conversion($this->$img_name, $type, $new_extension);
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
