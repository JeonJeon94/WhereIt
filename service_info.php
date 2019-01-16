<?php $page='info' ?>
<?php 
$arr_browser = array ("iPhone","iPod","IEMobile","Mobile","lgtelecom","PPC");

for($indexi = 0 ; $indexi < count($arr_browser) ; $indexi++) {
 if(strpos($_SERVER['HTTP_USER_AGENT'],$arr_browser[$indexi]) == true){
  // 모바일 브라우저라면  모바일 URL로 이동 
   header("Location: ./m.service_info.php");
   exit;
 }
}
?>
<?php include_once('./head.php') ?>
    <div class="main">
      <div class="service-info">
        <img src="images/whereit_service_img.png" />
      </div>
    </div>
<?php include_once('./footer.php') ?>