(function($) {
	"use strict";
	$.fn.TNSlider = function(options) {
		var defaults = {
			'main_image_width' : 950,
			'main_image_height' : 500,
			'main_image_position' : 'left',
			'animation_speed' : 500,
			'responsive' : [true, '95'],
			'texteffect' : 'Back',
			'randomize' : [true, 'medium']
		};
		return this.each(function() {
			if(options) $.extend(defaults, options);
			var main_image_width = defaults['main_image_width'];
			var main_image_height = defaults['main_image_height'];
			var main_image_position = defaults['main_image_position'];
			var animation_speed = defaults['animation_speed'];
			var responsive = defaults['responsive'];
			var texteffect = defaults['texteffect'];
			var randomize = defaults['randomize'];
			var current_element = $(this);
			current_element.addClass('EasingSlider');
			var main_val = true;
			var confirm_val = true;
			var thumb_width = (current_element.width() - main_image_width) - 1;
			var thumb_height = ((main_image_height + 1) / (current_element.find('li').length - 1) - 1);
			var auto_generate = 1;
			current_element.find('li').each(function() {
				if(randomize[0]) {
					$(this).prepend('<span class="stopbtn"></span><span class="process"></span>');
				}
				if($(this).children('span.title').length == 0) {
					$(this).prepend('<span class="title"></span>');
				}
				if($(this).children('span.slogan').length == 0) {
					$(this).prepend('<span class="slogan"></span>');
				}
				$(this).attr({'rel':'li'+auto_generate+''});
				auto_generate++;
			});
			$(document).on("click", ".stopbtn", function() {
				console.log(1)
				clearInterval(timerId);
				$("span.process").stop();
				$(this).addClass("active");
			});
			if(randomize[0] == true) {
				var timerbreak;
				if(randomize[1] == 'slow') {
					timerbreak = 15000;
				} else if(randomize[1] == 'medium') {
					timerbreak = 10000;
				} else {
					timerbreak = 5000;
				}
				var timerId = setInterval(randomclick, timerbreak);
			}
			var timer = 2;
			function randomclick() {
				if(timer > current_element.find('li').length) {
					timer = 1;
				}
				current_element.find("li[rel='li"+timer+"']").trigger('click');
				timer++;
			}
			if(responsive[0]) {
				current_element.addClass('responsive').width('100%');
				main_image_width = responsive[1] + '%';
				thumb_width = (99.90 - responsive[1]) + '%';
			}
			if(main_image_position == "right") {
				current_element.addClass('rig');
			} else {
				current_element.removeClass('rig');
			}
			current_element.height(main_image_height);
			current_element.find('li:not(".main")').on('mouseover', function() {
				$(this).append('<div class="thumb"><span class="tle">'+$(this).children('span.title').html()+'</span></div>');
				$(this).children('div.thumb').fadeIn('fast');
				$(this).children('div.thumb').children('span.tle').animate({
					opacity : 0.9,
					bottom : 0
				}, {
					duration: animation_speed,
					easing: 'easeOutBack'
				});
				$(this).mouseout(function() {
					$(this).children('div.thumb').fadeOut('fast', function() {
						$(this).remove();
					});
				});
				$(this).children('div.thumb').on( "hover", function() {
					$(this).remove();
				});
			});
			var can_click = true;
			$( document ).on( "click", '.EasingSlider li', function() {
				if(can_click) {
					if($(this).hasClass('main') == false) {
						if(randomize[0] == true) clearInterval(timerId);
						can_click = false;
						var current_li = $(this);
						if(confirm_val) {
							if(current_element.find('li.main').length > 0) main_val = false;
						}
						if(main_val == false) {
							if(current_element.find('li.main span.moredetail').length > 0) {
								if(current_element.find('li.main span.moredetail.active').length == 0) {
									current_element.find('li.main span.moredetail').animate({
										top:'-50%'
									}, {
										duration: animation_speed,
										easing: 'easeIn'+texteffect+''
									});
								}
							}
							current_element.find('li.main span.title').animate({
								opacity : 0,
								top : 0,
								left : '-100%'
							}, {
								duration: animation_speed,
								easing: 'easeIn'+texteffect+'',
								complete : function() {
									current_element.find('li.main span.slogan').animate({
										opacity : 0,
										left : 0,
										bottom : '-20%'
									}, {
										duration: animation_speed,
										easing: 'easeIn'+texteffect+'',
										complete : function() {
											if(randomize[0] == true) {
												timerId = setInterval(randomclick, timerbreak);
											}
											can_click = true;
											main_val = true;
											confirm_val = false;
											current_li.trigger('click');
										}
									});
								}
							});
						} else {
							if(randomize[0] == true) clearInterval(timerId);
							confirm_val = true;
							if(randomize[0] == true) {
								current_element.find('span.process').css({'width' : 0});
								current_element.find('span.stopbtn.active').removeClass('active');
							}
							$(this).children("div.thumb").remove();
							current_element.find('span.title.show').hide();
							current_element.find('span.slogan.show').hide();
							current_element.find('li.main').removeClass("main");
							$(this).addClass("main");
							var clone = $(this).clone();
							$(this).remove();
							clone.prependTo(current_element);
							current_element.find('li:not(".main")').css({'opacity' : '0', 'width':'1px', 'height':'1px'});
							clone.height(main_image_height).animate({
								width: main_image_width
							}, {
								duration: animation_speed,
								easing: 'easeOutBack',
								complete : function() {
									if(current_element.find('li.main span.moredetail').length > 0) {
										clone.find('span.moredetail').animate({
											top : '20px'
										}, {
											duration: animation_speed,
											easing: 'easeOut'+texteffect+'',
											complete : function() {
												clone.find('span.accordian_close').on( "click", function() {
													clone.find('span.moredetail').trigger('click');
												});
												clone.find('div.accordian_links').on( "click", function() {
													if($(this).hasClass('active') == false) {
														clone.find("div.accordian_links.active").removeClass('active');
														clone.find("div.accordian_content").hide();
														$(this).addClass('active');
														$(this).next("div.accordian_content").slideDown();
													}
												});
												clone.find('span.tabdescri_close').on( "click", function() {
													clone.find('span.moredetail').trigger('click');
												});
												clone.find('span.tabimages_close').on( "click", function() {
													clone.find('span.moredetail').trigger('click');
												});
												clone.find('div.tabimages img').on( "click", function() {
													if($(this).attr("img_link")) {
														var img_link = $(this).attr("img_link");
														$(this).closest('li.main').children('img').attr('src',img_link);
													}
													if($(this).attr("pro_name")) {
														var pro_name = $(this).attr("pro_name");
														$(this).closest('li.main').children('span.title').text(pro_name);
													}
													if($(this).attr("pro_desc")) {
														var pro_name = $(this).attr("pro_desc");
														$(this).closest('li.main').children('span.slogan').text(pro_name);
													}
													clone.find('span.moredetail').trigger('click');
												});
												clone.find('span.tabcontent_close').on( "click", function() {
													clone.find('span.moredetail').trigger('click');
												});
												clone.find('div.tabcontent_links span').on( "click", function() {
													if($(this).hasClass('active') == false) {
														clone.find('div.tabcontent_links span.active').removeClass('active');
														$(this).addClass('active');
														clone.find('div.tabcontent_content').hide();
														clone.find('div.tabcontent_content'+$(this).attr('rel')+'').slideDown();
													}
												});
												clone.find('span.vtabcontent_close').on( "click", function() {
													clone.find('span.moredetail').trigger('click');
												});
												clone.find('div.vtabcontent_links span').on( "click", function() {
													if($(this).hasClass('active') == false) {
														clone.find('div.vtabcontent_links span.active').removeClass('active');
														$(this).addClass('active');
														clone.find('div.vtabcontent_content').hide();
														clone.find('div.vtabcontent_content'+$(this).attr('rel')+'').slideDown();
													}
												});
												clone.find('span.moredetail').on( "click", function() {
													if($(this).hasClass('active')) {
														$(this).removeClass('active');
														if(clone.find("div.accordian").length > 0 ) {
															clone.find("div.accordian").animate({
																top : '-50%'							
															}, {
																duration: animation_speed,
																easing: 'easeOut'+texteffect+''
															});
														}
														if(clone.find("div.tabdescri").length > 0 ) {
															clone.find("div.tabdescri").animate({
																top : '-50%'							
															}, {
																duration: animation_speed,
																easing: 'easeOut'+texteffect+''
															});
														}
														if(clone.find("div.tabimages").length > 0 ) {
															clone.find("div.tabimages").animate({
																top : '-50%'							
															}, {
																duration: animation_speed,
																easing: 'easeOut'+texteffect+''
															});
														}
														if(clone.find("div.tabcontent").length > 0 ) {
															clone.find("div.tabcontent").animate({
																top : '-50%'							
															}, {
																duration: animation_speed,
																easing: 'easeOut'+texteffect+''
															});
														}
														if(clone.find("div.vtabcontent").length > 0 ) {
															clone.find("div.vtabcontent").animate({
																top : '-50%'							
															}, {
																duration: animation_speed,
																easing: 'easeOut'+texteffect+''
															});
														}
													} else {
														$(this).addClass('active');
														if(clone.find("div.accordian").length > 0 ) {
															clone.find("div.accordian").animate({
																top : '30%'
															}, {
																duration: animation_speed,
																easing: 'easeOut'+texteffect+''
															});
														}
														if(clone.find("div.tabdescri").length > 0 ) {
															clone.find("div.tabdescri").animate({
																top : '30%'
															}, {
																duration: animation_speed,
																easing: 'easeOut'+texteffect+''
															});
														}
														if(clone.find("div.tabimages").length > 0 ) {
															clone.find("div.tabimages").animate({
																top : '30%'
															}, {
																duration: animation_speed,
																easing: 'easeOut'+texteffect+''
															});
														}
														if(clone.find("div.tabcontent").length > 0 ) {
															clone.find("div.tabcontent").animate({
																top : '30%'
															}, {
																duration: animation_speed,
																easing: 'easeOut'+texteffect+''
															});
														}
														if(clone.find("div.vtabcontent").length > 0 ) {
															clone.find("div.vtabcontent").animate({
																top : '30%'
															}, {
																duration: animation_speed,
																easing: 'easeOut'+texteffect+''
															});
														}
													}
												});
											}
										});
									}
									if(randomize[0] == true) {
										$(this).children("span.process").animate({
											width : '100%'
										}, timerbreak + timerbreak / current_element.find('li').length);
									}
									current_element.find('li:not(".main")').animate({
										opacity : 1,	
										width: thumb_width,
										height: thumb_height
									}, animation_speed);
									clone.children("span.title").addClass('show').show().animate({
										opacity : 0.8,
										left: '10%',
										top: '10%'
									}, {
										duration: animation_speed,
										easing: 'easeOut'+texteffect+'',
										complete : function() {
											clone.children('span.slogan').addClass('show').show().animate({
												opacity : 0.7,
												left: 0,
												bottom: 0
												}, {
												duration: animation_speed,
												easing: 'easeOut'+texteffect+'',
												complete : function() {
													can_click = true;
													if(randomize[0] == true) {
														timerId = setInterval(randomclick, timerbreak);
													}
												}
											});
										}
									});
								}
							});
						}
					}
				}
			});
			current_element.find('li:first-child').trigger('click');
		});
	};
})(jQuery);