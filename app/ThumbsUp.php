<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThumbsUp extends Model
{
    public function tutorial() {
        return $this->belongsTo('App\Tutorial');
    }

}

?>
