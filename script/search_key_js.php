<script>

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
    $('#food-select').html(f_Food)
    $('#food-select2').html(f_Food)
  })

  function s_get(){
    if(a_Address !== "" && f_Food !== ""){
      location.href="./search.php?address="+a_Address+"&food="+f_Food
    }else if(f_Food == ""){
      location.href="./search.php?address="+a_Address
    }else if(a_Address == ""){
      location.href="./search.php?food="+f_Food
    }else{
      location.href="./rank-thismonth.php"
    }
  }
  
  $('#food_text').click(function(){
    $(".food").css("display","none")
  })
  $('.food_text').click(function(){
    $(".food").css("display","none")
  })
  $('#address_text').click(function(){
    $(".address").css("display","none")
  })
  $('.address_text').click(function(){
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