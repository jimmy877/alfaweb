<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 15.10.2018
 * Time: 21:41
 */

namespace app\modules\administrator\controllers;
use Yii;
use yii\web\Controller;
use app\modules\user\User;
use app\modules\administrator\models\Form;
use app\libraries\siteLibrary;

class FormController extends Controller
{
    public $module_id = 'form_00001';
    public $user;
    public $ruleId;
    public $siteLibrary;
    public $dTitle;
    public $Result;

    public function construct(){
        // заносим пользователя в переменную
        $this->user = User::testAuth();
        $this->ruleId = User::testRule($this->module_id, $this->user->user_info->group_id);

        // тестируем авторизацию
        if($this->user->sessionReg==false){
            $this->redirect('/administrator/');
            return false;
        }
        // тестируем права пользователя
        if( $this->ruleId==false){
            exit("У вас нет прав просмотра данного раздела");
        }
    }

    function actionIndex(){
        $request = Yii::$app->request;
        $this->construct();
        $this->layout='admin';

        $model = new Form();

        if ($model->load(Yii::$app->request->post()) && $model->test()) {
            // данные в $model удачно проверены
            $a = Yii::$app->request->post();
            $a = (object)$a['Form'];
            return $this->render("/Form/form",['model'=>$model, 'data'=>$model->message]);
        } else {

            // либо страница отображается первый раз, либо есть ошибка в данных
            return $this->render("/Form/form",['model'=>$model]);
        }




        //return $this->render("/Form/form",['model'=>$model]);
    }


}
?>