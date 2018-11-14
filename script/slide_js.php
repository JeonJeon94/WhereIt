<script type="text/javascript">

    $('.owl-carousel').owlCarousel({
        loop:true,
        stagePadding: 0,
        center:true,
        margin:50,
        nav:true,
        autoWidth:true,
        responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
      }
    })
    $('.loop').owlCarousel({
        center: true,
        items:2,
        loop:true,
        margin:50,
        responsive:{
            600:{
                items:4
            }
        }
    });
    $('.nonloop').owlCarousel({
        center: true,
        items:2,
        loop:false,
        margin:10,
        responsive:{
            600:{
                items:4
            }
        }
    });
</script>