<?php

namespace app\modules\administrator\models;

use Yii;
use yii\base\Model;
use app\modules\administrator\models\active\Pages_db;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class Pages extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;


    public static function getList(){
       $list = new Pages_db();
       $result = $list->find()->where(['id'=>1])->all();

        // $post = Yii::$app->db->createCommand('SELECT * FROM {{%content}} WHERE main=:main', $params)->queryOne();
        return $result;
    }
}
