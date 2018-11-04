<script>
  $('.move-top').click(function(){
    console.log("click");
    $('html').animate({scrollTop : 0}, 300);
    return false;
  });
</script>