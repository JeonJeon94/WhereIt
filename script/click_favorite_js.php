<script>
  var b = false;
  
  $('.usage').click(function(){
    b = !b
    if( b == true){
      $('.usage img').attr('src', './images/star_active.png')
    }else{
      $('.usage img').attr('src', './images/star.png')
    }
  });

</script>