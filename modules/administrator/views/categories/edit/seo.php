<div class="tabs tab_seo">

    <article class="module width_3_quarter myclassModule" id="target">
        <header>
            <h3 class="tabs_involved"><?=$category->title?></h3>
        </header>

        <div class="editCat">
            <label>
                Description <br/>
                <textarea name="seo[desc]"><?=$category->metadesc?></textarea>
            </label>

            <label>
                Ключевые слова<br/>
                <textarea name="seo[keywords]">
                            <?=$category->metakey?>
                        </textarea>

            </label>

            <label>
                Автор<br/>
                <input type="text" name="seo[author]" value="<?=$info->author?>">
            </label>

        </div>

    </article>


    <?var_dump($category)?>
</div>