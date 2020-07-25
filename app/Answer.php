<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['answer', 'question_id','parent'];

    public function question()
    {
        return $this->belongsTo('App\Question');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function answer()
	{
	    return $this->hasMany(answer::class)->whereNull('parent');
	}

	public function child()
    {
        return $this->hasMany(answer::class, 'parent');
    }}
