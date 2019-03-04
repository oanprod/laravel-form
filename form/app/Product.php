<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'price', 'picture', 'description'
    ];

    public function family()
    {
        return $this->belongsTo('App\Family');
    }

    public function colors()
    {
        return $this->belongsToMany('App\Color')->withTimestamps();
    }
}
