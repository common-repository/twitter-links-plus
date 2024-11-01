<?php 
/*
Plugin Name: Twitter Links Plus+
Plugin URI: http://www.tquizzle.com/wordpress/plugins/twitter-links-plus/
Description: Checks Twitter usernames mentioned in the content and in the comments (eg. @tquizzle) with the Twitter service to see if that user is indeed a Twitter user, then converts that user's Twitter name to a link to the mentioned user's Twitter profile page (eg.<a href="http://twitter.com/tquizzle">@tquizzle</a>).
Version: 0.3.2
Author: Travis Quinnelly
Author URI: http://www.tquizzle.com




Props: Have to give props to Matt Freedman and his plugin "Twitter Links"
    [http://mattsblog.ca/plugins/twitter-links/] which does this function only
    to comments. I wanted the capability to do that to posts, pages & comments
    instead. Enter Twitter Links Plus+. Love that GPL!



This program is free software: you can redistribute it and/or modify 
it under the terms of the GNU General Public License as published by 
the Free Software Foundation, either version 3 of the License, or 
(at your option) any later version.

This program is distributed in the hope that it will be useful, 
but WITHOUT ANY WARRANTY; without even the implied warranty of 
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the 
GNU General Public License for more details.

You should have received a copy of the GNU General Public License 
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

/* Filter Hooks */
add_filter ('the_content', 'tlp_in_post');
add_filter ('comment_text', 'tlp_in_comment');

/* Wrapper Functions */
function tlp_in_post ($content) {
	return tlp_core($content);
}
function tlp_in_comment ($comment) {
	return tlp_core($comment);
}

/* Core Function */
function tlp_core($content) {
	$search = preg_match_all( "/[@][A-Za-z0-9_]*/", $content, $matches );

	foreach( $matches[0] as $user ) {

		$user = str_replace( '@', '', $user );

		$handler = curl_init();
		curl_setopt( $handler, CURLOPT_URL, 'http://twitter.com/users/show/' . $user . '.xml' );
		curl_setopt( $handler, CURLOPT_NOBODY, 1 );
		curl_setopt( $handler, CURLOPT_RETURNTRANSFER, 1 );
		curl_exec( $handler );
		$http_code = curl_getinfo( $handler, CURLINFO_HTTP_CODE );
		curl_close( $handler );

		if ( is_int( $http_code ) && $http_code == '200' )
			$content = str_replace( '@' . $user, '<a href="http://twitter.com/'
                . $user . '/" rel="nofollow">@' . $user . '</a>', $content );

	}

	return $content;

}

?>