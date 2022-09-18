<?php

namespace app\modules\administrator\models;

use Yii;
use yii\base\Model;
/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class ModuleMenu extends Model
{

    public static function getModuleMenu($group_id){
        $params = [':group_id' =>$group_id];
        $result = Yii::$app->db->createCommand('SELECT modules.*, rules.edit, rules.read FROM {{%modules}} AS modules JOIN {{%modules_rules}} AS rules
            ON modules.id=rules.moduleId WHERE rules.edit=:group_id OR rules.read=:group_id AND modules.type="admin" ORDER BY ordering', $params)->queryAll();
        return $result;
    }


}
