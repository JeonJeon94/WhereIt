<?php $page = "search" ?>

<?php include_once("./m.head.php") ?>
  <div class="main">
    <div class="main-top">
      <div class="top_layer_1">
        <div class="text">
          <div style="display:flex;">
            <div style="color:#FF5566; margin-right:4px;">
              <?=$address?>
            </div>/
            <div style="color:#FF5566; margin-left:4px;">
              <?=$food?>
            </div>
          </div><br><b>TOP10</b>
        </div>
      </div>
    </div>
    <div class="no-search">
      <?php if(empty($food)){ ?>
        <b>"<?=$address?>"</b> 지역으로 검색된 내용이 없습니다.<br>
        다른 <b>"키워드"</b>로 검색해주세요.
      <?php }else{ ?>
        <b>"<?=$address?>"</b> 지역에 <b>"<?=$food?>"</b> (으)로 검색된 내용이 없습니다.<br>
        다른 <b>"키워드"</b>로 검색해주세요.
      <?php } ?>
    </div>
    <div class="list-line">
    </div>
  </div>

<script>

  if('<?=$food?>' != ""){
    var searchWord = "<?=$address?>"+" "+"<?=$food?>";
  }else{
    var searchWord = "<?=$address?>"
  }
  
  function nosearch(){
    $('.no-search').css('display', 'block')
  }

  function loadTemplate(id) { return document.getElementById(id).innerHTML; }

  $(function(){
    var temp = loadTemplate('store-slot');
    var store_template = _.template($("#store-slot").html());
    api_search_data(searchWord,function(data){
      if(data.payload.length == 0 ){
        nosearch();
      }else{
        for(var i = 0; i < 10; i++){
          var row = data.payload[i]
          row.no = (i+1)
          if(row === undefined)
            continue
          try{
            $(".list-line").append( store_template(row) )
          }catch(err){console.log(err)}  
        }
      }
    })
  });



</script>

<script id="store-slot" type="text/template">
  <div class="store-list">
    <div class="store-info">
      <div class="store-num"><%=no%></div>
      <div class="store-name" onclick="location.href='m.detail.php?id=<%=_id%>'">
        <%=Name%>
      </div>
      <div style="display:flex; align-items:center;"> 
        <div class="keyword" style="margin-right: 10px;">
          <%=region%>
        </div>
        <div class="keyword">
          <%=food_category%>
        </div>
      </div>
    </div>
    <div class="store-img">
      <img src="<%=main_img%>"  onclick="location.href='m.detail.php?id=<%=_id%>'" onerror="this.src='./images/whereit_img_loading_p.png'"/>
    </div>
  </div>

</script>


<?php include_once("./m.footer.php") ?>