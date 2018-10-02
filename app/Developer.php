<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    protected $fillable = ['email'];

    /**
     * Get Developer language that belongs to developer
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function languages()
    {
        return $this->belongsToMany(Language::class, 'developer_languages', 'developer_id', 'language_id');
    }

    /**
     * Formatting language in string
     * @return string
     */
    public function getLanguagesAttribute()
    {
        return self::languages()->pluck('code')->implode(', ');
    }

    /**
     * Get Developer Programming language that belongs to developer
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function programming_languages()
    {
        return $this->belongsToMany(Programming_language::class, 'developer_programming_languages', 'developer_id', 'pro_lang_id');
    }

    /**
     * Get programming language name in string
     * @return string
     */
    public function getProgrammingLanguageNamesAttribute()
    {
        return self::programming_languages()->pluck('name')->implode(', ');
    }
}
