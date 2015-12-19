<?php namespace Vhiearch\UserActivity\Models;

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

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

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

    static function log($activityType, $modelId = null, $data = null)
    {
        $session_id = session_id();
        $user = Auth::getUser();

        // cek apakah sudah login?

        // jika belum login, ambil session id saja

        // jika sudah dimigrasi, kasih flag
    }


}
