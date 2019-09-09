<?php
/**
 * Plugin Name: Social Profiles
 * Plugin URI:  https://github.com/rockingaryan/social-profiles
 * Description: A lightweight & fastest social profiles plugin.
 * Author:      Aryan Raj
 * Author URI:  https://www.aryanraj.com/
 * Version:     1.0.0
 * License:     GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package Social_Profiles
 */
 
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Enquque Social Media Profiles Styles.
add_action( 'wp_enqueue_scripts', 'social_profiles_styles' );
function social_profiles_styles() {
	wp_enqueue_style( 'social-profiles', plugin_dir_url( __FILE__ ) .  'style.css', array(), '1.0.0', 'all'  );
}

// Create a Social Media Profiles Shortcode
add_shortcode( 'social-profiles', 'custom_social_profiles_shortcode' );

function custom_social_profiles_shortcode( $atts, $content = null ) {

	// Attributes
	$sp_atts = shortcode_atts(
		array(

			// Content unqieue ID and link setting
			'id'		=> '0',
			'align'		=> '',//left, right or center
			'target'	=> '_blank',
			'rel'		=> 'noopener noreferrer',

			// Styles (default)
			'background-color'	 => 'white',
			'color'		=> 'black',
			'border-radius'		 => '2px',
			'border'	=> '1px black',
			'font-size'	=> '40px',
			'padding'	=> '7px',
			
			// Styles (hover, focus)
			'hf-background-color'=> 'black',
			'hf-color'			 => 'white',
			'hf-border-color'	 => 'black',

			// Social Media Links
			'flink'		=> '',
			'tlink'		=> '',
			'ilink'		=> '',
			'plink'		=> '',
			'ylink'		=> '',
			'rlink'		=> '',

		),
		$atts
		
	);

	// SVG with IRI ID
	$svgPath = plugin_dir_url( __FILE__ ) . 'symbol-defs.svg';
	
	
	// Construct output of the social media profiles
	$content .= '<!-- Social Profiles --><div id="social-profiles-'.$sp_atts['id'].'" class="social-profiles"> <ul class="align'.$sp_atts['align'].'">';
	

	// facebook
	if ( ! empty( $sp_atts['flink'] ) ) {
		$content .= '
		<li class="sp-facebook">
			<a href="'.$sp_atts['flink'].'" target="'.$sp_atts['target'].'" rel="'.$sp_atts['rel'].'">
				<svg role="img" class="sp-img-facebook" aria-labelledby="sp-facebook">
					<title id="sp-facebook">Facebook</title>
					<use href="'.$svgPath.'#social-facebook" xlink:href="'.$svgPath.'#social-facebook"></use>
				</svg>
			</a>
		</li>';
	}

	// twitter
	if ( ! empty( $sp_atts['tlink'] ) ) {
		$content .= '
		<li class="sp-twitter">
			<a href="'.$sp_atts['tlink'].'" target="'.$sp_atts['target'].'" rel="'.$sp_atts['rel'].'">
				<svg role="img" class="sp-img-twitter" aria-labelledby="sp-twitter">
					<title id="sp-twitter">Twitter</title>
					<use href="'.$svgPath.'#social-twitter" xlink:href="'.$svgPath.'#social-twitter"></use>
				</svg>
			</a>
		</li>';
	}

	// instagram
	if ( ! empty( $sp_atts['ilink'] ) ) {
		$content .= '
		<li class="sp-instagram">
			<a href="'.$sp_atts['ilink'].'" target="'.$sp_atts['target'].'" rel="'.$sp_atts['rel'].'">
				<svg role="img" class="sp-img-instagram" aria-labelledby="sp-instagram">
					<title id="sp-instagram">Instgram</title>
					<use href="'.$svgPath.'#social-instagram" xlink:href="'.$svgPath.'#social-instagram"></use>
				</svg>
			</a>
		</li>';
	}

	// pinterest
	if ( ! empty( $sp_atts['plink'] ) ) {
		$content .= '
		<li class="sp-pinterest">
			<a href="'.$sp_atts['plink'].'" target="'.$sp_atts['target'].'" rel="'.$sp_atts['rel'].'">
				<svg role="img" class="sp-img-pinterest" aria-labelledby="sp-pinterest">
					<title id="sp-pinterest">Pinterest</title>
					<use href="'.$svgPath.'#social-pinterest" xlink:href="'.$svgPath.'#social-pinterest"></use>
				</svg>
			</a>
		</li>';
	}

	// youtube
	if ( ! empty( $sp_atts['ylink'] ) ) {
		$content .= '
		<li class="sp-youtube">
			<a href="'.$sp_atts['ylink'].'" target="'.$sp_atts['target'].'" rel="'.$sp_atts['rel'].'">
				<svg role="img" class="sp-img-youtube" aria-labelledby="sp-youtube">
					<title id="sp-youtube">Youtube</title>
					<use href="'.$svgPath.'#social-youtube" xlink:href="'.$svgPath.'#social-youtube"></use>
				</svg>
			</a>
		</li>';
	}

	// rss
	if ( ! empty( $sp_atts['rlink'] ) ) {
		$content .= '
		<li class="sp-rss">
			<a href="'.$sp_atts['rlink'].'" target="'.$sp_atts['target'].'" rel="'.$sp_atts['rel'].'">
				<svg role="img" class="sp-img-rss" aria-labelledby="sp-rss">
					<title id="sp-rss">RSS</title>
					<use href="'.$svgPath.'#social-rss" xlink:href="'.$svgPath.'#social-rss"></use>
				</svg>
			</a>
		</li>';
	}


	$content .= '</ul></div>';
	
	$content .= '<style type="text/css" media="screen">';
	
	$content .= '
	#social-profiles-'.$sp_atts['id'].' ul li a,
	#social-profiles-'.$sp_atts['id'].' ul li a:hover,
	#social-profiles-'.$sp_atts['id'].' ul li a:focus {
		background-color: '.$sp_atts['background-color'].' !important;
		color: '.$sp_atts['color'].' !important;
  		border-radius: '.$sp_atts['border-radius'].';
  		border: '.$sp_atts['border'].' solid !important; 
  		font-size: calc('.$sp_atts['font-size'].' / 2);
  		padding: '.$sp_atts['padding'].';
	}

	#social-profiles-'.$sp_atts['id'].' ul li a:hover,
	#social-profiles-'.$sp_atts['id'].' ul li a:focus {
  		background-color: '.$sp_atts['hf-background-color'].' !important;
		color: '.$sp_atts['hf-color'].' !important;
		border-color: '.$sp_atts['hf-border-color'].' !important;
	}
	';

	$content .= '</style>';

		return $content;
}
