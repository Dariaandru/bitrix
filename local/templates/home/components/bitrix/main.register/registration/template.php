<?php
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2024 Bitrix
 */

use Bitrix\Main\Web\Json;

/**
 * Bitrix vars
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @param array $arParams
 * @param array $arResult
 * @param CBitrixComponentTemplate $this
 */

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

if($arResult["SHOW_SMS_FIELD"] == true)
{
	CJSCore::Init('phone_auth');
}
?>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8 mb-5">
                <?if($USER->IsAuthorized()):?>
                    <div class="alert alert-success">
                        <p><?echo GetMessage("MAIN_REGISTER_AUTH")?></p>
                    </div>
                <?else:?>
                    <?
                    if (!empty($arResult["ERRORS"])):
                        foreach ($arResult["ERRORS"] as $key => $error)
                            if (intval($key) == 0 && $key !== 0) 
                                $arResult["ERRORS"][$key] = str_replace("#FIELD_NAME#", "&quot;".GetMessage("REGISTER_FIELD_".$key)."&quot;", $error);
                    ?>
                    <div class="alert alert-danger">
                        <?=implode("<br />", $arResult["ERRORS"])?>
                    </div>
                    <?elseif($arResult["USE_EMAIL_CONFIRMATION"] === "Y"):?>
                    <div class="alert alert-info">
                        <p><?echo GetMessage("REGISTER_EMAIL_WILL_BE_SENT")?></p>
                    </div>
                    <?endif?>

                    <h2 class="h4 text-black mb-5"><?=GetMessage("AUTH_REGISTER")?></h2>
                    
                    <form method="post" action="<?=POST_FORM_ACTION_URI?>" name="regform" enctype="multipart/form-data">
                        <?if($arResult["BACKURL"] <> ''):?>
                            <input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
                        <?endif;?>

                        <!-- Login field -->
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="font-weight-bold" for="LOGIN"><?=GetMessage("REGISTER_FIELD_LOGIN")?>:<span class="text-danger">*</span></label>
                                <input size="30" type="text" name="REGISTER[LOGIN]" id="LOGIN" value="<?=$arResult["VALUES"]["LOGIN"]?>" class="form-control" />
                            </div>
                        </div>

                        <!-- Email field -->
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="font-weight-bold" for="EMAIL"><?=GetMessage("REGISTER_FIELD_EMAIL")?>:<span class="text-danger">*</span></label>
                                <input size="30" type="text" name="REGISTER[EMAIL]" id="EMAIL" value="<?=$arResult["VALUES"]["EMAIL"]?>" class="form-control" />
                            </div>
                        </div>

                        <!-- Password field -->
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="font-weight-bold" for="PASSWORD"><?=GetMessage("REGISTER_FIELD_PASSWORD")?>:<span class="text-danger">*</span></label>
                                <input size="30" type="password" name="REGISTER[PASSWORD]" id="PASSWORD" value="<?=$arResult["VALUES"]["PASSWORD"]?>" autocomplete="off" class="form-control" />
                                <?if($arResult["SECURE_AUTH"]):?>
                                    <span class="bx-auth-secure" id="bx_auth_secure" title="<?=GetMessage("AUTH_SECURE_NOTE")?>" style="display:none">
                                        <div class="bx-auth-secure-icon"></div>
                                    </span>
                                    <noscript>
                                    <span class="bx-auth-secure" title="<?=GetMessage("AUTH_NONSECURE_NOTE")?>">
                                        <div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
                                    </span>
                                    </noscript>
                                    <script>
                                    document.getElementById('bx_auth_secure').style.display = 'inline-block';
                                    </script>
                                <?endif?>
                            </div>
                        </div>

                        <!-- Confirm Password field -->
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="font-weight-bold" for="CONFIRM_PASSWORD"><?=GetMessage("REGISTER_FIELD_CONFIRM_PASSWORD")?>:<span class="text-danger">*</span></label>
                                <input size="30" type="password" name="REGISTER[CONFIRM_PASSWORD]" id="CONFIRM_PASSWORD" value="<?=$arResult["VALUES"]["CONFIRM_PASSWORD"]?>" autocomplete="off" class="form-control" />
                            </div>
                        </div>

                        <!-- Custom User Type field (Buyer/Seller) -->
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="font-weight-bold"><?=GetMessage("REGISTER_FIELD_USER_TYPE")?>:<span class="text-danger">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="UF_USER_TYPE" id="userTypeBuyer" value="5" <?=($arResult["VALUES"]["UF_USER_TYPE"] == "buyer" || empty($arResult["VALUES"]["UF_USER_TYPE"])) ? "checked" : ""?>>
                                    <label class="form-check-label" for="userTypeBuyer">
                                        <?=GetMessage("REGISTER_FIELD_USER_TYPE_BUYER")?>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="UF_USER_TYPE" id="userTypeSeller" value="6" <?=($arResult["VALUES"]["UF_USER_TYPE"] == "seller") ? "checked" : ""?>>
                                    <label class="form-check-label" for="userTypeSeller">
                                        <?=GetMessage("REGISTER_FIELD_USER_TYPE_SELLER")?>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <?
                        /* CAPTCHA */
                        if ($arResult["USE_CAPTCHA"] == "Y")
                        {
                            ?>
                            <h3 class="h5 text-black mb-3"><?=GetMessage("REGISTER_CAPTCHA_TITLE")?></h3>
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
                                    <img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="captcha_word"><?=GetMessage("REGISTER_CAPTCHA_PROMT")?><span class="text-danger">*</span></label>
                                    <input type="text" name="captcha_word" id="captcha_word" maxlength="50" value="" class="form-control" />
                                </div>
                            </div>
                            <?
                        }
                        /* !CAPTCHA */
                        ?>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="submit" name="register_submit_button" value="<?=GetMessage("AUTH_REGISTER")?>" class="btn btn-primary py-2 px-4 rounded-0" />
                            </div>
                        </div>
                    </form>
                <?endif?>
            </div>
        </div>
    </div>
</div>
