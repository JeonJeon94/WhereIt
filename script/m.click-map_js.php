<script>
  jQuery(document).ready(function($){
    var a = false;
    $(document).on("click", ".map", function(){
      a = !a
      if(a == true){
        $('.map img').attr('src', '/images/map_active.png')
        $('#detail-map').css('height', '292px')
        $('#detail-site').css('display', 'block')
        $('.map-container').css('background', '#ECECEC')
        $('.map-container').css('height', '292px')
        

      }else{
        $('.map img').attr('src', '/images/map.png')
        $('#detail-map').css('height', '0')
        $('#detail-site').css('display', 'none')
        setTimeout(function(){
          $('.map-container').css('background', 'white') 
          $('.map-container').css('height', '0')
        }, 200);
      }
    });
  });
</script>
