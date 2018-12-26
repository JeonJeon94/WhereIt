<?php $page="ask"; ?>
<?php include_once('./a.head.php'); ?>
<?php

  $ask_list = sql_select("SELECT * FROM ask ORDER BY id DESC");
?>
  <div class="main">
    <?php include_once('./a.menu.php'); ?>
    <div class="submain">
      <div class="submenu">
        <div class="ask" onclick="location.href='./a.ask_list.php'">문의 관리</div>
      </div>
      <div class="contents">
        <div>
          <div class="ask_text">문의관리</div>
          <table style="table-layout:fixed;">
            <tr>
              <th style="width:50px;">번호</th>
              <th style="width:150px;">제목</th>
              <th style="width:100px;">상태</th>
              <th style="width:250px;">이메일</th>     
              <th style="width:250px;">내용</th>     
            </tr>
            <?php 
              $count = 0;
              foreach($ask_list as $rows){ 
                $count += 1;
            ?>
            <tr>
              <td><?php echo $count; ?></td>
              <td class="title <?=$rows['id']?>"><?php echo $rows['title']; ?></td>
              <td>
                <?php
                  if($rows['check_e']==0){
                    $rows['check_e'] = "회신안함"; 
                  }else{
                    $rows['check_e'] = "회신"; 
                  }
                  echo $rows['check_e']; 
                 ?>
              </td>
              <td><?php echo $rows['email']; ?></td>
              <td><?php echo $rows['contents']; ?></td>
            </tr>
            <?php } ?>
          </table>
        </div>
      </div>
    </div>
  </div>
</body>

<script>
  $('.title').click(function(e){
    var confirm = $(e.target)[0]
    let address = confirm.classList[1]

    location.href="a.ask_confirm.php?title="+address
  })
</script>

</html>