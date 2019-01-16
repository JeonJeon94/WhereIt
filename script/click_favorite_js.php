<script>
  jQuery(document).ready(function($){
    var j = false;
    
    $(document).on("click", "#share", function(){
      j = !j
      if( j == true){
        $('#share').attr('src', './images/etc/share-active.png')
        $('.modal_share').css("display","flex")
      }else{
        $('#share').attr('src', './images/share.png')
        $('.modal_share').css("display","none")
      }
    });
  });
</script>