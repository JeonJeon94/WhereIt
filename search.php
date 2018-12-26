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
<?php

  // $result = sql_select("SELECT black_id FROM blacklist");

  // for($i=0; $i<=2; $i++){
  //   $rows[] = $result[$i][blacklist];
  // }
  
  // var_dump($row[]);
?>
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
            <div style="color:#504f57;">
              가장 인기있는<br>
              <b>핫플레이스</b>
            </div>
          </div> 
          <div class="search-time">
            <a id="all" style="color:#504F57; font-weight:bold; border-bottom:2px solid black; padding-bottom:2px;" href ="">누적</a>
            <a id="recently" href ="search_recently.php?search=<?php echo $search; ?>">최근 3개월</a>
          </div>
        </div>
        <div class="search-list">
          <div class="no-search">
            <b>"<?php echo $search; ?>"</b> 로 검색된 내용이 없습니다.<br>
            다른 <b>"검색어"</b>로 검색해주세요.
          </div>
          <div class="list-line">
          </div>
        </div>
      </div>  
      <div class="loading dot">
        <div></div>
        <div></div>
        <div></div>
      </div>
    </div>
<script>
  var list_length = 0
  var data = null
  var flag = false
  function nosearch(){
    $('.no-search').css('display', 'block')
  }
  function Loading(){
    if(flag === true){
      $('.loading').css('display', 'block')
      flag = false
      setTimeout(function(){
        $('.loading').css('display', 'none')
        if(data.payload.length >= list_length){
          flag = true
        }
      }, 1000);
    }
  }
  function SearchResultDraw(){
    var searchWord = "<?php echo $search; ?>";
    if(searchWord == "" || searchWord == " "){
      nosearch();
    } else{
      if(data === null)
        return
      var slot_template = _.template($("#store-slot").html());
      if(data.payload.length == 0 ){
        nosearch();
      }else{
        if(list_length !== 16){
          Loading()
          setTimeout(function(){
            for(var i = list_length - 16; i < list_length; i++){
              var row = data.payload[i]
              if(row === undefined)
                continue
              let nameDump = row.Name
              nameDump = nameDump.length>8 ? nameDump.slice(0,8)+"..." : nameDump
              row.Name = nameDump
              try{
                $(".list-line").append( slot_template(row) )
              }catch(err){}  
            }
          }, 1000);
        }
        else{
          for(var i = list_length - 16; i < list_length; i++){
            var row = data.payload[i]
            if(row === undefined)
              continue
            let nameDump = row.Name
            nameDump = nameDump.length>8 ? nameDump.slice(0,8)+"..." : nameDump
            row.Name = nameDump
            try{
              $(".list-line").append( slot_template(row) )
            }catch(err){}  
            flag = true
          }
        }
        
      }
    }
  }
  $(window).scroll(function() {
    if($(window).scrollTop() + $(window).height() == $(document).height() && flag) {
      list_length += 16
      SearchResultDraw()
    }
  });
  $(function(){
    var searchWord = "<?php echo $search; ?>";
    if(searchWord !== "" && searchWord !== " "){
      search_fandein(searchWord);
    } else{
      nosearch();
    }
  })
  
  function search_fandein(searchWord){
    api_search_data(searchWord,function(res){
      data = res
      list_length += 16
      SearchResultDraw()
    })
  }
</script>

<script id="store-slot" type="text/template">
  <div class="store-list">
    <div class="img-container" onclick="location.href='./detail.php?id=<%=_id%>'">
      <img alt="food-img" src="<%=main_img%>" onerror="this.src='./images/whereit_img_loading_p.png'"/>
    </div>
    <div class="flex" style="padding:5px 5px; width:232px;">
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
</script>

<?php include_once('./footer.php'); ?>