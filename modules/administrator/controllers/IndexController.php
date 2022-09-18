<?php

/**
 * @author anton
 * @copyright 2016
 */

namespace app\modules\administrator\controllers;

use yii\web\Controller;
use app\modules\user\User;
class IndexController extends Controller
{
    public $description;
    public $layout = 'admin';
    public $dTitle=null;

    function actionIndex(){
        if(User::testAuth()->sessionReg==false){
            $this->redirect('/administrator/');
            return false;
        }

        if(User::testAuth()->sessionReg==true){
            $this->redirect('/administrator/index/panel');
            return false;
        }
    }

    function actionMain($url=null,$test=null){
        if(User::testAuth()->sessionReg==true){
            $this->redirect('/administrator/index/panel');
            return false;
        }
        $this->layout='auth';
        $this->description = 'descTest';
        return $this->render("/index/auth",['one'=>"administrator"]);
    }
    function actionAuth($url=null,$test=null){
        $login = htmlspecialchars(\Yii::$app->request->post('login'));
        $password = htmlspecialchars(\Yii::$app->request->post('pass'));
        $errorMessage=null;
        $auth = User::userAuth($login,$password);
        if($auth=='true'){
            $this->redirect('/administrator/index/panel');
        }else{
            $errorMessage="Не правильный логин или пароль. Возможно ваш аккаунт заблокирован";
        }
        $this->layout='auth';
        $this->description = 'descTest';
        return $this->render("/index/auth",['one'=>"administrator",'errorMessage'=>$errorMessage]);
    }

    function actionPanel(){
        if(User::testAuth()->sessionReg==false){
            $this->redirect('/administrator/');
            return false;
        }
        $this->layout='admin';
        $this->description = 'descTest';
        return $this->render("/index/about",['one'=>"administrator"]);
    }
}

?>