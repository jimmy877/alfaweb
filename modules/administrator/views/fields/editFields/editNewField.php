<?php
/**
 * Created by PhpStorm.
 * User: antonglotov
 * Date: 11/04/2020
 * Time: 15:05
 */
if(!defined("adm")) die;
?>


<div class="site-about">

    <div class="i_panel">
        <div class="i_panel_buttons">
            <a class="ac_button" href="">Сохранить</a>
        </div>
    </div>

    <article class="module width_3_quarter myclassModule" id="target">

        <header>
            <h3 class="tabs_involved">Создание поля</h3>

        </header>

        <div class="editCat">
            <form method="post" action="/administrator/fields/edit">
                <div>
                    Тип поля
                    <select class="typeField" name="field[type]" type="text">
                        <option value="null">Нужно выбрать тип поля </option>
                        <option value="text">Текстовое поле </option>
                        <option value="select">Выпадающий список </option>
                        <option value="textarea">Текстовая область </option>
                        <option value="checkbox">Чекбокс </option>
                        <option value="checkboxGroup">Набор чекбоксов </option>
                        <option value="radiobutton">Набор радиокнопок </option>
                    </select>

                </div>
                <div>Название поля <input name="field[name]" type="text"></div>
                <div>Alias поля <input name="field[alias]" type="text"></div>

                <div class="f-fields f-params">
                    Параметры поля
                    <textarea name="field[params]" ></textarea>

                </div>

                <div class="f-fields f-ch-list">
                    Список чекбоксов
                    <textarea name="field[chekList]" ></textarea>

                </div>

                <div class="f-fields f-category" >
                    Категория <input name="field[category]" type="text"  value="<?=$categoryId?>" >
                </div>

                <!--div class="f-fields f-group">
                    Группа <input name="field[group]" type="text"> Группа была убрана из кода, потом убрать этот кусок кода
                </div-->

                <div class="f-fields f-required">
                    Обязательное поле
                    <input value="yes" name="field[required]" type="checkbox">
                </div>


                <!-- верификация формы -->
                <input type="hidden" name="FID" value="<?=$FID?>">
                <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken()?>">
                <div><input  type="submit" value="Сохранить"></div>

            </form>

            <? //var_dump($field)?> //!! Очень важно, тип поля уже менять нельзя
            проверка
        </div>

    </article>
</div>

<script async type="application/javascript" src="/modules/administrator/views/fields/editFields/fieldEdit.js"></script>