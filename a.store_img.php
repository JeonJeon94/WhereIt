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
    <div id="img_save" onclick="saveImg('<%=Name%>')">저장</div> 
  </div>
</script>
  
<script>
  
  var storeId = '<?php echo $id; ?>'
  var checkList = []

  function saveImg(storeName){
    if(checkList.length >1){
      alert("대표이미지는 한개만 설정할수 있습니다.")

    }else if(checkList.length == 1){

      for(let c of checkList){
        api_select_pic(storeName,c, function(res){
          if(res.code ==1){
            location.href='a.store.php'
          }else{
            alert("대표이미지 설정에 실패하였습니다.")
          }
        })
      }
    }else(
      alert("이미지를 선택해주세요!")
    )
  }

  function __select(code){
    let f = checkList.findIndex((ele)=>{
      return ele === code
    })
    
    if(f !== -1){
      checkList.splice(f,1)
    } else{
      checkList.push(code)
    }
  }
  
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
          $(".detail_img").append( store_template(row))
        }catch(err){}
      }  
    })
  })
</script>

<script id="img-slot" type="text/template">
  <div class="list-line">
    <input class="select_check" onclick="__select('<%=code%>')" type="checkbox"/>
    <img src="<%=link%>" onerror="this.src='./images/whereit_img_loading_p.png'" onclick="location.href='https://instagram.com/p/<%=code%>'"/>
  </div>
</script>

</html>