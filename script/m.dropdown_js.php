<script>
  $("#down-btn").on("click", function(){
    $("#down-btn").css("display", "none")
    $("#up-btn").css("display", "block")
    $(".hot-list").slideDown('fast');
    $('.hot-text').css('display', 'block')
    $(".hot").css("border", "0.04em solid #E0EAE9")
    $(".hot").css("background", "white")
  });
  $("#up-btn").on("click", function(){
    $("#down-btn").css("display", "block")
    $("#up-btn").css("display", "none")
    $(".hot-list").slideUp("fast")
    $('.hot-text').css('display', 'none')
    $(".hot").css("border", "none")
    $(".hot").css("background", "#f9f5f8")
  });
  $("#in-down_bt").on("click", function(){
    $("#in-down_bt").css("display", "none")
    $("#in-up_bt").css("display", "block")
    $(".insta-text").slideDown('fast');
    $(".insta-list").css("border", "0.04em solid #E0EAE9")
    $(".insta-list").css("background", "white")
  });
  $("#in-up_bt").on("click", function(){
    $("#in-down_bt").css("display", "block")
    $("#in-up_bt").css("display", "none")
    $(".insta-text").slideUp("fast")
    $(".insta-list").css("border", "none")
    $(".insta-list").css("background", "none")
  });
</script>