<?php

/**
 * @author anton
 * @copyright 2016
 */

namespace app\modules\pages\controllers;

use yii\web\Controller;
use app\modules\pages\viewscontrollers\ListItems;
use app\modules\pages\pageRouter;
class IndexController extends Controller
{
   
    function actionIndex(){

    }
    function actionMain($url=null,$test=null){

       //отлавливаю наличие слешка в конце, если нет подставляю его и выполняю скрипт дальше
        $slesh = substr($url, -1);
        if($slesh!='/' and strlen($url)>1){
            $this->redirect('/'.$url.'/');
        }

        $router = new pageRouter($url, $config=null);
        $routResult = $router->buildUrl($url);
        $config = $routResult;
       /* echo "<pre>";
        print_r( $routResult);
        exit();*/
        $a = new ListItems($url,$config);
        $result = $a->ListCatalog($url, $routResult);
        $this->layout = $result['layout'];
        return $this->render($result['view'],$result['data']);
    }
}

?>