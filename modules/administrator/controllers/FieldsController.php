<?php
/**
 * Created by PhpStorm.
 * User: antonglotov
 * Date: 11/04/2020
 * Time: 14:21
 */
namespace app\modules\administrator\controllers;
use app\modules\administrator\exceptions\fieldsPrototypeExceptions;
use Yii;
use yii\web\Controller;
use app\modules\user\User;
use app\libraries\siteLibrary;
use app\modules\administrator\models\Fields;
use \yii\web\Cookie;

class FieldsController extends Controller
{
    use siteLibrary;

    public $module_id = 'fields_00001'; //специальный id модуля, по нему проверка происходит на права
    public $user;
    public $ruleId;
    public $dTitle;
    public $pageTitle;
    public $Result;

    /**
     * Специальный конструктор, который должен присутствовать в каждом новом контроллере
     */
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
        $this->pageTitle = "Редактирование дополнительныйх полей";
    }

    /**
     * Метод вывода списка групп прототпипов полей
     */
    function actionIndex(){
        $this->construct();
        $this->layout='admin';
        $cookies = Yii::$app->request->cookies;
        $model = [];
        $itemLimit = 10;          // количество записей на странице
        $limit = "0,".$itemLimit; //первоначальное показание страниц, меняемое кодом ниже
        $fieldGroupID = "";     //Задали значение по умолчанию

        if(isset($cookies['saveField']) ){
            $model = ["message"=>$cookies['saveField']->value];
        }

        //Если есть страницы и мы перешли на какую-дибо, то срабатывает код
        if(Yii::$app->request->get( 'p') != null){
            $page = Yii::$app->request->get( 'p');
            $page = (int)($page);

            $limit = ['start'=>round(($page*$itemLimit)-$itemLimit), "stop"=>$itemLimit];
            $limit = implode(',',$limit);
        }

        if(Yii::$app->request->get( 'g') != null){
            $fieldGroupID = Yii::$app->request->get( 'g');
            $fieldGroupID = (int)($fieldGroupID);
        }

        $result = Fields::getFieldGroup(null,$limit);
        $model +=[
            "groups" =>$result["groups"],
            "pages" => $result["pages"],
            "selectedGroupID" => $fieldGroupID
            ];

        return $this->render("/fields/group",$model);

    }

    /**
     * @return string
     * Метод по выводу списка прототпипов полей группы
     */
    function actionFields(){
        $this->construct();
        $this->layout='admin';
        $id = 0;
        $cookies = Yii::$app->request->cookies;
        $model = [];
        $itemLimit = 10;          // количество записей на странице
        $limit = "0,".$itemLimit; //первоначальное показание страниц, меняемое кодом ниже
        $fieldGroupID = "";     //Задали значение по умолчанию
        $model = [];

        if(Yii::$app->request->get( 'p') != null){
            $page = Yii::$app->request->get( 'p');
            $page = (int)($page);

            $limit = ['start'=>round(($page*$itemLimit)-$itemLimit), "stop"=>$itemLimit];
            $limit = implode(',',$limit);
        }

        if(Yii::$app->request->get( 'id') != null){
            $id = Yii::$app->request->get( 'id');
        }

        $result = Fields::getFieldPrototype(['id' => $id, 'FID'=>null]);

        /** если прототипа полей нет то просто будет пустой список. Избегаем ошибки приложения */
        if($result == null){ $result = []; }

        $model +=[
            "fields" =>$result,
            "pages" => 1,
            'id'=>$id,
        ];

        return $this->render("/fields/fields",$model);
    }


    function actionEdit(){
        $this->construct();
        $this->layout='admin';
        $model = [];
        $FID = null;

        if(Yii::$app->request->post( 'field') != null){
            $fields = Yii::$app->request->post('field');

            $fields = self::testDataArray($fields);
            //$fields = json_encode($fields, JSON_UNESCAPED_UNICODE);

            /** Тут нужно добавить условия на проверку наличия id в урле
             * Или сохранение, если id нет
             * Или обновление, если id есть
             */
            if(Yii::$app->request->post('FID') == null ){
                try{
                    $result = Fields::saveFieldPrototype($fields);
                }catch (fieldsPrototypeExceptions $e){
                     return $e->typeErrors();
                }
                if($result['result'] == true){
                    Yii::$app->response->cookies->add(new Cookie(["name"=>"saveField", "value"=>"Поле добавлено", "expire"=>time() + 6]) );
                    $this->redirect('/administrator/fields');
                }
            }else{
                try{
                    $result = Fields::updateFieldPrototype($fields, Yii::$app->request->post('FID'));
                }catch (fieldsPrototypeExceptions $e){
                    return $e->customMessage();
                }
                Yii::$app->response->cookies->add(new Cookie(["name"=>"saveField", "value"=>"Поле обновлено", "expire"=>time() + 6]) );
                $this->redirect('/administrator/fields');
            }

            /*if($result['result'] == true){
                Yii::$app->response->cookies->add(new Cookie(["name"=>"saveField", "value"=>"Поле добавлено", "expire"=>time() + 6]) );
                $this->redirect('/administrator/fields');
            }else{
              // надо дописать
                var_dump($result);
                exit();

            }*/

        }
        if(Yii::$app->request->get( 'id') != null){
            $FID = Yii::$app->request->get( 'id');
            $categoryId = Yii::$app->request->get( 'cat');
            //$fieldID = Yii::$app->request->get( 'id');
            //$fieldID = (int)($fieldID);
            $result = Fields::getFieldPrototype(['FID'=>$FID, 'id'=>$categoryId]);
            $jtest = Fields::testJson();
            $base = [
                "model"=> [
                    "name"=>"Модель",
                    "value"=>"Nokia"
                ],
                "color"=> [
                    "name"=>"Цвет",
                    "value"=>["синий",'Красный']
                ],
            ];
            $base = json_encode($base, JSON_UNESCAPED_UNICODE);
            //exit ($base);
            $model += ["field" => $result, "jfields"=>$jtest, "FID"=>$FID, "categoryId"=>$categoryId];


        }
        /** Есть идея сделат поле с йифрой количества id полей и делать проверку что бы новое поле было не мень и не равнялось
         * цифре и при создании туда суммировалось. То есть, например, в поле 36. При создании нового поля мы даем ему id 37 и к 36+1
         * таким образом записывая 37. Если новое поле по id вдруг будет равно или меньше 37, то выдаем ошибку.
         * Таким образом мыделаем уникальный id
         */


        if($FID === null){

            /** если  id_поля пустое, то подгружаем новый шаблон, пустой */
            return $this->render("/fields/editFields/editNewField",$model);
        }

        /** если  id_поля существует, то подгружаем шаблон для редактирования по типу поля */

        if($result['type']=="text" && $FID !== null){
            return $this->render("/fields/editFields/editTextField",$model);
        }
        if($result['type']=="select" && $FID !== null){
            return $this->render("/fields/editFields/editSelectField",$model);
        }
        if($result['type']=="checkbox" && $FID !== null){
            return $this->render("/fields/editFields/editCheckboxField",$model);
        }
        if($result['type']=="textarea" && $FID !== null){
            return $this->render("/fields/editFields/editTextareaField",$model);
        }
        if($result['type']=="checkboxGroup" && $FID !== null){
            return $this->render("/fields/editFields/editCheckboxGroupField",$model);
        }
        if($result['type']=="radiobutton" && $FID !== null){
            return $this->render("/fields/editFields/editRadiobuttonField",$model);
        }


    }


}








