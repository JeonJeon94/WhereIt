<script>
  
  jQuery(document).ready(function($){
    var b = false;
    $(document).on("click", ".usage", function(){
      b = !b
      if( b == true){
        $('.usage img').attr('src', './images/star_active.png')
      }else{
        $('.usage img').attr('src', './images/star.png')
      }
    });
  });
</script>