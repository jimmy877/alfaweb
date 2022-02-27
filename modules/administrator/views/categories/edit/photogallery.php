<?if(!defined("adm")) die;?>
<div class="tabs tab_photo">

            <article class="module width_3_quarter myclassModule" id="target">
                <header>
                    <h3 class="tabs_involved"><?=$category->title?></h3>
</header>

<div class="editCat">

    <label>
        <input name="page[photos]" type="file" multiple>
    </label>

    <div class="photos">
        <?if ($photogallery != null):?>
            <?foreach($photogallery as $photo):?>
                <div class="photo">
                    <div class="p_img"><img width="140px" src="<?=$photo->url?>"></div>
                    <div class="p_info">
                        <input type="text" name="page[photo][name]" placeholder="Название" value="<?=$photo->name?>">
                        <input type="text" name="page[photo][desc]" placeholder="Описание" value="<?=$photo->desc?>">
                        <input type="hidden" name="page[photo][order]" value="<?=$photo->order?>">
                    </div>
                </div>
            <?endforeach?>
        <?endif;?>
    </div>

</div>

</article>

<? var_dump($photogallery); ?>

there field
</div>