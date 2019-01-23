<script>

  g_Address = '<?=address?>'
  g_Food = '<?=$food?>'
  var a_get = []
  var f_get = []

  var a_Address = ""
  var f_Food = ""

  $("div.address_text").click(function(){
    var Address = a_get.push($(this).text())
    if(Address == 1){
      a_Address = a_get[0]
    }else{
      let __a = a_get.length-1
      a_Address = a_get[__a]
    }

    if('<?=$page?>' != 'main'){
      if(f_Food !== ""){
        location.href="./m.search.php?address="+a_Address+"&food="+f_Food
      }
    }
  
    $('#address-select').html(a_Address)
    $('#address-select2').html(a_Address)
  })
  
  $("div.food_text").click(function(){
    var Food = f_get.push($(this).text())
    if(Food == 1){
      f_Food = f_get[0]
    }else{
      let __f = f_get.length-1
      f_Food = f_get[__f]
    }

    if('<?=$page?>' != 'main'){
      if(a_Address !== ""){
        location.href="./m.search.php?address="+a_Address+"&food="+f_Food
      }
    }
    $('#food-select').html(f_Food)
    $('#food-select2').html(f_Food)
  })

  function s_get(){
    if(a_Address!= "" && f_Food!= ""){
      location.href="./m.search.php?address="+a_Address+"&food="+f_Food
    }else if(f_Food == ""){
      location.href="./m.search.php?address="+a_Address
    }else if(a_Address == ""){
      location.href="./m.search.php?food="+f_Food
    }else{
      location.href="./m.rank-thismonth.php"
    }
  }


  $(".address_text").click(function(){
    if('<?=$page?>' == 'main'){
      $(".address-modal").css("display","none")
    }else{
      if(f_Food == ""){
        $(".address-modal").css("display","none")
        $(".food-modal").css("display","flex")
      }else{
        $(".address-modal").css("display","none")
      }
    }
  })
  $(".food_text").click(function(){
    if('<?=$page?>' == 'main'){
      $(".food-modal").css("display","none")
    }else{
      if(a_Address == ""){
        $(".address-modal").css("display","flex")
        $(".food-modal").css("display","none")
      }else{
        $(".food-modal").css("display","none")
      }
    }
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