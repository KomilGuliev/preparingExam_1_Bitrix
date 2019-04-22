<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

CJSCore::Init();
?>

<?//
//echo "<pre>";
//var_dump($arResult);
//echo "</pre>";
//
//
//?>

<?
if ($arResult['SHOW_ERRORS'] == 'Y' && $arResult['ERROR'])
	ShowMessage($arResult['ERROR_MESSAGE']);
?>

<?if($arResult["FORM_TYPE"] == "login"):?>
    <nav class="menu-block">
        <ul>
            <li class="att popup-wrap">
                <a id="hd_singin_but_open" href="" class="btn-toggle">Войти на сайт</a>


                <form class="frm-login popup-block" name="system_auth_form<?=$arResult["RND"]?>" method="post"  action="<?=$arResult["AUTH_URL"]?>">
                <?if($arResult["BACKURL"] <> ''):?>
                    <input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
                <?endif?>
                <?foreach ($arResult["POST"] as $key => $value):?>
                    <input type="hidden" name="<?=$key?>" value="<?=$value?>" />
                <?endforeach?>
                    <input type="hidden" name="AUTH_FORM" value="Y" />
                    <input type="hidden" name="TYPE" value="AUTH" />
                    <div class="frm-title">Войти на сайт</div>
                    <a href="" class="btn-close">Закрыть</a>


                    <div class="frm-row"><input type="text" name="USER_LOGIN" placeholder="Логин"></div>

                            <script>
                                BX.ready(function() {
                                    var loginCookie = BX.getCookie("<?=CUtil::JSEscape($arResult["~LOGIN_COOKIE_NAME"])?>");
                                    if (loginCookie)
                                    {
                                        var form = document.forms["system_auth_form<?=$arResult["RND"]?>"];
                                        var loginInput = form.elements["USER_LOGIN"];
                                        loginInput.value = loginCookie;
                                    }
                                });
                            </script>

                    <div class="frm-row"><input name="USER_PASSWORD" type="password" placeholder="Пароль"></div>
                            <?if($arResult["SECURE_AUTH"]):?>
                                <span class="bx-auth-secure" id="bx_auth_secure<?=$arResult["RND"]?>" title="<?echo GetMessage("AUTH_SECURE_NOTE")?>" style="display:none">
                                    <div class="bx-auth-secure-icon"></div>
                                </span>
                                <noscript>
                                <span class="bx-auth-secure" title="<?echo GetMessage("AUTH_NONSECURE_NOTE")?>">
                                    <div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
                                </span>
                                </noscript>
                                <script type="text/javascript">
                                document.getElementById('bx_auth_secure<?=$arResult["RND"]?>').style.display = 'inline-block';
                                </script>
                            <?endif?>
                    <div class="frm-row"><noindex><a href="<?=$arResult["AUTH_FORGOT_PASSWORD_URL"]?>" rel="nofollow" class="btn-forgot">Забыли пароль</a></noindex></div>

                <?if ($arResult["STORE_PASSWORD"] == "Y"):?>
                    <div class="frm-row">
                        <div class="frm-chk">
                            <input type="checkbox" id="USER_REMEMBER_frm" name="USER_REMEMBER" value="Y">
                            <label for="USER_REMEMBER_frm" title="<?=GetMessage("AUTH_REMEMBER_ME")?>"><?echo GetMessage("AUTH_REMEMBER_SHORT")?></label>
                        </div>
                    </div>
                <?endif?>
                <?if ($arResult["CAPTCHA_CODE"]):?>
                            <?echo GetMessage("AUTH_CAPTCHA_PROMT")?>:<br />
                            <input type="hidden" name="captcha_sid" value="<?echo $arResult["CAPTCHA_CODE"]?>" />
                            <img src="/bitrix/tools/captcha.php?captcha_sid=<?echo $arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" /><br /><br />
                            <input type="text" name="captcha_word" maxlength="50" value="" />
                <?endif?>
                    <div class="frm-row"><input type="submit" name="Login" value="<?=GetMessage("AUTH_LOGIN_BUTTON")?>"></div>
            </li>

    <?if($arResult["NEW_USER_REGISTRATION"] == "Y"):?>
                <li><noindex><a href="<?=$arResult["AUTH_REGISTER_URL"]?>" rel="nofollow"><?=GetMessage("AUTH_REGISTER")?></a></noindex></a>
                </li>
    <?endif?>
            </ul>
        </nav>

    <?if($arResult["AUTH_SERVICES"]):?>

                    <div class="bx-auth-lbl"><?=GetMessage("socserv_as_user_form")?></div>
    <?
    $APPLICATION->IncludeComponent("bitrix:socserv.auth.form", "icons",
        array(
            "AUTH_SERVICES"=>$arResult["AUTH_SERVICES"],
            "SUFFIX"=>"form",
        ),
        $component,
        array("HIDE_ICONS"=>"Y")
    );
    ?>

    <?endif?>



    <?if($arResult["AUTH_SERVICES"]):?>
    <?
    $APPLICATION->IncludeComponent("bitrix:socserv.auth.form", "",
        array(
            "AUTH_SERVICES"=>$arResult["AUTH_SERVICES"],
            "AUTH_URL"=>$arResult["AUTH_URL"],
            "POST"=>$arResult["POST"],
            "POPUP"=>"Y",
            "SUFFIX"=>"form",
        ),
        $component,
        array("HIDE_ICONS"=>"Y")
    );
    ?>
    <?endif?>

    <?
    elseif($arResult["FORM_TYPE"] == "otp"):
    ?>

    <form name="system_auth_form<?=$arResult["RND"]?>" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
    <?if($arResult["BACKURL"] <> ''):?>
        <input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
    <?endif?>
        <input type="hidden" name="AUTH_FORM" value="Y" />
        <input type="hidden" name="TYPE" value="OTP" />
        <table width="95%">
            <tr>
                <td colspan="2">
                <?echo GetMessage("auth_form_comp_otp")?><br />
                <input type="text" name="USER_OTP" maxlength="50" value="" size="17" autocomplete="off" /></td>
            </tr>
    <?if ($arResult["CAPTCHA_CODE"]):?>
            <tr>
                <td colspan="2">
                <?echo GetMessage("AUTH_CAPTCHA_PROMT")?>:<br />
                <input type="hidden" name="captcha_sid" value="<?echo $arResult["CAPTCHA_CODE"]?>" />
                <img src="/bitrix/tools/captcha.php?captcha_sid=<?echo $arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" /><br /><br />
                <input type="text" name="captcha_word" maxlength="50" value="" /></td>
            </tr>
    <?endif?>
    <?if ($arResult["REMEMBER_OTP"] == "Y"):?>
            <tr>
                <td valign="top"><input type="checkbox" id="OTP_REMEMBER_frm" name="OTP_REMEMBER" value="Y" /></td>
                <td width="100%"><label for="OTP_REMEMBER_frm" title="<?echo GetMessage("auth_form_comp_otp_remember_title")?>"><?echo GetMessage("auth_form_comp_otp_remember")?></label></td>
            </tr>
    <?endif?>
            <tr>
                <td colspan="2"><input type="submit" name="Login" value="<?=GetMessage("AUTH_LOGIN_BUTTON")?>" /></td>
            </tr>
            <tr>
                <td colspan="2"><noindex><a href="<?=$arResult["AUTH_LOGIN_URL"]?>" rel="nofollow"><?echo GetMessage("auth_form_comp_auth")?></a></noindex><br /></td>
            </tr>
        </table>
    </form>

<?
else:
?>


<form action="<?=$arResult["AUTH_URL"]?>">
    <nav class="menu-block">
        <ul>
            <li>
                <a href="<?=$arResult["PROFILE_URL"]?>" ><?=$arResult["USER_NAME"]?> [<?=$arResult["USER_LOGIN"]?>]</a>
            </li>
            <li>
                <a href="<?echo $APPLICATION->GetCurPageParam("logout=yes", array(
                    "login",
                    "logout",
                    "register",
                    "forgot_password",
                    "change_password"));?>" name="logout_butt"><?=GetMessage("AUTH_LOGOUT_BUTTON")?></a>
            </li>
        </ul>
    </nav>
</form>
<?endif?>

