<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flyer extends Model
{

    protected $fillable =
        [
            'street',
            'city',
            'zip',
            'country',
            'state',
            'price',
            'description'
        ];


    /**
     * Scope query to those located at a given address refactored to this static function
     * @param $zip
     * @param $street
     * @return mixed
     */
    public static function locatedAt($zip, $street)
    {
        $street = str_replace('-',' ',$street);

        return static::where(compact('zip','street'))->firstOrFail();

    }

    public function addPhoto(Photo $photo)
    {
        $this->photos()->save($photo);
    }

    /**
     * A flyer can contain many photos
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this->hasMany('App\Photo');
    }


}
