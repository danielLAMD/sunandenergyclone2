<?php
defined('ABSPATH') or die();

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

if ( have_comments() ) : ?> 
     	<div class="row section-comment">
          <div class="col-sm-12">
            <ul class="media-list">
<?php wp_list_comments(array( 'callback' => 'hue_comment','end-callback'=>'hue_comment_end_callback' ) ); ?>
			</ul>
		  </div>
		</div>

		<!-- Pagination -->
		<div class="row">
			<div class="paging-nav col-xs-12" dir="ltr">
<?php
				$pagination=paginate_comments_links( array(
					'type'=>'array',
					'echo'=>false,
					'prev_text'    => '<i class="icon-angle-'.(is_rtl()?"right":"left").'"></i>',
					'next_text'    => '<i class="icon-angle-'.(is_rtl()?"left":"right").'"></i>',
				) );

			if(is_array($pagination)){
				print join("\n",is_rtl()?array_reverse($pagination):$pagination);
			}
?>
			</div>
		</div>
		<!-- /Pagination -->

<?php endif; ?>


<?php if ( ! comments_open()) : ?>
<?php 	do_action( 'comment_form_comments_closed' ); ?>
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<div class="comment-count"><?php esc_html_e( 'Comments are closed.' , 'hue' ); ?></div>
			</div>	
		</div>
<?php else : ?>
<?php hue_comment_form(); ?>
<?php endif; ?>