<script>
  $(".menu-bar").click(function(){
    $(".slide-modal").css("display","block")
    $("body").css("overflow", "hidden")
  })
  $("#close-icon").click(function(){
    $(".slide-modal").css("display","none")
    $("body").css("overflow", "auto")
  })
</script>