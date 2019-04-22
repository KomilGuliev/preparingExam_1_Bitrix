<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>





<?if (!empty($arResult)):?>
    <nav class="nav">
        <div class="inner-wrap">
            <div class="menu-block popup-wrap">
                <a href="" class="btn-menu btn-toggle"></a>
                <div class="menu popup-block">
                    <ul>

                        <?
                        $previousLevel = 0;
                    foreach($arResult as $arItem):?>

                        <?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
                            <?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
                        <?endif?>

                        <?if ($arItem["IS_PARENT"]):?>

                            <?if ($arItem["DEPTH_LEVEL"] == 1):?>
                                <li><a <?  if($arItem["PARAMS"]["color"]):?>class="<?echo "color-".$arItem["PARAMS"]["color"];?>" <?endif;?>href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
                                <ul>
                            <?else:?>
                                <li><a href="<?=$arItem["LINK"]?>" ><?=$arItem["TEXT"]?></a>
                                <ul>
                                    <div class="menu-text"><?$APPLICATION->IncludeFile(SITE_DIR."include/menu_text.php",
                                            array(),
                                        array(
                                                "MODE" => "text"
                                        )
                                            )?></div>
                            <?endif?>

                        <?else:?>

                            <?if ($arItem["PERMISSION"] > "D"):?>

                                <?if ($arItem["DEPTH_LEVEL"] == 1):?>
                                    <li <?if($arItem["PARAMS"]["main_class"]):?>class="<?=$arItem["PARAMS"]["main_class"]?>" <?endif;?> ><a <?  if($arItem["PARAMS"]["color"]):?>class="<?echo "color-".$arItem["PARAMS"]["color"];?>" <?endif;?> href="<?=$arItem["LINK"]?>" ><?=$arItem["TEXT"]?></a></li>
                                <?else:?>
                                    <li <?if($arItem["PARAMS"]["main_class"]):?>class="<?=$arItem["PARAMS"]["main_class"]?>" <?endif;?> ><a href="<?=$arItem["LINK"]?>" ><?=$arItem["TEXT"]?></a></li>
                                <?endif?>

                            <?endif?>

                        <?endif?>

                        <?$previousLevel = $arItem["DEPTH_LEVEL"];?>

                    <?endforeach?>

                        <?if ($previousLevel > 1)://close last item tags?>
                            <?=str_repeat("</ul></li>", ($previousLevel-1) );?>
                        <?endif?>

                    </ul>
                    <a href="" class="btn-close"></a>
                </div>
                <div class="menu-overlay"></div>
            </div>
        </div>
    </nav>

<?endif;?>