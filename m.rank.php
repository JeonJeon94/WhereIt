<?php $page = "ranking-theme" ?>

<?php include_once("./m.head.php") ?>

<?php

if(!empty($_GET['tag'])){
  $g_tag = $_GET['tag'];
  $rank = sql_one("SELECT * FROM rank WHERE tag='$g_tag' ");
  $g_tag2 = $rank[tag];
  $theme = $rank[theme];
  $id = $rank[id];

  if($id==1){
    $rank = sql_one("SELECT * FROM rank WHERE id='2'");
    $g_tag = $rank[tag];
  }else if($id==2){
    $rank= sql_one("SELECT * FROM rank WHERE id='1'");
    $g_tag = $rank[tag];
  }
}else{
  $rank= sql_select("SELECT * FROM rank");
  $theme = $rank[1][theme];
  $g_tag2 = $rank[0][tag];
  $g_tag = $rank[1][tag];
}

?>
  <div class="main">
    <div class="title">
      <div class="nowdays" onclick="location.href='./m.rank-nowdays.php'">
        요즘 뜨는<br><b>핫플레이스</b>
      </div>
      <div class="theme" onclick="location.href='./m.rank.php'">
        <b>테마</b><br>핫플레이스
        <div class="margin"></div>
      </div>
      <div class="thismonth" onclick="location.href='./m.rank-thismonth.php'">
        이 달의<br><b>핫플레이스</b>
      </div>
    </div>
    <div class="insta">
      <div class="insta-container">
        <div class="insta-tag">
          <div style="flex:0 1 auto;">
            <div class="insta-list">
            <div class="insta-text-h" style="padding-top:3px;"><a href="">#<?=$g_tag2?></a></div>
                <div class="insta-text" style="display:none; padding:3px 0;"><a href="m.rank.php?tag=<?=$g_tag?>">#<?=$g_tag?></a></div>
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
    </div> 
  </div>


<script>
  if('<?=$g_tag2?>'=='피자'){
    var store_name = ['계동피자','대장장이화덕피자','피자네버슬립스','옥인피자','리골레토시카고피자','매덕스피자','팔로피자','피자오','보니스피자펍','피자무쪼'];
  }else if('<?=$g_tag2?>'=='와인'){
    var store_name = ['먼데이블루스','세컨라운드','심퍼티쿠시','서촌블루스','둘세이수아베','우아시스','몽리와인바','순라길비비','루나씨엘로','블루브릿지'];
  }
  function loadTemplate(id) { return document.getElementById(id).innerHTML; }

  $(function(){
    var temp = loadTemplate('rank-slot');
    var rank_templete = _.template($("#rank-slot").html());
    
    function load(i){
      api_search_data(store_name[i],function(res){
        data = res
        var row = data.payload[0]
        row.no = i+1 < 10 ? "0"+(i+1) : i+1
        $(".rank-area").append(rank_templete(row))
        if(i >= 9) return ;
        load(i+1);
      })
    }
    load(0);
  });



</script>

<script id="rank-slot" type="text/template">
  <div class="ranking-store">
    <div class="store-info">
      <div class="rank-num"><%=no%></div>
      <div class="store-name" onclick="location.href='m.detail.php?id=<%=_id%>'">
        <%=Name%>
      </div>
      <div style="display:flex; align-items:center;"> 
        <div class="keyword" style="margin-right: 10px;">
          <%=collect_region%>
        </div>
        <div class="keyword">
          <%=category[0]%>
        </div>
      </div>
    </div>
    <div class="store-img">
      <img src="<%=main_img%>"  onclick="location.href='m.detail.php?id=<%=_id%>'" onerror="this.src='./images/whereit_img_loading_p.png'"/>
    </div>
  </div>

</script>

<?php include_once("./m.footer.php") ?>