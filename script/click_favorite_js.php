<script>
  jQuery(document).ready(function($){
    var b = false;
    var j = false;
    // $(document).on("click", ".usage", function(){
    //   // b = !b
    //   // if( b == true){
    //   //   $('.usage img').attr('src', './images/star_active.png')
    //   // }else{
    //   //   $('.usage img').attr('src', './images/star.png')
    //   // }
      
    // });
    $(document).on("click", ".share", function(){
      j = !j
      if( j == true){
        $('.share img').attr('src', './images/ETC/share-active.png')
      }else{
        $('.share img').attr('src', './images/share.png')
      }
    });
  });
</script>