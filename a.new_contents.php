<?php $page="contents"; ?>
<?php include_once('./a.head.php'); ?>
<?php
  if(isset($_GET['c_search'])){
    $title=$_GET['c_search'];
    $sql="SELECT * FROM contents WHERE title LIKE '%$title%' ORDER BY id DESC";

  }else{
    $sql = "SELECT * FROM contents ORDER BY id DESC";
  }

  $result = sql_select($sql);
?>
  <div class="main">
    <?php include_once('./a.menu.php'); ?>
    <div class="submain">
      <div class="submenu">
        <div class="content" onclick="location.href='./a.contents.php'">컨텐츠관리</div>
      </div>
      <div class="contents">
        <form method="post" action="a.add_contents.php">
          <input id="add_title" name="add_title" type="text" placeholder="제목"/>
          <div style="display:flex; align-items:center; margin-bottom:20px;">
            <div>대표 이미지</div>
            <input id="c_file" type="text" readonly="readonly" placeholder="파일명" />
            <label for="add_main" class="btn_file">첨부</label>
            <input id="add_main" name="add_main" type="file" class="upload"/>
          </div>
          <textarea id="add_text" name="add_text"type="text" placeholder="내용"></textarea>
          <div style="display:flex; align-items:center; margin-top:20px;">
            <div>이미지 추가</div>
            <input id="c_file_sub" type="text" readonly="readonly" placeholder="파일명" />
            <label for="add_sub" class="btn_file">첨부</label>
            <input id="add_sub" name="add_sub" type="file" class="upload2"/>
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

  $('#cancel_btn').click(function(){
    window.history.back()
  })
  //파일 첨부 버튼
  var uploadFile = $('.contents .upload');
  uploadFile.on('change', function(){
    
    if(window.FileReader){
      var filename = $(this)[0].files[0].name;
    } else {
      var filename = $(this).val().split('/').pop().split('\\').pop();
    }
    $(this).siblings('#c_file').val(filename);
  });

  var uploadFile = $('.contents .upload2');
  uploadFile.on('change', function(){
    
    if(window.FileReader){
      var filename = $(this)[0].files[0].name;
    } else {
      var filename = $(this).val().split('/').pop().split('\\').pop();
    }
    $(this).siblings('#c_file_sub').val(filename);
  });
</script>
</html>