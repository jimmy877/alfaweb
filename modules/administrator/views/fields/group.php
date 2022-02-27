<?php
/**
 * Created by PhpStorm.
 * User: antonglotov
 * Date: 11/04/2020
 * Time: 14:30
 */
if(!defined("adm")) die;
?>

<div class="site-about">

    <div class="i_panel">
        <div class="i_panel_buttons">
            <a class="ac_button" href="">Создать</a>
        </div>
    </div>

        <article class="module width_3_quarter myclassModule" id="target">

            <header>
                <h3 class="tabs_involved">Список групп полей</h3>

            </header>

            <div class="editCat">
                <?=$message?>
                <div class="field-filter">
                    <div class="field-filter-item">
                    </div>


                </div>
                <? foreach ($groups as $group):?>
                    <div class="fields_container">
                        <div class="field_prototype">
                            <div class="field-name">
                                <a href="/administrator/fields/fields?id=<?=$group['id']?>">
                                    <?=$group['group_name']?>
                                </a>
                            </div>
                            <div class="field-params">
                                <p> <span>Алиас:</span> <?=$group['alias']?></p>


                            </div>
                        </div>
                    </div>
                <?endforeach;?>

                <!-- Постраничная навигация -->
                <? if($pages != 1): ?>
                    <div class="pagination">
                        <?for($i=1; $i<=$pages;$i++):?>
                                <a href="?p=<?=$i?>"><?=$i?></a>
                        <?endfor;?>
                    </div>
                <?endif?>
                
            </div>

        </article>
</div>