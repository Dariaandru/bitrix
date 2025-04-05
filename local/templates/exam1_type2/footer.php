<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
IncludeTemplateLangFile(__FILE__);
?>

</section>



</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
  <div class="copyright">
    <?=GetMessage('FOOTER_PHRASE')?>
  </div>
  <div class="credits">
    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
  </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->

<?

use Bitrix\Main\Page\Asset;

Asset::getInstance()->AddJs(SITE_TEMPLATE_PATH . "/assets/vendor/bootstrap/js/bootstrap.bundle.min.js");
Asset::getInstance()->AddJs(SITE_TEMPLATE_PATH . "/assets/js/main.js");

?>
</body>

</html>