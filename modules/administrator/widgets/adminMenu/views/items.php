<ul class="toggle">
    <? foreach ($items as $item):?>
        <li class="icn_new_article"><a href="<?=$item['alias']?>"><?=$item['arial_name']?></a></li>
    <?endforeach;?>
    <!--<li class="icn_new_article"><a href="#">New Article</a></li>
    <li class="icn_edit_article"><a href="#">Edit Articles</a></li>
    <li class="icn_categories"><a href="#">Categories</a></li>
    <li class="icn_tags"><a href="#">Tags</a></li> -->
</ul>