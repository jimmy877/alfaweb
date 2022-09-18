<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

?>
<link rel="stylesheet/less" type="text/css" href="/web/css/style.less">

<script src="/web/css/less.js" type="text/javascript"></script>
<div class="site-about">
ddd
    <p>
        This is the About page. You may modify the following file to customize its content:
        <br/>fdfdfdf
    </p>
    <?print_r($routResult['url']);?>
    <p><?=$routResult['page'];?></p>
    <code><?= __FILE__ ?></code>
    <p><?=$_GET['test']?></p>
    <p><?=$a?></p>
    <?$rest = substr($a, -1);
    if($rest!='/'):?>
        <p>Слеша нет</p>
    <?endif;?>
    <form action="/index" method="post">
        <input type="text" name="username">
        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken()?>">
        <input type="submit" value="Send">

    </form>

    <pre>
        <?
            $pattern = '/\[(.+?)\]/';
            preg_match_all($pattern, "вот [совпадение] работает ", $matches);

            print_r($matches);

            print_r(explode('[','Разнообразие блюд [Меню на заказ][/menu]'));
        ?>
    </pre>
</div>
