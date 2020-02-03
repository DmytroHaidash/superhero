<?php

namespace App\Models;

use App\Http\Resources\ImageResource;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Superhero extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = [
        'nickname​',
        'real_name',
        'origin_description​',
        'superpowers',
        'catch_phrase'
    ];

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getImagesListAttribute()
    {
        return ImageResource::collection($this->getMedia('uploads'));
    }
}
