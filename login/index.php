<?
define("NEED_AUTH", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

if (is_string($_REQUEST["backurl"]) && strpos($_REQUEST["backurl"], "/") === 0)
{
	LocalRedi rect($_REQUEST["backurl"]);
}

$APPLICATION->SetTitle("Вход на сайт");
?><p>
	Вы зарегистрированы и успешно авторизовались.
</p>
<p>
	<a href="<?=SITE_DIR?>">Вернуться на главную страницу</a>
</p>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>