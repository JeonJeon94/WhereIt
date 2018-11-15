<?php $page = "search"; ?>
<?php include_once("./head.php") ?>
    <div class="move-top">
      <img id="top" src="./images/top.png" />
      <img id="hover" src="./images/top-hover.png" />
      <img id="click" src="./images/top-click.png" />
      <br>TOP
    </div>
    <div class="main">
      <div class="search-center">
        <div class="main-top">
          <div style="font-size: 2em;">
            <div>
              가장 인기있는<br>
              <b>핫플레이스</b>
            </div>
          </div> 
          <div class="search-time">
            <a id="all" style="color:black; font-weight:bold; border-bottom:2px solid black; padding-bottom:2px;" href ="">누적</a>
            <a id="recently" href ="search_recently.php?search=<?php echo $search; ?>">최근 1개월</a>
          </div>
        </div>
        <div class="search-list">
          <div class="no-search">
            검색된 <b>내용</b>이 없습니다.<br>
            다른 <b>"검색어"</b>로 검색해주세요.
          </div>
          <div class="list-line">
          </div>
        </div>
      </div>  
    </div>
<script>
  function nosearch(){
    $('.no-search').css('display', 'block')
  }

  $(function(){
    console.log("ASD")
    var searchWord = "<?php echo $search; ?>";
    if(searchWord == "" || searchWord == " "){
      nosearch();
    } else{
      api_search_data(searchWord,function(data){
        var slot_template = _.template($("#store-slot").html());
        if(data.payload.length == 0 ){
          nosearch();
        }else{
          for(var i =0; i < data.payload.length; i++){
            var row = data.payload[i]
            let nameDump = row.Name
            nameDump = nameDump.length>8 ? nameDump.slice(0,8)+"..." : nameDump
            row.Name = nameDump
            try{
              $(".list-line").append( slot_template(row) )
            }catch(err){}  
          }
        }
      })
    }
    
  })
</script>

<script id="store-slot" type="text/template">
  <div class="store-list">
    <div class="img-container" onclick="location.href='./detail.php?id=<%=_id%>'">
      <img alt="food-img" src="<%=main_img%>" onerror="this.src='./images/desktop_detail_default.png'"/>
    </div>
    <div class="flex" style="padding:8px 4px; width:232px;">
      <div class="store-name"><%=Name%></div>
      <div class="views">2.4k</div>
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
</script>

<?php include_once('./footer.php'); ?>