jQuery(document).ready(function() {

//Detect if object-fit is supported by the browser (Looking at yout IE)
/* DOES NOT WORK WELL WITH INFINITE SCROLL
if (!Modernizr.objectfit ) {
  console.log("NO COMPAT");
  jQuery('.wp-post-image').each(function(){
    var $imgUrl = this.getAttribute('src');
    
    //change img to background
    jQuery(this).parent().css('background-image', 'url(' + $imgUrl + ')');
    jQuery(this).parent().addClass('compat-object-fit');
    jQuery('.segue').addClass('compat-segue');

    //hide the image
    jQuery(this).addClass('hide');
  });
}
else{
  console.log("YES COMPAT");
}

*/

var jsonObj = '';
var iframeURL = "https://www.youtube.com/embed/";

  //on window resize - remove sidebar if appropriate
  jQuery(window).on('resize', function(){
    if (jQuery(window).width() > 1020) {
      jQuery('#off-canvas').removeClass('is-open');
      jQuery('.js-off-canvas-overlay').removeClass('is-visible');

      //load items on window resize (must be a computer at this point)
      jQuery.ajax({
          method: 'GET',
          url: 'https://www.googleapis.com/youtube/v3/search?',
          data: { 
          part : 'snippet',
          channelId: 'UCUW3wXNmcf6nsIMvfDTEIaQ',
          key: postArray.YOUTUBE_API_KEY,
          order: 'date'
          },
          dataType: 'jsonp',
          cache: false,
           success: function(result){
            var responseString = JSON.stringify(result, '', 2);
            jsonObj = jQuery.parseJSON(responseString);
           
            addVideo();
           }
      })

      jQuery.ajax({
      type: "GET",
      dataType: "jsonp",
      cache: false,
      url: 'https://api.instagram.com/v1/users/' + postArray.INSTAGRAM_CLIENT_ID + '/media/recent/?access_token=' + postArray.INSTAGRAM_ACCESS_TOKEN,
      success: function(result)  {

        var responseString = JSON.stringify(result, '', 2);
          var jsonObj = jQuery.parseJSON(responseString);

          //embedd instagram objects on page
          for(var i =0; i<jsonObj.data.length; i++)
        {
          //only display 5 posts
          if(i == 5)
            break;

          //place image into intagram container
          jQuery('#insta-anchor' + i).attr('href', jsonObj.data[i].link);
          
          //debug
          //console.log(jsonObj.data[i]);
        }

        //call instagram script to process images (just in case the script loaded before these images were placed on the page)
        window.instgrm.Embeds.process()        
      },
      error: function (error) {
        console.log("failed to load instagram posts");
         // console.log(error);
      }
  });
    }
  });

  /**************INSTAGRAM API***********************/
/*
  jQuery.ajax({
     type : "post",
     url : postArray.ajax_url,
     data: {action: "getInstagramLinks"},
     success: function(response) {
     	console.log("SUCCESS");
     	var responseString = JSON.stringify(response, '', 2);
      		jsonObj = jQuery.parseJSON(responseString);
        console.log(response);
        jQuery('#instagram').append(response);
     }
  })   
*/

/**************YOUTUBE DATA API***********************/
if (jQuery(window).width() > 1020) {
    jQuery.ajax({
          method: 'GET',
          url: 'https://www.googleapis.com/youtube/v3/search?',
          data: { 
          part : 'snippet',
          channelId: 'UCUW3wXNmcf6nsIMvfDTEIaQ',
          key: postArray.YOUTUBE_API_KEY,
          order: 'date'
          },
          dataType: 'jsonp',
          cache: false,
           success: function(result){
            var responseString = JSON.stringify(result, '', 2);
            jsonObj = jQuery.parseJSON(responseString);
           
            addVideo();
           }
  })
}
/*
  var videoID = jsonObj.items[i].id.videoId;
    thisURL = iframeURL;
    //set iframe properties
    jQuery('<iframe />', { 
      src: thisURL += videoID,
      height: "200",
      width: "357",
      frameborder: "0",
      allowfullscreen: "true"
    }).appendTo('#video-container');
*/
function addVideo(){

  //display videos on the page
  for(var i =0; i<jsonObj.items.length; i++)
  {
    //add video source to iframe
    var videoID = jsonObj.items[i].id.videoId;
    var thisURL = iframeURL + videoID;

    jQuery('#myIframe' + i).attr('src', thisURL);
    jQuery('#myIframe' + i).removeClass('hide');
  }
}

 /**************INSTAGRAM API***********************/
   if (jQuery(window).width() > 1020) {
    var feedUrl = 'https://api.instagram.com/v1/users/' + postArray.INSTAGRAM_CLIENT_ID + '/media/recent/?access_token=' + postArray.INSTAGRAM_ACCESS_TOKEN;
    //console.log(feedUrl);
    jQuery.ajax({
        type: "GET",
        dataType: "jsonp",
        cache: false,
        url: feedUrl,
        success: function(result)  {

          var responseString = JSON.stringify(result, '', 2);
            var jsonObj = jQuery.parseJSON(responseString);

            //embedd instagram objects on page
            for(var i =0; i<jsonObj.data.length; i++)
          {
            //only display 5 posts
            if(i == 5)
              break;

            //place image into intagram container
            jQuery('#insta-anchor' + i).attr('href', jsonObj.data[i].link);
            
            //debug
            //console.log(jsonObj.data[i]);
          }

          //call instagram script to process images (just in case the script loaded before these images were placed on the page)
          window.instgrm.Embeds.process()        
        },
        error: function (error) {
          console.log("failed to load instagram posts");
           // console.log(error);
        }
    });
}





});

