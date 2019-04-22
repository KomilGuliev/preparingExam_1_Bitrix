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

<div class="review-block">
    <div class="review-text">
        <div class="review-text-cont">
            <?if($arResult["DETAIL_TEXT"]):?>
                <?=$arResult["DETAIL_TEXT"]?>
            <?endif;?>
        </div>
        <div class="review-autor">
            <?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
                <?=$arResult["NAME"]?>
            <?endif;?>,
            <?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
                <?=$arResult["DISPLAY_ACTIVE_FROM"]?>
            <?endif;?> г.,
            <?if($arResult["DISPLAY_PROPERTIES"]["POSITION"]["VALUE"]):?><?=$arResult["DISPLAY_PROPERTIES"]["POSITION"]["VALUE"]?><?endif;?>,
            <?if($arResult["DISPLAY_PROPERTIES"]["COMPANY"]["VALUE"]):?><?=$arResult["DISPLAY_PROPERTIES"]["COMPANY"]["VALUE"]?><?endif;?>.
        </div>
    </div>
    <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
        <div style="clear: both;" class="review-img-wrap"><img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="img"></div>
    <?else:?>
        <div style="clear: both;" class="review-img-wrap"><a href="#"><img src="<?=SITE_TEMPLATE_PATH?>/img/no_photo.jpg" alt="img"></a></div>
    <?endif;?>
</div>
<?if($arResult["DISPLAY_PROPERTIES"]["DOCUMENTS"]["FILE_VALUE"]):?>
<div class="exam-review-doc">
    <p>Документы:</p>
    <?if($arResult["DISPLAY_PROPERTIES"]["DOCUMENTS"]["FILE_VALUE"][0]):?>
        <?foreach ($arResult["DISPLAY_PROPERTIES"]["DOCUMENTS"]["FILE_VALUE"] as $arItem):?>
            <div  class="exam-review-item-doc"><img class="rew-doc-ico" src="<?=SITE_TEMPLATE_PATH?>/img/icons/pdf_ico_40.png"><a href="<?=$arItem["SRC"];?>"><?=$arItem["ORIGINAL_NAME"]?></a></div>
        <?endforeach;?>
    <?else:?>
        <?$arItem=$arResult["DISPLAY_PROPERTIES"]["DOCUMENTS"]["FILE_VALUE"];?>
        <div  class="exam-review-item-doc"><img class="rew-doc-ico" src="<?=SITE_TEMPLATE_PATH?>/img/icons/pdf_ico_40.png"><a href="<?=$arItem["SRC"];?>"><?=$arItem["ORIGINAL_NAME"]?></a></div>
    <?endif;?>
</div>
<?endif;?>





