<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "about");


$APPLICATION->SetTitle("About Us");
?>
 
 <!-- chain -->

<!-- <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10">
            <h1 class="mb-2">About Us</h1>
            <div><a href="index.php">Home</a> <span class="mx-2 text-white">&bullet;</span> <strong class="text-white">About</strong></div>
          </div>
        </div>
      </div>
    </div> -->
    <!-- chain -->


    <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/local/templates/home/about_include.php"
	)
);?>


    <!-- <div class="site-section border-bottom">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
            <img src="<?=SITE_TEMPLATE_PATH?>/images/about.jpg" alt="Image" class="img-fluid">
          </div>
          <div class="col-md-5 ml-auto"  data-aos="fade-up" data-aos-delay="200">
            <div class="site-section-title mb-3">
              <h2>Our Company</h2>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus in cum odio.</p>
            <p>Illum repudiandae ratione facere explicabo. Consequatur dolor optio iusto, quos autem voluptate ea? Sunt laudantium fugiat, mollitia voluptate? Modi blanditiis veniam nesciunt architecto odit voluptatum tempore impedit magnam itaque natus!</p>
          </div>
        </div>
      </div>
    </div> -->
    
    <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>