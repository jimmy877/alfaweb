<?php

/**
 * @author anton
 * @copyright 2016
 */

namespace app\modules\administrator\controllers;

use yii\web\Controller;
use app\modules\user\User;
use app\modules\administrator\models\Pages;

class PagesController extends Controller
{
    public $module_id = 'pages_72542'; //специальный id модуля, по нему проверка происходит на права
    public $user;
    public $dTitle=null;


    function actionIndex(){

        // заносим пользователя в переменную
        $this->user = User::testAuth();

        // тестируем авторизацию
        if($this->user->sessionReg==false){
            $this->redirect('/administrator/');
            return false;
        }

        // тестируем права пользователя
        $testRule = User::testRule($this->module_id, $this->user->user_info->group_id);
        if($testRule==false){
            exit();
        }

        $db = new Pages();
        $list = $db->getList();
        $this->layout='admin';
        return $this->render("/pages/list",['one'=>"administrator", 'list'=>$list]);

    }

    function actionEdit(){
        echo 'List';
    }
}

?>