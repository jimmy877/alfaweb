<?if(!defined("adm")) die;?>
<div class="tabs tab_fields">
    <article class="module width_3_quarter myclassModule" id="target">
        <header>
            <h3 class="tabs_involved"><?=$category->title?></h3>
        </header>

        <!-- тут контент для вывода доп полей из прототипа-->
        <div class="editCat">
            <? var_dump($fieldsPrototypeCategory);?>
            <?php foreach ($fieldsPrototypeCategory as $group):?>
                <div> <?php echo $group['group_name']?> </div>
            <?php endforeach ?>
        </div>

    </article>


</div>