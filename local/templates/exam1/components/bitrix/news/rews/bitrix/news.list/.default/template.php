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



<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>

    <?
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>
    <div class="review-block">
        <div class="review-text">

            <div class="review-block-title">
            <span class="review-block-name">
                <?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
                    <a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a>
                <?endif;?>
            </span>
                <span class="review-block-description">
                <?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?><?echo $arItem["DISPLAY_ACTIVE_FROM"]?><?endif;?>.,
                <?if($arItem["DISPLAY_PROPERTIES"]["POSITION"]["VALUE"]):?><?=$arItem["DISPLAY_PROPERTIES"]["POSITION"]["VALUE"]?><?endif;?>,
                    <?if($arItem["DISPLAY_PROPERTIES"]["COMPANY"]["VALUE"]):?><?=$arItem["DISPLAY_PROPERTIES"]["COMPANY"]["VALUE"]?><?endif;?></span></div>
            <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
                <div class="review-text-cont">
                    <?echo $arItem["PREVIEW_TEXT"];?>
                </div>
            <?endif;?>
        </div>
        <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
            <div class="review-img-wrap"><a href="#"><img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="img"></a></div>
        <?else:?>
            <div class="review-img-wrap"><a href="#"><img src="<?=SITE_TEMPLATE_PATH?>/img/no_photo.jpg" alt="img"></a></div>
        <?endif;?>
    </div>
<?endforeach;?>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>

