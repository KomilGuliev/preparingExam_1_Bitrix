<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<?//
//echo "<pre>";
//    var_dump($arResult);
//    echo  "</pre>";
//?>

<div class="item-wrap">
    <div class="rew-footer-carousel">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>

    <div class="item">
        <div class="side-block side-opin">
            <div class="inner-block">
                <div class="title">
                    <div class="photo-block">
                        <?if($arParams["DISPLAY_PICTURE"]!="N"):?>
                            <?$renderImage = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], Array("width" => "39", "height" => "39"), BX_RESIZE_IMAGE_EXACT );
                           ?>

                            <img src="<?=$renderImage['src']?>" alt="">
                        <?else:?>
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/no_photo.jpg" alt="">
                        <?endif;?>
                    </div>
                    <?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
                         <div class="name-block"><a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a></div>
                    <?endif;?>
                    <?if($arItem["DISPLAY_PROPERTIES"]["POSITION"]["VALUE"] && $arItem["DISPLAY_PROPERTIES"]["COMPANY"]["VALUE"]):?>
                         <div class="pos-block"><?echo $arItem["DISPLAY_PROPERTIES"]["POSITION"]["VALUE"]?>, <?echo $arItem["DISPLAY_PROPERTIES"]["COMPANY"]["VALUE"];?></div>
                    <?endif;?>
                </div>
                <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
                        <div class="text-block">“<?echo TruncateText($arItem["PREVIEW_TEXT"], 150);?></div>
                <?endif;?>
            </div>
        </div>
    </div>

<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
    </div>
</div>
