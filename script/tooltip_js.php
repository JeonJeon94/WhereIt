<script>
  var i = false
  
  $('#tooltip').click(function(){
    i = !i
    if(i == true){
    $('.tooltip-content').css('visibility', 'visible')
  }else{
    $('.tooltip-content').css('visibility', 'hidden')
  }
  });

</script>