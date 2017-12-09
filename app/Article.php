<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Article extends Model
{
    protected $fillable = [
        'user_id','contents','live','post_on'
    ];

    protected $dates = ['post_on'];

    public function setLiveAttribute($value){
        $this->attributes['live'] = (boolean)($value);
    }
    public function getShortContentsAttribute(){
        return substr($this->contents, 0, random_int(60, 150)) . '...' ;
    }
    public function setPostOnAttribute($value){
        $this->attributes['post_on'] = Carbon::parse($value);
    }
    

    // protected $guarded = ['id'];//things that are not going to mass assignable
}
