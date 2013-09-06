<script type="text/javascript">
<?php if(get_option('priority_loading')=='enable') { ?>
head.ready(function() {
<?php } ?>
/******************************************************************/
/*	Twitter Feed Cycle									      	  */
/******************************************************************/
/* Combining Tweets with JQuery Cycle ALL - CreativeWorkz.  */

function gettweets( name,tweetsnum ) {

//Your twitter name
var twitter_name = name;

//Number of tweets you want to get back
var twitter_count = tweetsnum;
//Callback function name
var callback_name = "tweet_callback";
//Twitter search url
var twitter_search = "http://twitter.com/statuses/user_timeline";
//Return type (json or xml)
var return_type = "json";
//Adds script tags to the head/body tag

( function() {
var ts = document.createElement('script');
ts.type = 'text/javascript';
ts.async = true;
ts.src = twitter_search + "." + return_type + "?screen_name=" + twitter_name + "&count=" + twitter_count + "&callback=" + callback_name;
( document.getElementsByTagName( 'head' )[ 0 ] || document.getElementsByTagName( 'body' )[ 0 ] ).appendChild( ts );
} )();

}

//Call back function
function tweet_callback( data ) {
//Loop through the data from twitter
jQuery.each( data, function( i, tweet ) {
//Make sure the text isn't undefined
if( tweet.text != undefined ) {
//Lets do some regex magic to replace urls, hashtags, and usernames
var text = tweet.text.toString().replace( /(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig, '<a href="$1">$1</a>' ).replace( /(^|\s)@(\w+)/, '<a href="http://www.twitter.com/$2">@$2</a>' ).replace( /[#]+[A-Za-z0-9-_]+/ig, function(t) { var tag = t.replace("#","%23"); return t.link("http://search.twitter.com/search?q="+tag); } );
//Lets append each tweet to a ul with the id of tweet_container
jQuery( "#tweet_container" ).append( "<span>" + text + "</span>");
			jQuery('#tweet_container').cycle({ // Cycle through tweets
				fx: 'scrollDown',
				speed: 800,
				timeout: 10000,
				easing: 'easeInOutBack',
				cleartype:  true,
				cleartypeNoBg:  true
			});
}
});
}
/******************************************************************/
/*	Twitter Feed Cycle *END*							      	  */
/******************************************************************/
<?php if(get_option('priority_loading')=='enable') { ?>
});
<?php } ?>
</script>
<div class="tweets">
	<div class="tweettitle"><span class="twitterfollow nvcolor-wrap"><a href="http://www.twitter.com/<?php echo TWITTERUSR; ?>"><span class="nvcolor"></span><div class="social-twitter"></div></a></span></div>
	<div id="tweet_quote_wrapper">
		<div id="tweet_container"></div>
	</div>
<div class="clear"></div>
</div>

