$(function(){
	$('.step').on('click', function(e){

		var hrefID = $(this).attr('href');

		var posHref = $(hrefID).offset().top;
		if ($(window).width() > 1024) {
			$(document.documentElement).animate({scrollTop: posHref+1}, 500);
		}
		else {
			$(document.documentElement).animate({scrollTop: posHref-88}, 500);	
		}

		e.preventDefault();
	});
	$('#creditsButton').on('click', function(e){
		var credits = $('#credits')
		if(credits.css('display')=='none'){
			credits.slideDown(500);
		}
		else {
			credits.slideUp(500);
		}
		e.preventDefault();
	});

		$navMarg = $('nav').offset().top
		$navPos = $navMarg+144;
	function fixedNav(){

		if ($(window).scrollTop()>$navPos) {
			$('nav').addClass('fixedNav');
			$('nav').removeClass('fixedNavTab');
			$('#dlButton').addClass('fixedDl');
			$('#dlButton').removeClass('fixedDlTab');
			$('.left-part').addClass('fixedLeft')
		}
		if ($(window).scrollTop()<=$navPos){
			$('nav').removeClass('fixedNav');
			$('nav').removeClass('fixedNavTab');
			$('#dlButton').removeClass('fixedDl');
			$('#dlButton').removeClass('fixedDlTab');
			$('.left-part').removeClass('fixedLeft');
		}
	}

	function fixedNavTab(){
		if ($(window).scrollTop()>248) {
			$('nav').addClass('fixedNavTab');
			$('nav').removeClass('fixedNav');
			$('#dlButton').addClass('fixedDlTab');
			$('#dlButton').removeClass('fixedDl');
			$('.right-part').css('marginTop', '168px');
		}
		if ($(window).scrollTop()<=248){
			$('nav').removeClass('fixedNavTab');
			$('nav').removeClass('fixedNav');
			$('#dlButton').removeClass('fixedDlTab');	
			$('#dlButton').removeClass('fixedDl');
			$('.right-part').css('marginTop', 0);
		}		
	}
	$(window).scroll(function() {
		if ($(window).width() > 1024) {
			fixedNav();
		}
		else {
			fixedNavTab();
		}
	});
	$(window).resize(function() {

		if ($(window).width() > 1024) {
			fixedNav();
		}
		else {
			fixedNavTab();
		}
	});

//selected state
	window.onscroll = function () {
		var scroll_pos = window.pageYOffset;
		var scroll_pos_tab = (window.pageYOffset)+89;
		var scroll_quoi = $("#quoi").offset().top;
		var scroll_comment = $("#comment").offset().top;
		var scroll_pourquoi = $("#pourquoi").offset().top;
		var linkquoi  = document.getElementById("linkquoi");
		var linkcomment  = document.getElementById("linkcomment");
		var linkpourquoi  = document.getElementById("linkpourquoi");

		if ($(window).width() > 1024) {
			if (scroll_pos < scroll_comment) {
				linkquoi.className="selected";
				linkcomment.className="";
				linkpourquoi.className="";
			}
			if (scroll_pos < scroll_pourquoi && scroll_pos >= scroll_comment) {
				linkquoi.className="";
				linkcomment.className="selected";
				linkpourquoi.className="";
			}
			if (scroll_pos >= scroll_pourquoi) {
				linkquoi.className="";
				linkcomment.className="";
				linkpourquoi.className="selected";
			}
		}
		else {
			if (scroll_pos_tab < scroll_comment) {
				linkquoi.className="selected";
				linkcomment.className="";
				linkpourquoi.className="";
			}
			if (scroll_pos_tab < scroll_pourquoi && scroll_pos_tab >= scroll_comment) {
				linkquoi.className="";
				linkcomment.className="selected";
				linkpourquoi.className="";
			}
			if (scroll_pos_tab >= scroll_pourquoi) {
				linkquoi.className="";
				linkcomment.className="";
				linkpourquoi.className="selected";
			}			
		}
	}; 

	function endScroll() {
		var contactHeight = window.innerHeight-160;
		document.getElementById('pourquoi').style.paddingBottom = contactHeight+'px' ;
	}
	window.onload = function(){
		endScroll();
	}
	window.onresize = function() {
		endScroll();
	}



//mailinglist

	function pulse(item){
		$(item).animate({"opacity": 0.5}, 200)
		.animate({"opacity": 1}, 200)
		.animate({"opacity": 0.5}, 200)
		.animate({"opacity": 1}, 200)
	}

	$('.message').css({"display": "none"});
							
	var emailsVal = $('#email').val();

										
	$('#subscribe').submit(function(e){
		$('#submit').animate({'opacity': '0.4'}).attr({'disabled': 'disabled'}); 
		e.preventDefault();
		$.ajax({
			type: 'post',
			dataType: 'json',
			url: 'add.php',
			data: 'email=' + $('#email').val(),
			success: function(e){
				if(e.error == true){
					pulse('#email');
					$('.message').html(e.message).slideDown(); 
					$('#submit').animate({'opacity': '1'}, function(){
						$(this).removeAttr('disabled');
					});
				}else{ 
					$('#subscribe').fadeTo(500, 0.2)
					$('.message').html(e.message).slideDown();
				}
			}
		});
			
			$(this).ajaxError(function(){
			});
			return false;
	});
});