<script>
  $(".search-icon").click(function(){
    $(".search-icon").css("display", "none")
    $(".logo").css("display", "none")
    $(".form-container").css("display", "flex")
  })
  $(".back").click(function(){
    $(".search-icon").css("display", "flex")
    $(".logo").css("display", "flex")
    $(".form-container").css("display", "none")
  })
</script>