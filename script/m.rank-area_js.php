<script>

  jQuery(document).ready(function($){
    var q = false;
    $(document).on("click", "#rank-area-icon", function(){
      q = !q
      if( q == true){
        $('#rank-area-icon img').attr('src', './images/select/area-active.png')
      }else{
        $('#rank-area-icon img').attr('src', './images/default/area.png')
      }

    });
  });

</script>