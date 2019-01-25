<?php $page="favorite" ?>
<?php $NEED_LOGIN = true; ?>
<?php include_once("./m.head.php") ?>
<?php

$shop_count = sql_one("SELECT count(shopId) FROM favorit WHERE user_id = '$member[id]'");

$shop_list = sql_select("SELECT shopId FROM favorit WHERE user_id = '$member[id]'");

?>

  <div class="main">
    <div class="favorit-title">
      <b>즐겨찾는</b><br>
      플레이스
    </div>
    <div class="favorite-list">
      <?php if($shop_count['count(shopId)']=='0'){ ?>
        <div class="list-line">
          <div style="margin:0 auto">
            <h2>즐겨찾기 된 상점이 없습니다.</h2>
          </div>
        </div>
      <?php }else{ ?>
        <div class="list-line">
        </div>
      <?php } ?>
    </div>
  </div>


<script>

  var main = []
  
  $(document).ready(function(){
    var L_array = <?php echo json_encode($shop_list); ?>;
    L_array.forEach(
      function aa(value){
        api_shop_detail(value.shopId,function(data){
          var slot_template = _.template($("#store-slot").html());
          var row = data.payload
          let nameDump = row.Name
              nameDump = nameDump.length>6 ? nameDump.slice(0,6)+"..." : nameDump
              row.Name = nameDump

          if(row.main_img === undefined){
            main.push(row.imgs[0].link)
            row.main_img = main
          }
          try{
            $(".list-line").append( slot_template(row) )
          }catch(err){}  
        })
      })
  })
</script>

<script id="store-slot" type="text/template">
  <div class="store-list">
    <div class="img-container" onclick="location.href='./m.detail.php?id=<%=_id%>'">
      <img alt="food-img" src="<%=main_img%>" onerror="this.src='./images/whereit_img_loading_m.png'"/>
    </div>
    <div style="padding:5px 5px; display:flex;">
      <div class="store-name"><%=Name%></div>
      <div class="views">2.40K</div>
    </div>
    <div style="display:flex;">
      <div class="keyword">
        <div><%=region%></div>
      </div>
      <div class="keyword">
        <div><%=food_category%></div>
      </div>
    </div>
  </div>
</script>



<?php include_once("./m.footer.php") ?>