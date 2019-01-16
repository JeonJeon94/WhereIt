<script>

  var a_get = "<?=$address?>"
  var f_get = "<?=$food?>"
  
  $("div.address_text").click(function(){
    var valAddress = $(this).text()
    location.href="<?php echo $_SERVER['PHP_SELF'];?>?address="+valAddress
  })


  
  $("div.food_text").click(function(){
    var valFood = $(this).text()
    if(a_get!= null){
      location.href="./m.search.php?address="+a_get+"&food="+valFood
    }else{
      location.href="<?php echo $_SERVER['PHP_SELF'];?>?food="+valFood
    }
  })

  function s_get(){
    location.href="./m.search.php?address="+a_get+"&food="+f_get
  }


  $("#address_text").click(function(){
    $(".address-modal").css("display","none")
  })
  $("#food_text").click(function(){
    $(".food-modal").css("display","none")
  })

  $("#address-select").click(function(){
    $(".address-modal").css("display","block")
  })
  $("#food-select").click(function(){
    $(".food-modal").css("display","block")
  })
  
  $("#address-select2").click(function(){
    $(".address-modal").css("display","block")
  })
  $("#food-select2").click(function(){
    $(".food-modal").css("display","block")
  })
  
  $('.close').click(function(){
    $(".address-modal").css("display","none")
    $(".food-modal").css("display","none")
  })
  
</script>