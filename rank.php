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
<?php

if(!empty($_GET['tag'])){
  $g_tag = $_GET['tag'];
  $rank = sql_one("SELECT * FROM rank WHERE tag='$g_tag' ");
  $g_tag2 = $rank[tag];
  $theme = $rank[theme];
  $id = $rank[id];
  $rank= sql_select("SELECT * FROM rank WHERE NOT id = '$id' AND NOT tag = '$g_tag2'");
  $g_tag = $rank;
  $ranking = sql_select("SELECT * FROM rank WHERE id = '$id' AND tag = '$g_tag2'");
}else{
  $rank= sql_select("SELECT * FROM rank");
  $theme = $rank[0][theme];
  $g_tag2 = $rank[0][tag];
  $id = $rank[0][id];
  $rank= sql_select("SELECT * FROM rank WHERE NOT id = '$id' AND NOT tag = '$g_tag2'");
  $g_tag = $rank;
  $ranking = sql_select("SELECT * FROM rank WHERE id = '$id' AND tag = '$g_tag2'");
}

?>

    <div class="main">
      <div class="title">
        <div class="nowdays" onclick="location.href='./rank-nowdays.php'">
          요즘 뜨는<br><b>핫플레이스</b>
        </div>
        <div class="theme" onclick="location.href='./rank.php'">
          <b><?=$theme?></b><br>핫플레이스
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
                <div class="insta-text-h" style="padding-top:3px;"><a href="rank.php?tag=<?=$g_tag2?>">#<?=$g_tag2?></a></div>
                <?php foreach ($g_tag as $info) {?>
                <div class="insta-text" style="display:none; padding:3px 0;"><a href="rank.php?tag=<?=$info[tag]?>">#<?=$info[tag]?></a></div>
                <?php } ?>
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
  var store_name = ['<?=$ranking[0][r1]?>','<?=$ranking[0][r2]?>','<?=$ranking[0][r3]?>','<?=$ranking[0][r4]?>','<?=$ranking[0][r5]?>','<?=$ranking[0][r6]?>','<?=$ranking[0][r7]?>','<?=$ranking[0][r8]?>','<?=$ranking[0][r9]?>','<?=$ranking[0][r10]?>'];

  
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