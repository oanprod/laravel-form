<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];

    /**
     * Add timestamp fields
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * List all category families
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function families()
    {
        return $this->belongsToMany('App\Family')->withTimestamps();
    }
}
