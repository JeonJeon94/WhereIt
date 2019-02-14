<?php $page="ranking"; ?>
<?php include_once('./a.head.php'); ?>
<?php
  $sql=sql_select("SELECT * FROM rank WHERE id<99");
  
  $last = sql_one("SELECT id FROM rank WHERE id<99 ORDER BY id DESC");
  $last_num = $last[id];
?>
  <div class="main">
    <?php include_once('./a.menu.php'); ?>
    <div class="submain">
      <div class="submenu">
        <div class="rank" onclick="location.href='./a.ranking.php'">테마 핫플레이스</div>
        <div class="rank" onclick="location.href='./a.ranking-thismonth.php'">이 달의 핫플레이스</div>
        <div class="rank" onclick="location.href='./a.ranking-nowdays.php'">요즘 뜨는 핫플레이스</div>
      </div>
      <div class="contents">
        <div id="rank_text">테마</div>
        <div id="rank_form">
          <?php 
            $i=0;
            foreach( $sql as $rows ){
              $i +=1;
          ?>
          <div id="form_num <?=$i?>" style="margin:20px 0;">
            <form class="rank_theme" method=get action="a.ranking_h.php" >
              <div style="display:flex; margin-bottom:10px; align-items:center;">
                <div style="width: 100px;">테마<?=$i?></div>
                <input class="theme_title" name="theme_title<?=$i?>" placeholder="<?=$rows[theme]?>" value="<?=$rows[theme]?>" />
                <input type="hidden" name="num" value="<?=$i?>" />
              </div>
              <div style="display:flex; align-items:center;">
                <div style="width: 100px;">태그<?=$i?></div>
                <input class="theme_tag" name="theme_tag<?=$i?>" placeholder="<?=$rows[tag]?>" value="<?=$rows[tag]?>"/>
                <input class="up_btn" type="submit" value="적용" />
                <div class="del_btn" onclick="del_item(this,<?=$i?>)">삭제</div>
                <?php if($i == $last_num){ ?>
                <div id="add_btn<?=$i?>" class="add_btn" onclick="add_item(this)">추가</div>
                <?php }else{ ?>
                <?php } ?>
              </div>
              <div stlye="display:flex; align-items:center;">
                <div style="display:flex; flex-wrap:wrap; margin-left:60px; width:450px;">
                  <div class="rank_num"><div style="width:30px;">1.</div><input class="ranking" name="ranking1" placeholder="<?=$rows[r1]?>" value="<?=$rows[r1]?>"/></div>
                  <div class="rank_num"><div style="width:30px;">2.</div><input class="ranking" name="ranking2" placeholder="<?=$rows[r2]?>" value="<?=$rows[r2]?>"/></div>
                  <div class="rank_num"><div style="width:30px;">3.</div><input class="ranking" name="ranking3" placeholder="<?=$rows[r3]?>" value="<?=$rows[r3]?>"/></div>
                  <div class="rank_num"><div style="width:30px;">4.</div><input class="ranking" name="ranking4" placeholder="<?=$rows[r4]?>" value="<?=$rows[r4]?>"/></div>
                  <div class="rank_num"><div style="width:30px;">5.</div><input class="ranking" name="ranking5" placeholder="<?=$rows[r5]?>" value="<?=$rows[r5]?>"/></div>
                  <div class="rank_num"><div style="width:30px;">6.</div><input class="ranking" name="ranking6" placeholder="<?=$rows[r6]?>" value="<?=$rows[r6]?>"/></div>
                  <div class="rank_num"><div style="width:30px;">7.</div><input class="ranking" name="ranking7" placeholder="<?=$rows[r7]?>" value="<?=$rows[r7]?>"/></div>
                  <div class="rank_num"><div style="width:30px;">8.</div><input class="ranking" name="ranking8" placeholder="<?=$rows[r8]?>" value="<?=$rows[r8]?>"/></div>
                  <div class="rank_num"><div style="width:30px;">9.</div><input class="ranking" name="ranking9" placeholder="<?=$rows[r9]?>" value="<?=$rows[r9]?>"/></div>
                  <div class="rank_num"><div style="width:30px;">10.</div><input class="ranking" name="ranking10" placeholder="<?=$rows[r10]?>" value="<?=$rows[r10]?>"/></div>
                </div>
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
                  '<div stlye="display:flex; align-items:center;">'+
                    '<div style="display:flex; flex-wrap:wrap; margin-left:60px; width:450px;">'+
                      '<div class="rank_num"><div style="width:30px;">1.</div><input class="ranking" name="ranking1" placeholder="1위 업체 입력" /></div>'+
                      '<div class="rank_num"><div style="width:30px;">2.</div><input class="ranking" name="ranking2" placeholder="2위 업체 입력" /></div>'+
                      '<div class="rank_num"><div style="width:30px;">3.</div><input class="ranking" name="ranking3" placeholder="3위 업체 입력" /></div>'+
                      '<div class="rank_num"><div style="width:30px;">4.</div><input class="ranking" name="ranking4" placeholder="4위 업체 입력" /></div>'+
                      '<div class="rank_num"><div style="width:30px;">5.</div><input class="ranking" name="ranking5" placeholder="5위 업체 입력" /></div>'+
                      '<div class="rank_num"><div style="width:30px;">6.</div><input class="ranking" name="ranking6" placeholder="6위 업체 입력" /></div>'+
                      '<div class="rank_num"><div style="width:30px;">7.</div><input class="ranking" name="ranking7" placeholder="7위 업체 입력" /></div>'+
                      '<div class="rank_num"><div style="width:30px;">8.</div><input class="ranking" name="ranking8" placeholder="8위 업체 입력" /></div>'+
                      '<div class="rank_num"><div style="width:30px;">9.</div><input class="ranking" name="ranking9" placeholder="9위 업체 입력" /></div>'+
                      '<div class="rank_num"><div style="width:30px;">10.</div><input class="ranking" name="ranking10" placeholder="10위 업체 입력" /></div>'+
                    '</div>'+
                  '</div>'+
                '</form>';

      var addedDiv = document.createElement("div");
      addedDiv.innerHTML = str;
      addedDiv.setAttribute('id','form_num '+count);
      addedFormDiv.appendChild(addedDiv);
      flag=false
    }else{

      alert("테마 적용후에 추가해 주세요.")
    }
  }


</script>

</html>



