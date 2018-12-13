<?php $page="ranking-nowdays"; ?>
<?php 
$arr_browser = array ("iPhone","iPod","IEMobile","Mobile","lgtelecom","PPC");

for($indexi = 0 ; $indexi < count($arr_browser) ; $indexi++) {
 if(strpos($_SERVER['HTTP_USER_AGENT'],$arr_browser[$indexi]) == true){
  // 모바일 브라우저라면  모바일 URL로 이동 
   header("Location: ./m.rank-nowdays.php");
   exit;
 }
}
?>
<?php include_once("./head.php") ?>
    <div class="main">
      <div class="title">
        <div class="thismonth" onclick="location.href='./rank-thismonth.php'">
          이 달의<br><b>핫플레이스</b>
        </div>
        <div class="nowdays" onclick="location.href='./rank-nowdays.php'">
          요즘 뜨는<br><b>핫플레이스</b>
          <div class="margin"></div>
        </div>
        <div class="theme" onclick="location.href='./rank.php'">
          테마<br><b>핫플레이스</b>
        </div>
      </div>     
      <div class="rank-area">
        <div class="ranking5">
          
        </div>
        <div class="ranking10">
          
        </div>
      </div>
    </div>
  
<script>
  
  var rank = $('.ranking-store')
  
  $(document).ready(function(){
    for(var n=0; n < 10; n++){
      ani_load(n)
    }
  });

  function ani_load(n){
    setTimeout(function() {
      $(rank[n]).css('display','flex')
    }, n * 200);
  }

</script>

<script>
  var store_name = ['쥬벤쿠바','세븐블레스','리퀴드랩','리틀넥','랑만','젤렌','독일주택','시미시미','익동정육점','열두달'];
  function loadTemplate(id) { return document.getElementById(id).innerHTML; }

  $(function(){
    var temp = loadTemplate('rank-slot');
    var rank_templete = _.template($("#rank-slot").html());
    
    function load(i){
      api_search_data(store_name[i],function(res){
        data = res
        var row = data.payload[0]
        row.no = i+1 < 10 ? "0"+(i+1) : i+1
        $(".ranking5").append(rank_templete(row))
        if(i >= 4) return ;
        load(i+1);
      })
    }
    load(0);

    function load2(i){
      api_search_data(store_name[i],function(res){
        data = res
        var row = data.payload[0]
        row.no = i+1 < 10 ? "0"+(i+1) : i+1
        $(".ranking10").append(rank_templete(row))
        if(i >= 9) return ;
        load2(i+1);
      })
    }
    load2(5);
  });

</script>

<script id="rank-slot" type="text/template">
  <div class="ranking-store" style="display:flex;">
    <div class="rank-num"><%=no%></div>
    <div class="store-img" onclick="location.href='detail.php?id=<%=_id%>'">
      <img src="<%=main_img%>" />
    </div>
    <div style="display:flex; flex-direction:column; padding-left: 10px; padding-bottom: 5px;">
      <div class="name" onclick="location.href='detail.php?id=<%=_id%>'" >
        <%=Name%>
      </div>
      <div class="flex">
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

<?php include_once("./footer.php") ?>