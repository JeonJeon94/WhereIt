<?php $page="ranking-thismonth"; ?>
<?php 
$arr_browser = array ("iPhone","iPod","IEMobile","Mobile","lgtelecom","PPC");

for($indexi = 0 ; $indexi < count($arr_browser) ; $indexi++) {
 if(strpos($_SERVER['HTTP_USER_AGENT'],$arr_browser[$indexi]) == true){
  // 모바일 브라우저라면  모바일 URL로 이동 
   header("Location: ./m.rank-thismonth.php");
   exit;
 }
}
?>
<?php include_once("./head.php") ?>
<?php 
  $month = sql_one("SELECT * FROM rank WHERE id = 99");
?>
    <div class="main">
      <div class="title">
        <div class="theme" onclick="location.href='./rank.php'">
          테마<br><b>핫플레이스</b>
        </div>
        <div class="thismonth" onclick="location.href='./rank-thismonth.php'">
          이 달의<br><b>핫플레이스</b>
          <div class="margin"></div>
        </div>
        <div class="nowdays" onclick="location.href='./rank-nowdays.php'">
          요즘 뜨는<br><b>핫플레이스</b>
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
  var store_name = ['<?=$month[r1]?>','<?=$month[r2]?>','<?=$month[r3]?>','<?=$month[r4]?>','<?=$month[r5]?>','<?=$month[r6]?>','<?=$month[r7]?>','<?=$month[r8]?>','<?=$month[r9]?>','<?=$month[r10]?>'];
  function loadTemplate(id) { return document.getElementById(id).innerHTML; }
  
  var main = []
  var main_none = "./images/whereit_img_loading_p.png"
  $(function(){
    var temp = loadTemplate('rank-slot');
    var rank_templete = _.template($("#rank-slot").html());
    
    function load(i){
      api_search_data(store_name[i],function(res){
        data = res
        var row = data.payload[0]
        if(row.main_img === undefined){
          main.push(main_none)
          row.main_img = main
        }
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
        if(row.main_img === undefined){
          main.push(main_none)
          row.main_img = main
        }
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
      <img src="<%=main_img%>" onerror="this.src='./images/whereit_img_loading_p.png'"/>
    </div>
    <div style="display:flex; flex-direction:column; padding-left: 10px; padding-bottom: 5px;">
      <div class="name" onclick="location.href='detail.php?id=<%=_id%>'" >
        <%=Name%>
      </div>
      <div class="flex">
        <div class="keyword">
          <div class="chile-flex-1;"><%=region%></div>
        </div>
        <div class="keyword">
          <div class="chile-flex-1;"><%=food_category%></div>
        </div>
      </div>
    </div>
  </div>
</script>

<?php include_once("./footer.php") ?>