$(document).ready(function(){

	$('.et_pb_slick_gallery').slick({
		accessibility:$(this).data('accessibility'),
        adaptiveHeight:$(this).data('adaptiveHeight'),
        autoplay: $(this).data('autoplay'),
        autoplaySpeed: 0,
        arrows:true,
        prevArrow:'<button type="button" class="slick-prev">Previous</button>',
    	nextArrow:'<button type="button" class="slick-next">Next</button>',
        centerMode:true,
        centerPadding:'0px',
        cssEase:'linear',
        dots: false,
        dotsClass:'slick-dots',
        draggable:true,
        fade:false,
        easing:'linear',
        infinite: true,
		speed: 5000,
		slidesToShow: 4,
		slidesToScroll: 1,
		pauseOnHover:true,
		responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 1,
				}
				},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
				}
			}
			// You can unslick at a given breakpoint now by adding:
			// settings: "unslick"
			// instead of a settings object
			]
	});
	});
	