<?php
/**
 * Created by PhpStorm.
 * User: dima
 * Date: 30.03.19
 * Time: 1:54
 */
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');


class create_new_task_hook
{
    function main(&$bean, $event, $arguments){

        $sales = array(
            'Prospecting' => 'на согласовании у координатора',  // letter to coordinator, task to coordinator
            'Qualification' => 'на согласовании в х5',          // letter to engineer
            'Needs Analysis' => 'на исправлении ошибок ',       // letter to engineer, task to engineer
            'Value Proposition' => 'согласованно'               // letter to engineer
        );

        $sales_stage_ru = $sales[$bean-> sales_stage];

        $is_need_send_letter_to_engineer = $bean->sales_stage == 'Qualification' || $bean->sales_stage == 'Needs Analysis' || $bean->sales_stage == 'Value Proposition';

        $is_need_send_letter_to_coordinator = $bean->sales_stage == 'Prospecting';
        $is_need_task_to_coordinator = $bean->sales_stage == 'Prospecting';
        $is_need_task_to_engineer = $bean->sales_stage == 'Needs Analysis';

        $GLOBALS['log']->warn('Start create_new_task_hook');
        //**************GET USERS********************
        $engineer_id = $bean->created_by;
        $coordinator_ids = [];

        $dbGetSGUser = DBManagerFactory::getInstance();
        $queryGetSGUsers = "select sg.name as name
                       from suitecrm.securitygroups sg, suitecrm.securitygroups_users sgu, suitecrm.users u
                       where sgu.securitygroup_id = sg.id and sgu.user_id = u.id and u.id = '{$engineer_id}'";
        $resultGetSGUsers = $dbGetSGUser->query($queryGetSGUsers);
        $resultGetSGUsersRow = $dbGetSGUser->fetchByAssoc($resultGetSGUsers);
        $user_sg_name  = $resultGetSGUsersRow['name'];

        $GLOBALS['log']->warn($user_sg_name);

        $coordinator_sg_name = '';
        if ($user_sg_name == "ЮД МСИ") $coordinator_sg_name = "ЮД координаторы";

        $GLOBALS['log']->warn($coordinator_sg_name);

        $dbGetSGCoordinator = DBManagerFactory::getInstance();
        $queryGetSGCoordinator = "select u.id as id
                       from suitecrm.securitygroups sg, suitecrm.securitygroups_users sgu, suitecrm.users u
                       where sgu.securitygroup_id = sg.id and sgu.user_id = u.id and sg.name = '{$coordinator_sg_name}'";
        $resultGetSGCoordinator = $dbGetSGCoordinator->query($queryGetSGCoordinator);

        while($resultGetSGCoordinatorRow = $dbGetSGCoordinator->fetchByAssoc($resultGetSGCoordinator)){
            $GLOBALS['log']->warn('**************************************************************');
            $GLOBALS['log']->warn($resultGetSGCoordinatorRow['id']);
            $coordinator_ids[] = $resultGetSGCoordinatorRow['id'];
        }

        $GLOBALS['log']->warn($coordinator_ids);

//        $dbGetUsers = DBManagerFactory::getInstance();
//        $queryGetUsers = "SELECT * FROM users WHERE deleted = 0";
//        $resultGetUsers = $dbGetUsers->query($queryGetUsers);
//        while($resultGetUsersRow = $dbGetUsers->fetchByAssoc($resultGetUsers)){
//            $name = $resultGetUsersRow['user_name'];
//            if ($name == "tehotdel") $techotdel_id = $resultGetUsersRow['id'];
//            if ($name == "d.tsoy") $denis_id = $resultGetUsersRow['id'];
//            if ($name == "office") $office_id = $resultGetUsersRow['id'];
//        }
        //if ($techotdel_id == '' or $denis_id == '' or $office_id == '') return;

        //**********************************************************
        $now = date_create()->format('Y-m-d H:i:s');

        //***************Get contact_id****************************
        $dbGetContactId = DBManagerFactory::getInstance();
        $queryGetContactId = "SELECT ac.contact_id as contact_id
                             FROM suitecrm.accounts_contacts ac, suitecrm.accounts_opportunities ao
                             WHERE ac.deleted = 0 and ao.deleted = 0
                             and ac.account_id = ao.account_id 
                             and ao.opportunity_id = '{$bean->id}'";
        $resultGetContactId = $dbGetContactId->query($queryGetContactId);
        $resultGetContactIdRow = $dbGetContactId->fetchByAssoc($resultGetContactId);
        $contact_id  = $resultGetContactIdRow['contact_id'];
        //***************Get manager_id and deal_address_c************************
//        $dbGetManager = DBManagerFactory::getInstance();
//        $queryGetManager = "SELECT a.assigned_user_id as manager_id, o.deal_address_c as deal_address_c
//                            FROM opportunities o, accounts a, accounts_opportunities ao
//                            WHERE o.id = '{$bean->id}' and o.deleted = 0
//                              and ao.opportunity_id = o.id  and ao.deleted = 0
//                              and a.id = ao.account_id and a.deleted = 0
//                            ";
//        $resultGetManager = $dbGetManager->query($queryGetManager);
//        $resultGetManagerRow = $dbGetManager->fetchByAssoc($resultGetManager);
//        $manager_id = $resultGetManagerRow['manager_id'];
//        if (empty($manager_id) or !isset($manager_id)) {
//            $manager_id=$default_manager_id;
//        }
//        $GLOBALS['log']->debug("************AAAAAAAAAAAA*********");
//        $GLOBALS['log']->debug($manager_id);
//        $deal_address_c = $resultGetManagerRow['deal_address_c'];
        //*****************Get $date_due*****************************
        $date_due = date('Y-m-d H:i:s', strtotime("+7 day"));
        //***************Create list of users***********************
//        $assigned_user_list = array(
//            'techotdel' => $techotdel_id, //'c6c52b5c-cbed-5bbb-8d58-5c5bfb65720f',
//            'office' => $office_id,//'72ddba62-cc55-edb2-3260-5c9fcf714535',
//            'denis' => $denis_id, //'570cfb3e-fe1f-ed10-68f4-5c5bfaa04842',
//            'manager' => $manager_id,
//        );

        $assigned_user_id = $bean->created_by;
        //$name = '';
        $name = $sales_stage_ru;
        //*********Fill up field $assigned_user_id and $name*************************************************
//        if ($bean->sales_stage == "Technical department" or $bean->sales_stage == "Техотдел") {
//            $assigned_user_id = $assigned_user_list['techotdel'];
//            $name = 'Выбрать инженера';
//        } else if ($bean->sales_stage == "Office" or $bean->sales_stage == "Офис") {
//            $assigned_user_id = $assigned_user_list['office'];
//            $name = 'Загрузить акт';
//        }else if ($bean->sales_stage == "Qualification" or $bean->sales_stage == "Оценка") {
//            $assigned_user_id = $assigned_user_list['denis'];
//            $name = 'Оценить';
//        }
//        else if ($bean->sales_stage == "Matching" or $bean->sales_stage == "Согласование") {
//            $assigned_user_id = $assigned_user_list['manager'];
//            $name = 'Согласовать';
//        }
//        else if ($bean->sales_stage == "Price Quote" or $bean->sales_stage == "Счет") {
//            $assigned_user_id = $assigned_user_list['manager'];
//            $name = 'Контроль оплаты';
//        }else if ($bean->sales_stage == "Order" or $bean->sales_stage == "Заказ") {
//            $assigned_user_id = $assigned_user_list['denis'];
//            $name = 'Заказать';
//        }else if ($bean->sales_stage == "Waiting" or $bean->sales_stage == "Ожидание товара") {
//            $assigned_user_id = $assigned_user_list['denis'];
//            $name = 'Поступление';
//        }
//        else if ($bean->sales_stage == "Sale" or $bean->sales_stage == "Реализация") {
//            $assigned_user_id = $assigned_user_list['techotdel'];
//            $name = 'Реализовать';
//        }else if ($bean->sales_stage == "Closed Lost" or $bean->sales_stage == "Закрыто с потерей") {
//            $assigned_user_id = $assigned_user_list['office'];
//            $name = 'Счет на диагностику';
//        }
        //**************************************GET EMAIL ADDRESS***********************************************
        if ($is_need_send_letter_to_engineer){
            $GLOBALS['log']->warn('is_need_send_letter_to_engineer');
            $dbGetEmail = DBManagerFactory::getInstance();
            $queryGetEmail = "select ea.email_address as email_address, u.last_name as last_name, u.first_name as first_name  
                          from suitecrm.email_addresses ea, suitecrm.email_addr_bean_rel ear, suitecrm.users u
                          WHERE ear.bean_module = 'Users' and ear.deleted = 0 AND ear.bean_id = u.id 
                          and ea.id = ear.email_address_id and u.id = '{$engineer_id}'";
            $resultGetEmail = $dbGetEmail->query($queryGetEmail);
            $resultGetEmailRow = $dbGetEmail->fetchByAssoc($resultGetEmail);
            $email_address = $resultGetEmailRow['email_address'];
            $last_name = $resultGetEmailRow['last_name'];
            $first_name = $resultGetEmailRow['first_name'];


            $GLOBALS['log']->debug('Start create_email');
//            $dbGetUserName = DBManagerFactory::getInstance();
//            $queryGetUserName = "SELECT u.last_name as last_name, u.first_name as first_name
//                             FROM users u
//                             WHERE u.deleted = 0 and u.id = '{$bean->created_by}'";
//            $resultGetUserName = $dbGetUserName->query($queryGetUserName);
//            $resultGetUserNameRow = $dbGetUserName->fetchByAssoc($resultGetUserName);
//            $created_by_last_name = $resultGetUserNameRow['last_name'];
//            $created_by_first_name = $resultGetUserNameRow['first_name'];
            #------------------------------------
            $GLOBALS['log']->debug('Start create_email');
//            $dbGeAccountName = DBManagerFactory::getInstance();
//            $queryGeAccountName = "SELECT a.name as account_name
//                              from accounts_opportunities ao, accounts a
//                              where a.id = ao.account_id and opportunity_id ='{$bean->id}'";
//            $resultGeAccountName = $dbGeAccountName->query($queryGeAccountName);
//            $resultGeAccountNameRow = $dbGeAccountName->fetchByAssoc($resultGeAccountName);
//            $account_name = $resultGeAccountNameRow['account_name'];

            // include Email class
            include_once('include/SugarPHPMailer.php');
            include_once('include/utils/db_utils.php'); // for from_html function

            $mail = new SugarPHPMailer();
            $mail->From = "syserp@obermeister.ru";
            $mail->FromName = "авто информирование";
            $mail->ClearAllRecipients();
            $mail->ClearReplyTos();
            $mail->AddAddress($email_address, $last_name . "," . $first_name);
            $mail->Subject = "SuiteCRM - Задача: " . $name;

            $mail->Body = wordwrap("Номер заявки:: $bean->name
                                    \nМагазин: $bean->account_name
                                    \nДата выполнения работ: $bean->date_closed
                                    \nСтадия согласования документов: $sales_stage_ru
                                    \nДокументы:: $bean->opportunities_documents_c
                                    \nОписание:: $bean->description", 900);
            //№$mail->isHTML(true); // set to true if content has html tags
            $mail->prepForOutbound();
            $mail->setMailerForSystem();
            //Send mail, log if there is error
            if (!$mail->Send()) {
                $GLOBALS['log']->fatal("ERROR: Mail sending failed!");
            }
        }

        if ($is_need_send_letter_to_coordinator){
            $GLOBALS['log']->warn('is_need_send_letter_to_coordinator');
            foreach ($coordinator_ids as $coordinator_id) {
                $dbGetEmail = DBManagerFactory::getInstance();
                $queryGetEmail = "select ea.email_address as email_address, u.last_name as last_name, u.first_name as first_name  
                          from suitecrm.email_addresses ea, suitecrm.email_addr_bean_rel ear, suitecrm.users u
                          WHERE ear.bean_module = 'Users' and ear.deleted = 0 AND ear.bean_id = u.id 
                          and ea.id = ear.email_address_id and u.id = '{$coordinator_id}'";
                $resultGetEmail = $dbGetEmail->query($queryGetEmail);
                $resultGetEmailRow = $dbGetEmail->fetchByAssoc($resultGetEmail);
                $email_address = $resultGetEmailRow['email_address'];
                $last_name = $resultGetEmailRow['last_name'];
                $first_name = $resultGetEmailRow['first_name'];


                $GLOBALS['log']->debug('Start create_email');
//            $dbGetUserName = DBManagerFactory::getInstance();
//            $queryGetUserName = "SELECT u.last_name as last_name, u.first_name as first_name
//                             FROM users u
//                             WHERE u.deleted = 0 and u.id = '{$bean->created_by}'";
//            $resultGetUserName = $dbGetUserName->query($queryGetUserName);
//            $resultGetUserNameRow = $dbGetUserName->fetchByAssoc($resultGetUserName);
//            $created_by_last_name = $resultGetUserNameRow['last_name'];
//            $created_by_first_name = $resultGetUserNameRow['first_name'];
                #------------------------------------
                $GLOBALS['log']->debug('Start create_email');
//            $dbGeAccountName = DBManagerFactory::getInstance();
//            $queryGeAccountName = "SELECT a.name as account_name
//                              from accounts_opportunities ao, accounts a
//                              where a.id = ao.account_id and opportunity_id ='{$bean->id}'";
//            $resultGeAccountName = $dbGeAccountName->query($queryGeAccountName);
//            $resultGeAccountNameRow = $dbGeAccountName->fetchByAssoc($resultGeAccountName);
//            $account_name = $resultGeAccountNameRow['account_name'];

                // include Email class
                include_once('include/SugarPHPMailer.php');
                include_once('include/utils/db_utils.php'); // for from_html function

                $mail = new SugarPHPMailer();
                $mail->From = "syserp@obermeister.ru";
                $mail->FromName = "авто информирование";
                $mail->ClearAllRecipients();
                $mail->ClearReplyTos();
                $mail->AddAddress($email_address, $last_name . "," . $first_name);
                $mail->Subject = "SuiteCRM - Задача: " . $name;

                $mail->Body = wordwrap("Номер заявки:: $bean->name
                                    \nМагазин: $bean->account_name
                                    \nДата выполнения работ: $bean->date_closed
                                    \nСтадия согласования документов: $sales_stage_ru
                                    \nДокументы:: $bean->opportunities_documents_c
                                    \nОписание:: $bean->description", 900);
                //№$mail->isHTML(true); // set to true if content has html tags
                $mail->prepForOutbound();
                $mail->setMailerForSystem();
                //Send mail, log if there is error
                $GLOBALS['log']->fatal($mail->Body);
                if (!$mail->Send()) {
                    $GLOBALS['log']->fatal("ERROR: Mail sending failed!");
                }
            }
        }

        //*****************************************************************************************************
        $description = "Номер заявки:: '{$bean->name}''
                                    \nМагазин: '{$bean->account_name}'
                                    \nДата выполнения работ: '{$bean->date_closed}'
                                    \nСтадия согласования документов: '{$sales_stage_ru}'
                                    \nДокументы:: $bean->opportunities_documents_c
                                    \nОписание:: $bean->description";
//        $dbInsertNewTask = DBManagerFactory::getInstance();
//        $queryInsertNewTask = "INSERT INTO tasks (
//                                    id, name, created_by, assigned_user_id, status, deleted, description,
//                                    parent_type, parent_id, priority, contact_id,
//                                    date_start, date_entered, date_due_flag, date_due
//                                ) VALUES (
//                                    '{$uuid}', '{$name}', '{$bean->created_by}', '{$assigned_user_id}','Not Started', 0,'{$description}',
//                                    'Opportunities', '{$bean->id}', 'Medium', '{$contact_id}',
//                                    '{$now}' ,'{$now}',0,'{$date_due}'
//                                )";
//        $dbInsertNewTask->query($queryInsertNewTask);
        if ($is_need_task_to_engineer){
            $GLOBALS['log']->warn('is_need_task_to_engineer');
            $uuid = sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
                // 32 bits for "time_low"
                mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
                // 16 bits for "time_mid"
                mt_rand( 0, 0xffff ),
                // 16 bits for "time_hi_and_version",
                // four most significant bits holds version number 4
                mt_rand( 0, 0x0fff ) | 0x4000,
                // 16 bits, 8 bits for "clk_seq_hi_res",
                // 8 bits for "clk_seq_low",
                // two most significant bits holds zero and one for variant DCE1.1
                mt_rand( 0, 0x3fff ) | 0x8000,
                // 48 bits for "node"
                mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
            );
            $dbInsertNewTask = DBManagerFactory::getInstance();
            $task = new Task();
            $task->id = $uuid;
            $task->name = $name;
            $task->created_by = $bean->created_by;
            $task->assigned_user_id = $bean->created_by;
            $task->status = 'Not Started';
            $task->deleted = 0;
            $task->description = $description;
            $task->parent_type = 'Opportunities';
            $task->parent_id = $bean->id;
            $task->priority = 'Medium';
            $task->contact_id = $contact_id;
            $task->date_start = $now;
            $task->date_entered = $now;
            $task->date_due_flag = 0;
            $task->date_due = $date_due;
            $task->save();
            $dbInsertNewTask->insert($task);
        }
        if ($is_need_task_to_coordinator){
            $GLOBALS['log']->warn('is_need_task_to_coordinator');
            foreach ($coordinator_ids as $coordinator_id) {
                $dbInsertNewTask = DBManagerFactory::getInstance();
                $task = new Task();
                $uuid = sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
                    // 32 bits for "time_low"
                    mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
                    // 16 bits for "time_mid"
                    mt_rand( 0, 0xffff ),
                    // 16 bits for "time_hi_and_version",
                    // four most significant bits holds version number 4
                    mt_rand( 0, 0x0fff ) | 0x4000,
                    // 16 bits, 8 bits for "clk_seq_hi_res",
                    // 8 bits for "clk_seq_low",
                    // two most significant bits holds zero and one for variant DCE1.1
                    mt_rand( 0, 0x3fff ) | 0x8000,
                    // 48 bits for "node"
                    mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
                );
                $task->id = $uuid;
                $task->name = $name;
                $task->created_by = $bean->created_by;
                $task->assigned_user_id = $coordinator_id;
                $task->status = 'Not Started';
                $task->deleted = 0;
                $task->description = $description;
                $task->parent_type = 'Opportunities';
                $task->parent_id = $bean->id;
                $task->priority = 'Medium';
                $task->contact_id = $contact_id;
                $task->date_start = $now;
                $task->date_entered = $now;
                $task->date_due_flag = 0;
                $task->date_due = $date_due;
                $task->save();
                $dbInsertNewTask->insert($task);
            }
        }

        $GLOBALS['log']->debug('Finish create_new_task_hook');
    }
}

?>