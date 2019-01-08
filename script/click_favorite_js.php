<script>
  jQuery(document).ready(function($){
    var j = false;
    
    $(document).on("click", ".share", function(){
      j = !j
      if( j == true){
        $('.share img').attr('src', './images/etc/share-active.png')
      }else{
        $('.share img').attr('src', './images/share.png')
      }
    });
  });
</script>