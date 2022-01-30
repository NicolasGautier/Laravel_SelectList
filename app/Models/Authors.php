<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Authors extends Model
{

    public $fillable = ['name', 'city_id'];



    /**
     * One to Many relation
     *
     * @return BelongsTo
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo('App\Models\City');
    }
}
