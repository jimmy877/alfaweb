<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 15.10.2018
 * Time: 21:45
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<article class="module width_3_quarter myclassModule" id="target">
    <div id="target" class="list">


        <?$form = ActiveForm::begin([
        'id' => 'form',
        'options' => ['class' => 'form-horizontal'],
        'enableClientValidation'=> true
        ]) ?>

        <div class="innerForm">
            <?//$form->field($model, 'username')->fileInput(['multiple'=>'multiple'])->label('') ?>
            <?= $form->field($model, 'name')->textInput(['placeholder'=>'Имя', 'class'=>'InputInner'])->label('') ?>
            <?= $form->field($model, 'dropdown')->dropdownList(['alias'=>'select', "link"=>"Еще вариант", "link2"=>"и еще вариант"],
                ["options"=>["link"=>['disabled'=>true],  "link2"=>['selected'=>true]] ]) ?>
            <?//Html::activeTextInput($model, 'username', ['class'=>'form-item req']) ?>
            <?=$form->field($model, 'username')->textInput(['placeholder'=>'Пароль',"autocomplete"=>'off'])->label('') ?>
            <?// Html::error($model, 'username', ['class'=>'test']) ?>
            <p><?=$data;?></p>
            <?= Html::activeCheckbox($model, 'agree',['class' => 'form-item', 'label'=>'Привет']) ?>


            <div class="form-group">
                <div class="col-lg-offset-1 col-lg-11">
                    <?= Html::submitButton('Вход', ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
        </div>

        <?php ActiveForm::end() ?>
    </div>
    <div class="test">
        fjdkdsjfksdjfksdjflsfjdkfjsdkl
    </div>
    <div class="test">
        fjdkdsjfksdjfksdjflsfjdkfjsdkl
    </div>
    <div class="test">
        fjdkdsjfksdjfksdjflsfjdkfjsdkl
    </div>
    <div class="test">
        fjdkdsjfksdjfksdjflsfjdkfjsdkl
    </div>
    <div class="test">
        fjdkdsjfksdjfksdjflsfjdkfjsdkl
    </div>
</article>



<script type="application/javascript">
    let test = document.querySelectorAll('.test');
    //alert(test.length);
    for(var i=0; i<test.length; i++){
        if(i==1){
            test[i].style.color="#CCC";
        }else{
            test[i].style.color="rgb(150, 21, 21)";
        }
    }
    //test.style.color="#CCC";
    //test.className=test.className+" new";
    console.log(test);
</script>