<?php $page="banner"; ?>
<?php include_once('./a.head.php'); ?>
<?php 
  $result = sql_select("SELECT * FROM banner_file_m ORDER BY id ASC");

  $last = sql_one("SELECT id FROM banner_file_m ORDER BY id DESC");
  $last_num = $last[id];
?>
  <div class="main">
    <?php include_once('./a.menu.php'); ?>
    <div class="submain">
      <div class="submenu">
        <div class="b_text" onclick="location.href='./a.banner_text.php'">검색창</div>
        <div class="b_file" onclick="location.href='./a.banner_file.php'">매인배너</div>
      </div>
      <div class="contents">
        <div style="display:flex; align-items:center; margin:40px 0 30px 0">
          <div class="file_h">메인배너</div>
          <div class="web" onclick="location.href='./a.banner_file.php'">웹</div>
          <div class="mobile" style="font-weight:bold;">모바일</div>
        </div>
        <div id="bannerBox">
          <?php
            $i =0; 
            foreach( $result as $rows){ 
              $i +=1;
          ?>
          <div id="form_num <?=$i?>">
            <form class="banner_file" method=post action="a.file.php" enctype="multipart/form-data">
              <div style="display:flex; margin-bottom:10px; align-items:center;">
                <div style="width: 100px;">banner<?=$i?></div>
                <input class="f_title" name="title<?=$i?>" value="<?=$rows[url]?>" />
                <input type="hidden" name="num" value="<?=$i?>" />
              </div>
              <div class="fileBox" style="display:flex; padding-left:100px;">
                <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
                <input class="h_file h_file<?=$i?>" class="h_file" type="text" name="upload_text" readonly="readonly" value="<?=$rows[banner_file]?>" />
                <input class="up_btn" type="file" class="upload<?=$i?>" name="upload<?=$i?>"/>
                <label for="up_btn" class="btn_file">첨부</label>
                <input class="sub_btn" type="submit" value="적용" />
                <div class="del_btn" onclick="del_item(this,<?=$i?>)">삭제</div>
              </div>
            </form>
          </div>
          <?php } ?>
        </div>
        <div style="margin:80px 0 0 300px;">
          <div class="add_btn" onclick="add_item()">추가</div>
        </div>
      </div>
    </div>
  </div>
</body>

<script>
  //파일 첨부 버튼
  $('.btn_file').click(function(){
    var count = <?=$i?>;
    var uploadFile = $('.fileBox .upload'+count+'');
    uploadFile.on('change', function(){
      if(window.FileReader){
        var filename = $(this)[0].files[0].name;
      } else {
        var filename = $(this).val().split('/').pop().split('\\').pop();
      }
      $(this).siblings('#h_file'+count+'').val(filename);
      
    });
  });
  
  function del_item(obj,thisCount){
    // obj.parentNode 를 이용하여 삭제
    
    var thisId = obj.parentNode.parentNode.parentNode;
    document.getElementById("bannerBox").removeChild(thisId);
    if(thisCount <= <?=$last_num?>){
      location.href="a.banner_d.php?id="+thisCount
    }
  }

  //폼 추가 버튼
  function add_item(){
    var count = <?=$i?>+1;
    var addedFormDiv = document.getElementById("bannerBox");

    var str = '<form class="banner_file" method=get action="a.file.php" enctype="multipart/form-data">'+
                '<div style="display:flex; margin-bottom:10px; align-items:center;">'+
                  '<div style="width: 100px;">banner'+count+'</div>'+
                  '<input id="f_title" name="title'+count+'" placeholder="URL" />'+
                  '<input type="hidden" name="num" value="'+count+'" />'+
                '</div>'+
                '<div class="fileBox" style="display:flex; padding-left:100px;">'+
                  '<input id="h_file'+count+'" class="h_file" type="text" readonly="readonly" placeholder="파일명" />'+
                  '<label for="up_btn" class="btn_file">첨부</label>'+
                  '<input id="up_btn" type="file" class="upload'+count+'" name="upload'+count+'"/>'+
                  '<input id="sub_btn" type="submit" value="적용" />'+
                  '<div id="del_btn" onclick="del_item(this,'+count+')">삭제</div>'+
                '</div>'+
              '</form>';

    var addedDiv = document.createElement("div");
    addedDiv.innerHTML = str;
    addedDiv.setAttribute("id","form_num "+count);
    addedFormDiv.appendChild(addedDiv);

  }

</script>

</html>