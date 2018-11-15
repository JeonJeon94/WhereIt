<script>
  $('.more').click(function(){
    $('.news-detail').css('display', 'block')
    $('.news-list').css('display', 'none')
    $('html').animate({scrollTop : 0}, 300);
    return false;
  });
</script>