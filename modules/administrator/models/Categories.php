<?php

namespace app\modules\administrator\models;

use Yii;
use yii\base\Model;
use app\modules\administrator\models\active\Fields_db;
use app\modules\administrator\models\active\Categories_db;


class Categories extends Model
{

    /**
     * Update or create new Categories
     *
     * @return info about new Categories
     */

    # Добавление новой категории ---------------------------------------------------
    public static function addCategory($level,$category=[], $fields=[]){
        $category = (object)$category;

       # Если значений по выводу меньше изначального, значит есть повторы.
       $testFields = array_count_values($fields['cAlias']);

        # Зависываем название повторяемых значений
        foreach($testFields as $k=>$v){
            if($v>1){
                $dublies[] = $k;
            }
        }

        # Если есть записанный массив значений, то возвращаем его в формате json для вывода ошибики js на полях
        if($dublies != null){
            return json_encode($dublies);
        }

        # Вызываем специальную функцию на проверку существования алиаса в базе на указанном уровне вложенности
        $testAlias = self::testUrl($category->alias,$level);
        if($testAlias == true){
            return 'Указанный alias уже существует. Пропишите другой.';
        }
        if($category->alias==null){
            return 'Не указан alias';
        }
        $Categories = new Categories_db();
        $Categories->title = $category->title;
        $Categories->alias = $category->alias;
        $Categories->path = $category->path;
        $Categories->level = $level;
        $Categories->parent_id = $category->parentId;
        $Categories->save();
        $cat_id = $Categories->id;



        //$params = [':main' =>1];
        //$post = Yii::$app->db->createCommand('SELECT * FROM {{%content}} WHERE main=:main', $params)->queryOne();

        # Если поля существуют в массиве, то начинаем их добавлять
        if ($fields !=null){
            $count = 0;
            foreach($fields['cName'] as $field){
                $fields['cName'][$count];

                # Проверяем уникальность алиаса поля до полной проверки
                $testFieldAlias = self::testFieldAlias($fields['cAlias'][$count], $cat_id);

                $Fields = new Fields_db();
                $Fields->name = $fields['cName'][$count];
                $Fields->alias = $testFieldAlias;
                /*$Fields->cat_id = $cat_id;
                $Fields->type = $fields['cType'][$count];
                $Fields->value = $fields['cValue'][$count];
                $Fields->filter = $fields['cFilter'][$count];
                $Fields->filter_type = $fields['cFilterType'][$count];
                $Fields->activate = $fields['cActivate'][$count];*/
                $Fields->save();

                $count++;
            }
        }

    }

    # Тестирование алиаса при создании новой категории ---------------------------------------------------
    public static function testUrl($catAlias,$catLevel){

        $params = [':alias'=>$catAlias, ':level'=>$catLevel];
        $test = Yii::$app->db->createCommand('SELECT id FROM {{%categories}} WHERE alias=:alias AND level=:level',$params)->queryAll();
        if ($test != null){
            return true;
        }else{
            return false;
        }

    }

    # Тестирование алиаса категории при ее обновлении, нюанс с обновлением алиаса ---------------------------------------------------
    public static function testUpdateUrl($catAlias,$catLevel,$catId){

        $params = [':alias'=>$catAlias, ':level'=>$catLevel, ':catId'=>$catId];
        $test = Yii::$app->db->createCommand('SELECT title FROM {{%categories}} WHERE alias=:alias AND level=:level AND id!=:catId',$params)->queryAll();
        if ($test != null){
            return true;
        }else{
            return false;
        }

    }

    # Тестирование альасов доп полей ---------------------------------------------------
    public static function testFieldAlias($cAlias,$cat_id){
        $params = [':alias'=>$cAlias, ':cat_id'=>$cat_id];
        $test = Yii::$app->db->createCommand('SELECT id FROM {{%fields_settings}} WHERE alias=:alias AND cat_id=:cat_id',$params)->queryAll();
        if ($test != null){
            $lastId = Yii::$app->db->createCommand('SELECT max(id) as lastId FROM {{%fields_settings}}')->queryOne();
            $uniqueId = $lastId['lastId']+1;
            $cAlias2 = $cAlias.'-'.$uniqueId;
            return self::testFieldAlias($cAlias2,$cat_id);
        }else{
            return $cAlias;
        }
    }

    # Обновление категории ---------------------------------------------------
    public static function updateCategory($level,$category=[], $fields=[]){
        $category = (object)$category;

        # Если значений по выводу меньше изначального, значит есть повторы.
        $testFields = array_count_values($fields['cAlias']);

        # Зависываем название повторяемых значений
        foreach($testFields as $k=>$v){
            if($v>1){
                $dublies[] = $k;
            }
        }

        # Если есть записанный массив значений, то возвращаем его в формате json для вывода ошибики js на полях
        if($dublies != null){
            return json_encode($dublies);
        }

        # Вызываем специальную функцию на проверку существования алиаса в базе на указанном уровне вложенности
        # Нюанс: тут если запись на уровне вложенности существует только у одновляемой категории, то тогда запись проходит
        $testAlias = self::testUpdateUrl($category->alias,$level, $category->id);
        if($testAlias == true){
            return 'Указанный alias уже существует. Пропишите другой.';
        }
        if($category->alias==null){
            return 'Не указан alias';
        }

        # Всегда пересоздаем path категории, на случай если ее алиас изменится
        $newPath = explode('/',$category->path);
        if(count($newPath)>1){
            array_pop($newPath);
            $newPath = implode('/',$newPath);
            $newPath = trim($newPath,'/');
            $newPath = $newPath.'/'.$category->alias;
        }else{
            $newPath = $category->alias;
        }

        # Записываем обновление в базу
        $Categories = Categories_db::findOne(['id'=>$category->id]);
        if($Categories->alias == $category->alias){
            $updatePath = true;
        }else{
            $updatePath = false;
        }

        $Categories->title = $category->title;
        $Categories->alias = $category->alias;
        $Categories->path = $newPath;
        $Categories->level = $level;
        $Categories->parent_id = $category->parentId;
        $Categories->save();

        # Вызываем рекурсивную функцию для обновления path вложенных категорий, для этого пере даем id и newPath текущей категории
        if($updatePath == true){
            self::updateAlias($category->id,$newPath);
        }
    }

    # Рекурсивная функция обновления path вложенных категорий
    public static function updateAlias($parent_id,$parent_path){
        $query = Yii::$app->db->createCommand('SELECT * FROM {{%categories}} WHERE parent_id=:parentId',['parentId'=>$parent_id])->queryAll();
        if ($query != null){
            foreach ($query as $i){
                $update = Categories_db::findOne(['id'=>$i['id']]);
                $update->path = $parent_path.'/'.$i['alias'];
                $update->save();
                self::updateAlias($i['id'],$parent_path.'/'.$i['alias']);
            }
        }else{
            return true;
        }

    }

    # Обновление поля в таблице, обозначающее наличие подкатегорий
    public static function catKids($id){
        $Category = Categories_db::findAll(['parent_id'=>$id]);
        if(count($Category)>0){
            $updateKids = Categories_db::findOne(['id'=>$id]);
            $updateKids->webix_kids=1;
            $updateKids->save();
        }else{
            $updateKids = Categories_db::findOne(['id'=>$id]);
            $updateKids->webix_kids=0;
            $updateKids->save();
        }
    }

    # Вывод категорий
    public static function categoryList($parentId =1){
        $query = Yii::$app->db->createCommand('SELECT * FROM {{%categories}} WHERE parent_id = :parentId AND
                                                extension = "com_content" AND path != "uncategorised" ',['parentId'=>$parentId])->queryAll();
        return json_encode($query);

    }
    public static function categoryAllList(){
        $query = Yii::$app->db->createCommand('SELECT * FROM {{%categories}} WHERE
                                                extension = "com_content" AND path != "uncategorised" AND published != "-1" ')->queryAll();
        return json_encode($query);

    }

    # Поиск по названию категории
    public static function categoryNameSearch($title=null){
        $query = Yii::$app->db->createCommand('SELECT * FROM {{%categories}} WHERE title like :patern AND
                                                extension = "com_content" AND path != "uncategorised" ',['patern'=>$title])->queryAll();
        return json_encode($query);
    }

    # Вывод одной категории
    public static function categoryOne($Id =1){
        $query = Yii::$app->db->createCommand('SELECT * FROM {{%categories}} WHERE id = :Id AND
                                                extension = "com_content" AND path != "uncategorised" ',['Id'=>$Id])->queryOne();
        return json_encode($query);
    }

}
