<script>
  // $(function(){
  //   var $move_width = parseInt( $('.picture-slide').css('width') );   // 이동할 수치 계산  
  //   var $picture = $('.picture');                       // 컨텐츠 박스 변수저장

  //   function animationL(){
  //     $picture.children().first()
  //     .animate({ marginLeft : $move_width }, "linear", function (){
  //       $(this).appendTo( $(this).parent() ).css({ marginLeft : 20}, { marginRight : 20});
  //     });     
  //   }
  //   $('.left').click(function(){
  //     animationL()
  //   });
  //   function animationR(){
  //     $picture.children().first()
  //     .animate({ marginRight : - $move_width }, "linear", function (){
  //       $(this).appendTo( $(this).parent() ).css({ marginRight : 20},{ marginLeft : 20});
  //     });     
  //   }
  //   $('.right').click(function(){
  //     animationR()
  //   });
  // });
  var slideIndex = 1;
  showSlides(slideIndex);

  function plusSlides(n) {
    showSlides(slideIndex += n);
  }

  function currentSlide(n) {
    showSlides(slideIndex = n);
  }

  function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("slides");
    var dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1} 
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none"; 
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block"; 
    dots[slideIndex-1].className += " active";
  }
</script>