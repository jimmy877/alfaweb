<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 15.10.2018
 * Time: 21:42
 */
namespace app\modules\administrator\models;

use Yii;
use yii\base\Model;

class Form extends Model
{
    public $username;
    public $name;
    public $dropdown;
    public $agree;
    public $message;

    public function rules()
    {
        return [
            // тут определяются правила валидации
            [['name'], 'required', 'message' => 'Заполни поле пароль'],
            ['username','test'],
            [['agree'],'required','message'=>'не отметили']
        ];
    }

    public function test(){

        if (!$this->username or $this->username==null) {
            $this->addError('username', 'Неправильное имя пользователя или пароль.');
        }else{
            $this->message='работает';
            return true;
        }
    }

    public function work($data=null){


    }


}
