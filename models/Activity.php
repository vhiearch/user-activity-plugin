<?php namespace Vhiearch\UserActivity\Models;

use Auth;
use Model;

/**
 * Activity Model
 */
class Activity extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'vhiearch_useractivity_activities';

    public $timestamps = false;

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['id'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [
        'user' => 'RainLab\User\Models\User',
        'activity_type' => 'Vhiearch\UserActivity\Models\ActivityType',
    ];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

// -------------------------------------------------------------------------- //

    public function setUpdatedAtAttribute($value)
    {
        return false;
//        return 'abc';
        // Do nothing.
    }

}
