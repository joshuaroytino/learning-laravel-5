<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {


    /**
     * fillabe fields for tag
     *
     * @var array
     */
    protected $fillable = [
        "name"
    ];

    /**
     * Get the articles associated with the given tag.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
	public function articles()
    {
        return $this->belongsToMany('App\Article');
    }

}
