<?php if(!defined("adm")) die;?>
<div class="tabs tab_fields">
    <article class="module width_3_quarter myclassModule" id="target">
        <header>
            <h3 class="tabs_involved"><?=$category->title?></h3>
        </header>


        <!-- тут контент для вывода доп полей из прототипа-->
        <div class="editCat">

            <!-- если категория ранее не была привязана, выводим список категорий полей -->
            <?php if ($category->fieldGroupID == 0): ?>
                <?php var_dump($fieldsPrototypeCategory);?>
                <select>
                    <option selected value="null"> Выбрать категорию</option>
                    <?php foreach ($fieldsPrototypeCategory as $group):?>
                        <option value="<?php echo $group['id']?>" >
                            <?php echo $group['group_name']?>
                        </option>
                    <?php endforeach ?>
                </select>
                <a class="ac_button" href="/administrator/categories/edit?id=<?php echo $category->id?>&field=<?php echo $category->id?>">Выбрать</a>

            <?php else:?>
                Вывод полей
            <?php endif;?>

            <?php
                /***
                 * надо сделать ajax функцию через axios и с использованием vuejs для подгрузки нужный полей тут, согласно
                 * выбранной категории
                 */
            ?>
        </div>



    </article>


</div>