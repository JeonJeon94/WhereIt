<?php $page = "search"; ?>
<?php 
$arr_browser = array ("iPhone","iPod","IEMobile","Mobile","lgtelecom","PPC");

for($indexi = 0 ; $indexi < count($arr_browser) ; $indexi++) {
  if(strpos($_SERVER['HTTP_USER_AGENT'],$arr_browser[$indexi]) == true){
  // 모바일 브라우저라면  모바일 URL로 이동 
    header("Location: ./m.search.php");
    exit;
  }
}
?>
<?php include_once("./head.php") ?>
    <div class="main">
      <div class="search-center">
        <div class="main-top">
          <div style="display:flex; font-size: 2em; flex-direction:column;">
            <div style="display:flex; align-items:center;">
              <div style="color:#FF5566; margin-right:4px;">
                <?=$address?>
              </div>/
              <div style="color:#FF5566; margin-left:4px;">
                <?=$food?>
              </div>
            </div><br><b style="font-weight: 500; font-family:Noto Sans KR, sans-serif !important;">TOP10</b>
          </div>
        </div>  
        <div class="search-list">
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
            <div class="search-store1">
            </div>
            <div class="search-store2">
            </div>
            <div class="right-btn">
              <img src="./images/btn_right.png" />
            </div>
            <div class="left-btn">
              <img src="./images/btn_left.png" />
            </div>
          </div>
        </div>
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

  $(function(){ 
    var slot_template = _.template($("#store-slot").html());
    api_search_data(searchWord,function(data){
      if(data.payload.length == 0){
        nosearch()
      }else{
        if(data.payload.length<5){
          $('.right-btn').css('display','none')
          for(var i = 0; i <data.payload.length; i++){
            var row = data.payload[i]
            row.no = (i+1)
            if(row === undefined)
              continue
            let nameDump = row.Name
            nameDump = nameDump.length>8 ? nameDump.slice(0,8)+"..." : nameDump
            row.Name = nameDump
            try{
              $(".search-store1").append( slot_template(row) )
            }catch(err){}  
          }
        }else{
          for(var i = 0; i < 5; i++){
            var row = data.payload[i]
            row.no = (i+1)
            if(row === undefined)
              continue
            let nameDump = row.Name
            nameDump = nameDump.length>8 ? nameDump.slice(0,8)+"..." : nameDump
            row.Name = nameDump
            try{
              $(".search-store1").append( slot_template(row) )
            }catch(err){}
          }
        }
      }
    })
  })
  $(function(){ 
    var slot_template = _.template($("#store-slot").html());
    api_search_data(searchWord,function(data){
      if(data.payload.length == 0){
        nosearch()
      }else{
        for(var i = 5; i < 10; i++){
          var row = data.payload[i]
          row.no = (i+1)
          if(row === undefined)
            continue
          let nameDump = row.Name
          nameDump = nameDump.length>8 ? nameDump.slice(0,8)+"..." : nameDump
          row.Name = nameDump
          try{
            $(".search-store2").append( slot_template(row) )
          }catch(err){}  
        }
      }
    })
  })
  
  $('.right-btn').click(function(){
    $('.search-store1').css('display','none')
    $('.search-store2').css('display','flex')   
    $('.left-btn').css('display','block')
    $('.right-btn').css('display','none')
  })
  $('.left-btn').click(function(){
    $('.search-store1').css('display','flex')
    $('.search-store2').css('display','none')
    $('.right-btn').css('display','block')
    $('.left-btn').css('display','none')
  })

</script>


<script id="store-slot" type="text/template">
  <div style="display:flex; flex-direction:column; width:260px;">
    <div class="store_num"><%=no%></div>
    <div class="store-list">
      <div class="img-container" onclick="location.href='./detail.php?id=<%=_id%>'">
        <img alt="food-img" src="<%=main_img%>" onerror="this.src='./images/whereit_img_loading_p.png'"/>
      </div>
      <div class="flex" style="padding:5px 5px; width:220px;">
        <div class="store-name"><%=Name%></div>
        <div class="views">2.40K</div>
      </div>
      <div class="flex" style="padding-left: 4px;">
        <div class="keyword">
          <div class="chile-flex-1;"><%=collect_region%></div>
        </div>
        <div class="keyword">
          <div class="chile-flex-1;"><%=category[0]%></div>
        </div>
      </div>
    </div>
  </div>
</script>

<?php include_once('./footer.php'); ?>