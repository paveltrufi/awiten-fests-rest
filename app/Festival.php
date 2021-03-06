<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Festival extends Model
{
    protected $fillable = ['name', 'pathLogo', 'pathCartel', 'location', 'province', 'date', 'permalink', 'promoter_id'];

    public function getRouteKey()
    {
        return $this->permalink;
    }

    public function promoter()
    {
        return $this->belongsTo('App\User', 'promoter_id');
    }

    public function artists()
    {
        return $this->belongsToMany('App\Artist')->withPivot('confirmed');
    }

    public function genres()
    {
        return $this->belongsToMany('App\Genre');
    }

    public function photos()
    {
        return $this->hasMany('App\Photo');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
