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
 * @package Social Profiles
 */
 
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Enquque Social Media Profiles Styles.
add_action( 'wp_enqueue_scripts', 'social_media_profiles_styles' );
function social_media_profiles_styles() {
	wp_enqueue_style( 'social-media_profiles', plugin_dir_url( __FILE__ ) .  'style.css', array(), '1.0.0', 'all'  );
}

// Create a Social Media Profiles Shortcode
add_shortcode( 'social-media', 'custom_social_media_profiles_shortcode' );

function custom_social_media_profiles_shortcode( $atts, $content = null ) {

	// Attributes
	$smp_atts = shortcode_atts(
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
	$content .= '<!-- Social Profiles --><div id="social-media-profiles-'.$smp_atts['id'].'" class="social-media-profiles"> <ul class="align'.$smp_atts['align'].'">';
	

	// facebook
	if ( ! empty( $smp_atts['flink'] ) ) {
		$content .= '
		<li class="smp-facebook">
			<a href="'.$smp_atts['flink'].'" target="'.$smp_atts['target'].'" rel="'.$smp_atts['rel'].'">
				<svg role="img" class="smp-img-facebook" aria-labelledby="smp-facebook">
					<title id="smp-facebook">Facebook</title>
					<use href="'.$svgPath.'#social-facebook" xlink:href="'.$svgPath.'#social-facebook"></use>
				</svg>
			</a>
		</li>';
	}

	// twitter
	if ( ! empty( $smp_atts['tlink'] ) ) {
		$content .= '
		<li class="smp-twitter">
			<a href="'.$smp_atts['tlink'].'" target="'.$smp_atts['target'].'" rel="'.$smp_atts['rel'].'">
				<svg role="img" class="smp-img-twitter" aria-labelledby="smp-twitter">
					<title id="smp-twitter">Twitter</title>
					<use href="'.$svgPath.'#social-twitter" xlink:href="'.$svgPath.'#social-twitter"></use>
				</svg>
			</a>
		</li>';
	}

	// instagram
	if ( ! empty( $smp_atts['ilink'] ) ) {
		$content .= '
		<li class="smp-instagram">
			<a href="'.$smp_atts['ilink'].'" target="'.$smp_atts['target'].'" rel="'.$smp_atts['rel'].'">
				<svg role="img" class="smp-img-instagram" aria-labelledby="smp-instagram">
					<title id="smp-instagram">Instgram</title>
					<use href="'.$svgPath.'#social-instagram" xlink:href="'.$svgPath.'#social-instagram"></use>
				</svg>
			</a>
		</li>';
	}

	// pinterest
	if ( ! empty( $smp_atts['plink'] ) ) {
		$content .= '
		<li class="smp-pinterest">
			<a href="'.$smp_atts['plink'].'" target="'.$smp_atts['target'].'" rel="'.$smp_atts['rel'].'">
				<svg role="img" class="smp-img-pinterest" aria-labelledby="smp-pinterest">
					<title id="smp-pinterest">Pinterest</title>
					<use href="'.$svgPath.'#social-pinterest" xlink:href="'.$svgPath.'#social-pinterest"></use>
				</svg>
			</a>
		</li>';
	}

	// youtube
	if ( ! empty( $smp_atts['ylink'] ) ) {
		$content .= '
		<li class="smp-youtube">
			<a href="'.$smp_atts['ylink'].'" target="'.$smp_atts['target'].'" rel="'.$smp_atts['rel'].'">
				<svg role="img" class="smp-img-youtube" aria-labelledby="smp-youtube">
					<title id="smp-youtube">Youtube</title>
					<use href="'.$svgPath.'#social-youtube" xlink:href="'.$svgPath.'#social-youtube"></use>
				</svg>
			</a>
		</li>';
	}

	// rss
	if ( ! empty( $smp_atts['rlink'] ) ) {
		$content .= '
		<li class="smp-rss">
			<a href="'.$smp_atts['rlink'].'" target="'.$smp_atts['target'].'" rel="'.$smp_atts['rel'].'">
				<svg role="img" class="smp-img-rss" aria-labelledby="smp-rss">
					<title id="smp-rss">RSS</title>
					<use href="'.$svgPath.'#social-rss" xlink:href="'.$svgPath.'#social-rss"></use>
				</svg>
			</a>
		</li>';
	}


	$content .= '</ul></div>';
	
	$content .= '<style type="text/css" media="screen">';
	
	$content .= '
	#social-media-profiles-'.$smp_atts['id'].' ul li a,
	#social-media-profiles-'.$smp_atts['id'].' ul li a:hover,
	#social-media-profiles-'.$smp_atts['id'].' ul li a:focus {
		background-color: '.$smp_atts['background-color'].' !important;
		color: '.$smp_atts['color'].' !important;
  		border-radius: '.$smp_atts['border-radius'].';
  		border: '.$smp_atts['border'].' solid !important; 
  		font-size: calc('.$smp_atts['font-size'].' / 2);
  		padding: '.$smp_atts['padding'].';
	}

	#social-media-profiles-'.$smp_atts['id'].' ul li a:hover,
	#social-media-profiles-'.$smp_atts['id'].' ul li a:focus {
  		background-color: '.$smp_atts['hf-background-color'].' !important;
		color: '.$smp_atts['hf-color'].' !important;
		border-color: '.$smp_atts['hf-border-color'].' !important;
	}
	';

	$content .= '</style>';

		return $content;
}
