<script>
  $('#search-word').click(function(){
    console.log("input")
    $('#search-word:input').removeAttr('placeholder')
    $('#search-word:input').css('caretColor', '#d8a3d2')
  });
</script>
