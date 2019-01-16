<script>
  jQuery(document).ready(function($){
    var u = false;
    var y = false;
    
    $(document).on("click", ".phone", function(){
      u = !u
      if( u == true){
        $('.phone img').attr('src', './images/etc/phone-active.png')
      }else{
        $('.phone img').attr('src', './images/etc/phone.png')
      }
    });
    $(document).on("click", "#share", function(){
      y = !y
      if( y == true){
        $('#share').attr('src', './images/etc/share-active.png')
        $('.modal_share').css("display","flex")
      }else{
        $('#share').attr('src', './images/etc/share.png')
        $('.modal_share').css("display","none")
      }
    });
  });
</script>