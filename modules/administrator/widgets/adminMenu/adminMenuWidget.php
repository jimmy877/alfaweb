<?php

/**
 * @author anton
 * @copyright 2016
 */

namespace app\modules\administrator\widgets\adminMenu;

use yii\base\Widget;
use yii\helpers\Html;
use app\modules\administrator\models\ModuleMenu;

class AdminMenuWidget extends Widget
{
    public $group_id;

    public function init()
    {
        parent::init();
        if ($this->group_id === null) {
            $this->group_id =0;
        }
    }

    public function run()
    {
        if($this->group_id==0){
            return $this->render('error');
        }
        $items = ModuleMenu::getModuleMenu($this->group_id);
        return $this->render('items',['items'=>$items]);
    }
}

?>