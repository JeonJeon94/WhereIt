<?php $page="magazine"; ?>
<?php 
$arr_browser = array ("iPhone","iPod","IEMobile","Mobile","lgtelecom","PPC");

for($indexi = 0 ; $indexi < count($arr_browser) ; $indexi++) {
  if(strpos($_SERVER['HTTP_USER_AGENT'],$arr_browser[$indexi]) == true){
  // 모바일 브라우저라면  모바일 URL로 이동 
    header("Location: ./m.news_detail.php");
    exit;
  }
}
?>
<?php include_once('./head.php'); ?>

<?php
  if(!empty($_GET['data-id'])){
    $data_id=$_GET['data-id'];
  }else{
    $data_id ='';
  }

  $result = sql_one("SELECT * FROM contents where id='$data_id'");
  $text = $result[sub];

  $str = "$text";
  $arr = explode(',', $str);
  
?>
    <div class="move-top">
      <img id="top" src="./images/top.png" />
      <img id="hover" src="./images/top-hover.png" />
      <img id="click" src="./images/top-click.png" />
      <br>TOP
    </div>
    <div class="main">
      <?php if(count($arr)<=1){?>
        <img src="<?=$result[sub]?>"/>
      <?php }else{ for($i=0; $i<count($arr); $i++){ ?>
        <img src="<?php echo trim($arr[$i]); ?> " />
      <?php }} ?>
    </div>
  </div>
</div>
</body>
<?php include_once('./script/move_top_js.php'); ?>
<?php include_once('./script/dropdown_js.php'); ?>
<?php include_once('./script/search_key_js.php'); ?>
</html>