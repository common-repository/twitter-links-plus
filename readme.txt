=== Plugin Name ===
Contributors: Travis Quinnelly
Donate Link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=5028679
Tags: twitter, links, content, comments, pages, posts
Requires at least: 2.5
Tested up to: 2.7.1
Stable tag: 0.3.2


== Description ==

Checks Twitter usernames mentioned in posts, pages and in the comments (eg. @tquizzle) with the Twitter service to see if that user is indeed a Twitter user, then converts that user's Twitter name to a link to the mentioned user's Twitter profile page (eg.<a href="http://twitter.com/tquizzle">@tquizzle</a>).

<strong>Important</strong>: As this plugin converts usernames on the fly (whenever and everytime somebody views posts, pages, or comments), and checks Twitter for every username (to ensure it's valid), I <strong>strongly</strong> recommend using a caching plugin such as <strong>WP Super Cache</strong>. It will not only lessen the load on Twitter's servers, but obviously speed up page loads in the process.

== Installation ==

1. Upload 'twitter-links-plus' to the '/wp-content/plugins/' directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. No step 3, you're done.


== Frequently Asked Questions ==

1. It's not showing my links.<br />
	This sometimes happens...Its not our fault. Twitter has some API limits and sometimes you're links just don't happen instantly. You need to be using a good cache plugin to help this issue, but I'm open to suggestions on anyone who can easily remedy the problem.
2. Do I need to do anything?<br />
	No, download -> Install -> Sit back and relax.
