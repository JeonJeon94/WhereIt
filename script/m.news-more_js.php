<script>
  jQuery(document).ready(function($){
    $(document).on("click", ".news-picture", function(){
      $(".news-list").css("display","none")
      $(".news-detail").css("display","flex")
      $('html').animate({scrollTop : 0}, 300);
      return false;
    });
  });
</script>