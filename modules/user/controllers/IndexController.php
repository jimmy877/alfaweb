<?php

/**
 * @author anton
 * @copyright 2016
 */

namespace app\modules\user\controllers;

use app\modules\user\User;
use yii\web\Controller;
use app\modules\user\models\Users;
class IndexController extends Controller
{
    public $description;
    function actionIndex(){
        echo 'two';
    }

    function actionMain($url=null,$test=null){
        $this->layout = 'admin';
        $this->description = 'descTest';
        return $this->render("/index/about",['one'=>"administrator"]);
    }

    /**
     * @param $userLogin
     * @param $password
     * @return bool
     */
    static function userAuth($userLogin, $password){
        $userLogin = trim($userLogin);
        $userLogin = strtolower($userLogin);
        $password = trim($password);
        if ($userLogin == null or $password==null){
            return false;
        }
        $user = self::getUser(null,$userLogin,null);
        if ($user == "false"){
            $user = self::getUser(null,null,$userLogin);
        }
        if ($user == "false"){
            return false;
        }

        $user = json_decode($user);
        $password = md5($password.'_alfaweb');
        if($user->activation==0){
            return false;
        }
        if ($password != $user->password){
            return false;
        }
        else{
            $session_id = md5(date('d-m-y').rand(1,5000).'alfa'.$userLogin.$user->id);
            Users::setSessionId($user->id,$session_id);
            $session = \Yii::$app->session;
            $session->set('userActive','true');
            $session->set('session_id',$session_id);
            $session->set('userInfo',json_encode($user));
            return true;
        }
    }

    static function getUser($id, $mail, $username){
        if ($id != null){
            $userInfo = Users::getUserById($id);
        }
        if ($mail != null){
            $userInfo = Users::getUserByMail($mail);
        }
        if ($username != null){
            $userInfo = Users::getUserByUsername($username);
        }
        return $userInfo;
    }

    static function getAllUsers(){
        return Users::getAllUsers();
    }

    static function testAuth(){
        $session = \Yii::$app->session;
        $user = ['active'=>$session->get('userActive'),
                 'session_id'=>$session->get('session_id'),
                 'userInfo'=>$session->get('userInfo'),
                ];
        if($user==null or $user['active']!='true'){
            return false;
        }
        $user_info = json_decode($user["userInfo"]);
        $user_session = json_decode(self::getUser($user_info->id,null,null));
        if($user['session_id']!=$user_session->autorisation_id){
            $session->destroy();
            return  (object)['sessionReg'=>false];
        }else{
            return (object)['sessionReg'=>true, 'user_info'=>$user_info,'user_session'=>$user_session];
        }

    }

    public static function userUpdate($params, $whereId){
        return Users::userUpdate($params, $whereId);
    }
    public static function setUser($params){
        return Users::setUser($params);
    }

}

?>