<?php


namespace app;

use Image;
use App\Photo;
use App\Flyer;
use App\Thumbnail;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class AddPhotoToFlyer {

    protected $flyer;

    protected $file;

    /**
     * AddPhotoToFlyer constructor. Create a new AddPhotoToFlyer from object
     * @param Flyer $flyer
     * @param UploadedFile $file
     * @param \App\Thumbnail|null $thumbnail
     */
    public function __construct(Flyer $flyer, UploadedFile $file, Thumbnail $thumbnail=null)
    {
        $this->flyer = $flyer;
        $this->file = $file;
        $this->thumbnail = $thumbnail ? : new Thumbnail;
    }

    /**
     * Process the form: save photo, move it to the destination and make thumbnail
     */
    public function save()
    {

        $photo = $this->flyer->addPhoto($this->makePhoto());

        $this->file->move($photo->baseDir(), $photo->name);

        $this->thumbnail->make($photo->path, $photo->thumbnail_path);
    }

    /**
     * Make a new photo instance
     */
    protected function makePhoto()
    {
        return new Photo(['name' => $this->makeFileName()]);

    }

    /**
     * Make a file name, based on the uploaded file
     * @return string
     */
    protected function makeFileName()
    {
        $name = sha1(
            time(). $this->file->getClientOriginalName()
        );

        $extension = $this->file->getClientOriginalExtension();

        return "{$name}.{$extension}";
    }
}