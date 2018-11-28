<?php $page = "ask" ?>
<?php include_once("./m.head.php") ?>
  <div class="modal-container">
    <div id="notice">
      <div style="font-size:45px; margin-bottom: 100px; color:#504f57;">
        문의 내용이<br>
        <b>전달되었습니다.</b>
      </div>
      <div>
        <button id="home" onclick="location.href='./m.index.php'">HOME</button>
      </div>
    </div>
  </div>
  <div class="main">
    <div class="ask-title">
      <b>궁금한 게</b><br>있으신가요?
    </div>
    <div class="ask-text">
      하단의 빈칸을 작성해주시면<br>
      빠르게 확인하도록 하겠습니다.
    </div>
    <div class="ask-form">
      <form class="ask" method="POST" action="./m.asking.php">
        <input id="ask-title" type="text" name="ask-title" placeholder="제목" />
        <input id="ask-email" type="text" name="ask-email" placeholder="이메일" />
        <textarea id="ask-contents" type="text" name="ask-contents"></textarea>
        <input id="search-btn" type="button" value="SEARCH" />
      </form>
    </div>
  </div>
<?php include_once("./m.footer.php") ?>