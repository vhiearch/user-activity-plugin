<?php namespace Vhiearch\UserActivity\Models;

use Auth;
use Model;
use Session;

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

    static function log($activityType, $modelId = null, $data = null)
    {
        $session_id = Session::getId();
        $user = \Auth::getUser();

        // Is login?
        if(\Auth::check())
        {
            $user_id = \Auth::getUser()->id;

            $guest_logs = self::whereSessionId($session_id)->whereNull('user_id');
            $guest_logs->update(['user_id' => $user_id]);
            // $guest_logs->save();

            // Session::put('user_is_login', $session_id);
        }
        else
        {
            $user_id = null;
        }

        try {
            $activity_type = ActivityType::whereName($activityType)->firstOrFail();
        }
        catch(\Exception $e) {
            throw new ApplicationException('Activity type is not Found');
        }


        self::create([
            'session_id' => $session_id,
            'user_id' => $user_id,
            'activity_type_id' => $activity_type->id,
            'model_id' => $modelId,
            'created_at' => \Carbon\Carbon::now(),
        ]);

    }

}
