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
        <div style="display:flex; margin:30px 0 20px 0; align-items:center;">
          <div id="contents_text">컨텐츠 관리</div>
          <div class="contents_search">
            <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
              <input id="c_search" type="text" name="c_search" placeholder="검색" />
            </form>
          </div>
          <div id="add_contents" onclick="location.href='a.new_contents.php'">등록</div>
          <div id="del_contents" onclick="del_btn()">삭제</div>
        </div>
        <div class="contents_list">
          <table>
            <thead>
              <tr>
                <th style="width:15px;"></th>
                <th style="width:100px;">번호</th>
                <th style="width:100px;">대표이미지</th>
                <th>제목</th>     
              </tr>
            </thead>
            <tbody>
              <?php 
                $count = 0;
                foreach($result as $rows){ 
                  $count += 1;
              ?>
              <tr>
                <td><input id="check" class="del_check <?= $rows['id']; ?>" type="checkbox" value="<?php echo $rows['id']; ?>"/></td>
                <td><?php echo $count; ?></td>
                <td id="img_box"><img id="td-img" src="<?php echo $rows['main']; ?>"/></td>
                <td><?php echo $rows['title']; ?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</body>
<script>

  var deleteContents = []
  
  $('.del_check').click(function(e){
    var check = $(e.target)[0]
    let flag = check.checked
    let id = check.classList[1]

    if(flag){
      deleteContents.push($(check)[0].classList[1])
    } else {
      let index = deleteContents.findIndex((number)=>{
        return number === check.value
      })
      deleteContents.splice(index,1)
    }
  })
  
  function del_btn(){
    location.href="./a.del_contents.php?id="+deleteContents
  }


</script>
</html>