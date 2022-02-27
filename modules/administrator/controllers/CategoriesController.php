<?php

/**
 * @author anton
 * @copyright 2016
 */

namespace app\modules\administrator\controllers;
use Yii;
use yii\web\Controller;
use app\modules\user\User;
use app\modules\administrator\models\Categories;
use app\libraries\siteLibrary;

class CategoriesController extends Controller
{
    //Через трейты подключаю основную библиотеку с базовыми функциями
    use siteLibrary;

    public $module_id = 'categories_00002'; //специальный id модуля, по нему проверка происходит на права
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
        $this->construct();
        $request = Yii::$app->request;
        if($request->get("id")==null or $request->get('js')==null){
            $list = Categories::categoryList();
            $categories = json_decode($list);
        }else{
            $list = Categories::categoryList($request->get("id"));
            return $list;
        }


        $this->layout='admin';
        return $this->render("/categories/list",['categories'=>$categories]);

    }

    function actionUsesearch($param){
        $this->construct();
        return Categories::categoryNameSearch('%'.$param.'%');
    }

    function actionCategory(){
        $this->construct();
        $alias = $this->translit('Тестовая запись1');
        $level = 2;
        $categoryContent = [
            'id'=>13,
            'title'=>'cat title',
            'alias'=>'treeTest',
            'path'=>'test/two/tree',
            'parentId'=>'12',
            'note'=>'',
            'description'=>'',
            'published'=>1,
            'access'=>1,
            'params'=>'',
            'metadesc'=>'',
            'metakey'=>'',
            'metadata'=>'',
            'created_user_id'=>878,
            'level'=>'level of category',
        ];

        # Не забываем менять id записи level записи и parentId
        # Еще не забыть обновить level вложенных категорий при изменении записи
       echo  Categories::updateCategory(3,$categoryContent,['cAlias'=>['name1'], 'cName'=>['field name'] ]);

        //var_dump(Categories::addCategory($alias,$level));


        $this->layout='admin';
        return $this->render("/categories/list",['one'=>"administrator"]);
    }

    function actionEdit($id=2){
        /** тут по умолчанию указываем 1, что бы избежать ошибки,
         * а так id берется из урла браузера к экшену
         */

        $this->construct();
        $request = Yii::$app->request;

        if($request->post('test')!=null){
            $mess = $request->post('test');
            $view = "/index/about";
            $value = ['mess'=>$mess];
            return $this->render($view,$value);

        }else{
            $category = json_decode( Categories::categoryOne($id));
            $catTree = json_decode(Categories::categoryAllList());
            #Берем функцию построения дерева из трейта
            $catTree = $this->CategoryBuildTree(1,$catTree,$this->Result);
            $this->dTitle='Редактирование категории';
            $this->layout='admin';
            $view = "/categories/edit/edit";
            $value = ['category'=>$category,'catTree'=>$catTree,];
            return $this->render($view,$value);
        }


    }




}

?>