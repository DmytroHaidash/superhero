<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Upload extends Model implements HasMedia
{
    use HasMediaTrait;

    public function registerMediaCollections()
{
    $this->addMediaCollection('uploads')
        ->registerMediaConversions(function (Media $media = null) {
            $this
                ->addMediaConversion('thumb')
                ->keepOriginalImageFormat()
                ->crop(Manipulations::CROP_CENTER, 100, 100)
                ->width(100)
                ->height(100);

            $this
                ->addMediaConversion('preview')
                ->keepOriginalImageFormat()
                ->width(480)
                ->height(480);
        });
}
}

