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
        <div id="rank_form_add"></div>
        <div id="rank_form">
          <?php 
            $i=0;
            foreach( $sql as $rows ){
              $i +=1;
          ?>
          <div id="form_num <?=$i?>">
            <form class="rank_theme" method=get action="a.ranking_h.php">
              <div style="display:flex; margin-bottom:10px; align-items:center;">
                <div style="width: 100px;">테마<?=$i?></div>
                <input id="theme_title" name="theme_title" placeholder="<?=$rows[theme]?>" />
                <input type="hidden" name="num" value="<?=$i?>" />
              </div>
              <div style="display:flex; align-items:center;">
                <div style="width: 100px;">태그<?=$i?></div>
                <input id="theme_tag" name="theme_tag" placeholder="<?=$rows[tag]?>" />
                <input id="up_btn" type="submit" value="적용"/>
                <div id="del_btn" onclick="del_item(this,<?=$i?>)">삭제</div>
                <?php if( $i == $last_num ){?>
                <div id="add_btn" onclick="add_item()">추가</div>
                <?php }else{ ?>
                <?php }?>
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

  //폼 추가 버튼
  function add_item(){
    var count = <?=$i?>+1;
    var addedFormDiv = document.getElementById("rank_form");

    var str = '<form class="rank_theme" method=get action="a.ranking_h.php">'+
                '<div style="display:flex; margin-bottom:10px; align-items:center;">'+
                  '<div style="width: 100px;">테마'+count+'</div>'+
                  '<input id="theme_title" name="theme_title" placeholder="테마를 입력해주세요"/>'+
                  '<input type="hidden" name="num" value="'+count+'" />'+
                '</div>'+
                '<div style="display:flex; align-items:center;">'+
                  '<div style="width: 100px;">태그'+count+'</div>'+
                  '<input id="theme_tag" name="theme_tag" placeholder="태그를 입력해주세요"/>'+
                  '<input id="up_btn" type="submit" value="적용"/>'+
                  '<div id="del_btn" onclick="del_item(this,'+count+')">삭제</div>'+
                '</div>'+
              '</form>';

    var addedDiv = document.createElement("div");
    addedDiv.innerHTML = str;
    addedDiv.setAttribute('id','form_num '+count);
    addedFormDiv.appendChild(addedDiv);
    
    count++;
  }

  //폼 삭제 버튼
  function del_item(thisCount){
    var addedFormDiv = document.getElementById("rank_form")

      var thisDiv = document.getElementById('form_num'+thisCount)
      addedFormDiv.removeChild(thisDiv.childNodes[0]);
      document.addedFormDiv.reset();
  }
  function del_item(obj,thisCount){
      // obj.parentNode 를 이용하여 삭제
      var thisId = obj.parentNode.parentNode.parentNode;
      document.getElementById('rank_form').removeChild(thisId);
      if(thisCount <= <?=$last_num?>){
        location.href="a.ranking_d.php?id="+thisCount
      }
    }

</script>

</html>



