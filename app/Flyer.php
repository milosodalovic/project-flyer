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
     * Scope query to those located at a given address
     * @param $query
     * @param $zip
     * @param $street
     * @return mixed
     */
    public function scopeLocatedAt($query, $zip, $street)
    {
        $street = str_replace('-',' ',$street);

        return $query->where(compact('zip','street'));

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
