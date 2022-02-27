<?php

/**
 * @author anton
 * @copyright 2016
 */

namespace app\libraries;


trait siteLibrary
{
    public $Result;
    public function translit($text){
        $converter = array(
            'а' => 'a',   'б' => 'b',   'в' => 'v',
            'г' => 'g',   'д' => 'd',   'е' => 'e',
            'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
            'и' => 'i',   'й' => 'y',   'к' => 'k',
            'л' => 'l',   'м' => 'm',   'н' => 'n',
            'о' => 'o',   'п' => 'p',   'р' => 'r',
            'с' => 's',   'т' => 't',   'у' => 'u',
            'ф' => 'f',   'х' => 'h',   'ц' => 'c',
            'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
            'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
            'э' => 'e',   'ю' => 'yu',  'я' => 'ya',

            'А' => 'A',   'Б' => 'B',   'В' => 'V',
            'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
            'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
            'И' => 'I',   'Й' => 'Y',   'К' => 'K',
            'Л' => 'L',   'М' => 'M',   'Н' => 'N',
            'О' => 'O',   'П' => 'P',   'Р' => 'R',
            'С' => 'S',   'Т' => 'T',   'У' => 'U',
            'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
            'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
            'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
            'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
        );
        return strtr($text, $converter);
    }

    # Строим дерево, общая функция для построения дерева каталога. Надо обязательно передать при запуске единицу
    # Принимает значение самой корнивой категории(1), весь доступный список категорий и результат, который подставляется в течении
    # выполнения скрипта. По умолчанию просто вставляем пустой массив
    public function CategoryBuildTree($id, $arrayTree,$Result){
        $arrayTree = (array)$arrayTree;
        foreach($arrayTree as $item){
            if($item->parent_id==$id){
                for($i=0;$i<$item->level;$i++){
                    $level .= '- ';
                }
                $this->Result[] =['name'=>$level.$item->title, 'id'=>$item->id, 'parent_id'=>$item->parent_id, 'baseID'=>$item->base_id, 'level'=>$item->level];
                $level=null;
                $this->CategoryBuildTree($item->id,$arrayTree, $this->Result);
            }
        }
        return $this->Result;
    }

    public static function testDataArray($data = null){
        $fields = array_map(function($var){
            return htmlspecialchars($var, ENT_QUOTES, 'utf-8');
        }, $data);
        $fields = array_map(function($var){
            return strip_tags($var);
        }, $data);

        return $fields;
    }

}

?>