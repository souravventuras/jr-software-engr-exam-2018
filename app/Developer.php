<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Developer extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['email'];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['programmingLanguages', 'languages'];

    /**
     * Get developer's programming language ids.
     *
     * @return array
     */
    public function getProgrammingLanguageIdsAttribute()
    {
        return $this->programmingLanguages()->pluck('id')->toArray();
    }

    /**
     * Get developer's language ids.
     *
     * @return array
     */
    public function getLanguageIdsAttribute()
    {
        return $this->languages()->pluck('id')->toArray();
    }

    /**
     * Get developer's programming language ids.
     *
     * @return array
     */
    public function getProgrammingLanguageNamesAttribute()
    {
        return $this->programmingLanguages()->pluck('name')->toArray();
    }

    /**
     * Get developer's language ids.
     *
     * @return array
     */
    public function getLanguageCodesAttribute()
    {
        return $this->languages()->pluck('code')->toArray();
    }

    /**
     * Programming Languages that are known by the developer.
     */
    public function programmingLanguages()
    {
        return $this->belongsToMany(ProgrammingLanguage::class);
    }

    /**
     * Languages that are known by the developer.
     */
    public function languages()
    {
        return $this->belongsToMany(Language::class);
    }

    /**
     * Filter query result based on user search.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeFilter(Builder $query)
    {
        if (request()->has('pl') && request('pl') > 0)
        {
            $query->ofProgrammingLanguage(request('pl'));
        }

        if (request()->has('l') && request('l') > 0)
        {
            $query->ofLanguage(request('l'));
        }

        return $query;
    }

    /**
     * Scope a query to select developer of a language.
     *
     * @param Builder $query
     * @param int $language_id
     * @return Builder
     */
    public function scopeOfLanguage(Builder $query, $language_id)
    {
        return $query->whereHas('languages', function($query) use ($language_id) {
            $query->whereId($language_id);
        });
    }

    /**
     * Scope a query to select developer of a programming language.
     *
     * @param Builder $query
     * @param int $programming_language_id
     * @return Builder
     */
    public function scopeOfProgrammingLanguage(Builder $query, $programming_language_id)
    {
        return $query->whereHas('programmingLanguages', function($query) use ($programming_language_id) {
            $query->whereId($programming_language_id);
        });
    }
}
