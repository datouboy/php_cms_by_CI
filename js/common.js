// JavaScript Document
$(function($) {
	logoWidthAuto();
	
	$('#chose_area').hover(function(){
		$(this).find('.dropdown-menu').show();
	},function(){
		$(this).find('.dropdown-menu').hide();
	});
	
	$('#menu_box_pc li').hover(function(){
		$(this).find('.dropdown-menu').show();
	},function(){
		$(this).find('.dropdown-menu').hide();
	});
	
	$('#menu_btn').click(function(e) {
        $('#menu_box_ph').slideToggle();
    });
	
	$('#menu_btn_con').click(function(e) {
        $('.secondary_menu').slideToggle();
    });
	
	$('#menu_box_ph li').click(function(e) {
		$('.dropdown-menu').hide();
        $(this).find('.dropdown-menu').show();
		if(!$(this).hasClass('active')){
			$('#menu_box_ph li').removeClass('active');
			$(this).addClass('active');
			if($(this).find('.dropdown-menu').css('display') != 'block'){
				return true;
			}
			return false;	
		}
    });
	
	$('.dropdown-menu.ol li a').click(function(e) {
		window.location.href = $(this).attr('href');
    });
	
	var mySwiper = new Swiper ('#banner_swiper', {
		loop: true,
		autoplay: 5000,
		
		pagination: '#banner_swp',
	});
	
	var mySwiper = new Swiper ('#focus_swiper', {
		effect : 'fade',
		loop: true,
		
		nextButton: '#focus_next',
    	prevButton: '#focus_prev',
	});  
	
	var nav = $('#navbar');
	var top = nav.offset().top + nav.height();
	var nav_lt = $('#lt_navbar');
	if(nav_lt.offset() != undefined){
		//alert('123');
		var top_lt = nav_lt.offset().top + nav_lt.height();
	}
	
	
	$(window).scroll(function(){
		if($(window).scrollTop()>top){
			nav.addClass('fid');
		}else{
			nav.removeClass('fid');
		}
		if($(window).scrollTop()>top_lt){
			nav_lt.addClass('fid');
		}else{
			nav_lt.removeClass('fid');
		}
	});
	
	$('#wx_share').hover(function(){
		$('.wx_qr').show();
	},function(){
		$('.wx_qr').hide();
	});
	
	$('.wx_share').hover(function(){
		$('.wx_share_box').show();
	},function(){
		$('.wx_share_box').hide();
	});
});

$(window).resize(function(){
	logoWidthAuto();
	$('.bar_menu').hide();
});

function logoWidthAuto (){
	var pageWidth = $(window).width();
	var pageHeight = $(window).height();
}