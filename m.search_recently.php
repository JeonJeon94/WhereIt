<?php $page = "search" ?>

<?php include_once("./m.head.php") ?>

  <div class="main">
    <div class="main-top">
      <div class="text">
        가장 인기있는<br><b>핫 플레이스</b>
      </div>
      <div class="search-time">
        <a id="all"  href="m.search.php?search=<?php echo $search; ?>">누적</a>
        <a id="recently" style="color:#504f57; font-weight:bold; border-bottom:2px solid black; padding-bottom:15px;" href="">최근 3개월</a>
      </div>
    </div>
    <div class="view-type">
      <img id="double" src="./images/map.png" />
      <img id="single" src="./images/map_active.png" />
    </div>
    <div class="search-list">

    </div>
  </div>
  
  <?php include_once("./m.footer.php") ?>