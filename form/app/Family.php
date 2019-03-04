<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'families';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];

    public $timestamps = true;

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category')->withTimestamps();
    }
}
