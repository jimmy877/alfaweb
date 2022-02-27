<?php
/**
 * Created by PhpStorm.
 * User: antonglotov
 * Date: 08.11.2020
 * Time: 17:57
 */

function actionIndex(){ ///сохранил код, не важен, потом можно удалить. Это к полям
    $this->construct();
    $this->layout='admin';
    $cookies = Yii::$app->request->cookies;
    $model = [];
    $itemLimit = 20;          // количество записей на странице
    $limit = "0,".$itemLimit; //первоначальное показание страниц, меняемое кодом ниже
    $fieldGroupID = "";     //Задали значение по умолчанию

    if(isset($cookies['saveField']) ){
        $model = ["message"=>"Поле добавлено успешно"];
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

    $result = Fields::getFieldPrototype(["fieldGroupID"=>$fieldGroupID],$limit);
    $groups = Fields::getFieldGroup();
    $model +=[
        "fields" =>$result["fields"],
        "pages" => $result["pages"],
        "fieldGroups" =>$groups,
        "selectedGroupID" => $fieldGroupID
    ];


    return $this->render("/fields/group",$model);

}


public static function getFieldPrototype($settings = [], $limit=null){
    //нужен массив параметров

    $query = "SELECT * FROM {{%field_prototype}}";
    $search = [];
    //$params = ["fieldID" => $settings['fieldID'], "fieldGroupID"=> $settings['fieldGroupID'], "fieldCatID"=>$settings['fieldCatID'] ];

    if($settings["fieldID"] != null || $settings["fieldID"] != ""){
        $search[] = ">id=:fieldID";
        $params["fieldID"] = $settings['fieldID'];
    }else{
        unset($settings["fieldID"]);
    }

    if($settings['fieldGroupID'] != null || $settings['fieldGroupID'] != ""){
        $search[] = ">groupID=:fieldGroupID";
        $params["fieldGroupID"] = $settings['fieldGroupID'];
    }else{
        unset($settings['fieldGroupID']);
    }

    if($settings['fieldCatID'] != null || $settings['fieldCatID'] != ""){
        $search[] = ">catID=:fieldCatID";
        $params["fieldCatID"] = ['fieldCatID'];
    }else{
        unset($settings['fieldCatID']);
    }


    if(count($settings)>0){
        $query = $query." WHERE";
        $count = 0;
        foreach ($search as $i){
            $count++;
            if($count==1){
                $i = str_replace(">"," ",$i);
            }else{
                $i = str_replace(">"," AND ",$i);
            }
            $query = $query.$i;
        }
    }

    if (isset($limit) and $limit != null){
        $query = $query." Limit ".$limit;
        $count = explode(",",$limit);
        $page = Yii::$app->db->createCommand("SELECT COUNT(*) FROM {{%field_prototype}}")->queryAll();
        $pages = (int)$page[0]["COUNT(*)"]/(int)$count[1];
        $result['pages'] =  ceil($pages);
    }

    $result["fields"] = Yii::$app->db->createCommand($query,$params)->queryAll();
    return $result;

}

public static  function testAlias($alias){
    $query = "SELECT id FROM {{%field_aliases}} WHERE alias=:alias ";
    $result = Yii::$app->db->createCommand($query,["alias"=>$alias])->queryAll();
    if($result){
        $alias = $alias."-1";
        return self::testAlias($alias);
    }else{
        return $alias;
    }

}