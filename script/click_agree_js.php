<script>  
  var c = false;
  var d = false;
  var e = false;

  $('.checkbox3').click(function(){
    c = !c
    if(c == true){
      
      $('#agree3').css('color', 'black')
      $('.checkbox3 img').attr('src', './images/box-check.png')
    }else{

      $('#agree3').css('color', 'gray')
      $('.checkbox3 img').attr('src', './images/box.png')
    }
  });
  $('.checkbox1').click(function(){
    d = !d
    if(d == true){
      
      $('#agree1').css('color', 'black')
      $('.checkbox1 img').attr('src', './images/box-check.png')
    }else{
      
      $('#agree1').css('color', 'gray')
      $('.checkbox1 img').attr('src', './images/box.png')
    }
  });
  $('.checkbox2').click(function(){
    e = !e
    if(e == true){
      
      $('#agree2').css('color', 'black')
      $('.checkbox2 img').attr('src', './images/box-check.png')
    }else{
    
      $('#agree2').css('color', 'gray')
      $('.checkbox2 img').attr('src', './images/box.png')
    }
  });

</script>