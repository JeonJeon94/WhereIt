<?php $page="magazine"; ?>
<?php include_once('./head.php'); ?>

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
    <div class="move-top">
      <img id="top" src="./images/top.png" />
      <img id="hover" src="./images/top-hover.png" />
      <img id="click" src="./images/top-click.png" />
      <br>TOP
    </div>
    <div class="main">
    <?php if($data_id==1) {?>
      <img src="<?php echo $url ?>"/>
    <?php }else if($data_id == 2){?>
      <img src="./히치하이커/콘텐츠내용/히치하이커1회차_01.png"/>
      <img src="./히치하이커/콘텐츠내용/히치하이커1회차_02.png"/>
      <img src="./히치하이커/콘텐츠내용/히치하이커1회차_03.png"/>
      <img src="./히치하이커/콘텐츠내용/히치하이커1회차_04.png"/>
      <img src="./히치하이커/콘텐츠내용/히치하이커1회차_05.png"/>
    <?php }else{?>
      
    <?php } ?>
    </div>
  </div>
</div>
</body>
<?php include_once('./script/move_top_js.php'); ?>
<?php include_once('./script/dropdown_js.php'); ?>
</html>