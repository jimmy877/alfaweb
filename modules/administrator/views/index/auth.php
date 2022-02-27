<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

?>


<script src="/web/css/less.js" type="text/javascript"></script>
<div class="site-about auth">
    <div> <?=$errorMessage?></div>
    <div class="auth-form">
        <form action="/administrator/index/auth" method="post" class="auth-form__form">
            <label class="auth-form__labels">Логин или e-mail</label>
            <input type="text" class="auth-form__login" name="login"/>
            <label class="auth-form__labels">Пароль</label>
            <input type="password" class="auth-form__pass" name="pass"/>
            <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken()?>">
            <input type="submit" name="but" class="auth-form__but" value="Войти"/>
        </form>
    </div>

</div>
