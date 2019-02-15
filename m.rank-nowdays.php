<?php $page = "ranking-nowdays" ?>

<?php include_once("./m.head.php") ?>
<?php 
  $days = sql_one("SELECT * FROM rank WHERE id = 100");
?>
  <div class="main">
    <div class="title">
      <div class="thismonth" onclick="location.href='./m.rank-thismonth.php'">
        이 달의<br><b>핫플레이스</b>
      </div>
      <div class="nowdays" onclick="location.href='./m.rank-nowdays.php'">
        요즘 뜨는<br><b>핫플레이스</b>
        <div class="margin"></div>
      </div>
      <div class="theme" onclick="location.href='./m.rank.php'">
        테마<br><b>핫플레이스</b>
      </div>
    </div>
    <div class="rank-area">
      
    </div> 
  </div>
  

<script>
  var store_name = ['<?=$days[r1]?>','<?=$days[r2]?>','<?=$days[r3]?>','<?=$days[r4]?>','<?=$days[r5]?>','<?=$days[r6]?>','<?=$days[r7]?>','<?=$days[r8]?>','<?=$days[r9]?>','<?=$days[r10]?>'];
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
          <%=region%>
        </div>
        <div class="keyword">
          <%=food_category%>
        </div>
      </div>
    </div>
    <div class="store-img">
      <img src="<%=main_img%>"  onclick="location.href='m.detail.php?id=<%=_id%>'" onerror="this.src='./images/whereit_img_loading_p.png'"/>
    </div>
  </div>

</script>
<?php include_once("./m.footer.php") ?>