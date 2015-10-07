/*==============================================
	Swap image Module
==============================================*/
$(function(){
	var imgcache=new Object();
	$(".btn,.allbtn img").not("[src*='_o.']").each(function(i){
		var imgsrc=this.src;
		var dot=this.src.lastIndexOf('.');
		var imgovr=this.src.substr(0,dot)+'_o'+this.src.substr(dot,4);
		imgcache[this.src]=new Image();
		imgcache[this.src].src=imgovr;
		$(this).hover(function(){
			this.src=imgovr;
		},function(){
			this.src=imgsrc;
		});
	});
});

/*==============================================
	Fade Module
==============================================*/
$(function(){
	$(".fade").each(function(i){
		$(this).hover(function(){
			$(this).stop().fadeTo(200,0.5);
		},function(){
			$(this).stop().fadeTo(200,1);
		});
	});
}); 

/*==============================================
	Scroll
==============================================*/
$(function(){
	$("a[href^=#]").click(function(){
		var speed = 500;
		var href= $(this).attr("href");
		var target = $(href == "#" || href == "" ? 'html' : href);
		var position = target.offset().top;
		$("html, body").animate({scrollTop:position}, speed, "swing");
		return false;
	});
});

/*==============================================
	GlobalNavi Dropdown Menu
==============================================*/
$(window).on("load resize",function(){
	var i=$(window).width();
	var j=640;	//Width(Responsive)
	if(i<=j){
		$("li.dd ul").css("display","block");
		$("li.dd").unbind("mouseenter mouseleave");
	}else{
		$("li.dd").hover(function(){
			$(this).children("ul").show(100).css("display","block");
		},function(){
			$(this).children("ul").stop().hide(250);
		});
	}
});

/*==============================================
	meanmenu
==============================================*/
$(function(){
	$("#globalNavi").meanmenu();
})
