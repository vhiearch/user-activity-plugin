<?php namespace Vhiearch\UserActivity\Classes;

use Session;
use Vhiearch\UserActivity\Models\Activity as ActivityModel;
use Vhiearch\UserActivity\Models\ActivityType;

class Activity
{
    protected static $instance;

    static function log($activityType, $modelId = null, $data = null)
    {
        $session_id = Session::getId();
        $user = \Auth::getUser();

        // Is login?
        if(\Auth::check())
        {
            $user_id = \Auth::getUser()->id;

            $guest_logs = ActivityModel::whereSessionId($session_id)->whereNull('user_id');
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


        ActivityModel::create([
            'session_id' => $session_id,
            'user_id' => $user_id,
            'activity_type_id' => $activity_type->id,
            'model_id' => $modelId,
            'created_at' => \Carbon\Carbon::now(),
        ]);

    }
}
