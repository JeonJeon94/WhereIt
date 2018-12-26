<?php $page="blacklist"; ?>
<?php include_once('./a.head.php'); ?>
<?php
if(isset($_GET['search_id'])){
  $id=$_GET['search_id'];
  $sql="SELECT * FROM blacklist WHERE black_id LIKE '%$id%' ORDER BY id DESC";
  $sql_count = sql_query("SELECT count(*) FROM blacklist WHERE black_id LIKE '%$id%'");
  $sql_count2 = mysqli_fetch_array($sql_count);

}else{
  $sql = "SELECT * FROM blacklist ORDER BY id DESC";
  $sql_count = sql_query("SELECT count(*) FROM blacklist");
  $sql_count2 = mysqli_fetch_array($sql_count);
}

$l_count = $sql_count2[0][0];
$list_count = $l_count;
$result = sql_select($sql);

?>
  <div class="main">
    <?php include_once('./a.menu.php'); ?>
    <div class="modal">
      <div class="list_add">
        <form method="get" action="a.b_add.php">
          <div style="display:flex; justify-content:center; align-items:center;">
            <div>블랙리스트</div>
            <input id="b_add_id" type="text" name="b_add_id"/>
            <input id="b_add_btn" type="submit" value="추가"/>
          </div>
        </form>
        <div id="b_close" onclick="location.href='a.blacklist.php'">닫기</div> 
      </div>
    </div>
    <div class="submain">
      <div class="submenu">
        <div class="blacklist" onclick="location.href='./a.blacklist.php'">blacklist</div>
      </div>
      <div class="contents">
        <div style="display:flex; margin:30px 0 20px 0;">
          <div id="b_list_text">Black List</div>
          <div class="b_search-form">
            <form id="b_search" name="search" method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
              <div class="flex">
                <input id="b_search_id" name="search_id" type="text" placeholder="검색">
              </div>
            </form>
          </div>
          <div id="add_btn">추가</div>
          <div id="del_btn">삭제</div>
        </div>
        <div class="black_list">
          <table>
            <tr>
              <th style="width:15px;"></th>
              <th style="width:100px;">번호</th>
              <th style="width:250px;">ID</th>
              <th style="width:450px;">등록일</th>     
            </tr>
            <?php 
              $count = 0;
              foreach($result as $rows){ 
                $count += 1;
            ?>
            <tr>
              <td><input id="check" class="del_check <?= $rows['id']; ?>" type="checkbox" value="<?php echo $rows['id']; ?>"/></td>
              <td><?php echo $count; ?></td>
              <td><?php echo $rows['black_id']; ?></td>
              <td><?php echo $rows['date']; ?></td>
            </tr>
            <?php } ?>
          </table>
        </div>
      </div>
    </div>
  </div>
</body>

<script>

  var blackListIds = []
  $('.del_check').click(function(e){
    var check = $(e.target)[0]
    
    let flag = check.checked
    let id = check.classList[1]
    if(flag){
      blackListIds.push($(check)[0].classList[1])
    } else {
      let index = blackListIds.findIndex((number)=>{
        return number === check.value
      })
      blackListIds.splice(index,1)
    }
  })
  $('#del_btn').click(function(){
    location.href="./a.b_del_id.php?id="+blackListIds
  })
  function add_ok(){
    $('.modal').css('display','block')
  }

  $('#add_btn').click(function(){
    $('.modal').css('display','block')
  })
  
</script>

<?php if(!empty($_GET['m'])){ ?>
  <script>
    add_ok()
  </script>
<?php } ?>

</html>