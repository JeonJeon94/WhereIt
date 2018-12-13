<?php $page="ranking-theme"; ?>
<?php 
$arr_browser = array ("iPhone","iPod","IEMobile","Mobile","lgtelecom","PPC");

for($indexi = 0 ; $indexi < count($arr_browser) ; $indexi++) {
 if(strpos($_SERVER['HTTP_USER_AGENT'],$arr_browser[$indexi]) == true){
  // 모바일 브라우저라면  모바일 URL로 이동 
   header("Location: ./m.rank.php");
   exit;
 }
}
?>
<?php include_once("./head.php") ?>
    <div class="main">
      <div class="title">
        <div class="nowdays" onclick="location.href='./rank-nowdays.php'">
          요즘 뜨는<br><b>핫플레이스</b>
        </div>
        <div class="theme" onclick="location.href='./rank.php'">
          <b>테마</b><br>핫플레이스
          <div class="margin"></div>
        </div>
        <div class="thismonth" onclick="location.href='./rank-thismonth.php'">
          이 달의<br><b>핫플레이스</b>
        </div>
      </div>
      <div class="insta">
        <div class="insta-container">
          <div class="insta-tag">
            <div style="flex:0 1 auto;">
              <div class="insta-list">
                <div class="insta-text-h" style="padding-top:3px;"><a href="">#핏자</a></div>
                <div class="insta-text" style="display:none; padding:3px 0;"><a href="">#핏자</a></div>
                <div class="insta-text" style="display:none; padding-bottom:3px;"><a href="">#핏자</a></div>
              </div>
            </div>
          </div>
          <div class="insta-btn">
            <img id="in-down_bt" src="./images/rank_down.png" />
            <img id="in-up_bt" src="./images/rank_up.png" />
          </div>
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
  var store_name = ['계동피자','대장장이화덕피자','피자네버슬립스','옥인피자','리골레토시카고피자','매덕스피자','팔로피자','피자오','보니스피자펍','피자무쪼'];
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