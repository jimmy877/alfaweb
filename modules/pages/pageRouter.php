<?php

/**
 * @author jimmy877
 * @copyright 2016
 */


namespace app\modules\pages;
use yii\web\Controller;
use Yii;
use yii\base\Model;
use app\modules\pages\models\Main;
class pageRouter extends Controller
{
    public function getUrl($url)
    {
        $defaultUrl = $url;

        $url = trim($url,'/');
        $url = explode('page',$url);
        /*Если есть постраничная навигация то ломаем урл через Page*/
        $page = trim($url[1],'/');
        //var_dump($url);exit();
        $url[0] = trim($url[0],'/');
        $url = explode('/',$url[0]);

        /*
         * Чистим переменные от слешев и превращаем в массив далее вытаскиваю заверервированное слово Page которое служит для постраничной
         * навигации и будем его использовать отдельно
        */


        $result = [
            'url'=>$url,
            'page'=>$page,
            'defaultUrl' => $defaultUrl,
        ];
        return $result;

    }

    public function buildUrl($url){

        /*Подключаем BD*/
        //$model = new Main();


        $links = (object)$this->getUrl($url);
        $url = $links->url;
        $count = count($url);
        if($count==1 and $url[0]==null){
            if(!Main::testMain()){
                $view = 'ListItems';
            }else{
                $view = 'Item';
            }
        }
        if($count==1 and $url[0]!=null){
            $view='item'; //ВРЕМЕННОЕ РЕШЕИЕ, ЛОГИКИ НЕ НАПИСАНО
        }
        $links->view = $view;
        return (array)$links;
    }

}


?>