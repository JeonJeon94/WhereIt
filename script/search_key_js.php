<script>

  var a_get = "<?=$address?>"
  var f_get = "<?=$food?>"
  
  $("div.address_text").click(function(){
    var valAddress = $(this).text()
    if(f_get!= ""){
      if('<?=$page?>' == 'main'){
        location.href="<?php echo $_SERVER['PHP_SELF'];?>?address="+valAddresst+"&food="+f_get
      }else{
        if('<?=$page?>' == 'search'){
          location.href="<?php echo $_SERVER['PHP_SELF'];?>?address="+valAddress
        }else{
          location.href="./search.php?address="+valAddress+"&food="+f_get  
        }
      }
    }else{
      location.href="<?php echo $_SERVER['PHP_SELF'];?>?address="+valAddress
    }
  })

  $("div.food_text").click(function(){
    var valFood = $(this).text()
    if(a_get!= ""){
      if('<?=$page?>' == 'main'){
        location.href="<?php echo $_SERVER['PHP_SELF'];?>?address="+a_get+"&food="+valFood
      }else{
        location.href="./search.php?address="+a_get+"&food="+valFood
      }
    }else{
      location.href="<?php echo $_SERVER['PHP_SELF'];?>?food="+valFood
    }
  })

  function s_get(){
    if(a_get!= "" && f_get!= ""){
    location.href="./search.php?address="+a_get+"&food="+f_get
    }else if(f_get == ""){
      location.href="./search.php?address="+a_get
    }else if(a_get == ""){
      location.href="./search.php?food="+f_get
    }
  }
  
  $('#food_text').click(function(){
    $(".food").css("display","none")
  })
   $('#address_text').click(function(){
    $(".address").css("display","none")
  })

  $("#address-select").click(function(){
    $(".address").css("display","block")
  })
  $("#food-select").click(function(){
    $(".food").css("display","block")
  })
  
  $("#address-select2").click(function(){
    $(".address").css("display","block")
  })
  $("#food-select2").click(function(){
    $(".food").css("display","block")
  })

</script>