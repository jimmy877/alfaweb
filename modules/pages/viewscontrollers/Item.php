<?php

/**
 * @author anton
 * @copyright 2016
 */

namespace app\modules\pages\viewscontrollers;

use yii\web\Controller;
use Yii;
use yii\base\Model;

class Item extends Controller{

    public function ItemCatalog($url=null, $routResult=null){
        $post = Yii::$app->db->createCommand('SELECT * FROM {{%categories}}  WHERE id=:id')
           ->bindValue(':id', 1)
           ->queryOne();
        return [
            'view' => '/index/about',
            "data" => [
                'a'=>$url,
                'routResult'=>$routResult,
            ]
        ];

    }
}

?>