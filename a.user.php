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
  $find_sql = " WHERE ".$option." LIKE '%$word%' ORDER BY id DESC";
  $sql .= $find_sql;
}else{
  if(isset($word)){
    $find_sql = " WHERE ".$option." LIKE '%$word%' ORDER BY id DESC";
    $sql = "SELECT * FROM users";
    $sql .= $find_sql;
  }else{
    $sql = "SELECT * FROM users ORDER BY id DESC";
  }
}

$result = sql_select($sql);



$a = sql_query("SELECT count(*) FROM users");
$aa = mysqli_fetch_array($a);

$count = $aa[0][0];

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
              $u_count = 0;
              foreach($result as $rows){
                $u_count +=1; 
            ?>
            <tr>
              <td><?php echo $u_count; ?></td>
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
      </div>
    </div>
  </div>
</body>
</html>