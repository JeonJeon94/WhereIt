<?php $page="store"; ?>
<?php include_once('./a.head.php'); ?>
<?php 
  
  if(!empty($_GET['id'])){
    $id = $_GET['id'];
  }else{
    history_back();
  }
?>
  <div class="main">
    <?php include_once('./a.menu.php'); ?>
    <div class="submain">
      <div class="submenu">
        <div class="store" onclick="location.href='./a.store.php'">업체관리</div>
      </div>
      <div class="contents">
        <div class="store_img"></div>
        <div class="detail_img"></div>
      </div>
    </div>
  </div>
</body>

<script>
  
  function loadTemplate(id) { return document.getElementById(id).innerHTML; }

  $(function(){
    var temp = loadTemplate('store-slot');
    var store_templete = _.template($("#store-slot").html());

    function load(){
      api_shop_detail('<?=$id?>', function(data){
        let row = data.payload
        try{
          $(".store_img").append(store_templete(row))
        }catch(err){}  
      })
    }
    load(0);
  });
  
</script>
  
  
<script id="store-slot" type="text/template">
  <div style="display:flex;">
    <div id="img_list" onclick="location.href='a.store.php'">목록</div>
    <div id="img_name"><%=Name%></div>
    <div id="img_save" onclick="saveImg()">저장</div> 
  </div>
</script>
  
<script>
  var storeId = '<?php echo $id; ?>'

  $(function(){
    api_shop_detail(storeId,function(data){
      var store_template = _.template($("#img-slot").html());
      var row = data.payload
      for(var i = 0; i < data.payload.imgs.length; i++){
        var row = data.payload.imgs[i]
        if(row === undefined){
          continue
        }
        try{
          $(".detail_img").append( store_template(row) )
        }catch(err){}
      }  
    })
  })
</script>

<script id="img-slot" type="text/template">
  <div class="list-line">
    <input id="check" class="del_check" type="checkbox"/>
    <img src="<%=link%>" onerror="this.src='./images/whereit_img_loading_p.png'" onclick="location.href='https://instagram.com/p/<%=code%>'"/>
  </div>
</script>
</html>