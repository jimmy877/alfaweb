<?php
namespace app\modules\administrator\exceptions;


use Exception;
use Throwable;
use Yii;
use yii\base\Model;
use yii\web\Cookie;
use yii\web\Controller;

class fieldsPrototypeExceptions extends Exception
{
    protected $message = "Ошибка, это не ID поля";
    protected $typeError;

    public function __construct($typeError = null, $message = null)
    {
        $this->typeError = $typeError;
        $this->message = $message;
    }

    public function customMessage()
    {
        Yii::$app->response->cookies->add(new Cookie(["name"=>"saveField", "value"=>"Ошибка, указано неверное id поля", "expire"=>time() + 6]) );
        Yii::$app->response->redirect('/administrator/fields');

    }

    public function typeErrors()
    {
        if($this->typeError == "emptyFields")
        {
            Yii::$app->response->cookies->add(new Cookie(["name"=>"saveField", "value"=>$this->message, "expire"=>time() + 6]) );
            Yii::$app->response->redirect('/administrator/fields');
        }
    }

}