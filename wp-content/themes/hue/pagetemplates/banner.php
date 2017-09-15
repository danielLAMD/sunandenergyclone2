<?php
defined('ABSPATH') or die();

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Hue
 * @since Hue 1.0
 */
$homepage_title = (get_option('page_on_front') > 0) ? get_the_title(get_option('page_on_front')) : esc_html__('Home','hue');
?>
<section id="banner-section" class="<?php echo (get_detheme_option('dt-header-type')=='leftbar') ? " vertical_menu_container":""; ?>"<?php if('essential_grid'==get_post_type()) print ' data-type="background" data-speed="2"';?>>
<?php if(get_detheme_option('dt-show-banner-page')=='video' && get_detheme_option('dt-banner-video')):

                 $video_url=wp_get_attachment_url(intval(get_detheme_option('dt-banner-video')));
                 $videodata=wp_get_attachment_metadata(intval(get_detheme_option('dt-banner-video')));

                 $source_video=array();

                  if(''!=$video_url){
                    $videoformat="video/mp4";
                    if(is_array($videodata) && $videodata['mime_type']=='video/webm'){
                         $videoformat="video/webm";
                    }

                    $source_video[]="<source src=\"".esc_url($video_url)."\" type=\"".$videoformat."\" />";
                 }

                if(count($source_video)){

                  print "<video class=\"video_background\" autoplay loop>\n".@implode("\n", $source_video)."</video>";

                }
?>

<?php endif;?>
<div class="container no_subtitle">
	<div class="row">
		<div class="col-xs-12">

<?php if (!is_single() || is_singular()) { ?>
<?php 	if(get_detheme_option('page-title') && get_detheme_option('dt-show-banner-title')) { ?>
			<div class="banner-title"><h1 class="page-title"><?php print get_detheme_option('page-title',''); ?></h1></div>
<?php 
	detheme_dimox_breadcrumb(array(
		'delimiter' => is_rtl()?'&nbsp;\&nbsp;':'&nbsp;/&nbsp;',
		'home_text' => $homepage_title 
	));
?>
<?php	}  ?>
<?php }
else{
	detheme_dimox_breadcrumb(array(
		'delimiter' => is_rtl()?'&nbsp;\&nbsp;':'&nbsp;/&nbsp;',
		'home_text' => $homepage_title
	));

}  ?>
			</div>
	</div>
</div>
<h6>&nbsp;</h6>
</section>