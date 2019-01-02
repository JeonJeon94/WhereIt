<?php $page="user"; ?>
<?php include_once('./a.head.php'); ?>
<?php

if(isset($_GET['search_word'])){
  $word = $_GET['search_word'];
  $option = $_GET['option'];
}


//검색어가 있는지 확인
if(!empty($_GET['search_word'])){
  //검색어가 있으면 받은 정보를 가지고 필터링
  $option = $_GET['option'];
  $word = $_GET['search_word'];
  $sql = "SELECT * FROM users";
  $find_sql = " WHERE ".$option." LIKE '%$word%' ";
  $sql .= $find_sql;
}else{
  if(isset($word)){
    $find_sql = " WHERE ".$option." LIKE '%$word%' ";
    $sql = "SELECT * FROM users";
    $sql .= $find_sql;
  }else{
    $sql = "SELECT * FROM users";
  }
}

$result = sql_select($sql);


$LIST_SIZE = 10;
$MORE_PAGE = 10;

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
if(!empty($find_sql)){
  $page_q = mysqli_query($conn,"SELECT CEIL( COUNT(*)/$LIST_SIZE ) FROM users ".$find_sql);
  $page_qq = mysqli_fetch_row($page_q); 
  $page_count = $page_qq[0];
  $start_page = max($page - $MORE_PAGE, 1);
  $end_page = min($page + $MORE_PAGE, $page_count);
  $prev_page = max($start_page - $MORE_PAGE - 1, 1);
  $next_page = min($end_page + $MORE_PAGE + 1, $page_count);
  $offset = ( $page - 1 ) * $LIST_SIZE;
}else{
  if(isset($_GET['search_word'])){
    $page_q = mysqli_query($conn,"SELECT CEIL( COUNT(*)/$LIST_SIZE ) FROM users WHERE ".$_GET['option']." LIKE '%".$_GET['word']."%'");
  }else if(isset($word)){
    $page_q = mysqli_query($conn,"SELECT CEIL( COUNT(*)/$LIST_SIZE ) FROM users WHERE ".$option." LIKE '%".$word."%'");
  }
  $page_q = mysqli_query($conn,"SELECT CEIL( COUNT(*)/$LIST_SIZE ) FROM users ");
  $page_qq = mysqli_fetch_row($page_q); 
  $page_count = $page_qq[0];
  $start_page = max($page - $MORE_PAGE, 1);
  $end_page = min($page + $MORE_PAGE, $page_count);
  $prev_page = max($start_page - $MORE_PAGE - 1, 1);
  $next_page = min($end_page + $MORE_PAGE + 1, $page_count);
  $offset = ( $page - 1 ) * $LIST_SIZE;
}

$result = sql_select($sql." ORDER BY id DESC LIMIT $offset, $LIST_SIZE ");


?>
  <div class="main">
    <?php include_once('./a.menu.php'); ?>
    <div class="submain">
      <div class="submenu">
        <div class="list" onclick="location.href='./a.user.php'">회원리스트</div>
      </div>
      <div class="contents">
        <div class="search_list">
          <div id="list_text">회원리스트</div>
          <div class="search-form">
            <form id="search" name="search" method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
              <div class="flex">
                <select id="select_option" name="option">
                  <option value="id" checked="checked">번호
                  <option value="user_email">이메일
                  <option value="user_name">닉네임
                  <option value="register">가입경로
                </select>
                <input id="search_word" name="search_word" type="text"  placeholder="검색">
                <input id="search_btn" type="submit" value="검색">
                <input type=hidden name="no" value=0>
              </div>
            </form>
          </div>
        </div>
        <div class="user_list">
          <table>
            <tr>
              <th style="width:50px;">번호</th>
              <th style="width:300px;">이메일</th>            
              <th style="width:150px;">아이디</th>
              <th style="width:100px;">이메일 인증</th>
              <th style="width:200px;">가입 경로</th>     
            </tr>
            <?php 
              foreach($result as $rows){ 
            ?>
            <tr>
              <td><?php echo $rows['id']; ?></td>
              <td><?php echo $rows['user_email']; ?></td>
              <td><?php echo $rows['user_name']; ?></td>
              <td><?php 
                if($rows['email_code'] == ""){
                  echo $rows['emali_code'] = 'O';
                }else if($rows['email_code'] == "0"){
                  echo $rows['emali_code'] = 'O';
                }else{
                  echo $rows['emali_code'] = 'X';
                }
              ?></td>
              <td><?php echo $rows['register']; ?></td>
            </tr>
            <?php } ?>
          </table>  
        </div>
        <div class='paging_area'>
          <?php if(isset($word) || isset($_GET['search_word'])){ ?>
          <?php if( $start_page > 1 ): ?>
          <a class='move_btn' href="<?= "a.user.php?page=$prev_page&search_word=$word&option=$option" ?>">이전</a>
          <a class='pagenum' href="<?= "a.user.php?page=1&search_word=$word&option=$option" ?>">1</a> <span class="move_btn">..</span>
          <?php else: ?>
          <span class='move_btn disabled'>이전</span>
          <?php endif ?>

          <?php for( $p = $start_page; $p <= $end_page; $p++ ): ?>
          <a class='pagenum <?= ( $p == $page )?"current":"" ?>' href="<?= "a.user.php?page=$p&search_word=$word&option=$option" ?>">
            <?= $p ?>
          </a>
          <?php endfor ?>

          <?php if( $end_page < $page_count ): ?>
          <span class="move_btn">..</span> <a class='pagenum' href="<?= "a.user.php?page=$page_count&search_word=$word&option=$option" ?>"><?= $page_count ?></a>
          <a class='move_btn' href="<?= "a.user.php?page=$next_page&search_word=$word&option=$option" ?>">다음</a>
          <?php else: ?>
          <span class='move_btn disabled'>다음</span>
          <?php endif ?>
          <?php }else{ ?>
          <?php if( $start_page > 1 ): ?>
          <a class='move_btn' href="<?= "a.user.php?page=$prev_page" ?>">이전</a>
          <a class='pagenum' href="<?= "a.user.php?page=1" ?>">1</a> <span class="move_btn">..</span>
          <?php else: ?>
          <span class='move_btn disabled'>이전</span>
          <?php endif ?>
        
          <?php for( $p = $start_page; $p <= $end_page; $p++ ): ?>
          <a class='pagenum <?= ( $p == $page )?"current":"" ?>' href="<?= "a.user.php?page=$p" ?>">
            <?= $p ?>
          </a>
          <?php endfor ?>

          <?php if( $end_page < $page_count ): ?>
          <span class="move_btn">..</span> <a class='pagenum' href="<?= "a.user.php?page=$page_count" ?>"><?= $page_count ?></a>
          <a class='move_btn' href="<?= "a.user.php?page=$next_page" ?>">다음</a>
          <?php else: ?>
          <span class='move_btn disabled'>다음</span>
          <?php endif ?>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</body>
</html>