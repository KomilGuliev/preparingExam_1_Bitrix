<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;


//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn = '';

//we can't use $APPLICATION->SetAdditionalCSS() here because we are inside the buffered function GetNavChain()
$css = $APPLICATION->GetCSSArray();
if(!is_array($css) || !in_array("/bitrix/css/main/font-awesome.css", $css))
{
	$strReturn .= '<link href="'.CUtil::GetAdditionalFileURL("/bitrix/css/main/font-awesome.css").'" type="text/css" rel="stylesheet" />'."\n";
}

$strReturn .= '<div class="breadcrumbs-box" itemprop="http://schema.org/breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList"><div class="inner-wrap">';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	$arrow = ($index > 0? '<i class="fa fa-angle-right"></i>' : '');

	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
	{
		$strReturn .= '
		
				<a href="'.$arResult[$index]["LINK"].'" title="'.$title.'" itemprop="url">
					'.$title.'
				</a>
				<meta itemprop="position" content="'.($index + 1).'" />';
	}
	else
	{
		$strReturn .= '

				<span itemprop="name">'.$title.'</span>
				<meta itemprop="position" content="'.($index + 1).'" />';
	}
}

$strReturn .= '</div></div>';

return $strReturn;
