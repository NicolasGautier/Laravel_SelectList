<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cities extends Model
{
    /**
     * The fillable attributes.
     *
     * @var string
     */
    public $fillable = ['name', 'country_id'];

    /**
     * One to Many relation
     *
     * @return BelongsTo
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo('App\Models\Countries');
    }

    /**
     * Has Many relation
     *
     * @return HasMany
     */
    public function authors(): HasMany
    {
        return $this->hasMany('App\Models\Authors');
    }}
