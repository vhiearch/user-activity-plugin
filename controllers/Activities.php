<?php namespace Vhiearch\UserActivity\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Activities Back-end Controller
 */
class Activities extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Vhiearch.UserActivity', 'useractivity', 'activities');
    }
}