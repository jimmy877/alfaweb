<?php
/**
 * Created by PhpStorm.
 * User: antonglotov
 * Date: 15/04/2020
 * Time: 21:05
 */

namespace app\modules\administrator\models;

use Yii;
use yii\base\Model;
use app\libraries\siteLibrary;
use app\modules\administrator\models\active\Fields_prototype_db;
use app\modules\administrator\exceptions\fieldsPrototypeExceptions;

class Fields extends Model
{
    use siteLibrary;


    public static function saveFieldPrototype($fields){

        //$groupName = $fields["group"]; // убрал из таблицы id группы теперь записываем сразу имя
        $name = $fields["name"];
        $alias = $fields["alias"];
        $type = $fields["type"];
        (int)$catID = (int)$fields["category"];
        $params = $fields["params"];

        if($type == "null" or $type == null){
            throw new fieldsPrototypeExceptions("emptyFields", "Тип поля не указан, сохранение поля не возможно");
            /* return ["result" => false, "message"=>"Тип поля не указан, сохранение поля не возможно" ];
            die();*/
        }
        if ( in_array($type, ["text", "textarea", "checkbox"]) ) {
            if($name == "" || $alias == '' || $name == null || $alias == null){
                throw new fieldsPrototypeExceptions("emptyFields", "ошибка поля Имя или путь пустые");
            }
        }

        if ( in_array($type,["select"]) ) {
                if($name == "" || $name == null || $alias == '' || $name == null || $params == "" || $params == null ){
                    throw new fieldsPrototypeExceptions("emptyFields", "Ошибка поля: «Имя« или «Путь» или «Параметры» пустые");
                }
        }

        if (in_array($type,[ "checkboxGroup", "radiobutton"])){
            if( $fields["chekList"] == null || $fields["chekList"] == ""){
                throw new fieldsPrototypeExceptions("emptyFields", "Ошибка поля «Имя» или «путь» или «список чекбоксов» пустой");
            }
            $params = $fields["chekList"];
        }

        if(isset($fields["required"]) and $fields["required"] !=""){
            $required = "yes";
        }else{
            $required = "no";
        }

        $query = "SELECT params FROM {{%field_prototype}} WHERE id = :id ";
        $result = Yii::$app->db->createCommand($query, [":id"=>$catID])->queryOne();

        $fieldArr = json_decode($result["params"],JSON_UNESCAPED_UNICODE);

        /**
         * Вытаскиваем сумму созданных id полей и делаем новый id
         * и инкремированием вытащенного значения формируем новый уникальный id к создаваемому полю
        */
        $FIDcount = self::getFIDcount();
        $FID = $FIDcount[FID]+1;

        /**
         * Проверяем alias на уникальность
         * При этом alias со значенем FID зарезервирован и удаляться не может
         */
        $alias = self::translit($alias);
        $alias = str_replace([" ","_"], "-", $alias);
        $alias = self::testAlias($alias);

        $fieldPrototype =  ["id_".$FID => [
                "name" => $name,
                "alias" => $alias,
                "type" => $type,
                "params" => $params,
                "required" => $required
            ]
        ];

        $fieldArr += $fieldPrototype;

        self::setFIDcount($FID); /** обновляем счетчик Field id */
        self::setFieldAlias($alias); /** добавляем Field alias */

        /**
         * Закомментировал конвертацию в json по причиние того, что сам YII делает это при
         * сохранении записи через activeRecord.
         */

        //$fieldArr = json_encode($fieldArr, JSON_UNESCAPED_UNICODE);
        $query = Fields_prototype_db::findOne($catID);
        $query->params = $fieldArr;
        $result = $query->save();

        if($result){
            return ["result" => true, "message"=>"поле обновлено"];
        }else{
            return ["result" => false, "message"=>"ошибка при добавлении"];
        }

       //собрать запрос и сохранить. При сохранении где было название поля по сути будет теперь название группы ID группы
        //бессмыслено. Нужно теперь сделать при сохранении проверку на сущестоввания поля и потом или сохранить или обновить.
        // надо решить еще вопрос привязки поля к другой группе. Добавить id к полю
        //если result false то добавление, иначе обновление


        //$query = "INSERT INTO {{%field_prototype}} (groupID, name, alias, type, catID, params) VALUES ";
        /*$result = Yii::$app->db->createCommand()->insert("{{%field_prototype}}",
            [
                //"groupID"=>$groupName,
                "name"=>$name,
                "alias"=>$alias,
                "type"=>$type,
                "catID"=>$catID,
                "params"=>$params

            ]
        )->execute();*/

        //$result = Yii::$app->db->createCommand('SELECT * FROM {{%categories}} WHERE extension=:test',["test"=>"com_content"])->queryAll();

    } // end of the function

    public static function updateFieldPrototype($fields, $FID){

        $FID = htmlspecialchars($FID);
        $FID = strip_tags ($FID);

        /** Проверка данных, так как будем использовать id в запросе SQL то нужно быть уверенным,
         * что данные там правильные, без подвоха
         */

        /** Функцией очищаем пробелы во всем массиве*/
        $fields = array_map('trim', $fields);

        if(preg_match('/id/', $FID) == false){
            throw new fieldsPrototypeExceptions();
        }

        if(preg_match('/id/', $FID) == true){

            if($fields['alias'] != $fields['currentAlias']){
                $fields['alias'] =  self::testAlias($fields['alias']);
                self::setFieldAlias($fields['alias']); /** добавляем Field alias */
            }


            $query = "  UPDATE {{%field_prototype}} 
                        SET params = JSON_SET(params, 
                                              :name,:nameValue, 
                                              :type,:typeValue, 
                                              :alias,:aliasValue,
                                              :params,:paramsValue,
                                              :required,:requiredValue
                                              ) 
                        WHERE id=:category ";
            $result = Yii::$app->db->createCommand($query,
                [
                    "name" => "$.{$FID}.name",
                    "nameValue"=>"{$fields['name']}" ,
                    "type"=>"$.{$FID}.type",
                    "typeValue" =>"{$fields['type']}",
                    "alias"=>"$.{$FID}.alias",
                    "aliasValue" =>"{$fields['alias']}",
                    "category" =>"{$fields['category']}",
                    "params"=>"$.{$FID}.params",
                    "paramsValue" =>"{$fields['chekList']}",
                    "required"=>"$.{$FID}.required",
                    "requiredValue" =>"{$fields['required']}",
                ]
            )->query();
        }
        return ["result" => true, "message"=>"поле обновлено"]; /** Нужно дописать проверки на пустоту */

    }

    public static function deleteFieldPrototype(){

    }

    public static function saveFieldValue(){

    }

    public static function updateFieldValue(){

    }
    public static function getFieldGroup($id = null, $limit = null){

        $query = "SELECT * FROM {{%field_prototype}}";
        $params =[];

        if($id != null){
           $query = $query." WHERE id=:id";
           $params =["id"=>(int)$id];
        }

        if (isset($limit) and $limit != null){
            $query = $query." Limit ".$limit;
            $count = explode(",",$limit);
            $page = Yii::$app->db->createCommand("SELECT COUNT(*) FROM {{%field_prototype}}")->queryAll();
            $pages = (int)$page[0]["COUNT(*)"]/(int)$count[1];
            $result['pages'] =  ceil($pages);
        }

        $result['groups'] = Yii::$app->db->createCommand($query,$params)->queryAll();


        return $result;
    }

    public static function getFieldPrototype($settings = []){
        //нужен массив параметров

        $query = "SELECT params FROM {{%field_prototype}}";
        $params =[];
        if($settings['FID'] != null){
            $query = "SELECT params->:FID AS params FROM {{%field_prototype}}";
            $params +=["FID"=>'$.'.$settings['FID']];
        }

        if($settings['id'] != null){
            $query = $query." WHERE id=:id";
            $params +=["id"=>(int)$settings['id']];
        }
        //die($query);
        $result = Yii::$app->db->createCommand($query,$params)->queryAll();
        $result = json_decode($result[0]['params'], true);


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
    public static function getFIDcount(){
        $query = "SELECT FID from {{%field_aliases}} WHERE id=1";
        $result = Yii::$app->db->createCommand($query)->queryOne();
        return $result;
    }
    public static function setFIDcount($fid){
        $query = "UPDATE {{%field_aliases}} SET FID=:fid  WHERE id=1";
        $result = Yii::$app->db->createCommand($query,['fid'=>$fid])->query();
        return $result;
    }
    public static function setFieldAlias($alias){
        $query = "INSERT INTO {{%field_aliases}} (alias) VALUES (:alias)  ";
        $result = Yii::$app->db->createCommand($query,['alias'=>$alias])->query();
        return $result;
    }
    public static function testJson(){
        //$query = "SELECT * FROM {{%categories}} WHERE JSON_CONTAINS (fields,JSON_OBJECT('about',JSON_OBJECT('age',32) ))";
        /*$query = "SELECT title, fields, JSON_PRETTY(fields->'$.features') as lastname FROM {{%categories}} WHERE JSON_SEARCH(fields->'$.features', 'all', 'little') IS NOT NULL
                  AND fields ->'$.name'='ilza' ";*/
        //$query = "SELECT title, fields, JSON_PRETTY(fields -> '$.features') as lastname FROM {{%categories}} WHERE fields -> '$.features' LIKE '%little%' AND fields -> '$.features' LIKE '%stupid%' ";
        //$query = "UPDATE {{%categories}} SET fields = JSON_SET(fields, '$.features','eee')  WHERE fields -> '$.features' LIKE '%little%' ";
        //$query = "SELECT title, fields FROM {{%categories}} WHERE fields->:alias = 'Nokia' AND (fields->'$.color.value' LIKE '%синий%' OR  fields->'$.color.value' LIKE '%Красный%') ";
        $query = "SELECT params,  JSON_SEARCH(params, 'one', 'uniqe', null) as sera FROM {{%field_prototype}}";
        //$query = "SELECT JSON_EXTRACT(params, '$[0][2]') as res FROM {{%field_prototype}} WHERE params->'$.*.alias' LIKE '%alias-2%'";
        $result = Yii::$app->db->createCommand($query, [ ':alias'=>'$.model.value' ] )->queryAll();
        return $result;
    }
    public static function testUpdateAlias(){ //замена всех ключей(алиасов) в полях по всей таблице
        $query = "UPDATE {{%categories}} SET fields = REPLACE(fields, 'cvet', 'color') ";
        $result = Yii::$app->db->createCommand($query)->queryAll();
        return $result;
    }
}

