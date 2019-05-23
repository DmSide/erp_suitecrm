<?php
/**
 * Created by PhpStorm.
 * User: dima
 * Date: 25.03.19
 * Time: 13:02
 */

if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');


class make_tasks_completed_hook
{
    function main(&$bean, $event, $arguments)
    {
        $GLOBALS['log']->debug('Start make_tasks_completed_hook');
        $dbUpdateTasks = DBManagerFactory::getInstance();
        $queryUpdateTasks = "UPDATE tasks SET status = 'Completed' WHERE parent_id ='{$bean->id}' and deleted = 0";
        $dbUpdateTasks->query($queryUpdateTasks);
        $GLOBALS['log']->debug('Stop make_tasks_completed_hook');
    }
}
?>