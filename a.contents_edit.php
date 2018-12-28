<?php $page="contents";?>
<?php include_once('./a.head.php'); ?>
<?php

  $id=$_GET['id'];
  $back = sql_one("SELECT * FROM contents WHERE id='$id'");
  
  $main = explode('./contents/main/', $back[main]);
  $sub = explode('./contents/sub/', $back[sub]);
  

?>
  <div class="main">
    <?php include_once('./a.menu.php'); ?>
    <div class="submain">
      <div class="submenu">
        <div class="content" onclick="location.href='./a.contents.php'">컨텐츠관리</div>
      </div>
      <div class="contents">
        <form method="post" action="a.edit_contents.php" enctype="multipart/form-data">
          <input class="add_title" name="edit_title" type="text" placeholder="<?=$back[title]?>"/>
          <div style="display:flex; align-items:center; margin-bottom:20px;">
            <div>대표 이미지</div>
            <input class="c_file" type="text" readonly="readonly" value="<?=$main[1]?>" />
            <label for="add_main" class="btn_file">첨부</label>
            <input id="add_main" name="edit_main" type="file" onchange="fileupload(this)"/>
            <input name="num" type="hidden" value="<?=$back[id]?>"/>
          </div>
          <textarea class="add_text" name="edit_text" type="text" placeholder="<?=$back[text]?>"></textarea>
          <div style="display:flex; align-items:center; margin-top:20px;">
            <div>이미지 추가</div>
            <input class="c_file_sub" type="text" readonly="readonly" value="<?php for($i=1; $i<count($sub); $i++){ echo $sub[$i]; }?>" />
            <label for="add_sub" class="btn_file">첨부</label>
            <input id="add_sub" multiple="multiple" name="edit_sub[]" type="file" onchange="fileupload2(this)"/>
          </div>
          <div style="display:flex; justify-content:center; margin-top:20px;">
            <button id="enter_btn" type="submit">수정</button>
            <div id="cancel_btn">취소</div>
          </div>
        </form> 
      </div>
    </div>
  </div>
</body>
<script>
  
  function fileupload(e){
    var parentElement = $(e.parentElement)
    var textElement = parentElement.children('.c_file')
    var Filename = e.files[0].name;
    textElement[0].value = Filename;
  }
  function fileupload2(e){
    var parentElement = $(e.parentElement)
    var textElement = parentElement.children('.c_file_sub')
    for(var i=0; i<=e.files.length; i++){
      var Filename = e.files[i].name;
      if(i==0){
        textElement[0].value = Filename;
      }else{
        textElement[0].value = textElement[0].value+','+Filename;
      }
    }
  }

  $('#cancel_btn').click(function(){
    window.history.back()
  })
  
</script>
</html>