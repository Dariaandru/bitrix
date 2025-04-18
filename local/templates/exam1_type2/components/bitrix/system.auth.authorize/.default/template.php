<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

CJSCore::Init();
?>





<div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
          <div class="card mb-3">
            <div class="card-body">
      
              <div class="pt-4 pb-2">
                <p class="text-center small"><?=GetMessage("PLEASE_AUTH")?></p>
              </div>

              <?
                if ($arResult['SHOW_ERRORS'] === 'Y' && $arResult['ERROR'] && !empty($arResult['ERROR_MESSAGE']))
                {
                  ShowMessage($arResult['ERROR_MESSAGE']);
                }
              ?>  
      
              <form name="system_auth_form<?=$arResult["RND"]?>" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>"
                class="row g-3 needs-validation" novalidate
                
              >

              <?if($arResult["BACKURL"] <> ''):?>
            <input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
          <?endif?>
          <?foreach ($arResult["POST"] as $key => $value):?>
            <input type="hidden" name="<?=$key?>" value="<?=$value?>" />
          <?endforeach?>
          <input type="hidden" name="AUTH_FORM" value="Y" />
          <input type="hidden" name="TYPE" value="AUTH" />
      
  
              <div class="col-12">
              <label for="yourUsername" class="form-label"><?=GetMessage("AUTH_LOGIN")?>
              </label>
                <div class="input-group has-validation">
                  <input
                    type="text" class="form-control" id="yourUsername" required
                    name="USER_LOGIN" maxlength="255" value=""
                  >
                  <div class="invalid-feedback"><?=GetMessage("ERROR_LOGIN")?></div>
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
      
              <div class="col-12">
                <label for="yourPassword" class="form-label"><?=GetMessage("AUTH_PASSWORD")?></label>
                <input 
                  class="form-control" id="yourPassword" required
                  type="password" name="USER_PASSWORD" maxlength="255" autocomplete="off" 
                >
                <div class="invalid-feedback"><?=GetMessage("ERROR_PASSWORD")?></div>
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
      
              <div class="col-12">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="USER_REMEMBER_frm" name="USER_REMEMBER" value="Y">
                  <label class="custom-control-label" for="USER_REMEMBER_frm"><?echo GetMessage("AUTH_REMEMBER_SHORT")?></label>
                </div>
              </div>
              <?endif?>


          <?if ($arResult["CAPTCHA_CODE"]):?>

              <!-- IF USED CAPTCHA -->
              <div class="col-12">
                <label class="form-label"><?=GetMessage("AUTH_CAPTCHA_PROMT")?>
                </label>
                <div class="input-group has-validation">
                  
                  <input required class="form-control" type="text" name="captcha_word" maxlength="50"  />
                  <div class="invalid-feedback"><?=GetMessage("ERROR_CAPTCHA_PROMT")?></div>
                </div>
              </div>
              <div class="col-12">
                <input type="hidden" name="captcha_sid" value="<?echo $arResult["CAPTCHA_CODE"]?>" />
                <img src="/bitrix/tools/captcha.php?captcha_sid=<?echo $arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
              </div>
              <!-- END CAPTCHA -->
          <?endif?>


              <div class="col-12">
                <button 
                  class="btn btn-primary w-100" type="submit" name="Login"><?=GetMessage("AUTH_LOGIN_BUTTON")?>
                </button>
              </div>

      
          
            
              <noindex>
              <div class="col-12">
                <p class="small mb-0">
                <?=GetMessage("AUTH_FORGOT_PASSWORD_2")?>

                  <a href="<?=$arResult["AUTH_FORGOT_PASSWORD_URL"]?>" rel="nofollow">
                  <?=GetMessage("AUTH_FORGOT_PASSWORD")?>
                  </a>
                </p>
              </div>
              </noindex>
           
              </form>
      
            </div>
          </div>
    
  
        </div>
      </div>







