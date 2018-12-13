<?php $page = "ranking-thismonth" ?>

<?php include_once("./m.head.php") ?>

  <div class="main">
    <div class="title">
      <div class="theme" onclick="location.href='./m.rank.php'">
        테마<br><b>핫플레이스</b>
      </div>
      <div class="thismonth" onclick="location.href='./m.rank-thismonth.php'">
        이 달의<br><b>핫플레이스</b>
        <div class="margin"></div>
      </div>
      <div class="nowdays" onclick="location.href='./m.rank-nowdays.php'">
        요즘 뜨는<br><b>핫플레이스</b>
      </div>
    </div>
    <div class="rank-area">
      
    </div> 
  </div>
  
<script>
  var store_name = ['세븐블레스','샤오짠','스테이터','비스테까','Tokyo420','훌라훌라','르브리에','마음을담아내면','더라스트펍','미스터카츠'];
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
      <img src="<%=main_img%>"  onclick="location.href='m.detail.php?id=<%=_id%>'" />
    </div>
  </div>

</script>

<?php include_once("./m.footer.php") ?>