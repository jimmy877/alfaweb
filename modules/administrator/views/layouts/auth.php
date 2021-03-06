<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\widgets\menu\MenuWidget;

AppAsset::register($this);
?>
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8"/>
    <title>Dashboard I Admin Panel</title>

    <link rel="stylesheet" href="/modules/administrator/tmpl/css/layout.css" type="text/css" media="screen" />
    <!--[if lt IE 9]>
    <link rel="stylesheet" href="/modules/administrator/tmpl/css/ie.css" type="text/css" media="screen" />
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="/modules/administrator/tmpl/js/jquery-1.5.2.min.js" type="text/javascript"></script>
    <script src="/modules/administrator/tmpl/js/hideshow.js" type="text/javascript"></script>
    <script src="/modules/administrator/tmpl/js/jquery.tablesorter.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="/modules/administrator/tmpl/js/jquery.equalHeight.js"></script>
    <script type="text/javascript">
        $(document).ready(function()
            {
                $(".tablesorter").tablesorter();
            }
        );
        $(document).ready(function() {

            //When page loads...
            $(".tab_content").hide(); //Hide all content
            $("ul.tabs li:first").addClass("active").show(); //Activate first tab
            $(".tab_content:first").show(); //Show first tab content

            //On Click Event
            $("ul.tabs li").click(function() {

                $("ul.tabs li").removeClass("active"); //Remove any "active" class
                $(this).addClass("active"); //Add "active" class to selected tab
                $(".tab_content").hide(); //Hide all tab content

                var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
                $(activeTab).fadeIn(); //Fade in the active ID content
                return false;
            });

        });
    </script>
    <script type="text/javascript">
        $(function(){
            $('.column').equalHeight();
        });
    </script>

</head>


<body>

<header id="header">
    <hgroup>
        <h1 class="site_title"><a href="index.html">Website Admin</a></h1>
        <h2 class="section_title"></h2><div class="btn_view_site"><a href="http://www.medialoot.com">View Site</a></div>
    </hgroup>
</header> <!-- end of header bar -->


<section id="main" class="column secAuth">
        <?= $content ?>
</section>
<?php $this->endBody() ?>

</body>

