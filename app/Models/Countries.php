<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Countries extends Model
{
    /**
     * The fillable attributes.
     *
     * @var string
     */
    public $fillable = ['name'];

    /**
     * Has Many relation
     *
     * @return HasMany
     */
    public function cities(): HasMany
    {
        return $this->hasMany('App\Models\Cities');
    }

    /**
     * Has Many Through relation
     *
     * @return HasManyThrough
     */
    public function authors(): HasManyThrough
    {
        return $this->hasManyThrough('App\Models\Author', 'App\Models\Cities');
    }}
