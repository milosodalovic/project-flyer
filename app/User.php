<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Determines if the flyer is created by the user or not
     * @param $relation
     * @return boolean
     */
    public function owns($relation)
    {
        return $relation->user_id == $this->id;
    }

    /**
     * Each user can create many flyers
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function flyers()
    {
        return $this->hasMany('App\Flyer');
    }

    /**
     * Publishes a flyer and saving in a DB with user_id field identifying the user
     * @param Flyer $flyer
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function publish(Flyer $flyer)
    {
        return $this->flyers()->save($flyer);
    }
}
