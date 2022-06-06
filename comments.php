<?php

if ( post_password_required() )
	return;
	
if ( ! comments_open() && !get_comments_number() ) return;
?>
<div class="item-comments">
	<?php if ( have_comments() ) : ?>
		<div class="title">
			<h4><?php comments_number( 'Comments (0)', 'Comment (1)', 'Comments (%)' ); ?></h4>
		</div>
		<div class="inner-comments">
			<?php
				wp_list_comments( array(
					'style'       => '',
					'short_ping'  => true,
					'avatar_size' => 90,
					'callback'=>'adiya_list_comments',

				) );
			?>
		
		 <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :?>

		<nav class="comments-pagination clearfix">
			<span class="comments-pagination-link-left">
			<?php next_comments_link( esc_html__( '&laquo; Newer Comments', 'edufie' ) ); ?>
			</span>
			<span class="comments-pagination-link-right">
			<?php previous_comments_link( esc_html__( 'Older Comments &raquo;', 'edufie' ) ); ?> 
			</span>
		</nav>
			<!-- .comment-navigation -->
		<?php endif; // Check for comment navigation ?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
			<p class="no-comments text-center"><strong><?php esc_html_e( 'Comments are closed.' , 'edufie' ); ?></strong></p>
		<?php endif; ?>
	<?php endif; ?>
			</div>
</div>
	<?php adiya_comment_form(); ?>
