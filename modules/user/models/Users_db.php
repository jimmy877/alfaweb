<?php

namespace app\modules\user\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */

use yii\db\ActiveRecord;

class Users_db extends ActiveRecord
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    /**
     * @return string the name of the table associated with this ActiveRecord class.
     */
    public static function tableName()
    {
        return 'b5fcx_users';
    }
}