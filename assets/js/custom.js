$(document).ready(function() {

	function scrolling(){
	    var sticky = $('.main-menu'),
	        scroll = $(window).scrollTop();

	    if (scroll >= 70) sticky.addClass('fixed');
	    else sticky.removeClass('fixed');
	};
	scrolling();
	$(window).scroll(scrolling);

	function scrolling(){
	    var sticky = $('.middle-header'),
	        scroll = $(window).scrollTop();

	    if (scroll >= 70) sticky.addClass('fixed');
	    else sticky.removeClass('fixed');
	};
	scrolling();
	$(window).scroll(scrolling);

});








/** Header Menu Active **/
$(document).ready(function() {
	$(".navbar-nav li a").each(function() {
	    var pathname1 = window.location.href.substr(window.location.href.lastIndexOf('/') + 1);
	    var pathname = pathname1.replace("#/", "");
	    if ($(this).attr('href') == pathname) {
	        $(this).parent().addClass('current-menu-item');
	    }
	});

	$(".navbar-nav li ul.dropdown-menu li a").each(function() {
	    var pathname1 = window.location.href.substr(window.location.href.lastIndexOf('/') + 1);
	    // alert(pathname1);
	    var pathname = pathname1.replace("#/", "");
	    if ($(this).attr('href').indexOf(pathname1) > -1) {
	        $(this).parent().addClass('current-menu-item');
	        $(this).parent().parent().parent().addClass('current-menu-item');
	    }
	});
});
/** Header Menu Active **/

/** Footer Menu Active **/
$(document).ready(function() {
	$(".footer-menu li a").each(function() {
	    var pathname1 = window.location.href.substr(window.location.href.lastIndexOf('/') + 1);
	    var pathname = pathname1.replace("#/", "");
	    if ($(this).attr('href') == pathname) {
	        $(this).parent().addClass('active');
	    }
	});

	$(".footer-menu ul.submenu li a").each(function() {
	    var pathname1 = window.location.href.substr(window.location.href.lastIndexOf('/') + 1);
	    var pathname = pathname1.replace("#/", "");
	    if ($(this).attr('href') == pathname) {
	        $(this).parent().addClass('active');
	        $(this).parent().parent().parent().addClass('active');
	    }
	});
});
/** Footer Menu Active **/

/** Font Increase/Decrease **/
var $affectedElements = $("body"); // Can be extended, ex. $("div, p, span.someClass")

// Storing the original size in a data attribute so size can be reset
$affectedElements.each( function(){
  var $this = $(this);
  $this.data("orig-size", $this.css("font-size") );
});

$("#btn-increase").click(function(){
  changeFontSize(2);
})

$("#btn-decrease").click(function(){
  changeFontSize(-2);
})

$("#btn-orig").click(function(){
  $affectedElements.each( function(){
        var $this = $(this);
        $this.css( "font-size" , $this.data("orig-size") );
   });
})

function changeFontSize(direction){
    $affectedElements.each( function(){
		var $this = $(this);
		var currentFontSize = parseInt($this.css("font-size"));

		if (currentFontSize >= 18) currentFontSize = 18;
		if (currentFontSize <= 12) currentFontSize = 12;

		$this.css( "font-size" , currentFontSize + direction );
    });
}