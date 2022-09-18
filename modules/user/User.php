<?php

/**
 * @author jimmy877
 * @copyright 2016
 */


namespace app\modules\user;

use app\modules\user\controllers\IndexController;
use app\modules\user\models\Users;

class User extends \yii\base\Module
{
    public function init()
    {
        parent::init();

        //$this->defaultRoute = "index";

    }
    public static function userAuth($userLogin, $password){
        return IndexController::userAuth($userLogin,$password);
    }

    public static function getUser($id=null, $mail=null, $username=null){
        return IndexController::getUser($id,$mail,$username);
    }

    public static function getAllUsers(){
        return IndexController::getAllUsers();
    }


    public static function testAuth(){
        return IndexController::testAuth();
    }

    public static function userUpdate($params=[
                                        'id'=>null,
                                        'username'=>null,
                                        'email'=>null,
                                        'password'=>null,
                                        'block'=>null,
                                        'sendEmail'=>null,
                                        'registerDate'=>null,
                                        'lastvisitDate'=>null,
                                        'activation'=>null,
                                        'params'=>null,
                                        'autorisation_id'=>null,
                                           ],
                                        $whereId = null
                                        )
    {
        return IndexController::userUpdate($params,$whereId);
    }

    public static function setUser($params=[
                                        'id'=>null,
                                        'username'=>null,
                                        'email'=>null,
                                        'password'=>null,
                                        'block'=>null,
                                        'sendEmail'=>null,
                                        'registerDate'=>null,
                                        'lastvisitDate'=>null,
                                        'activation'=>null,
                                        'params'=>null,
                                        'autorisation_id'=>null,
                                    ]
    )
    {
        return IndexController::setUser($params);
    }

    public static function testRule($module_id,$group_id){
        return Users::testRule($module_id,$group_id);

    }



}


?>