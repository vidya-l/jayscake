<?php
/**
 * Template part for displaying posts
 *
 * @package Animal Pet Store
 * @subpackage jays_cake
 */

?>


<?php $jays_cake_column_layout = get_theme_mod( 'jays_cake_sidebar_post_layout');
if($jays_cake_column_layout == 'four-column' || $jays_cake_column_layout == 'three-column' ){ ?>
	<div id="category-post">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="page-box">
			    <?php 
			        if(has_post_thumbnail()) { ?>
			        <div class="box-image">
			            <?php the_post_thumbnail();  ?>	   
			        </div>
			    <?php } ?>
			    <div class="box-content mt-2 text-center">
			        <h4><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h4>
	                <div class="box-info">
				        <?php $jays_cake_blog_archive_ordering = get_theme_mod('blog_meta_order', array('date', 'author', 'comment', 'category'));
			          	foreach ($jays_cake_blog_archive_ordering as $jays_cake_blog_data_order) : 
				            if ('date' === $jays_cake_blog_data_order) : ?>
		              			<i class="far fa-calendar-alt mb-1"></i><span class="entry-date"><?php echo get_the_date('j F, Y'); ?></span>
				            <?php elseif ('author' === $jays_cake_blog_data_order) : ?>
			              		<i class="fas fa-user mb-1"></i><span class="entry-author"><?php the_author(); ?></span>
				            <?php elseif ('comment' === $jays_cake_blog_data_order) : ?>
			              		<i class="fas fa-comments mb-1"></i><span class="entry-comments"><?php comments_number(__('0 Comments', 'jays-cake'), __('0 Comments', 'jays-cake'), __('% Comments', 'jays-cake')); ?></span>
				            <?php elseif ('category' === $jays_cake_blog_data_order) :?>
			              		<i class="fas fa-list mb-1"></i><span class="entry-category"><?php jays_cake_display_post_category_count(); ?></span>
				            <?php endif;
			          	endforeach; ?>
			        </div>
			        <p><?php echo esc_html(jays_cake_excerpt_function());?></p>
			        <?php if(get_theme_mod('jays_cake_remove_read_button',true) != ''){ ?>
			            <div class="readmore-btn">
			                <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small" title="<?php esc_attr_e( 'Read More', 'jays-cake' ); ?>"><?php echo esc_html(get_theme_mod('jays_cake_read_more_text',__('Read More','jays-cake')));?></a>
			            </div>
			        <?php }?>
			    </div>
			    <div class="clearfix"></div>
			</div>
		</article>
	</div>
<?php } else{ ?>
<div id="category-post">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="page-box row">
		    <?php if (has_post_thumbnail()) { ?>
		    	<?php $jays_cake_post_layout = get_theme_mod( 'jays_cake_post_layout','image-content');
      			if($jays_cake_post_layout == 'image-content'){ ?>
				    <div class="box-image col-lg-6 col-md-12 align-self-center">
				        <?php the_post_thumbnail(); ?>
				    </div>
				    <div class="box-content col-lg-6 col-md-12">
				        <h4><a href="<?php echo esc_url(get_permalink()); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
				        <div class="box-info">
				            <?php
				            $jays_cake_blog_archive_ordering = get_theme_mod('blog_meta_order', array('date', 'author', 'comment', 'category'));
				            foreach ($jays_cake_blog_archive_ordering as $jays_cake_blog_data_order) :
				                if ('date' === $jays_cake_blog_data_order) : ?>
				                    <i class="far fa-calendar-alt mb-1"></i><span class="entry-date"><?php echo get_the_date('j F, Y'); ?></span>
				                <?php elseif ('author' === $jays_cake_blog_data_order) : ?>
				                    <i class="fas fa-user mb-1"></i><span class="entry-author"><?php the_author(); ?></span>
				                <?php elseif ('comment' === $jays_cake_blog_data_order) : ?>
				                    <i class="fas fa-comments mb-1"></i><span class="entry-comments"><?php comments_number(__('0 Comments', 'jays-cake'), __('0 Comments', 'jays-cake'), __('% Comments', 'jays-cake')); ?></span>
				                <?php elseif ('category' === $jays_cake_blog_data_order) : ?>
				                    <i class="fas fa-list mb-1"></i><span class="entry-category"><?php jays_cake_display_post_category_count(); ?></span>
				                <?php endif;
				            endforeach; ?>
				        </div>
				        <p><?php echo esc_html(jays_cake_excerpt_function()); ?></p>
				        <?php if (get_theme_mod('jays_cake_remove_read_button', true) != '') { ?>
				            <div class="readmore-btn">
				                <a href="<?php echo esc_url(get_permalink()); ?>" class="blogbutton-small" title="<?php esc_attr_e('Read More', 'jays-cake'); ?>"><?php echo esc_html(get_theme_mod('jays_cake_read_more_text', __('Read More', 'jays-cake'))); ?></a>
				            </div>
				        <?php } ?>
				    </div>
			    <?php }
      			else if($jays_cake_post_layout == 'content-image'){ ?>
      				<div class="box-content col-lg-6 col-md-12">
				        <h4><a href="<?php echo esc_url(get_permalink()); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
				        <div class="box-info">
				            <?php
				            $jays_cake_blog_archive_ordering = get_theme_mod('blog_meta_order', array('date', 'author', 'comment', 'category'));
				            foreach ($jays_cake_blog_archive_ordering as $jays_cake_blog_data_order) :
				                if ('date' === $jays_cake_blog_data_order) : ?>
				                    <i class="far fa-calendar-alt mb-1"></i><span class="entry-date"><?php echo get_the_date('j F, Y'); ?></span>
				                <?php elseif ('author' === $jays_cake_blog_data_order) : ?>
				                    <i class="fas fa-user mb-1"></i><span class="entry-author"><?php the_author(); ?></span>
				                <?php elseif ('comment' === $jays_cake_blog_data_order) : ?>
				                    <i class="fas fa-comments mb-1"></i><span class="entry-comments"><?php comments_number(__('0 Comments', 'jays-cake'), __('0 Comments', 'jays-cake'), __('% Comments', 'jays-cake')); ?></span>
				                <?php elseif ('category' === $jays_cake_blog_data_order) : ?>
				                    <i class="fas fa-list mb-1"></i><span class="entry-category"><?php jays_cake_display_post_category_count(); ?></span>
				                <?php endif;
				            endforeach; ?>
				        </div>
				        <p><?php echo esc_html(jays_cake_excerpt_function()); ?></p>
				        <?php if (get_theme_mod('jays_cake_remove_read_button', true) != '') { ?>
				            <div class="readmore-btn">
				                <a href="<?php echo esc_url(get_permalink()); ?>" class="blogbutton-small" title="<?php esc_attr_e('Read More', 'jays-cake'); ?>"><?php echo esc_html(get_theme_mod('jays_cake_read_more_text', __('Read More', 'jays-cake'))); ?></a>
				            </div>
				        <?php } ?>
				    </div>
				    <div class="box-image col-lg-6 col-md-12 align-self-center  pt-lg-0 pt-3">
				        <?php the_post_thumbnail(); ?>
				    </div>
				<?php }?>
			<?php } else { ?>
			    <div class="box-content col-lg-12 col-md-12">
			        <h4><a href="<?php echo esc_url(get_permalink()); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
			        <div class="box-info">
			            <?php
			            $jays_cake_blog_archive_ordering = get_theme_mod('blog_meta_order', array('date', 'author', 'comment', 'category'));
			            foreach ($jays_cake_blog_archive_ordering as $jays_cake_blog_data_order) :
			                if ('date' === $jays_cake_blog_data_order) : ?>
			                    <i class="far fa-calendar-alt mb-1"></i><span class="entry-date"><?php echo get_the_date('j F, Y'); ?></span>
			                <?php elseif ('author' === $jays_cake_blog_data_order) : ?>
			                    <i class="fas fa-user mb-1"></i><span class="entry-author"><?php the_author(); ?></span>
			                <?php elseif ('comment' === $jays_cake_blog_data_order) : ?>
			                    <i class="fas fa-comments mb-1"></i><span class="entry-comments"><?php comments_number(__('0 Comments', 'jays-cake'), __('0 Comments', 'jays-cake'), __('% Comments', 'jays-cake')); ?></span>
			                <?php elseif ('category' === $jays_cake_blog_data_order) : ?>
			                    <i class="fas fa-list mb-1"></i><span class="entry-category"><?php jays_cake_display_post_category_count(); ?></span>
			                <?php endif;
			            endforeach; ?>
			        </div>
			        <p><?php echo esc_html(jays_cake_excerpt_function()); ?></p>
			        <?php if (get_theme_mod('jays_cake_remove_read_button', true) != '') { ?>
			            <div class="readmore-btn">
			                <a href="<?php echo esc_url(get_permalink()); ?>" class="blogbutton-small" title="<?php esc_attr_e('Read More', 'jays-cake'); ?>"><?php echo esc_html(get_theme_mod('jays_cake_read_more_text', __('Read More', 'jays-cake'))); ?></a>
			            </div>
			        <?php } ?>
			    </div>
			<?php } ?>
		    <div class="clearfix"></div>
		</div>
	</article>
</div>
<?php } ?>