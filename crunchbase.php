<?php
/*
Plugin Name: CrunchBase Widget
Version: 1.0
Plugin URI: http://yoast.com/wordpress/crunchbase/
Description: Provides easy shortcode access to inserting Crunchbase widgets
Author: Joost de Valk
Author URI: http://yoast.com/

Copyright 2008 Joost de Valk (email: joost@joostdevalk.nl)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

function crunchbase_widget($atts, $content) {
	$atts['type'] = strtolower($atts['type']);
	switch($atts['type']) {
		case 'company':
			$type = "company";
			break;
		case 'product':
			$type = "product";
			break;
		case 'person':
			$type = "person";
			break;
		case 'financial':
		case 'financial organization':
		case 'financial-organization':
			$type = "financial-organization";
			break;
		default:
			$type = "company";
	}
	$info = strtolower(str_replace(" ","-",$content));
	$name = ucwords(str_replace("-"," ",$content));


	$output = 	'<div class="cbw snap_nopreview"><div class="cbw_header">'
				.'<script src="http://www.crunchbase.com/javascripts/widget.js" type="text/javascript"></script>'
				.'<div class="cbw_header_text">'
				.'<a href="http://www.crunchbase.com/'.$type.'/'.$info.'">'
				.'CrunchBase Information on '.$name.'</a>'
				.'</div></div><div class="cbw_content">'
				.'<div class="cbw_subheader">'
				.'<a href="http://www.crunchbase.com/'.$type.'/'.$info.'">'.$name.'</a></div>'
				.'<div class="cbw_subcontent">'
				.'<script src="http://www.crunchbase.com/cbw/'.$type.'/'.$info.'.js" type="text/javascript">'
				.'</script></div>'
				.'<div class="cbw_footer">Information provided by <a href="http://www.crunchbase.com/">CrunchBase</a>'
				.'</div></div></div>';
			
	return $output;
}

add_shortcode('cb', 'crunchbase_widget');

?>