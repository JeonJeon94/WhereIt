<?php $page="ranking"; ?>
<?php include_once('./a.head.php'); ?>
<?php
  $sql=sql_select("SELECT * FROM rank");
  
  $last = sql_one("SELECT id FROM rank ORDER BY id DESC");
  $last_num = $last[id];
?>
  <div class="main">
    <?php include_once('./a.menu.php'); ?>
    <div class="submain">
      <div class="submenu">
        <div class="rank" onclick="location.href='./a.ranking.php'">테마관리</div>
      </div>
      <div class="contents">
        <div id="rank_text">테마</div>
        <div id="rank_form">
          <?php 
            $i=0;
            foreach( $sql as $rows ){
              $i +=1;
          ?>
          <div id="form_num <?=$i?>">
            <form class="rank_theme" method=get action="a.ranking_h.php" >
              <div style="display:flex; margin-bottom:10px; align-items:center;">
                <div style="width: 100px;">테마<?=$i?></div>
                <input class="theme_title" name="theme_title<?=$i?>" placeholder="<?=$rows[theme]?>" />
                <input type="hidden" name="num" value="<?=$i?>" />
              </div>
              <div style="display:flex; align-items:center;">
                <div style="width: 100px;">태그<?=$i?></div>
                <input class="theme_tag" name="theme_tag<?=$i?>" placeholder="<?=$rows[tag]?>" />
                <input class="up_btn" type="submit" value="적용" />
                <div class="del_btn" onclick="del_item(this,<?=$i?>)">삭제</div>
                <?php if($i == $last_num){ ?>
                <div id="add_btn<?=$i?>" class="add_btn" onclick="add_item(this)">추가</div>
                <?php }else{ ?>
                <?php } ?>
              </div>
            </form>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</body>

<script>

  var count = <?=$i?>;

  function none(e){
    var none = $(e)
    console.log(none);
      none.css('display','none')
  }
  function show(){
    $('#add_btn<?=$i?>').css('display','block')
    flag = true;
  }

  //폼 삭제 버튼
  function del_item(obj,thisCount){

    var thisId = obj.parentNode.parentNode.parentNode;
    document.getElementById('rank_form').removeChild(thisId);
    if(thisCount <= <?=$last_num?>){
      location.href="a.ranking_d.php?id="+thisCount
    }else{
      show();
    }
  }

  var flag = true;
  //폼 추가 버튼
  function add_item(e){
    none(e)

    if(flag){
      <?php $i = $i+1; ?>
      count = <?=$i?>;
      var addedFormDiv = document.getElementById("rank_form");

      var str = '<form class="rank_theme" method=get action="a.ranking_h.php">'+
                  '<div style="display:flex; margin-bottom:10px; align-items:center;">'+
                    '<div style="width: 100px;">테마'+count+'</div>'+
                    '<input class="theme_title" name="theme_title'+count+'" placeholder="테마를 입력해주세요"/>'+
                    '<input type="hidden" name="num" value="'+count+'" />'+
                  '</div>'+
                  '<div style="display:flex; align-items:center;">'+
                    '<div style="width: 100px;">태그'+count+'</div>'+
                    '<input class="theme_tag" name="theme_tag'+count+'" placeholder="태그를 입력해주세요"/>'+
                    '<input class="up_btn" type="submit" value="적용" />'+
                    '<div class="del_btn" onclick="del_item(this,'+count+')">삭제</div>'+
                    '<div id="add_btn'+count+'" class="add_btn" onclick="add_item()">추가</div>'+
                  '</div>'+
                '</form>';

      var addedDiv = document.createElement("div");
      addedDiv.innerHTML = str;
      addedDiv.setAttribute('id','form_num '+count);
      addedFormDiv.appendChild(addedDiv);
      flag=false
    }else{

      alert("배너 적용후에 추가해 주세요.")
    }
  }


</script>

</html>



