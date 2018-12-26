<?php $page="banner"; ?>
<?php include_once('./a.head.php'); ?>
<?php 

?>
  <div class="main">
    <?php include_once('./a.menu.php'); ?>
    <div class="submain">
      <div class="submenu">
        <div class="b_text" onclick="location.href='./a.banner_text.php'">검색창</div>
        <div class="b_file" onclick="location.href='./a.banner_file.php'">매인배너</div>
      </div>
      <div class="contents">
        <div class="file_h">메인배너</div>
        <div id="bannerBox">
          <form class="banner_file" method=get action="a.file.php">
            <div style="display:flex; margin-bottom:10px; align-items:center;">
              <div style="width: 100px;">banner</div>
              <input id="f_title" name="title" placeholder="URL" />
            </div>
            <div class="fileBox" style="display:flex; padding-left:100px;">
              <input id="h_file" type="text" readonly="readonly" placeholder="파일명" />
              <label for="up_btn" class="btn_file">첨부</label>
              <input id="up_btn" type="file" class="upload"/>
              <input id="sub_btn" type="submit" value="적용"/>
              <div id="del_btn" onclick="del_item()">삭제</div>
              <div id="add_btn" onclick="add_item()">추가</div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

<script>
  //파일 첨부 버튼
  var uploadFile = $('.fileBox .upload');
  uploadFile.on('change', function(){
    
    if(window.FileReader){
      var filename = $(this)[0].files[0].name;
    } else {
      var filename = $(this).val().split('/').pop().split('\\').pop();
    }
    $(this).siblings('#h_file').val(filename);
  });
  
  //폼 삭제 버튼
  function del_item(thisCount){
    var addedFormDiv = document.getElementById("bannerBox")
      var thisDiv = document.getElementById("keyword_Frm"+thisCount)
      addedFormDiv.removeChild(thisDiv);
      document.addedFormDiv.reset();
  }

  //폼 추가 버튼
  function add_item(){
    var addedFormDiv = document.getElementById("bannerBox");

    var str = '<form class="banner_file" method=get action="a.file.php">'+
              '<div style="display:flex; margin-bottom:10px; align-items:center;">'+
                '<div style="width: 100px;">banner</div>'+
                '<input id="f_title" name="title" placeholder="URL" />'+
              '</div>'+
              '<div class="fileBox" style="display:flex; padding-left:100px;">'+
                '<input id="h_file" type="text" readonly="readonly" placeholder="파일명" />'+
                '<label for="up_btn" class="btn_file">첨부</label>'+
                '<input id="up_btn" type="file" class="upload"/>'+
                '<input id="sub_btn" type="submit" value="적용"/>'+
                '<div id="del_btn" onclick="del_item('+count+')">삭제</div>'+
              '</div>'+
            '</form>';

    var addedDiv = document.createElement("div");
    addedDiv.innerHTML = str;
    addedDiv.setAttribute("id","keyword_Frm"+count);
    addedFormDiv.appendChild(addedDiv);

  }

</script>

</html>