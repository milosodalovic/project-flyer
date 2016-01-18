<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Photo extends Model
{
    protected $table = 'flyer_photos';

    protected $fillable = ['name', 'path', 'thumbnail_path'];

    protected $baseDir='flyer/photos';
//    kad se makne komentar, ne vuku se fino slike
//    public $name;
//    public $path;
//    public $thumbnail_path;


    /**
     * Build a photo instance from a file upload
     * @param string $name
     * @return mixed
     */
    public static function named($name)
    {
        return (new Photo())->saveAs($name);
    }

    public function saveAs($name)
    {
        $this->name = sprintf('%s-%s',time(),$name);
        $this->path = sprintf('%s/%s', $this->baseDir,$this->name);
        $this->thumbnail_path = sprintf('%s/tn-%s', $this->baseDir, $this->name);

        return $this;
    }

    public function move(UploadedFile $file)
    {
        $file->move($this->baseDir, $this->name);

        $this->makeThumbnail();

        return $this;
    }

    /**
     * @return $this
     */
    public function makeThumbnail()
    {
        Image::make($this->path)
            ->fit(200)
            ->save($this->thumbnail_path);
    }

    public function flyer()
    {
        return $this->belongsTo('App\Flyer');
    }

}
