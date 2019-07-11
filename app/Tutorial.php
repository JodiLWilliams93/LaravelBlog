<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model {
    public $fillable = ['title', 'content'];

    public function thumbsUps() {
        return $this->hasMany('App\ThumbsUp');
    }

    public function thumbsDowns() {
        return $this->hasMany('App\ThumbsDown');
    }

    public function relatedTutorials()
    {
        return $this->belongsToMany('App\Tutorial', 'related_tutorials', 'tutorial_id', 'related_tutorial_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
}

?>