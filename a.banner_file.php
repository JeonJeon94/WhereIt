<?php $page="banner"; ?>
<?php include_once('./a.head.php'); ?>
<?php 
  $result = sql_select("SELECT * FROM banner_file ORDER BY id ASC");

  $last = sql_one("SELECT id FROM banner_file ORDER BY id DESC");
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
          <div class="web" style="font-weight:bold;">웹</div>
          <div class="mobile" onclick="location.href='./a.banner_file_m.php'">모바일</div>
        </div>
        <div id="bannerBox">
          <?php
            $i = 0;
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
                <input class="h_file h_file<?=$i?>" type="text" name="upload_text" readonly="readonly" value="<?=$rows[banner_file]?>" />
                <label class="btn_file">
                  <input style="display:none;" class="up_btn" type="file" class="upload<?=$i?>" name="upload<?=$i?>" onchange="fileupload(this)"/>첨부
                </label>
                <input class="sub_btn" type="submit" value="적용" />
                <div class="del_btn" onclick="del_item(this,<?=$i?>)">삭제</div>
                <?php if($i == $last_num){ ?>
                <div id="add_btn<?=$i?>" class="add_btn" onclick="add_item(this)">추가</div>
                <?php }else{?>
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
  var count = "<?=$i?>";
  var last_num = '<?=$last_num?>';
  //추가 버튼 생성
  function show(){
    $('#add_btn<?=$i?>').css('display','block')
    flag = true;
  }
  //추가 버튼 삭제
  function none(e){
    var none = $(e)
      none.css('display','none')
  }
  //파일 업로드
  function fileupload(e){
    var parentElement = $(e.parentElement.parentElement)
    var textElement = parentElement.children('.h_file')
    var Filename = e.files[0].name;
    textElement[0].value = Filename;
  }
  //폼 삭제 버튼
  function del_item(obj,thisCount){
    var thisId = obj.parentNode.parentNode.parentNode;
    document.getElementById("bannerBox").removeChild(thisId);
    if(thisCount <= last_num){
      location.href="a.banner_d.php?id="+thisCount
    }else {
      show()
    }
  }

  //폼 추가 버튼
  var flag = true;
  
  function add_item(e){
    none(e);
    if(flag){
      <?php $i = $i+1;?>
    count = "<?=$i?>";
    var addedFormDiv = document.getElementById("bannerBox");
    console.log(addedFormDiv);
    var str = '<form class="banner_file" method="post" action="a.file.php" enctype="multipart/form-data">'+
                '<div style="display:flex; margin-bottom:10px; align-items:center;">'+
                  '<div style="width: 100px;">banner'+count+'</div>'+
                  '<input class="f_title" name="title'+count+'" placeholder="URL" />'+
                  '<input type="hidden" name="num" value="'+count+'" />'+
                '</div>'+
                '<div class="fileBox" style="display:flex; padding-left:100px;">'+
                  '<input class="h_file h_file'+count+'" type="text" readonly="readonly" placeholder="파일명" />'+
                  '<label class="btn_file">'+
                    '<input style="display:none;" class="up_btn" type="file" class="upload'+count+'" name="upload'+count+'" onchange="fileupload(this)"/>첨부'+
                  '</label>'+
                  '<input class="sub_btn" type="submit" value="적용" />'+
                  '<div class="del_btn" onclick="del_item(this,'+count+')">삭제</div>'+
                  '<div id="add_btn'+count+'" class="add_btn" onclick="add_item()">추가</div>'+
                '</div>'+
              '</form>';

    var addedDiv = document.createElement("div");
    addedDiv.innerHTML = str;
    addedDiv.setAttribute("id","form_num "+count);
    addedFormDiv.appendChild(addedDiv);
    flag =false;
    }else{
      alert("배너 적용후에 추가해 주세요.")
    }
  }

</script>

</html>