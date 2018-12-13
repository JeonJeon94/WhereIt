<?php $page = "news" ?>
<?php include_once("./m.head.php") ?>

<?php
  if(!empty($_GET['data-id'])){
    $data_id=$_GET['data-id'];
  }else{
    $data_id ='';
  }
  if($data_id == 1){
    $url = "./어디지도/콘텐츠/1회차.png";
  }else if($data_id == 2){
    $url = "./히치하이커/콘텐츠내용/히치하이커1회차_01.png";
  }
?>
  <div class="main">
    <img src="<?php echo $url ?>"/>
  </div>
<?php include_once("./m.footer.php") ?>