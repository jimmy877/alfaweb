<?php

namespace app\modules\user\models;

use Yii;
use yii\base\Model;
use app\modules\user\models\Users_db;
/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class Users extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;

    public function ModelTest(){
        return $this->username;
    }
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */

    public static function getUserByMail($mail){
        $params = [':email' =>$mail];
        $result = Yii::$app->db->createCommand('SELECT user_t.*, (TO_DAYS(CURDATE())-TO_DAYS(user_t.registerDate)) as sinceRegister, user_map.group_id FROM {{%users}} AS user_t JOIN {{%user_usergroup_map}} AS user_map
            ON user_t.id=user_map.user_id WHERE user_t.email=:email', $params)->queryOne();
        $result = json_encode($result);
        return $result;

    }
    public static function getUserById($id){
        $params = [':id' =>$id];
        $result = Yii::$app->db->createCommand('SELECT user_t.*, (TO_DAYS(CURDATE())-TO_DAYS(user_t.registerDate)) as sinceRegister, user_map.group_id FROM {{%users}} AS user_t JOIN {{%user_usergroup_map}} AS user_map
            ON user_t.id=user_map.user_id WHERE user_t.id=:id', $params)->queryOne();
        $result = json_encode($result);
        return $result;
    }

    public static function getUserByUsername($username){
        $params = [':username' =>$username];
        $result = Yii::$app->db->createCommand('SELECT user_t.*, (TO_DAYS(CURDATE())-TO_DAYS(user_t.registerDate)) as sinceRegister, user_map.group_id FROM {{%users}} AS user_t JOIN {{%user_usergroup_map}} AS user_map
            ON user_t.id=user_map.user_id WHERE user_t.username=:username', $params)->queryOne();
        $result = json_encode($result);
        return $result;
    }

    public static function setSessionId($user_id,$session_id){
        $params = [':user_id' =>$user_id, ':session_id'=>$session_id];
        $result = Yii::$app->db->createCommand('UPDATE {{%users}} SET autorisation_id=:session_id WHERE id=:user_id',$params)->execute();
        return $result;
    }


    public  static function getAllUsers(){
        $result = Yii::$app->db->createCommand('SELECT * FROM {{%users}}','')->queryAll();
        return $result;
    }


    /*------------------------- Обновление пользователя --------------------------*/
    public static function userUpdate($params, $whereId){
        $params = (object)$params;

        if($whereId==null){
            return 'You miss userId or userName';
        }
        if(gettype($whereId)=='integer'){
            $query = Users_db::findOne(['id'=>$whereId]);
            if($query==null){
                return 'Invalid userId';
            }
        }
        if(gettype($whereId)=='string'){
            $query = Users_db::findOne(['username'=>$whereId]);
            if($query==null){
                return 'Invalid userName';
            }
        }
        if($params->username !=null){
            $testUser = Yii::$app->db->createCommand('SELECT id FROM {{%users}} WHERE username=:name',[':name'=>$params->username])->queryAll();
            if ($testUser!=null){
                return 'This username is occupired, try any else';
            }
            $query->username = $params->username;
        }

        if($params->email !=null){
            $testUser = Yii::$app->db->createCommand('SELECT id FROM {{%users}} WHERE email=:email',[':email'=>$params->email])->queryAll();
            if ($testUser!=null){
                return 'This email is occupired, try any else';
            }
            $query->email = $params->email;
        }
        if($params->password !=null){
            $query->password = md5($params->password.'_alfaweb');
        }

        if($params->block !=null){
            $query->block = $params->block;
        }

        if($params->sendEmail !=null){
            $query->sendEmail = $params->sendEmail;
        }

        if($params->registerDate !=null){
            $query->registerDate = $params->registerDate;
        }

        if($params->lastvisitDate !=null){
            $query->lastvisitDate = $params->lastvisitDate;
        }

        if($params->activation !=null){
            $query->activation = $params->activation;
        }

        if($params->params !=null){
            $query->params = $params->params;
        }

        if($params->autorisation_id !=null){
            $query->autorisation_id = $params->autorisation_id;
        }

        $query->save();
        return 'User has been updated';
    }
    /*------------------------- //Обновление пользователя --------------------------*/


    /*------------------------- Добавление пользователя --------------------------*/
    public static function setUser($params){
        $params = (object)$params;

       $query = new Users_db();
        if($params->username !=null){
            $testUser = Yii::$app->db->createCommand('SELECT id FROM {{%users}} WHERE username=:name',[':name'=>$params->username])->queryAll();
            if ($testUser!=null){
                return 'This username is occupired, try any else';
            }
            $query->username = $params->username;
        }

        if($params->email !=null){
            $testUser = Yii::$app->db->createCommand('SELECT id FROM {{%users}} WHERE email=:email',[':email'=>$params->email])->queryAll();
            if ($testUser!=null){
                return 'This email is occupired, try any else';
            }
            $query->email = $params->email;
        }
        if($params->password !=null){
            $query->password = md5($params->password.'_alfaweb');
        }

        if($params->block !=null){
            $query->block = $params->block;
        }

        if($params->sendEmail !=null){
            $query->sendEmail = $params->sendEmail;
        }

        if($params->registerDate !=null){
            $query->registerDate = $params->registerDate;
        }

        if($params->lastvisitDate !=null){
            $query->lastvisitDate = $params->lastvisitDate;
        }

        if($params->activation !=null){
            $query->activation = $params->activation;
        }

        if($params->params !=null){
            $query->params = $params->params;
        }

        if($params->autorisation_id !=null){
            $query->autorisation_id = $params->autorisation_id;
        }

        $query->save();
        return 'User has been saved';
    }
    /*------------------------- //Добавление пользователя --------------------------*/

    public static function testRule($module_id,$group_id){
        $testRule = Yii::$app->db->createCommand('SELECT rule.id FROM {{%modules}} AS module JOIN {{%modules_rules}} AS rule
                    ON rule.moduleId = module.id WHERE module.module_id=:module_id AND rule.read=:group_id',
                    [':module_id'=>$module_id, ':group_id'=>$group_id])->queryOne();
        return $testRule;
    }
    public static function testM($v=null){
        return "work";
    }
}
