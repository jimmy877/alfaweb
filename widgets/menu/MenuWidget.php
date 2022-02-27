<?php
namespace app\widgets\menu;

use yii\base\Widget;
use yii\helpers\Html;
use app\models\Testform;

class MenuWidget extends Widget{

    public $hello;

    public function init(){
        parent::init();
        if($this->hello==null){
            $this->hello = 'Hello World';
        }

    }
    public function run(){
        return $this->hello;
    }
}