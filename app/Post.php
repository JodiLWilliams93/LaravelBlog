<?php 

    namespace App;
    use Illuminate\Database\Eloquent\Model;

    class Post extends Model {
        protected $fillable = ['title', 'content'];

        public function likes() {
            return $this->hasMany('App\Like');
        }

        public function user() {
            return $this->belongsTo('App\User');
        }

        public function tags() {
            return $this->belongsToMany('App\Tag')->withTimestamps();
        }

        //transform title value to all lowercase letters before storing in the database.
        public function setTitleAttribute($value) {
            $this->attributes['title'] = strtolower($value);
        }

        //transform title to uppercase first letter after retrieving from the the database
        public function getTitleAttribute($value) {
            return ucfirst($value);
        }

    }

?>