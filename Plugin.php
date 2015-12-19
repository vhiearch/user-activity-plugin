<?php namespace Vhiearch\UserActivity;

use File;
use Yaml;
use Backend;
use System\Classes\PluginBase;

/**
 * UserActivity Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'User Activity',
            'description' => 'Know your users activities',
            'author'      => 'Vhiearch',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Vhiearch\UserActivity\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'vhiearch.useractivity.some_permission' => [
                'tab' => 'UserActivity',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
//        return [
//            'useractivity' => [
//                'label'       => 'UserActivity',
//                'url'         => Backend::url('vhiearch/useractivity/mycontroller'),
//                'icon'        => 'icon-leaf',
//                'permissions' => ['vhiearch.useractivity.*'],
//                'order'       => 500,
//            ],
//        ];
    }

    public function registerSettings()
    {
        return [
            'useractivity' => [
                'label'       => 'User Activities',
                'description' => 'See the activitiy log of users.',
                'category'    => 'Users',
                'icon'        => 'icon-cog',
                // 'model'       => 'Vhiearch\UserActivity\Models\Settings',
                'url'         => Backend::url('vhiearch/useractivity/activities'),
                'order'       => 500,
                'permissions' => ['vhiearch.useractivity.*']
            ]
        ];
    }

    public function boot()
    {
        \RainLab\User\Models\User::extend(function($model) {

            $model->hasMany['activities'] = 'Vhiearch\UserActivity\Models\Activity';

        });

//        \RainLab\User\Controllers\Users::extend(function($controller) {
//            $controller->implement[] = 'Backend.Behaviors.RelationController';
//            $controller->relationConfig =  __DIR__ . '/config/user_relation.yaml';
//        });

//        \RainLab\User\Controllers\Users::extendFormFields(function($form, $model, $context) {
//            if (!$model instanceof \RainLab\User\Models\User)
//                return;
//
//            $configFile = __DIR__ . '/config/activities_fields.yaml';
//            $config = Yaml::parse(File::get($configFile));
//            $form->addTabFields($config);
//        });

    }

}
