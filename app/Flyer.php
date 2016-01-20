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

    /**
     * @param Photo $photo
     * @return Model
     */
    public function addPhoto(Photo $photo)
    {
        return $this->photos()->save($photo);
    }

    /**
     * A flyer can contain many photos
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this->hasMany('App\Photo');
    }

    /**
     * Flyer is owned by an user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo('App\User','user_id');
    }

    /**
     * Determine if the given user has created a flyer
     * @param User $user
     * @return bool
     */
    public function ownedBy(User $user)
    {
        return $this->user_id == $user->id;
    }


}
