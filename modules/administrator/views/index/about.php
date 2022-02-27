<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

?>


<script src="/web/css/less.js" type="text/javascript"></script>
<div class="site-about">

    <p>
        This is the About page. You may modify the following file to customize its content:
        <br/>fdfdfdf
    </p>
    <?print_r($routResult['url']);?>
    <p><?=$routResult['page'];?></p>
    <code><?= __FILE__ ?></code>
    <p><?=$_GET['test']?></p>
    <p><?=$one?></p>

    <form action="/index" method="post">
        <input type="text" name="username">
        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken()?>">
        <input type="submit" value="Send">

    </form>
    <?if(isset($mess)):?>
        <?foreach ($mess as $i):?>
            <p><?=$i?></p>
        <?endforeach;?>
    <?endif?>






</div>
