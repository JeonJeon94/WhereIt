<?php $page="contents";?>
<?php include_once('./a.head.php'); ?>
<?php
  $result = sql_one("SELECT * FROM contents ORDER BY id DESC");
  $id = $result[id];
  if(!empty($id)){
    $i = $id+1;
  }else{
    $i = 1;
  }
?>
  <div class="main">
    <?php include_once('./a.menu.php'); ?>
    <div class="submain">
      <div class="submenu">
        <div class="content" onclick="location.href='./a.contents.php'">컨텐츠관리</div>
      </div>
      <div class="contents">
        <form method="post" action="a.add_contents.php" enctype="multipart/form-data">
          <input class="add_title" name="add_title" type="text" placeholder="제목"/>
          <div style="display:flex; align-items:center; margin-bottom:20px;">
            <div>대표 이미지</div>
            <input class="c_file" type="text" readonly="readonly" placeholder="파일명" />
            <label for="add_main" class="btn_file">첨부</label>
            <input id="add_main" name="add_main" type="file" onchange="fileupload(this)"/>
            <input name="num" type="hidden" value="<?=$i?>"/>
          </div>
          <textarea class="add_text" name="add_text" type="text" placeholder="내용"></textarea>
          <div style="display:flex; align-items:center; margin-top:20px;">
            <div>이미지 추가</div>
            <input class="c_file_sub" type="text" readonly="readonly" placeholder="파일명" />
            <label for="add_sub" class="btn_file">첨부</label>
            <input id="add_sub" multiple="multiple" name="add_sub[]" type="file" onchange="fileupload2(this)"/>
          </div>
          <div style="display:flex; justify-content:center; margin-top:20px;">
            <button id="enter_btn" type="submit">등록</button>
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
  //파일 첨부 버튼
  
</script>
</html>