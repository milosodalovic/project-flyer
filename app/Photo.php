<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Photo extends Model
{

    /**
     * The associated table
     * @var string
     */
    protected $table = 'flyer_photos';

    /**
     * Fillable fields for a photo
     * @var array
     */
    protected $fillable = ['name', 'path', 'thumbnail_path'];


    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;

        $this->path = $this->baseDir() . '/'. $name;
        $this->thumbnail_path =  $this->baseDir() . '/tn-'. $name;

    }

    /**
     * Get the base directory for photo uploads
     * @return string
     */
    public function baseDir()
    {
        return 'flyer/photos';
    }

    /**
     * A photo belongs to a flyer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function flyer()
    {
        return $this->belongsTo('App\Flyer');
    }

}
