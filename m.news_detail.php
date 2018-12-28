<?php $page = "news" ?>
<?php include_once("./m.head.php") ?>

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
  <div class="main">
    <?php if(count($arr)<=1){?>
      <img src="<?=$result[sub]?>"/>
    <?php }else{ for($i=0; $i<count($arr); $i++){ ?>
      <img src="<?php echo trim($arr[$i]); ?> " />
    <?php }} ?>
  </div>
<?php include_once("./m.footer.php") ?>