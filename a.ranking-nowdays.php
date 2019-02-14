<?php $page="ranking"; ?>
<?php include_once('./a.head.php'); ?>
<?php
  $sql=sql_one("SELECT * FROM rank WHERE id=100");
?>
  <div class="main">
    <?php include_once('./a.menu.php'); ?>
    <div class="submain">
      <div class="submenu">
        <div class="rank" onclick="location.href='./a.ranking.php'">테마 핫플레이스</div>
        <div class="rank" onclick="location.href='./a.ranking-thismonth.php'">이 달의 핫플레이스</div>
        <div class="rank" onclick="location.href='./a.ranking-nowdays.php'">요즘 뜨는 핫플레이스</div>
      </div>
      <div class="contents">
        <div id="rank_text">요즘 뜨는 핫플레이스</div>
        <div id="rank_form">
          <form class="rank_theme" method=get action="a.ranking_h.php" >
            <div stlye="display:flex; align-items:center;">
              <div>
                <div class="rank_num"><div style="width:30px;">1.</div><input class="ranking" name="ranking1" placeholder="<?=$sql[r1]?>" value="<?=$sql[r1]?>"/></div>
                <div class="rank_num"><div style="width:30px;">2.</div><input class="ranking" name="ranking2" placeholder="<?=$sql[r2]?>" value="<?=$sql[r2]?>"/></div>
                <div class="rank_num"><div style="width:30px;">3.</div><input class="ranking" name="ranking3" placeholder="<?=$sql[r3]?>" value="<?=$sql[r3]?>"/></div>
                <div class="rank_num"><div style="width:30px;">4.</div><input class="ranking" name="ranking4" placeholder="<?=$sql[r4]?>" value="<?=$sql[r4]?>"/></div>
                <div class="rank_num"><div style="width:30px;">5.</div><input class="ranking" name="ranking5" placeholder="<?=$sql[r5]?>" value="<?=$sql[r5]?>"/></div>
                <div class="rank_num"><div style="width:30px;">6.</div><input class="ranking" name="ranking6" placeholder="<?=$sql[r6]?>" value="<?=$sql[r6]?>"/></div>
                <div class="rank_num"><div style="width:30px;">7.</div><input class="ranking" name="ranking7" placeholder="<?=$sql[r7]?>" value="<?=$sql[r7]?>"/></div>
                <div class="rank_num"><div style="width:30px;">8.</div><input class="ranking" name="ranking8" placeholder="<?=$sql[r8]?>" value="<?=$sql[r8]?>"/></div>
                <div class="rank_num"><div style="width:30px;">9.</div><input class="ranking" name="ranking9" placeholder="<?=$sql[r9]?>" value="<?=$sql[r9]?>"/></div>
                <div class="rank_num"><div style="width:30px;">10.</div><input class="ranking" name="ranking10" placeholder="<?=$sql[r10]?>" value="<?=$sql[r10]?>"/></div>
                <input type="hidden" name="num" value="100" />
              </div>
            </div>
            <div style="display:flex; margin:20px 0 0 30px; align-items:center;">
              <input class="up_btn" type="submit" value="적용" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>



