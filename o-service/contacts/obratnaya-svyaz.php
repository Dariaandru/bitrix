<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Contact Us");
?>

<div class="site-section">
    <div class="container">
        <div class="row">
       
          <div class="col-md-12 col-lg-8 mb-5">
				<?$APPLICATION->IncludeComponent("bitrix:main.feedback", "feedback", Array(
				"EMAIL_TO" => "daria.andrushuk@yandex.ru",	// E-mail, на который будет отправлено письмо
					"EVENT_MESSAGE_ID" => "",	// Почтовые шаблоны для отправки письма
					"OK_TEXT" => "Спасибо, ваше сообщение принято.",	// Сообщение, выводимое пользователю после отправки
					"REQUIRED_FIELDS" => "",	// Обязательные поля для заполнения
					"USE_CAPTCHA" => "Y",	// Использовать защиту от автоматических сообщений (CAPTCHA) для неавторизованных пользователей
				),
				false
				);?>
          </div>


		  <?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
					"AREA_FILE_SHOW" => "file",
					"AREA_FILE_SUFFIX" => "inc",
					"EDIT_TEMPLATE" => "",
					"PATH" => "/local/templates/home/feedback_include.php"
				)
			);?>


          <!-- <div class="col-lg-4">
            <div class="p-4 mb-3 bg-white">
              <h3 class="h6 text-black mb-3 text-uppercase">Contact Info</h3>
              <p class="mb-0 font-weight-bold">Address</p>
              <p class="mb-4">203 Fake St. Mountain View, San Francisco, California, USA</p>

              <p class="mb-0 font-weight-bold">Phone</p>
              <p class="mb-4"><a href="#">+1 232 3235 324</a></p>

              <p class="mb-0 font-weight-bold">Email Address</p>
              <p class="mb-0"><a href="#">youremail@domain.com</a></p>

            </div>
            
          </div> -->
        </div>
    </div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>