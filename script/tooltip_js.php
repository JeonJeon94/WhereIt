<script>
  var flag = false
  var isChange = false
  $('.default-page').on('click', function(e){
    var tgPoint = $(e.target);
    var popCallBtn = tgPoint[0].id == 'tooltip-content'
    if (!popCallBtn && flag && !isChange) {
      flag = false
      $('.tooltip-content').css('visibility','hidden');
    }
  });
  $('#tooltip').click(function(){
      if(!flag){
        flag = true
        isChange = true
        $('.tooltip-content').css('visibility', 'visible')
        setTimeout(function(){
          isChange = false
        }, (300));
      }
  });

</script>