<?php
defined('ABSPATH') or die();
/**
 * Display single career post type
 *
 *
 * @package WordPress
 * @subpackage Detheme Simple Career
 * @since Detheme Simple Career 1.0
 */
global $detheme_config,$wp_query,$dt_revealData;
get_header(); 

the_post();

require_once( get_template_directory().'/pagetemplates/scrollingsidebar.php'); 

$sidebar_position=get_detheme_sidebar_position();
$sidebar= $sidebar_position=='fullwidth' ? "fullwidth": (is_active_sidebar( 'detheme-sidebar' )?'detheme-sidebar':false);

if(!$sidebar){
	$sidebar_position = "nosidebar";
}


set_query_var('sidebar',$sidebar);

$class_sidebar = $sidebar_position;

$class_vertical_menu = '';
if ($detheme_config['dt-header-type']=='leftbar') {
	$class_vertical_menu = ' vertical_menu_container';
}

?>
<div  <?php post_class('blog single-post content '.$class_sidebar.$class_vertical_menu); ?>>
<?php if($sidebar_position != 'fullwidth'):?>
	<div class="container"> 
<?php endif;?>
<?php if($sidebar_position == 'sidebar-right' || $sidebar_position=='sidebar-left'){?>
		<div class="row">
			<div class="col-xs-12 col-sm-8 <?php print ($sidebar_position=='sidebar-left')?" col-sm-push-4":"";?> col-md-9 <?php print ($sidebar_position=='sidebar-left')?" col-md-push-3":"";?>">
<?php	} 

$attachlimit =(isset($detheme_config['career_attach_limit']) && ''!=$detheme_config['career_attach_limit'])? $detheme_config['career_attach_limit']:1024;
$attachlimit=$attachlimit/1024;

$career_attach_type=isset($detheme_config['career_attach_type'])?$detheme_config['career_attach_type']:false;
$attachmenttype=array();
if($career_attach_type){

	$fileoptions=array('image'=>".jpg, .jpeg, .png, .gif",'zip'=>".zip",'rtf'=> '.rtf','pdf'=> '.pdf','text'=> ".txt",'html'=> ".html",'htm'=> ".htm",'msword'=> '.doc','openxmlformats'=> ".docx");
	foreach (array_keys($career_attach_type) as $key) {
		$attachmenttype[$key]=$fileoptions[$key];
	}

}

$headText=isset($detheme_config['career-apply-head-text'])?$detheme_config['career-apply-head-text']:"";
$headText=preg_replace(array('/\{job_title\}/','/\{job_link\}/'), array(get_the_title(),get_the_permalink()), $headText);
?>
<div id="career_apply_<?php print get_the_ID();?>" class="career-form modal fade"  role="dialog" aria-labelledby="career-form" aria-hidden="true">
	<div class="modal-dialog">
	    <div class="modal-content">
	    	<div class="md-description">
	    		<div class="heading-career-form"><?php print $headText;?></div>
	    		<h2 class="title-career-form"><?php esc_html_e('Apply Now','hue');?></h2>
	    		<form id="career-form" method="post" action="<?php the_permalink();?>" enctype="multipart/form-data">
				  <div class="form-group">
				    <label><?php esc_html_e('Full Name','hue');?>:</label>
				    <input type="text" name="fullname" class="form-control" placeholder="<?php esc_html_e('e.g. John Smith','hue');?>" required>
				  </div>
				  <div class="form-group">
				    <label><?php esc_html_e('Email','hue');?>:</label>
				    <input type="email" name="email_address" class="form-control" placeholder="<?php esc_html_e('e.g. john.smith@hotmail.com','hue');?>" required>
				  </div>
				  <div class="form-group">
				    <label><?php esc_html_e('Covering Note','hue');?>:</label>
				    <textarea class="form-control" name="note" rows="5" required></textarea>
				  </div>
				  <div class="form-group">
				    <label><?php esc_html_e('Upload CV','hue');?>:</label>
				    <input type="file" name="file_cv" required>
				    <p class="help-block"><?php printf(esc_html__('Maximum file size %.2fMb','hue'),$attachlimit);?></p>
				  </div>
				  <button type="submit" class="btn btn-primary"><?php esc_html_e('Apply Now','hue');?></button>
				  <input type="hidden" name="career_id" value="<?php the_ID();?>"/>
				</form>
	    	</div>
		    <button class="button right btn-cross md-close" data-dismiss="modal"><i class="icon-cancel"></i></button>
	     </div>
 	</div>
</div>
<?php 
$headText=isset($detheme_config['career-emailfriend-head-text'])?$detheme_config['career-emailfriend-head-text']:"";
$headText=preg_replace(array('/\{job_title\}/','/\{job_link\}/'), array(get_the_title(),get_the_permalink()), $headText);

?>
<div id="career_send_<?php print get_the_ID();?>" class="career-form modal fade" role="dialog" aria-labelledby="career-send-form" aria-hidden="true">
	<div class="modal-dialog">
	    <div class="modal-content">
	    	<div class="md-description">
	    		<div class="heading-career-form"><?php print $headText;?></div>
	    		<h2 class="title-career-form"><?php esc_html_e('Email To a Friend','hue');?></h2>
	    		<form id="career-send-form" method="post" action="<?php the_permalink();?>">
				  <div class="form-group">
				    <label><?php esc_html_e('Full Name','hue');?>:</label>
				    <input type="text" name="fullname" class="form-control" placeholder="<?php esc_html_e('e.g. John Smith','hue');?>" required>
				  </div>
				  <div class="form-group">
				    <label><?php esc_html_e('Email','hue');?>:</label>
				    <input type="email" name="email_address" class="form-control" placeholder="<?php esc_html_e('e.g. john.smith@hotmail.com','hue');?>" required>
				  </div>
				  <div class="form-group">
				    <label><?php esc_html_e('Friend Email','hue');?>:</label>
				    <input type="email" name="friend_email_address" class="form-control" placeholder="<?php esc_html_e('e.g. alice@hotmail.com','hue');?>" required>
				  </div>
				  <div class="form-group">
				    <label><?php esc_html_e('Quick Note','hue');?>:</label>
				    <textarea class="form-control" name="note" rows="5"></textarea>
				    <p class="help-block"><?php esc_html_e('Type a quick message directed to your friend. Please avoid content that could be considered as spam as this could result in a ban from the site.','hue');?></p>
				  </div>
				  <button type="submit" class="btn btn-primary"><?php esc_html_e('Send Message','hue');?></button>
				  <input type="hidden" name="career_id" value="<?php the_ID();?>"/>
				</form>
	    	</div>
		    <button class="button md-close right btn-cross" data-dismiss="modal"><i class="icon-cancel"></i></button>
	     </div>
	  </div>
</div>
<div class="career-detail">
	<h2><?php esc_html_e('Jobs Description','hue');?></h2>
	<div class="row">
		<div class="col-sm-7<?php print is_rtl()?" col-sm-push-4":"";?>">
			<div class="row">
				<div class="col-xs-12">
					<ul class="career-detail-list">
							<li class="career-field"><label><?php esc_html_e('Job Position','hue');?></label><span class="career-value"><?php print get_the_title();?></span></li>
					<?php 
					foreach (get_dtcareer_jobs_value() as $key => $field) {?>
							<li class="career-field"><label><?php print function_exists('icl_t') ? icl_t('hue', $field['label'], $field['label']):$field['label'];?></label><span class="career-value"><?php print $field['value'];?></span></li>
						<?php
					}
					?>
							<li class="career-field"><label><?php esc_html_e('Posted','hue');?></label><span class="career-value"><?php print get_the_date();?></span></li>
							<li class="career-field"><label><?php esc_html_e('Start Date','hue');?></label><span class="career-value"><?php print get_career_start_date();?></span></li>
							<li class="career-field"><label><?php esc_html_e('End Date','hue');?></label><span class="career-value"><?php print get_career_close_date();?></span></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<?php if(is_rtl()):?>
				<div class="col-xs-12 career-action-button" ><a class="btn btn-primary" data-toggle="modal" id="apply-career" data-target="#career_apply_<?php print get_the_ID();?>" href="javascript:;"><?php esc_html_e('Apply Now','hue');?></a> <a class="btn btn-primary" id="send-career-to-friend"  data-toggle="modal"  data-target="#career_send_<?php print get_the_ID();?>" href="javascript:;"><?php esc_html_e('Email To a Friend','hue');?></a></div>
				<?php else:?>
				<div class="col-xs-12 career-action-button" ><a class="btn btn-primary" data-toggle="modal" id="apply-career" data-target="#career_apply_<?php print get_the_ID();?>" href="javascript:;"><?php esc_html_e('Apply Now','hue');?></a> <a class="btn btn-primary" id="send-career-to-friend"  data-toggle="modal"  data-target="#career_send_<?php print get_the_ID();?>" href="javascript:;"><?php esc_html_e('Email To a Friend','hue');?></a></div>
				<?php endif;?>
			</div>
		</div>
		<div class="col-sm-5<?php print is_rtl()?" col-sm-pull-8":"";?>"><?php the_content();?></div>
	</div>
</div>
<?php if($sidebar_position == 'sidebar-right' || $sidebar_position=='sidebar-left'):?>
</div>
<?php endif;?>
<?php if ('sidebar-right'==$sidebar_position) { ?>
			<div class="col-xs-12 col-sm-4 col-md-3 sidebar">
				<?php get_sidebar(); ?>
			</div></div>
<?php }
	elseif ($sidebar_position=='sidebar-left') { ?>
			<div class="col-xs-12 col-sm-4 col-md-3 sidebar col-sm-pull-8 col-md-pull-9">
				<?php get_sidebar(); ?>
			</div></div>
<?php }?>
<?php if($sidebar_position != 'fullwidth'):?>
	</div>
<?php endif;?>
</div>
<?php
get_footer();
?>