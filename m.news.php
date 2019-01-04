<?php $page = "news" ?>
<?php include_once("./m.head.php") ?>
<?php

  $result = sql_select("SELECT * FROM contents");
  
  $last = sql_one("SELECT id FROM contents ORDER BY id DESC");
  $last_num = $last[id];
  
  function simpl_str($string,$limit_length) {
    $string_length = strlen( $string );
    if ( $limit_length <= $string_length ) {
      $string = mb_substr( $string, 0, $limit_length )."...";
      $han_char = 0;
      for ( $i = $limit_length-1; $i>=0; $i-- ) {
        $lastword = ord( substr( $string, $i, 1 ) );
        if ( 127 > $lastword ) break;
        else $han_char++;
      }
      if ( $han_char%2 == 1 ) $string = mb_substr( $string, 0, $limit_length-1 ) . "...";
    }
    return $string;
  }
?>
  <div class="main">
    <div class="news-list">
    <?php for($i = $last_num-1; 0 <= $i ; $i--){ ?>
      <div class="list-item">
        <div class="news-picture" onclick="location.href='./m.news_detail.php?data-id=<?=$result[$i][id]?>'">
          <img src="<?=$result[$i][main]?>" />
        </div>
        <div class="news-info">
          <div class="news-date">
            <?=$result[$i][date]?>
          </div>
          <div class="news-title">
            <?=$result[$i][title]?>
          </div>
          <div class="news-content">
          <?php if(count($result[$i][text])>52){
            echo $result[$i][text];
          }else{
            echo simpl_str($result[$i][text],52); 
          }?>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>

<script>

  var news = $('.list-item')
  
  $(document).ready(function(){
    for(var n=0; n < <?=$last_num?>; n++){
      ani_load(n)
    }
  });

  function ani_load(n){
    setTimeout(function() {
      $(news[n]).css('display','flex')
    }, n * 900);
  }
</script>

<?php include_once("./m.footer.php"); ?>