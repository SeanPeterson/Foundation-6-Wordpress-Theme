
/*
jQuery(document).ready(function() {

var numOfPrograms = jQuery('.single-program p').length;
var paraHeight;
var imageHeight;
		console.log("THE PARA H us " + paraHeight);
var paragraphSizes = [];

jQuery(window).resize(function() {
	if(jQuery(document).width() > 768){
		imageHeight = (jQuery(".single-program .imageColumn img").height()) - 100;
		hideText();
		jQuery(".program-content a").toggle(function(){slideUp(this);}, function(){slideDown(this);});
	}
	else
	{
		//remove functionality for mobile devices
		for(var i=1; i<=numOfPrograms; i++){
			jQuery("#program_" + i + " a").remove();
			jQuery("#program_" + i + " p").removeAttr("style");
		}
	}
});


	//hide text when too long
	if(jQuery(document).width() > 768)
		hideText();
	
	function hideText(){
		var maxWords = 96;
		imageHeight = (jQuery(".single-program .imageColumn img").height());
		console.log("IMAGE" + imageHeight);

		for(var i=1; i<=numOfPrograms; i++){

			var divheight = jQuery("#program_" + i + " p").height(); 
		    var lineheight = jQuery("#program_" + i + " p").css('line-height').replace("px","");
		    var numOfLines = Math.round(divheight/parseInt(lineheight));
		    var numOfWords = jQuery("#program_" + i + " p").html().split(" ").length;
		    var numOfChars = jQuery("#program_" + i + " p").html().length;
		    var linesOffset = (numOfLines - 17)/2;
		    paraHeight = jQuery("#program_" + i + " p")[0].scrollHeight;

		    paragraphSizes.push(paraHeight);
		    console.log("THE PARA HEIGHT IS " + jQuery("#program_" + i + " p")[0].scrollHeight);
		    maxWords = Math.round((numOfWords/numOfLines) * (8 - linesOffset));
		    if(paraHeight > (imageHeight))
		    {
		    	if(!jQuery("#program_" + i + " a").hasClass("slider-down"))
		    	{
				    //image height - 100px
				    jQuery("#program_" + i + " p").css("max-height", imageHeight-100);
				    jQuery("#program_" + i + " p").addClass("slider-closed");
				    jQuery("#program_" + i + " a").remove();
				    jQuery("#program_" + i ).append("<a class='button radius'>Continue Reading</a>");
				}
			}
			else
			{
				console.log("WHERE");
				jQuery("#program_" + i + " a").remove();
				jQuery("#program_" + i + " p").removeAttr("style");
			}
		}
		//var html = jQuery("#program_" + 2 + " p").html().split(" ");
		//html = html.slice(0,maxWords).join(" ") + "<span>" + html.slice(maxWords).join(" ");
		//html = html.slice(0,6).join(" ") + "</span>" + html.slice(6).join(" ");
		//jQuery("#program_" + 2 + " p").html(html);
		
	}
	/*
		jQuery(".program-content a").toggle(function(){
			console.log("#" + this.parentNode.id + " p span");

			jQuery("#" + this.parentNode.id + " p span").slideDown('slow');
			//jQuery("#" + this.parentNode.id + " p span").css("display", "inline");
		},
		function(){
			jQuery("#" + this.parentNode.id + " p span").slideUp('slow');
		});	


	jQuery(".program-content a").click(function(){
		
		var testMe = jQuery("#program_" + 2 + " p").height();
		var testMe = jQuery("#program_" + 2 + " p").css("overflow", "hidden");
		for(var i=0; i<=435; i++)
		{
			setTimeout(
			  function() 
			  {
			  	console.log("MADE it here@");
			    jQuery("#program_" + 2 + " p").css("height", i + "px");
			  }, 1000);
		}
	});
*/
/*
	jQuery(".program-content a").toggle(function(){slideUp(this);}, function(){slideDown(this);});



	function slideUp(thisObject){
			var parent = jQuery(thisObject).parent().attr('id');
			console.log(parent);
			var id = parent.substr(parent.length - 1);
			paraHeight = paragraphSizes[id-1];

			console.log(paraHeight);
			var target = "#" + parent + " p";
			console.log(target);
			jQuery("#" + parent + " p").css("max-height", paraHeight);
			if(jQuery("#" + parent + " p").hasClass("slider-closed"))
				jQuery("#" + parent + " p").removeClass("slider-closed");
			else
				jQuery("#" + parent + " p").removeClass("slider-up");
			jQuery("#" + parent + " p").addClass("slider-down");
	}

	function slideDown(thisObject){
		var parent = jQuery(thisObject).parent().attr('id');
		var id = parent.substr(parent.length - 1);
		paraHeight = paragraphSizes[id-1];
		jQuery("#" + parent + " p").css("max-height", imageHeight-100);
		jQuery("#" + parent + " p").removeClass("slider-down");
		jQuery("#" + parent + " p").addClass("slider-up");
	}

});
*/
//lightslider
jQuery(document).ready(function() {
    jQuery('#imageGallery').lightSlider({
            gallery: true,
      item: 1,
      loop:true,
      slideMargin: 0,
      thumbItem: 9
    });  
  });

 