<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

CJSCore::Init();
?>

<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-8 mb-5">
        <?
        if ($arResult['SHOW_ERRORS'] === 'Y' && $arResult['ERROR'] && !empty($arResult['ERROR_MESSAGE']))
        {
          ShowMessage($arResult['ERROR_MESSAGE']);
        }
        ?>

        <form name="system_auth_form<?=$arResult["RND"]?>" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>" class="p-5 bg-white border">
          <?if($arResult["BACKURL"] <> ''):?>
            <input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
          <?endif?>
          <?foreach ($arResult["POST"] as $key => $value):?>
            <input type="hidden" name="<?=$key?>" value="<?=$value?>" />
          <?endforeach?>
          <input type="hidden" name="AUTH_FORM" value="Y" />
          <input type="hidden" name="TYPE" value="AUTH" />

          <div class="row form-group">
            <div class="col-md-12 mb-3 mb-md-0">
              <label class="font-weight-bold" for="login"><?=GetMessage("AUTH_LOGIN")?></label>
              <input type="text" id="login" class="form-control" placeholder="<?=GetMessage("AUTH_LOGIN")?>" name="USER_LOGIN" maxlength="50" value="" size="17" />
            </div>
          </div>

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

          <div class="row form-group">
            <div class="col-md-12 mb-3 mb-md-0">
              <label class="font-weight-bold" for="password"><?=GetMessage("AUTH_PASSWORD")?></label>
              <input type="password" id="password" class="form-control" placeholder="<?=GetMessage("AUTH_PASSWORD")?>" name="USER_PASSWORD" maxlength="255" size="17" autocomplete="off" />
            </div>
          </div>

          <?if($arResult["SECURE_AUTH"]):?>
            <span class="bx-auth-secure" id="bx_auth_secure<?=$arResult["RND"]?>" title="<?echo GetMessage("AUTH_SECURE_NOTE")?>" style="display:none">
              <div class="bx-auth-secure-icon"></div>
            </span>
            <noscript>
            <span class="bx-auth-secure" title="<?echo GetMessage("AUTH_NONSECURE_NOTE")?>">
              <div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
            </span>
            </noscript>
            <script>
              document.getElementById('bx_auth_secure<?=$arResult["RND"]?>').style.display = 'inline-block';
            </script>
          <?endif?>

          <?if ($arResult["STORE_PASSWORD"] == "Y"):?>
            <div class="row form-group">
              <div class="col-md-12">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="USER_REMEMBER_frm" name="USER_REMEMBER" value="Y">
                  <label class="custom-control-label" for="USER_REMEMBER_frm"><?echo GetMessage("AUTH_REMEMBER_SHORT")?></label>
                </div>
              </div>
            </div>
          <?endif?>

          <?if ($arResult["CAPTCHA_CODE"]):?>
            <div class="row form-group">
              <div class="col-md-12">
                <label class="font-weight-bold"><?echo GetMessage("AUTH_CAPTCHA_PROMT")?>:</label>
                <input type="hidden" name="captcha_sid" value="<?echo $arResult["CAPTCHA_CODE"]?>" />
                <img src="/bitrix/tools/captcha.php?captcha_sid=<?echo $arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
                <input type="text" name="captcha_word" class="form-control mt-2" maxlength="50" value="" />
              </div>
            </div>
          <?endif?>

          <div class="row form-group">
            <div class="col-md-12">
              <input type="submit" name="Login" value="<?=GetMessage("AUTH_LOGIN_BUTTON")?>" class="btn btn-primary py-2 px-4 rounded-0">
            </div>
          </div>

          <?if($arResult["NEW_USER_REGISTRATION"] == "Y"):?>
            <div class="row form-group">
              <div class="col-md-12">
                <noindex><a href="<?=$arResult["AUTH_REGISTER_URL"]?>" rel="nofollow"><?=GetMessage("AUTH_REGISTER")?></a></noindex>
              </div>
            </div>
          <?endif?>

          <div class="row form-group">
            <div class="col-md-12">
              <noindex><a href="<?=$arResult["AUTH_FORGOT_PASSWORD_URL"]?>" rel="nofollow"><?=GetMessage("AUTH_FORGOT_PASSWORD_2")?></a></noindex>
            </div>
          </div>

          <?if($arResult["AUTH_SERVICES"]):?>
            <div class="row form-group">
              <div class="col-md-12">
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
              </div>
            </div>
          <?endif?>
        </form>

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
      </div>
    </div>
  </div>
</div>
