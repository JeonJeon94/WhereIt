<script>
  var o = false
  
  $('#rank-area-icon').click(function(){
    o = !o
    if(o == true){
    $('.tooltip-content').css('visibility', 'visible')
  }else{
    $('.tooltip-content').css('visibility', 'hidden')
  }
  });

</script>