<?php $page="user"; ?>
<?php include_once('./a.head.php'); ?>
  <div class="main">
    <?php include_once('./a.menu.php'); ?>
    <div class="submain">
      <div class="submenu">
        <div class="list">회원리스트</div>
      </div>
      <div class="contents">
        <div class="search_list">
          <div id="list_text">회원리스트</div>
          <div class="serach-form">
            <form name="search" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
              <div class="search">
                <select id="select">
                  <option value="user_id" checked="checked">번호
                  <option value="name">이름
                  <option value="username">닉네임
                </select>
                <div id="search_btn">
                  <input type="text" name="search_word" size="30" placeholder="검색">
                  <input style="padding: 4 15 4 15;" type="submit" value="검색">
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="user_list">
          <table>
            <tr>
              <th style="width:50px;">번호</th>
              <th style="width:300px;">이메일</th>            
              <th style="width:100px;">아이디</th>            
            </tr>
            <tr>
              <td><?php echo "1" ?></td>
              <td><?php echo "1" ?></td>
              <td><?php echo "1" ?></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</body>
</html>