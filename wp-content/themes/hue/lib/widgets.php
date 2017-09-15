<?php
defined('ABSPATH') or die();
/** DT_Tabs **/
class DT_Tabs extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'dt_widget_tabs', 'description' => esc_html__( "Display popular posts, recent posts, and recent comments in Tabulation.",'hue') );
		parent::__construct('dt-tabs', esc_html__('DT Tabs','hue'), $widget_ops);
		$this->alt_option_name = 'dt_widget_tabs';
	}
	function widget($args, $instance) {
		global $detheme_Scripts;
		$cache = wp_cache_get('dt_widget_tabs', 'widget');
		if ( !is_array($cache) )
			$cache = array();
		if ( ! isset( $args['widget_id'] ) )
			$args['widget_id'] = $this->id;
		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo wp_kses_data($cache[ $args['widget_id'] ]);
			return;
		}
		extract($args);
		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Recent Posts','hue');
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 3;
		if ( ! $number ) $number = 3;
?>
		<?php echo wp_kses_data($before_widget); ?>
		<?php if ( $title ) echo wp_kses_data($before_title . $title . $after_title); ?>
		<!-- Nav tabs -->
		<ul class="nav nav-tabs nav-justified">
		  <li class="active"><a href="#home_<?php echo sanitize_key($this->get_field_id('dt')); ?>" data-toggle="tab"><?php esc_html_e('Popular','hue');?></a></li>
		  <li><a href="#recent_<?php echo sanitize_key($this->get_field_id('dt')); ?>" data-toggle="tab"><?php esc_html_e('Recent','hue');?></a></li>
		  <li><a href="#comments_<?php echo sanitize_key($this->get_field_id('dt')); ?>" data-toggle="tab"><?php esc_html_e('Comments','hue');?></a></li>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
		  	<div class="tab-pane fade in active" id="home_<?php echo sanitize_key($this->get_field_id('dt')); ?>">
<?php
				$r = new WP_Query(array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true, 'meta_key' => 'post_views_count', 'orderby' => 'meta_value', 'order' => 'DESC' ) );
				if ($r->have_posts()) :
					$i = 0;
					while ( $r->have_posts() ) : $r->the_post();
						//if ($i>0) {echo '<hr>';}
?>
				<div class="row">
					<div class="rowlist">
					<?php
						$imgurl = "";
						$col_post_info = 'col-xs-12';
						$col_image_info = ''; 
						$attachment_id=get_post_thumbnail_id(get_the_ID());
						$featured_image = wp_get_attachment_image_src($attachment_id,'thumbnail',false); 
						if (isset($featured_image[0])) {
							$imgurl = $featured_image[0];
							$col_image_info = is_rtl()?'col-xs-5 col-xs-push-7':'col-xs-5';
							$col_post_info = is_rtl()?'col-xs-7 col-xs-pull-5':'col-xs-7'; 
						} else {

							$defaultImage=get_detheme_option('dt-default-single-post-image');

							if (!empty($defaultImage['url'])) : 
								$imgurl = $defaultImage['thumbnail'];
								$col_image_info = is_rtl()?'col-xs-5 col-xs-push-7':'col-xs-5';
								$col_post_info = is_rtl()?'col-xs-7 col-xs-pull-5':'col-xs-7'; 
							endif; 
						} 
					?>											

					<?php 
						if (!empty($imgurl)) :

							$alt_image = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
					?>
					<div class="<?php echo detheme_sanitize_html_class($col_image_info); ?> image-info">
						<a href="<?php echo esc_url(get_permalink()); ?>"><img src="<?php echo esc_url($imgurl); ?>" class="widget-post-thumb img-responsive" alt="<?php print esc_attr($alt_image);?>" /></a>
					</div>
					<?php
						endif;
					?>

						<div class="<?php echo detheme_sanitize_html_class($col_post_info); ?> post-info">
							<a href="<?php echo esc_url(get_permalink()); ?>" class="widget-post-title"><?php get_the_title() ? the_title() : the_ID(); ?></a>
						</div>
						<div class="meta-info col-xs-12">
						<?php if(is_rtl()):?>
							<div class="float-right">
								<i class="icon-clock"></i> <?php echo get_the_date(); ?>
							</div>
							<div class="float-left">
								<i class="icon-comment-empty"></i> <?php echo get_comments_number(); ?>
							</div>
						<?php else:?>

							<div class="float-left">
								<i class="icon-clock"></i> <?php echo get_the_date(); ?>
							</div>
							<div class="float-right">
								<i class="icon-comment-empty"></i> <?php echo get_comments_number(); ?>
							</div>
						<?php endif;?>	
						</div>

					</div>
				</div>
<?php
						$i++;
					endwhile; 
				wp_reset_postdata();
				endif; 
?>
		  	</div>
		  	<div class="tab-pane fade" id="recent_<?php echo sanitize_key($this->get_field_id('dt')); ?>">
<?php
				$r = new WP_Query(array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true, 'orderby' => 'date', 'order' => 'DESC' ) );
				if ($r->have_posts()) :
					$i = 0;
					while ( $r->have_posts() ) : $r->the_post();
?>
				<div class="row">
				<div class="rowlist gray_border_bottom">
					<?php
						$imgurl = "";
						$col_post_info = 'col-xs-12'; 
						$attachment_id=get_post_thumbnail_id(get_the_ID());
						$featured_image = wp_get_attachment_image_src($attachment_id,'thumbnail',false); 
						if (isset($featured_image[0])) {
							$imgurl = $featured_image[0];
							$col_image_info = is_rtl()?'col-xs-5 col-xs-push-7':'col-xs-5';
							$col_post_info = is_rtl()?'col-xs-7 col-xs-pull-5':'col-xs-7'; 
						} else {

							$defaultImage=get_detheme_option('dt-default-single-post-image');

							if (!empty($defaultImage['url'])) : 
								$imgurl = $defaultImage['thumbnail'];
								$col_image_info = is_rtl()?'col-xs-5 col-xs-push-7':'col-xs-5';
								$col_post_info = is_rtl()?'col-xs-7 col-xs-pull-5':'col-xs-7'; 
							endif;
						}
					?>											

					<?php 
						if (!empty($imgurl)) :

							$alt_image = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
					?>
					<div class="<?php echo detheme_sanitize_html_class($col_image_info); ?> image-info">
						<a href="<?php echo esc_url(get_permalink()); ?>"><img src="<?php echo esc_url($imgurl); ?>" class="widget-post-thumb img-responsive" alt="<?php print esc_attr($alt_image);?>" /></a>
					</div>
					<?php
						endif;
					?>
					<div class="<?php echo detheme_sanitize_html_class($col_post_info); ?> post-info">
						<a href="<?php echo esc_url(get_permalink()); ?>" class="widget-post-title"><?php get_the_title() ? the_title() : the_ID(); ?></a>
					</div>
					<div class="meta-info col-xs-12">
						<?php if(is_rtl()):?>
							<div class="float-right">
								<i class="icon-clock"></i> <?php echo get_the_date(); ?>
							</div>
							<div class="float-left">
								<i class="icon-comment-empty"></i> <?php echo get_comments_number(); ?>
							</div>
						<?php else:?>

							<div class="float-left">
								<i class="icon-clock"></i> <?php echo get_the_date(); ?>
							</div>
							<div class="float-right">
								<i class="icon-comment-empty"></i> <?php echo get_comments_number(); ?>
							</div>
						<?php endif;?>	
					</div>

				</div>
				</div>
<?php
						$i++;
					endwhile; 
				wp_reset_postdata();
				endif;
?>
		  	</div>
		  	<div class="tab-pane fade" id="comments_<?php echo sanitize_key($this->get_field_id('dt')); ?>">
<?php
				$args = array(
					'status' => 'approve',
					'number' => $number
				);
				$comments = get_comments($args);
				$i = 0;
				foreach($comments as $comment) :
?>
				<div class="row">
				<div class="rowlist gray_border_bottom">
					<div class="col-xs-5 image-info">
						<?php 
							$avatar_url = detheme_get_avatar_url(get_avatar( $comment->user_id, 92 )); 
							if (isset($avatar_url)) {
						?>
						<a href="<?php echo esc_url(get_permalink($comment->comment_post_ID)); ?>"><img src="<?php echo esc_url($avatar_url); ?>" alt="<?php print esc_attr($comment->comment_author);?>" class="widget-post-thumb img-responsive" /></a>
						<?php 
							} 
						?>
					</div>
					<div class="col-xs-7 post-info">
						<a href="<?php echo esc_url(get_permalink($comment->comment_post_ID)); ?>" class="widget-post-title">
							<?php echo esc_html($comment->comment_author); ?>
						</a>
						<p class="comment"><?php echo wp_kses_data($comment->comment_content); ?></p>
					</div>
				</div>
				</div>
<?php
					$i++;
				endforeach;
?>
		  	</div>
		</div>					
		
		<?php echo wp_kses_data($after_widget); ?>
<?php
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];
				
		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['dt_widget_tabs']) )
			delete_option('dt_widget_tabs');
		return $instance;
	}

	function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 3;
?>
		<p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:','hue'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo wp_strip_all_tags($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo sanitize_text_field($title); ?>" /></p>
		<p><label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>"><?php esc_html_e( 'Number of posts/comments to show:','hue'); ?></label>
		<input id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo wp_strip_all_tags($this->get_field_name( 'number' )); ?>" type="text" value="<?php echo sanitize_text_field($number); ?>" size="3" /></p>
<?php
	}
}
/** /DT_Tabs **/

class Walker_DT_Category extends Walker_Category {
	function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
		extract($args);
		$cat_name = esc_attr( $category->name );
		$cat_name = apply_filters( 'list_cats', $cat_name, $category );
		$link = '<a href="' . esc_url( get_term_link($category) ) . '" ';
		if ( $use_desc_for_title == 0 || empty($category->description) )
			$link .= 'title="' . esc_attr( sprintf(esc_html__( 'View all posts filed under %s','hue' ), $cat_name) ) . '"';
		else
			$link .= 'title="' . esc_attr( strip_tags( apply_filters( 'category_description', $category->description, $category ) ) ) . '"';
		$link .= '>';
		$link .= $cat_name . '</a>';
		if ( !empty($feed_image) || !empty($feed) ) {
			$link .= ' ';
			if ( empty($feed_image) )
				$link .= '(';
			$link .= '<a href="' . esc_url( get_term_feed_link( $category->term_id, $category->taxonomy, $feed_type ) ) . '"';
			if ( empty($feed) ) {
				$alt = ' alt="' . sprintf(esc_html__( 'Feed for all posts filed under %s','hue' ), $cat_name ) . '"';
			} else {
				$title = ' title="' . $feed . '"';
				$alt = ' alt="' . $feed . '"';
				$name = $feed;
				$link .= $title;
			}
			$link .= '>';
			if ( empty($feed_image) )
				$link .= $name;
			else
				$link .= "<img src='$feed_image'$alt$title" . ' />';
			$link .= '</a>';
			if ( empty($feed_image) )
				$link .= ')';
		}
		if ( !empty($show_count) )
			$link .= ' (' . intval($category->count) . ')';
		if ( 'list' == $args['style'] ) {
			$output .= "\t<li";
			$class = 'cat-item cat-item-' . $category->term_id;
			if ( !empty($current_category) ) {
				$_current_category = get_term( $current_category, $category->taxonomy );
				if ( $category->term_id == $current_category )
					$class .=  ' current-cat';
				elseif ( $category->term_id == $_current_category->parent )
					$class .=  ' current-cat-parent';
			}
			$output .=  ' class="' . $class . '"';
			$output .= ">$link\n";
		} else {
			$output .= "\t$link<br />\n";
		}
	}
}

function hue_create_category_walker($args){
	$args['walker']=new Walker_DT_Category();
	return $args;
}

add_filter('widget_categories_args', 'hue_create_category_walker');

function hue_format_widget_archive($args){
	return $args;
}

add_filter('widget_archives_args','hue_format_widget_archive');

/** DT_Accordion **/
class DT_Accordion extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'dt_widget_accordion', 'description' => esc_html__( "Display information in accordion style.",'hue') );
		parent::__construct('dt_accordion', esc_html__('DT Accordion','hue'), $widget_ops);
		$this->alt_option_name = 'dt_widget_accordion';
	}

	function form( $instance ) {
		$title  = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$acctitle1  = isset( $instance['acctitle1'] ) ? esc_attr( $instance['acctitle1'] ) : '';
		$acctitle2  = isset( $instance['acctitle2'] ) ? esc_attr( $instance['acctitle2'] ) : '';
		$acctitle3  = isset( $instance['acctitle3'] ) ? esc_attr( $instance['acctitle3'] ) : '';
		$acctitle4  = isset( $instance['acctitle4'] ) ? esc_attr( $instance['acctitle4'] ) : '';
		$accdesc1  = isset( $instance['accdesc1'] ) ? esc_textarea( $instance['accdesc1'] ) : '';
		$accdesc2  = isset( $instance['accdesc2'] ) ? esc_textarea( $instance['accdesc2'] ) : '';
		$accdesc3  = isset( $instance['accdesc3'] ) ? esc_textarea( $instance['accdesc3'] ) : '';
		$accdesc4  = isset( $instance['accdesc4'] ) ? esc_textarea( $instance['accdesc4'] ) : '';
?>
		<p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:','hue' ); ?></label>
		<input class="widefat" id="<?php echo sanitize_title($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo sanitize_text_field($title); ?>" /></p>
		<p><label for="<?php echo esc_attr($this->get_field_id( 'acctitle1' )); ?>"><?php esc_html_e( 'Accordion Title 1:','hue' ); ?></label>
		<input class="widefat" id="<?php echo sanitize_title($this->get_field_id( 'acctitle1' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'acctitle1' )); ?>" type="text" value="<?php echo sanitize_text_field($acctitle1); ?>" /></p>
		<label for="<?php echo esc_attr($this->get_field_id( 'accdesc1' )); ?>"><?php esc_html_e( 'Accordion Description 1:','hue' ); ?></label>
		<textarea class="widefat" rows="16" cols="20" id="<?php echo sanitize_title($this->get_field_id('accdesc1')); ?>" name="<?php echo esc_attr($this->get_field_name('accdesc1')); ?>"><?php echo sanitize_text_field($accdesc1); ?></textarea>
		<p><label for="<?php echo esc_attr($this->get_field_id( 'acctitle2' )); ?>"><?php esc_html_e( 'Accordion Title 2:','hue' ); ?></label>
		<input class="widefat" id="<?php echo sanitize_title($this->get_field_id( 'acctitle2' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'acctitle2' )); ?>" type="text" value="<?php echo sanitize_text_field($acctitle2); ?>" /></p>
		<label for="<?php echo esc_attr($this->get_field_id( 'accdesc2' )); ?>"><?php esc_html_e( 'Accordion Description 2:','hue' ); ?></label>
		<textarea class="widefat" rows="16" cols="20" id="<?php echo sanitize_title($this->get_field_id('accdesc2')); ?>" name="<?php echo esc_attr($this->get_field_name('accdesc2')); ?>"><?php echo sanitize_text_field($accdesc2); ?></textarea>
		<p><label for="<?php echo esc_attr($this->get_field_id( 'acctitle3' )); ?>"><?php esc_html_e( 'Accordion Title 3:','hue' ); ?></label>
		<input class="widefat" id="<?php echo sanitize_title($this->get_field_id( 'acctitle3' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'acctitle3' )); ?>" type="text" value="<?php echo sanitize_text_field($acctitle3); ?>" /></p>
		<label for="<?php echo esc_attr($this->get_field_id( 'accdesc3' )); ?>"><?php esc_html_e( 'Accordion Description 3:','hue' ); ?></label>
		<textarea class="widefat" rows="16" cols="20" id="<?php echo sanitize_title($this->get_field_id('accdesc3')); ?>" name="<?php echo esc_attr($this->get_field_name('accdesc3')); ?>"><?php echo sanitize_text_field($accdesc3); ?></textarea>
		<p><label for="<?php echo esc_attr($this->get_field_id( 'acctitle4' )); ?>"><?php esc_html_e( 'Accordion Title 4:','hue' ); ?></label>
		<input class="widefat" id="<?php echo sanitize_title($this->get_field_id( 'acctitle4' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'acctitle4' )); ?>" type="text" value="<?php echo sanitize_text_field($acctitle4); ?>" /></p>
		<label for="<?php echo esc_attr($this->get_field_id( 'accdesc4' )); ?>"><?php esc_html_e( 'Accordion Description 4:','hue' ); ?></label>
		<textarea class="widefat" rows="16" cols="20" id="<?php echo sanitize_title($this->get_field_id('accdesc4')); ?>" name="<?php echo esc_attr($this->get_field_name('accdesc4')); ?>"><?php echo sanitize_text_field($accdesc4); ?></textarea>
<?php
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['acctitle1'] = strip_tags($new_instance['acctitle1']);
		$instance['acctitle2'] = strip_tags($new_instance['acctitle2']);
		$instance['acctitle3'] = strip_tags($new_instance['acctitle3']);
		$instance['acctitle4'] = strip_tags($new_instance['acctitle4']);
		if ( current_user_can('unfiltered_html') ) {
			$instance['accdesc1'] =  $new_instance['accdesc1'];
			$instance['accdesc2'] =  $new_instance['accdesc2'];
			$instance['accdesc3'] =  $new_instance['accdesc3'];
			$instance['accdesc4'] =  $new_instance['accdesc4'];
		} else {
			$instance['accdesc1'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['accdesc1']) ) ); // wp_filter_post_kses() expects slashed
			$instance['accdesc2'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['accdesc2']) ) ); // wp_filter_post_kses() expects slashed
			$instance['accdesc3'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['accdesc3']) ) ); // wp_filter_post_kses() expects slashed
			$instance['accdesc4'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['accdesc4']) ) ); // wp_filter_post_kses() expects slashed
		}

		return $instance;
	}

	function widget( $args, $instance ) {
		global $detheme_Scripts;
		extract($args);
		if ( ! isset( $args['widget_id'] ) ) $args['widget_id'] = $this->id;
		
		$widget_id = $args['widget_id'];
		$acctitle1  = isset( $instance['acctitle1'] ) ? esc_attr( $instance['acctitle1'] ) : '';
		$acctitle2  = isset( $instance['acctitle2'] ) ? esc_attr( $instance['acctitle2'] ) : '';
		$acctitle3  = isset( $instance['acctitle3'] ) ? esc_attr( $instance['acctitle3'] ) : '';
		$acctitle4  = isset( $instance['acctitle4'] ) ? esc_attr( $instance['acctitle4'] ) : '';
		$accdesc1 = apply_filters( 'widget_text', empty( $instance['accdesc1'] ) ? '' : $instance['accdesc1'], $instance );
		$accdesc2 = apply_filters( 'widget_text', empty( $instance['accdesc2'] ) ? '' : $instance['accdesc2'], $instance );
		$accdesc3 = apply_filters( 'widget_text', empty( $instance['accdesc3'] ) ? '' : $instance['accdesc3'], $instance );
		$accdesc4 = apply_filters( 'widget_text', empty( $instance['accdesc4'] ) ? '' : $instance['accdesc4'], $instance );

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] :"";
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		echo wp_kses_data($before_widget);
		if ( $title ) echo wp_kses_data($before_title . $title . $after_title);
		
		echo '<div class="panel-group custom-accordion" id="'.$widget_id.'">';
		if (!empty($acctitle1)) :		  
		echo '<div class="panel panel-default">
			    <div class="panel-heading openedup" data-toggle="collapse" data-parent="#'.$widget_id.'">
			      <h4 class="panel-title">'.$acctitle1.'</h4>
			      <a class="btn-accordion opened" data-toggle="collapse" data-parent="#'.$widget_id.'" href="#collapseOne'.$widget_id.'"><i class="icon-minus-1"></i></a>
			    </div>
			    <div id="collapseOne'.$widget_id.'" class="panel-collapse collapse in">
			      <div class="panel-body">'. wpautop( $accdesc1 ) . '</div>
			    </div>
			  </div>';
		endif;
		
		if (!empty($acctitle2)) :	  
		echo '<div class="panel panel-default">
			    <div class="panel-heading" data-toggle="collapse" data-parent="#'.$widget_id.'">
			      <h4 class="panel-title">'.$acctitle2.'</h4>
			      <a class="btn-accordion" data-toggle="collapse" data-parent="#'.$widget_id.'" href="#collapseTwo'.$widget_id.'"><i class="icon-plus-1"></i></a>
			    </div>
			    <div id="collapseTwo'.$widget_id.'" class="panel-collapse collapse">
			      <div class="panel-body">'. wpautop( $accdesc2 ) . '</div>
			    </div>
			  </div>';
		endif;
		if (!empty($acctitle3)) :
		echo '<div class="panel panel-default">
			    <div class="panel-heading" data-toggle="collapse" data-parent="#'.$widget_id.'">
			      <h4 class="panel-title">'.$acctitle3.'</h4>
			      <a class="btn-accordion" data-toggle="collapse" data-parent="#'.$widget_id.'" href="#collapseThree'.$widget_id.'"><i class="icon-plus-1"></i></a>
			    </div>
			    <div id="collapseThree'.$widget_id.'" class="panel-collapse collapse">
			      <div class="panel-body">'. wpautop( $accdesc3 ) . '</div>
			    </div>
			  </div>';
		endif;
		if (!empty($acctitle4)) :
		echo '<div class="panel panel-default">
			    <div class="panel-heading" data-toggle="collapse" data-parent="#'.$widget_id.'">
			      <h4 class="panel-title">'.$acctitle4.'</h4>
			      <a class="btn-accordion" data-toggle="collapse" data-parent="#'.$widget_id.'" href="#collapseFour'.$widget_id.'"><i class="icon-plus-1"></i></a>
			    </div>
			    <div id="collapseFour'.$widget_id.'" class="panel-collapse collapse">
			      <div class="panel-body">'. wpautop( $accdesc4 ) . '</div>
			    </div>
			  </div>';
		endif;
		echo '</div>';
        echo wp_kses_data($after_widget);
	}
}
function hue_widgets_init(){
	 register_widget('DT_Tabs');
	 register_widget('DT_Accordion');
}

// widget init
add_action('widgets_init', 'hue_widgets_init',1);
?>
