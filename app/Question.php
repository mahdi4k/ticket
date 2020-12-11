<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];

    public function questionnaire()
    {
        return $this->belongsTo(Questionnaire::class);
    }
    public function answer()
    {
        return $this->hasMany(Answer::class);
    }
    public function responses()
    {
        return $this->hasMany(SurveyResponse::class);
    }

}
