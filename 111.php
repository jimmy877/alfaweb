<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Мы часть АРМО");
?><!-- КОНТЕНТ -->
<div class="content_n">
    <!--Компания/О компании--> <section class="about-company">
        <div class="content">
            <div class="container">
                <div class="row">
                    <!--Левое меню-->
                    <div class="col-3">
                        <ul class="side-bar">
                            <li class="side-bar__item"> <a href="/company/team" class="side-bar__link">Команда</a> </li>
                            <li class="side-bar__item"> <a href="/company/clients" class="side-bar__link">Клиенты</a> </li>
                            <li class="side-bar__item"> <a href="/company/recomendations" class="side-bar__link">Отзывы</a> </li>
                            <li class="side-bar__item"> <a href="/company/certificates" class="side-bar__link">Сертификаты</a> </li>
                            <li class="side-bar__item"> <a href="/company/job" class="side-bar__link">Вакансии</a> </li>
                        </ul>
                    </div>
                    <div class="col-9">
                        <p>
                        </p>
                        <h1> Мы часть АРМО
                            <?
                            if(CModule::IncludeModule("iblock"))
                            {
                                $attach_filter = array("PROPERTY_attach_VALUE"=>"Компания вверху");

                                $yvalue = 16;
                                $arSelect = Array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM");//IBLOCK_ID и ID обязательно должны быть указаны, см. описание arSelectFields выше
                                $arFilter = Array("IBLOCK_ID"=>IntVal($yvalue), $attach_filter, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
                                $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);

                                echo '<ul class="media-files">';

                                while($ob = $res->GetNextElement()){
                                    $arFields = $ob->GetFields();
                                    $arProps = $ob->GetProperties();

                                    $arFile = CFile::GetFileArray($arProps['file']['VALUE']);

                                    $type = $arFile['CONTENT_TYPE'];

                                    $class ='';

                                    $size = $arFile['FILE_SIZE'];
                                    $precision = 1;

                                    $f = $arFile['FILE_NAME'];
                                    $t = end(explode('.', $f));
                                    $s = CFile::FormatSize($size, $precision);

                                    if($t=='pptx')
                                        $class = 'media-files__item--pptx';
                                    elseif($t=='png')
                                        $class = 'media-files__item--png';
                                    elseif($t=='jpg')
                                        $class = 'media-files__item--jpg';
                                    elseif($t=='zip')
                                        $class = 'media-files__item--zip';
                                    elseif($t=='pdf')
                                        $class = 'media-files__item--pdf';
                                    elseif($t=='tiff')
                                        $class = 'media-files__item--tiff';
                                    elseif ((substr_count($type, 'video') > 0 ) || (substr_count($type, 'audio') > 0 ) || (substr_count($type, 'image') > 0 ))
                                        $class = 'media-files__item--video';
                                    else
                                        $class = 'media-files__item--doc';


                                    echo '<li class="media-files__item '.$class.'">';
                                    echo '<a href='.$arFile["SRC"].'>'.$arFields["NAME"].'</a><br />';
                                    echo '<div class="media-files-info">'.$t.', '.$s.'</div>';
                                    echo '</li>';
                                }
                            }
                            echo '</ul>';
                            ?>
                        </h1>
                        <!-- Контент -->

                        <p>
                            <b>Компания АРМЭКС была создана как структурное подразделение Группы компаний АРМО для оказания услуг по техническому обслуживанию и эксплуатации объектов коммерческой недвижимости.</b></p>

                        <div class="service-block service-block_white service-anchor-section">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <h2>Структура группы</h2>
                                        <ul>
                                            <li>АРМО– Управляющая компания Холдинга</li>
                                            <li>АРМО-Групп– Комплексное оснащение зданий инженерными системами</li>
                                            <li>АРМО-Системы– Поставки оборудования для систем безопасности и инженерных систем</li>
                                            <li>АРМЭКС– Управление и эксплуатация недвижимости</li>
                                            <li>АРМО-Лайн– Инженерные и строительные проекты для корпоративных заказчиков</li>
                                            <li>Учебный центр АРМО – Обучение специалистов в области систем безопасности и автоматизации зданий</li>
                                            <li>АРМО-Петербург 	– Региональное представительство в Северо-Западном регионе</li>
                                            <li>АРМО-Урал 		– Региональное представительство в Уральском регионе</li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                                        <h2>
                                            Обращаясь в одну из компаний АРМО, наши клиенты получают все преимущества, которые несет с собой сотрудничество с крупным инженерным холдингом:
                                        </h2>
                                        <ul>
                                            <li>обширная экспертиза в области инженерных систем и коммуникаций</li>
                                            <li>всесторонняя техническая и консалтинговая поддержка</li>
                                            <li>выгодные условия поставок оборудования</li>
                                            <li>сотрудничество с ведущими мировыми производителями</li>
                                            <li>развитая логистическая инфраструктура</li>
                                            <li>гарантия финансовой стабильности</li>
                                            <li>обучение и аттестация сотрудников</li>
                                        </ul>



                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>