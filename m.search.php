<?php $page = "search" ?>

<?php include_once("./m.head.php") ?>
<div class="wow" style="position:fixed; left:0;top:0; background-color:#fff; padding:10px;font-weight:20px;"></div>
  <div class="main">
    <div class="main-top">
      <div class="top_layer_1">
        <div class="text">
          가장 인기있는<br><b>핫 플레이스</b>
        </div>
        <div class="search-time">
          <a id="all" style="color:#504f57; font-weight:bold; border-bottom:2px solid black; padding-bottom:10px;" href="">누적</a>
          <a id="recently" href="m.search_recently.php?search=<?php echo $search; ?>">최근 3개월</a>
        </div>
      </div>
      <div class="top_layer_2">
        <div class="view-type">
          <img id="double" src="./images/etc/menu1-active.png" />
          <img id="single" src="./images/etc/menu2.png" onclick="location.href='m.search-one.php?search=<?php echo $search; ?>'"/>
        </div>
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
              nameDump = nameDump.length>6 ? nameDump.slice(0,6)+"..." : nameDump
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
            nameDump = nameDump.length>6 ? nameDump.slice(0,6)+"..." : nameDump
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
    $(".wow").html(`${$(window).scrollTop()} + ${$(window).height()} == ${$(document).height()}`)
    if($(window).scrollTop() + $(window).height() +50 >= $(document).height() && flag) {
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
    <div class="img-container" onclick="location.href='./m.detail.php?id=<%=_id%>'">
      <img alt="food-img" src="<%=main_img%>" onerror="this.src='./images/whereit_img_loading_m.png'"/>
    </div>
    <div style="padding:5px 0px; display:flex; align-items:center;">
      <div class="store-name"><%=Name%></div>
      <div class="views">2.40K</div>
    </div>
    <div style="display:flex;">
      <div class="keyword">
        <div><%=collect_region%></div>
      </div>
      <div class="keyword">
        <div><%=category[0]%></div>
      </div>
    </div>
  </div>
</script>

<?php include_once("./m.footer.php") ?>