<?php
/*
Plugin Name: RAX - Top Social Media Share With Counter
Plugin URI: http://www.phpfreelancedevelopers.com/wordpress-rax-top-social-media-share-counter-plugin/
Description: This will give you the ability to add a social media share icons with counter on Home Page, Posts, Pages, Category Pages, Archieve Pages and many mpre options. I have added only limited number of most popular and commonly used social media sites so it will not put a load on your site. This is a light weight plugin which is very very userful as per search engine point of view.
Author: Rakshit Patel
Author URI: http://www.phpfreelancedevelopers.com
Version: 1.0

License: GPL2
*/

/*  Copyright 2010  Rakshit Patel  (email : raxit4u2@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

	add_option("rax_tsmswc_show_twitter","1");
	add_option("rax_tsmswc_show_facebook","1");
	add_option("rax_tsmswc_show_digg","1");
	add_option("rax_tsmswc_show_gbuzz","1");
	add_option("rax_tsmswc_show_reddit","1");
	add_option("rax_tsmswc_show_dzone","1");

	add_option("rax_tsmswc_show_position","above");
	add_option("rax_tsmswc_show_alignment","right");
	add_option("rax_tsmswc_show_style1","normal");
	add_option("rax_tsmswc_show_style2","horizontal");
	add_option("rax_tsmswc_show_home","");
	add_option("rax_tsmswc_show_pages","");

	add_option("rax_tsmswc_border","");
	add_option("rax_tsmswc_background","");
	add_option("rax_tsmswc_other_css","");

	add_option("rax_tsmswc_credit","1");
	
	add_action('wp_footer', 'add_tsmswc_credit_link');

	add_action('admin_menu', 'rax_social_media_share_menu_options');
	
	add_action("the_excerpt",'rax_social_media_share_show_option');
	add_action("the_content",'rax_social_media_share_show_option');
	
	function rax_social_media_share_menu_options() {
	
	  add_options_page('RAX - Social Media Share with Counter', ' RAX - Social Media Share with Counter', 'manage_options', 'rax-social-media-share-options', 'rax_social_media_share_options');
	
	}
	
	function rax_social_media_share_options() {
	
	  if (!current_user_can('manage_options'))  {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	  }
?>	
	  <div style="width:95%; font-size:11px; padding:3px 3px 3px 15px;">
	  <p style="font-size:20px; background-color:#4086C7; color:#FFF; width:97%; padding:2px;">Set Options for RAX - Social Media Share with Counter</p>
	  <p>
			<form method="post" action="options.php">
				<?php wp_nonce_field('update-options');?>
				<table width="100%" border="0" cellspacing="8" cellpadding="0">
                  <tr>
                    <td align="left" valign="top" colspan="3"><input type="submit" value="<?php _e('Update Options')?>" /></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" colspan="3">
                    
                        <div style="background-color:#CEE7FF; margin:2% 1.5% 0% 0%; padding:1%; font-size:16px; font-weight:bold">
							Show/Hide Button Settings                      
                        </div>

                    </td>
                  </tr>
                  <tr>
                  	<td width="33%" align="left" valign="top" style="line-height:30px;">
                        <div style="background-color:#FFFFDD; margin-right:5%; padding:2%;">
      	                  <span style="float:right; color:green"><input type="checkbox" name="rax_tsmswc_show_twitter" id="rax_tsmswc_show_twitter" value="1" <?php if(get_option('rax_tsmswc_show_twitter') == '1') echo 'checked="checked"';?> /> <b>Enable This</b></span>
                        <strong>Twitter Button</strong> <br />
                        </div>
                        </td>
                        
                     <td width="33%" align="left" valign="top" style="line-height:30px;">
                        <div style="background-color:#FFFFDD; margin-right:5%; padding:2%;">
      	                  <span style="float:right; color:green"><input type="checkbox" name="rax_tsmswc_show_facebook" id="rax_tsmswc_show_facebook" value="1" <?php if(get_option('rax_tsmswc_show_facebook') == '1') echo 'checked="checked"';?> /> <b>Enable This</b></span>
                        <strong>Facebook Button</strong> <br />
                        </div>
                        </td> 

                     <td width="33%" align="left" valign="top" style="line-height:30px;">
                        <div style="background-color:#FFFFDD; margin-right:5%; padding:2%;">
      	                  <span style="float:right; color:green"><input type="checkbox" name="rax_tsmswc_show_digg" id="rax_tsmswc_show_digg" value="1" <?php if(get_option('rax_tsmswc_show_digg') == '1') echo 'checked="checked"';?> /> <b>Enable This</b></span>
                        <strong>Digg Button</strong> <br />
                        </div>
                        </td> 
                  </tr>

                  <tr>
                  	<td width="33%" align="left" valign="top" style="line-height:30px;">
                        <div style="background-color:#FFFFDD; margin-right:5%; padding:2%;">
      	                  <span style="float:right; color:green"><input type="checkbox" name="rax_tsmswc_show_gbuzz" id="rax_tsmswc_show_gbuzz" value="1" <?php if(get_option('rax_tsmswc_show_gbuzz') == '1') echo 'checked="checked"';?> /> <b>Enable This</b></span>
                        <strong>Google Buzz Button</strong> <br />
                        </div>
                        </td>
                        
                     <td width="33%" align="left" valign="top" style="line-height:30px;">
                        <div style="background-color:#FFFFDD; margin-right:5%; padding:2%;">
      	                  <span style="float:right; color:green"><input type="checkbox" name="rax_tsmswc_show_reddit" id="rax_tsmswc_show_reddit" value="1" <?php if(get_option('rax_tsmswc_show_reddit') == '1') echo 'checked="checked"';?> /> <b>Enable This</b></span>
                        <strong>Reddit Button</strong> <br />
                        </div>
                        </td> 

                     <td width="33%" align="left" valign="top" style="line-height:30px;">
                        <div style="background-color:#FFFFDD; margin-right:5%; padding:2%;">
      	                  <span style="float:right; color:green"><input type="checkbox" name="rax_tsmswc_show_dzone" id="rax_tsmswc_show_dzone" value="1" <?php if(get_option('rax_tsmswc_show_dzone') == '1') echo 'checked="checked"';?> /> <b>Enable This</b></span>
                        <strong>DZone Button</strong> <br />
                        </div>
                        </td> 
                  </tr>
                  
                  
                  <tr>
                    <td align="left" valign="top" colspan="3">
                    
                        <div style="background-color:#CEE7FF; margin:2% 1.5% 0% 0%; padding:1%; font-size:16px; font-weight:bold">
							Layout/Position Settings                      
                        </div>

                    </td>
                  </tr>
                  <tr>
                  	<td width="33%" align="left" valign="top" style="line-height:30px;">
                        <div style="background-color:#FFFFDD; margin-right:5%; padding:2%;">
                        	<input type="radio" name="rax_tsmswc_show_position" id="rax_tsmswc_show_position" value="above" <?php if(get_option('rax_tsmswc_show_position') == 'above') echo 'checked="checked"';?> />&nbsp;Above Post
                        	<input type="radio" name="rax_tsmswc_show_position" id="rax_tsmswc_show_position" value="below" <?php if(get_option('rax_tsmswc_show_position') == 'below') echo 'checked="checked"';?> />&nbsp;Below Post
                            <input type="radio" name="rax_tsmswc_show_position" id="rax_tsmswc_show_position" value="both" <?php if(get_option('rax_tsmswc_show_position') == 'both') echo 'checked="checked"';?> />&nbsp;Both
                        </div>
                        </td>
                        
                     <td width="33%" align="left" valign="top" style="line-height:30px;">
                        <div style="background-color:#FFFFDD; margin-right:5%; padding:2%;">
                        	<input type="radio" name="rax_tsmswc_show_alignment" id="rax_tsmswc_show_alignment" value="left" <?php if(get_option('rax_tsmswc_show_alignment') == 'left') echo 'checked="checked"';?> />&nbsp;Left 
                            <input type="radio" name="rax_tsmswc_show_alignment" id="rax_tsmswc_show_alignment" value="right" <?php if(get_option('rax_tsmswc_show_alignment') == 'right') echo 'checked="checked"';?> />&nbsp;Right
                        </div>
                        </td> 

                     <td width="33%" align="left" valign="top" style="line-height:30px;">
                        <div style="background-color:#FFFFDD; margin-right:5%; padding:2%;">
                        	<input type="radio" name="rax_tsmswc_show_style1" id="rax_tsmswc_show_style1" value="normal" <?php if(get_option('rax_tsmswc_show_style1') == 'normal') echo 'checked="checked"';?> />&nbsp;Normal 
                            <input type="radio" name="rax_tsmswc_show_style1" id="rax_tsmswc_show_style1" value="compact" <?php if(get_option('rax_tsmswc_show_style1') == 'compact') echo 'checked="checked"';?> />&nbsp;Compact
                        </div>
                        </td> 
                  </tr>
                  
                  <tr>      

                     <td width="33%" align="left" valign="top" style="line-height:30px;">
                        <div style="background-color:#FFFFDD; margin-right:5%; padding:2%;">
                        	<input type="radio" name="rax_tsmswc_show_style2" id="rax_tsmswc_show_style2" value="horizontal" <?php if(get_option('rax_tsmswc_show_style2') == 'horizontal') echo 'checked="checked"';?> />&nbsp;Horizontal 
                            <input type="radio" name="rax_tsmswc_show_style2" id="rax_tsmswc_show_style2" value="vertical" <?php if(get_option('rax_tsmswc_show_style2') == 'vertical') echo 'checked="checked"';?> />&nbsp;Vertical
                        </div>
                        </td> 

                     <td width="33%" align="left" valign="top" style="line-height:30px;">
                        <div style="background-color:#FFFFDD; margin-right:5%; padding:2%;">
      	                  <input type="checkbox" name="rax_tsmswc_show_home" id="rax_tsmswc_show_home" value="1" <?php if(get_option('rax_tsmswc_show_home') == '1') echo 'checked="checked"';?> />&nbsp; Want to show on Home page ?
                        </div>
                        </td> 

                     <td width="33%" align="left" valign="top" style="line-height:30px;">
                        <div style="background-color:#FFFFDD; margin-right:5%; padding:2%;">
      	                  <input type="checkbox" name="rax_tsmswc_show_pages" id="rax_tsmswc_show_pages" value="1" <?php if(get_option('rax_tsmswc_show_pages') == '1') echo 'checked="checked"';?> />&nbsp; Want to show on Pages ?
                        </div>
                        </td> 

                  </tr>
                  
                  <tr>
                    <td align="left" valign="top" colspan="3">
                    
                        <div style="background-color:#CEE7FF; margin:2% 1.5% 0% 0%; padding:1%; font-size:16px; font-weight:bold">
							CSS/Style Settings                      
                        </div>

                    </td>
                  </tr>
                  <tr>
                  	<td width="33%" align="left" valign="top" style="line-height:30px;">
                        <div style="background-color:#FFFFDD; margin-right:5%; padding:2%;">
                        	Border CSS: [for e.g. 5px solid #CCCCCC]
                            <input type="text" name="rax_tsmswc_border" id="rax_tsmswc_border"  style="width:90%" value="<?php echo get_option('rax_tsmswc_border');?>" /> 
                        </div>
                        </td>
                        
                     <td width="33%" align="left" valign="top" style="line-height:30px;">
                        <div style="background-color:#FFFFDD; margin-right:5%; padding:2%;">
                        	Background CSS: [for e.g. #FFFFCC]
                            <input type="text" name="rax_tsmswc_background" id="rax_tsmswc_background"  style="width:90%" value="<?php echo get_option('rax_tsmswc_background');?>" />
                        </div>
                        </td> 

                     <td width="33%" align="left" valign="top" style="line-height:30px;">
                        <div style="background-color:#FFFFDD; margin-right:5%; padding:2%;">
                        	Other CSS: [for e.g. padding:10px;] <input type="text" name="rax_tsmswc_other_css" id="rax_tsmswc_other_css" style="width:90%" value="<?php echo get_option('rax_tsmswc_other_css');?>" />
                        </div>
                        </td> 
                  </tr>
              
				  <tr>
                    <td align="left" valign="top" colspan="3"><input type="submit" value="<?php _e('Update Options')?>" /></td>
                  </tr>
                  
                  <tr>
                    <td align="left" valign="top" colspan="3">
                    
                        <div style="background-color:#CEE7FF; margin:2% 1.5% 0% 0%; padding:1%; font-size:16px; font-weight:bold">
							Preview
                        </div>

                    </td>
                  </tr>
                  
                  <tr>
                  	<td align="left" valign="top" colspan="3">
                    	<table width="100%" border="0" cellspacing="8" cellpadding="0">
                    <tr>
                    <td width="15%" align="center" valign="top">
                    1. Vertical Normal<br /><br />
                    <img src="<?php echo WP_PLUGIN_URL.'/rax-top-social-media-share-with-counter/images/vertical-normal.png';?>" /></td>
                    <td width="25%" align="center" valign="top">
                    2. Vertical Compact<br /><br />
                    <img src="<?php echo WP_PLUGIN_URL.'/rax-top-social-media-share-with-counter/images/vertical-compact.png';?>" /></td>
                  	<td align="center" valign="top">
                    3. Horizontal Normal<br /><br />
                    <img src="<?php echo WP_PLUGIN_URL.'/rax-top-social-media-share-with-counter/images/horizontal-normal.png';?>" /><br /><br /><br />
                    4. Horizontal Compact<br /><br />
                    <img src="<?php echo WP_PLUGIN_URL.'/rax-top-social-media-share-with-counter/images/horizontal-compact.png';?>" /></td>
                    </tr>
                    	</table>
                    </td>
                  </tr>
                  
				</table>
				
				
				<input type="hidden" name="action" value="update" />
				<input type="hidden" name="page_options" value="rax_tsmswc_show_twitter,rax_tsmswc_show_facebook,rax_tsmswc_show_digg,rax_tsmswc_show_gbuzz,rax_tsmswc_show_reddit,rax_tsmswc_show_dzone,rax_tsmswc_show_position,rax_tsmswc_show_alignment,rax_tsmswc_show_style1,rax_tsmswc_show_style2,rax_tsmswc_show_home,rax_tsmswc_show_pages" />
			</form>
	  </p>
	  </div>
<?php				
	}
	
	function add_tsmswc_credit_link() {
		if(get_option('rax_tsmswc_credit'))
			echo '<div><a style="color:transparent;" href="http://www.phpfreelancedevelopers.com">Freelance PHP Developer</a></div>';
	}
	
	function rax_social_media_share_show_option($post_content)
	{
		
		$rax_tsmswc_show_twitter = get_option('rax_tsmswc_show_twitter');
		$rax_tsmswc_show_facebook = get_option('rax_tsmswc_show_facebook');
		$rax_tsmswc_show_digg = get_option('rax_tsmswc_show_digg');
		$rax_tsmswc_show_gbuzz = get_option('rax_tsmswc_show_gbuzz');
		$rax_tsmswc_show_reddit = get_option('rax_tsmswc_show_reddit');
		$rax_tsmswc_show_dzone = get_option('rax_tsmswc_show_dzone');
		
		$rax_tsmswc_show_position = get_option('rax_tsmswc_show_position');
		$rax_tsmswc_show_alignment = get_option('rax_tsmswc_show_alignment');
		$rax_tsmswc_show_style1 = get_option('rax_tsmswc_show_style1');
		$rax_tsmswc_show_style2 = get_option('rax_tsmswc_show_style2');
		$rax_tsmswc_show_home = get_option('rax_tsmswc_show_home');
		$rax_tsmswc_show_pages = get_option('rax_tsmswc_show_pages');
		
		$rax_tsmswc_border = get_option('rax_tsmswc_border');
		$rax_tsmswc_background = get_option('rax_tsmswc_background');
		$rax_tsmswc_other_css = get_option('rax_tsmswc_other_css');
		
		if(is_single())
			$current_url = urlencode("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
		else
			$current_url = get_permalink();
			
		if($rax_tsmswc_show_style1 == 'normal') {
			$twitter_btn = 'data-count="vertical"';
		}
		else {
			$twitter_btn = 'data-count="horizontal"';
		}
		
		$style_width = "";
		if($rax_tsmswc_show_style2 == "vertical") {
			$style_width = "width:55px; clear:both;";
		}
		
		$button_code = '<style>
						.rax_tsmdwc_main {
							float:'.$rax_tsmswc_show_alignment.';
							background: '.$rax_tsmswc_background.';
							border: '.$rax_tsmswc_border.';
							padding: 10px;
							margin:0px 10px 10px 10px; 
							margin-'.$rax_tsmswc_show_alignment.':0px;
							'.$rax_tsmswc_other_css.'
						}
						.rax_tsmswc_inner {
							float:'.$rax_tsmswc_show_alignment.'; 
							margin:0px 10px 10px 10px; 
							margin-'.$rax_tsmswc_show_alignment.':0px;'
							.$style_width.'
						}
						.clear {
							clear:both;
						}
						</style>
						<div class="rax_tsmdwc_main">';
	
		// Twitter starts
		if($rax_tsmswc_show_twitter) {
				$button_code .= '<div class="rax_tsmswc_inner">
				<a href="http://twitter.com/share" class="twitter-share-button" data-url='.$current_url.' '.$twitter_btn.'>Tweet</a>
				<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
				</div>';
		}
        // Twitter ends
		
		
		// Facebook starts
		if($rax_tsmswc_show_facebook) {
				$button_code .= '<div class="rax_tsmswc_inner">
				<a name="fb_share" type="button" 
				   share_url="'.$current_url.'">fbshare</a> 
				<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript">
				</script>
				</div>';
		}
		// facebook ends
		
        // digg starts
		if($rax_tsmswc_show_digg) {
				$button_code .= '<div class="rax_tsmswc_inner">
				<script src="http://widgets.digg.com/buttons.js" type="text/javascript"></script>
				<script type="text/javascript">
				(function() {
				var s = document.createElement(\'SCRIPT\'), s1 = document.getElementsByTagName(\'SCRIPT\')[0];
				s.type = \'text/javascript\';
				s.async = true;
				s.src = \'http://widgets.digg.com/buttons.js\';
				s1.parentNode.insertBefore(s, s1);
				})();
				</script>';
				
				if($rax_tsmswc_show_style1 == 'normal') {
					$digg_btn = 'DiggMedium';
				}
				else {
					$digg_btn = 'DiggCompact';
				}
				
				$button_code .= '<a class="DiggThisButton '.$digg_btn.'"></a>
				</div>';
		}
		// digg ends
		
        
		// gbuzz starts
		if($rax_tsmswc_show_gbuzz) {
				$button_code .= '<div class="rax_tsmswc_inner">';
				
				
				if($rax_tsmswc_show_style1 == 'normal') {
					$gbuzz_btn = 'normal';
				}
				else {
					$gbuzz_btn = 'small';
				}
				
				$button_code .= '<a title="Post to Google Buzz" class="google-buzz-button" href="'.$current_url.'" data-button-style="'.$gbuzz_btn.'-count"></a>
					<script type="text/javascript" src="http://www.google.com/buzz/api/button.js"></script>
				</div>';
		}
		//gbuzz ends
		
		
		// reddit starts
		if($rax_tsmswc_show_reddit) {
			$button_code .= '<div class="rax_tsmswc_inner">';
			
			
			if($rax_tsmswc_show_style1 == 'normal') {
				$reddit_btn = '2';
			}
			else {
				$reddit_btn = '1';
			}
			
			$button_code .= '<script type="text/javascript">
							  reddit_url = "'.$current_url.'";
							  reddit_title = "'.get_the_title().'";
							  reddit_newwindow = "1";
							</script>
							<script type="text/javascript" src="http://www.reddit.com/static/button/button'.$reddit_btn.'.js"></script>
			</div>';
		}
		// reddit ends
		
        
		// dzone starts
		
		if($rax_tsmswc_show_dzone) {
			$button_code .= '<div class="rax_tsmswc_inner">';
			
			
			if($rax_tsmswc_show_style1 == 'normal') {
				$dzone_btn = '1';
			}
			else {
				$dzone_btn = '2';
			}
			
			$button_code .= '<script type="text/javascript">var dzone_url = "'.urldecode($current_url).'";</script>
				<script type="text/javascript">var dzone_title = "'.get_the_title().'";</script>
				<script type="text/javascript">var dzone_blurb = "'.strlen(get_the_content(),0,200).'";</script>
				<script type="text/javascript">var dzone_style = "'.$dzone_btn.'";</script>
				<script language="javascript" src="http://widgets.dzone.com/links/widgets/zoneit.js"></script>
			</div>';
		}
		// dzone ends
		
		/*
		if( is_single() && !is_page())
		{
			for($rax=1;$rax<=6;$rax++) {
				$option_rax_google_adsense = get_option("rax_google_adsense_".$rax);

				$option_rax_show_above = get_option("rax_show_above_post_".$rax);
				$option_rax_show_middle = get_option("rax_show_middle_post_".$rax);
				$option_rax_show_below = get_option("rax_show_below_post_".$rax);
				
				if($option_rax_show_above) {
					$post_content = $option_rax_google_adsense.$post_content;
				}

				if($option_rax_show_middle) {
					$half_desc_length = round(strlen(strip_tags($post_content))/2);
					$post_content1 = html_substr($post_content, 0, $half_desc_length );
					$secondstart = strlen($post_content1)-1;
					$post_content2 = substr($post_content, $secondstart);
					$post_content = $post_content1.$option_rax_google_adsense.$post_content2;
				}

				if($option_rax_show_below) {
					$post_content .= $option_rax_google_adsense;
				}

			}
			
		}
		*/
		
		$button_code .= '<div class="clear"><!-- --></div></div>';
		
		if($rax_tsmswc_show_position == 'above') {
			if(is_page()) {
				if($rax_tsmswc_show_pages)
					$post_content = $button_code.$post_content;
			}
			else if(!is_single()) {
				if($rax_tsmswc_show_home)
					$post_content = $button_code.$post_content;
			}	
			else {
				$post_content = $button_code.$post_content;	
			}	
		}

		else if($rax_tsmswc_show_position == 'below') {
			if(is_page()) {
				if($rax_tsmswc_show_pages)
					$post_content .= $button_code;
			}	
			else if(!is_single()) {
				if($rax_tsmswc_show_home)
					$post_content .= $button_code;
			}	
			else {
				$post_content .= $button_code;
			}
		}

		else if($rax_tsmswc_show_position == 'both') {
			if(is_page()) {
				if($rax_tsmswc_show_pages)
					$post_content = $button_code.$post_content.$button_code;
			}	
			else if(!is_single()) {
				if($rax_tsmswc_show_home)
					$post_content = $button_code.$post_content.$button_code;
			}	
			else {
				$post_content = $button_code.$post_content.$button_code;
			}
		}

				
		
		return $post_content;

	}

?>