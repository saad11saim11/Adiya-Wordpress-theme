<?php
function _WSH()
{
	return $GLOBALS['_sh_base'];
}
function adiya_get_categories()
{	
	$categories = get_categories( array( 'orderby' => 'name', 'order'   => 'ASC' ) );
	$cats = array();

	$cats[] = esc_html__( 'All Categories', 'adiya' );
	
	foreach($categories as $category)
	{
		$cats[$category->term_id] = $category->name;
	}
	return $cats;
}

function adiya_the_pagination($args = array(), $echo = 1)
{
	global $wp_query;
		
	$default =  array(
					'base' 		=> str_replace( 99999, '%#%', esc_url( get_pagenum_link( 99999 ) ) ), 
					'format' 	=> '?paged=%#%', 
					'current'	=> max( 1, get_query_var('paged') ),
					'total' 	=> $wp_query->max_num_pages, 
					'next_text' => "<span aria-hidden='true'>&raquo;</span>", 
					'prev_text' => "<span aria-hidden='true'>&laquo;</span>", 
					'type'		=>'list',
					"add_args" => false
				);
	$args = wp_parse_args($args, $default);		
	
	$paginat = paginate_links($args);

		$pagination= str_replace("ul class='page-numbers" , "ul class='pagination mt-4 pagination-lg justify-content-center" , $paginat);
		
		
	if(paginate_links(array_merge(array('type'=>'array'),$args)))
	{
		if($echo) 
			echo wp_kses( $pagination , adiya_expanded_alowed_tags() );
			
		return $pagination;
	}
}

// Breadcrumbs
function adiya_breadcrumb() {
       
    // Settings
    $separator          = "";
    $breadcrums_id      = '';
    $breadcrums_class   = 'breadcrumb justify-content-center adiya-breadcrumb';
    $home_title         = esc_html__("Home", 'adiya');
      
    
       
    // Get the query & post information
    global $post;
       
    // Do not display on the homepage
    if ( !is_home() ) {
       
        // Build the breadcrums
        echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';
           
        // Home page
        echo '<li><a  href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
           
        if ( is_archive() && !is_tax() && !is_category() && !is_tag() && !is_author() ) {
              
            echo '<li><a >' . post_type_archive_title('', false) . '</a></li>';
              
        } 
		else if ( is_archive() && is_tax() && !is_category() && !is_tag() && !is_author()  ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li><a  href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';              
            }
              
            $custom_tax_name = get_queried_object()->name;
            echo '<li><a >' . $custom_tax_name . '</a></li>';
              
        } 
		else if ( is_single() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li><a  href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';              
            }
              
            // Get post category info
            $category = get_the_category();
             
            if(!empty($category)) {
				
				$arr_valux = array_values($category);

                // Get last category post is in
                $last_category = end($arr_valux);
                  
                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);
                  
                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
					$parent= str_replace("a href=" , "a class='breadcrumbs__link' href=" , $parents);
                    $cat_display .= '<li >'.$parent.'</li>';
                }
             
            }
              
           // // If it's a custom post type within a custom taxonomy
//            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
//            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
//                   
//                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
//                $cat_id         = $taxonomy_terms[0]->term_id;
//                $cat_nicename   = $taxonomy_terms[0]->slug;
//                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
//                $cat_name       = $taxonomy_terms[0]->name;
//               
//            }
              
            // Check if the post is in a category
            if(!empty($last_category)) {
                echo wp_kses( $cat_display , adiya_expanded_alowed_tags());
                echo '<li ><a >' . get_the_title() . '</a></li>';
                  
            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {
                  
                echo '<li><a  href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';

                echo '<li ><a >' . get_the_title() . '</a></li>';
              
            } else {
                  
                echo '<li ><a >' . get_the_title() . '</a></li>';
                  
            }
              
        } 
		else if ( is_category() ) {
               
            // Category page
            echo '<li><a class="breadcrumbs__link>"' . single_cat_title('', false) . '</a></li>';
               
        } 
		else if ( is_page() ) {
               
            // Standard page
            if( $post->post_parent ){
                   
                // If child page, get parents 
                $anc = get_post_ancestors( $post->ID );
                   
                // Get parents in the right order
                $anc = array_reverse($anc);
                   
                // Parent page loop
                if ( !isset( $parents ) ) $parents = null;
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li ><a  href="' . get_permalink($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                }
                   
                // Display parent pages
				echo wp_kses( $parents , adiya_expanded_alowed_tags());
                   
                // Current page
                echo '<li >' . get_the_title() . '</a></li>';
                   
            } else {
                   
                // Just display current page if not parents
                echo '<li >' . get_the_title() . '</a></li>';
                   
            }
               
        } 
		else if ( is_tag() ) {
               
            // Tag page
               
            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;
               
            // Display the tag name
            echo '<li><a >' . $get_term_name . '</a></li>';
           
        } 
		elseif ( is_day() ) {
               
            // Day archive
               
            // Year link
            echo '<li><a  href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
               
            // Month link
            echo '<li><a  href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
               
            // Day display
            echo '<li><a >' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</a></li>';
               
        }
		else if ( is_month() ) {
               
            // Month Archive
               
            // Year link
            echo '<li><a class="breadcrumbs__link bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
               
            // Month display
            echo '<li><a >' . get_the_time('M') . ' Archives</a></li>';
               
        }
		else if ( is_year() ) {
               
            // Display year archive
            echo '<li><a >' . get_the_time('Y') . ' Archives</a></li>';
               
        }
		else if ( is_author() ) {
               
            // Auhor archive
               
            // Get the author information
            global $author;
            $userdata = get_userdata( $author );
               
            // Display author name
            echo '<li><a >' . 'Author: ' . $userdata->display_name . '</a></li>';
           
        }
		else if ( get_query_var('paged') ) {
               
            // Paginated archives
            echo '<li><a >'.__('Page', 'adiya') . ' ' . get_query_var('paged') . '</a></li>';
               
        }
		else if ( is_search() ) {
           
            // Search results page
            echo '<li><a >Search results for: ' . get_search_query() . '</a></li>';
           
        }
		elseif ( is_404() ) {
               
            // 404 page
            echo '<li><a >' . 'Error page' . '</a></li>';
        }
       
        echo '</ul>';
           
    }
	
	else{
		echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">
				<li><a href="'.esc_url( home_url( '/' ) ).'" >'.esc_html__('Home', 'adiya').'</a></li>
				'.$separator.'
				<li >'.esc_html__("Blog" , 'adiya').'</li>
			  </ul>';
	}
       
}
function adiya_list_comments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
?>

	<div id="comment-<?php echo comment_ID(); ?>" class="comments-box comment-<?php echo comment_ID(); ?>">
		<?php if( get_avatar($comment) ): ?>
			<div class="img-box">
				<?php echo get_avatar($comment, 68); ?>
			</div>
		<?php endif; ?>
		<div class="text-box">
			<h5><?php echo get_comment_author(); ?></h5>
			<div class="time"><?php echo get_comment_time( 'd/m/Y' ) ; ?></div>
			<?php comment_text(); ?>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</div>
	</div>
<?php
}

function adiya_comment_form( $args = array(), $post_id = null, $review = false )
{
		
	if ( null === $post_id )
		$post_id = get_the_ID();
	else
		$id = $post_id;

	$commenter = wp_get_current_commenter();
	$user = wp_get_current_user();
	$user_identity = $user->exists() ? $user->display_name : '';

	$args = wp_parse_args( $args ); 
	if ( ! isset( $args['format'] ) )
		$args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';

	$req      = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$html5    = 'html5' === $args['format'];
	$consent  = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';
	$fields   =  array(
					'author'=> '<div class="col-md-6">
										<div class="quote-item">
											<input  id="author" name="author" type="text" placeholder="'.esc_attr__("Name" , 'adiya').'" required/>
										</div>
									</div>',
					
					'email'	=>	'	<div class="col-md-6">
										<div class="quote-item">
											<input id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' placeholder="'.esc_attr__("Email" , 'adiya').'" required/>
										</div>
									</div>',
		
					'phone'=> '<div class="col-md-6">
									<div class="quote-item">
										<input  id="tel" name="tel" type="tel" placeholder="'.esc_attr__("Phone" , 'adiya').'" />
									</div>
								</div>',
					'subject'=> '<div class="col-md-6">
									<div class="quote-item">
										<input  id="subject" name="subject" type="text" placeholder="'.esc_attr__("Subject" , 'adiya').'" required/>
									</div>
								</div>',
		
				
				);

	$required_text = sprintf( ' ' . esc_html__('Required fields are marked %s', 'adiya'), '<span class="required">*</span>' );

	$fields		= apply_filters( 'comment_form_default_fields', $fields );
	$defaults	= array(
					'fields'		=> $fields,
					'comment_field'	=>	'<div class="col-md-12">
											<div class="quote-item">
												<div class="quote-item">
													<textarea  name="comment" id="comment" placeholder="'. esc_html__( 'Comment Details!', 'adiya' ).'" required></textarea>
												</div>
											</div>
										</div>',
					
					'must_log_in'	=> '<div class="col-sm-12 log-text pl-0 pr-0">' . sprintf( wp_kses( 'You must be <a href="%s">logged in</a> to post a comment.' , adiya_expanded_alowed_tags() ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</div>',
					
					'logged_in_as'	=> '<div class="col-sm-12 log-text pl-0 pr-0">' . sprintf( wp_kses( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' , adiya_expanded_alowed_tags() ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</div>',
					
					'comment_notes_before' => '<label>' . esc_html__('Your email address will not be published *', 'adiya' ) . '</label>',
					
					'comment_notes_after'  => '',
					
					'id_form'              => 'respond-form',
					'id_submit'            => 'submit',
					'title_reply'          => esc_html__( 'Add Comments', 'adiya' ),
					'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'adiya' ),
					'cancel_reply_link'    => esc_html__( 'Cancel Reply', 'adiya' ),
					'label_submit'         => esc_html__( 'Submit Request', 'adiya' ),
					'format'               => 'xhtml',
				  );

	$args = wp_parse_args( $args, apply_filters( 'comment_form_defaults', $defaults ) );

	if ( comments_open( $post_id ) ) :
		
        do_action( 'comment_form_before' );
?>
		<div class="add-comments">
			<div class="title">
				<h4>
					<?php comment_form_title( $args['title_reply'], $args['title_reply_to'] ); ?>
					<small><?php cancel_comment_reply_link( $args['cancel_reply_link'] ); ?></small>
				</h4> 
			</div>
<?php
		if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) :
			
			echo adiya_set($args, 'must_log_in');
			do_action( 'comment_form_must_log_in_after' );
	
		else :
?>
			<div class="inner-add-comments">
			<form action="<?php echo site_url( '/wp-comments-post.php' ); ?>" method="post" id="<?php echo esc_attr( $args['id_form'] ); ?>" class="row" novalidate>
<?php
				do_action( 'comment_form_top' );

				if ( is_user_logged_in() ) {

					echo apply_filters( 'comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity );

					do_action( 'comment_form_logged_in_after', $commenter, $user_identity );
				}
				else {

					do_action( 'comment_form_before_fields' );

					foreach ( (array) $args['fields'] as $name => $field ) {

						echo apply_filters( "comment_form_field_{$name}", $field ) . "\n";

					}
					do_action( 'comment_form_after_fields' );

				}

				echo apply_filters( 'comment_form_field_comment', $args['comment_field'] );

				echo adiya_set($args, 'comment_notes_after'); 
?>					
				<div class="col-md-12">
					<div class="quote-item">
						<button id="<?php echo esc_attr( $args['id_submit'] ); ?>" class="btn-1 btn-3 submit" name="submit" type="submit"><?php echo esc_html( $args['label_submit'] ); ?></button>
					</div>
				</div>

				<?php comment_id_fields( $post_id ); ?>
				<?php do_action( 'comment_form', $post_id ); ?>
			</form>
			</div>
<?php	endif;
?>
		</div><!-- #respond -->
<?php
		do_action( 'comment_form_after' );
	else :
		do_action( 'comment_form_comments_closed' );
	endif;
}

function adiya_expanded_alowed_tags() {
	$my_allowed = wp_kses_allowed_html( 'post' );
	
	// Comment
	$my_allowed['abbr']		= array('title' => array());
	$my_allowed['acronym']	= array('title' => array());
	$my_allowed['b'] 		= array('style' => array());
	$my_allowed['br'] 		= array('class' => array(), 'style' => array());
	$my_allowed['s'] 		= array('style' => array());
	$my_allowed['strike'] 	= array('style' => array());
	$my_allowed['strong'] 	= array('style' => array());
	$my_allowed['em'] 		= array('style' => array());
	$my_allowed['i'] 		= array('class' => array(),'style' => array());
	$my_allowed['cite'] 	= array('style' => array());
	$my_allowed['code'] 	= array('style' => array());
	$my_allowed['blockquote'] = array('cite' => array());
	$my_allowed['q'] 		= array('cite' => array());
	$my_allowed['del'] 		= array('datetime' => array());
	$my_allowed['img'] 		= array('src' => array(),'height' => array(),'width' => array(),'class' => array(),'alt' => array(),'srcset' => array());
	// iframe
	$my_allowed['iframe'] 	= array('src' => array(),'height' => array(),'width' => array(),'frameborder' => array(),'allowfullscreen' => array());
	
	// form fields - input
	$my_allowed['input'] 	= array('class' => array(),'id' => array(),'name' => array(),'value' => array(),'type' => array());
	
	// select
	$my_allowed['select'] 	= array('class' => array(),'id' => array(),'name' => array(),'value' => array(),'type' => array());
	
	// select options
	$my_allowed['option'] 	= array('selected' => array());
	
	// style
	$my_allowed['style'] 	= array('types' => array());
	
	// span
	$my_allowed['span'] 	= array('class' => array());
	
	$my_allowed['h1'] 		= array('class' => array());
	$my_allowed['h2'] 		= array('class' => array());
	$my_allowed['h3'] 		= array('class' => array());
	$my_allowed['h4'] 		= array('class' => array());
	$my_allowed['h5'] 		= array('class' => array());
	$my_allowed['h6'] 		= array('class' => array());
	$my_allowed['hr'] 		= array('class' => array(),'style' => array());
	
	// Anchor
	$my_allowed['a'] 		= array('class' => array(),'href' => array(),'title' => array(),'style' => array());
	
	// Listing
	$my_allowed['ul'] 		= array('id' => array(),'class' => array(),'style' => array());
	$my_allowed['ol'] 		= array('id' => array(),'class' => array(),'style' => array());
	$my_allowed['li'] 		= array('id' => array(),'class' => array(),'style' => array());
 
	return $my_allowed;
} 

//add_filter('deprecated_constructor_trigger_error', '__return_false');

function adiya_tgm_style() {
        wp_register_style( 'custom-wp-admin-css', get_template_directory_uri() . '/css/site-options.css', false, '1.0.0' );
        wp_enqueue_style( 'custom-wp-admin-css' );
}
add_action( 'admin_enqueue_scripts', 'adiya_tgm_style' );

function adiya_conditional_scripts() {
	
	// Load the html5 shiv for IE9.
	wp_enqueue_script( 'adiya-shive-html', get_template_directory_uri() . '/js/html5shiv.min.js');
	wp_script_add_data( 'adiya-shive-html', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'adiya_conditional_scripts' );



function adiya_grabing_vid_ID($link) {
  $pattern = '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i';
  if (preg_match($pattern, $link, $match)) {
    return $match[1];
  }
  return false;
}
function wp_get_menu_array($array_menu) {
	
    $menu = array();
    foreach ( (array)$array_menu as $m) {
        if (empty($m->menu_item_parent)) {
            $menu[$m->ID] = array();
            $menu[$m->ID]['ID']          =   $m->ID;
            $menu[$m->ID]['title']       =   $m->title;
            $menu[$m->ID]['url']         =   $m->url;
            $menu[$m->ID]['children']    =   array();
        }
    }
    $submenu = array();
    foreach ( (array)$array_menu as $m) {
        if ($m->menu_item_parent) {
            $submenu[$m->ID] = array();
            $submenu[$m->ID]['ID']       =   $m->ID;
            $submenu[$m->ID]['title']    =   $m->title;
            $submenu[$m->ID]['url']      =   $m->url;
            $menu[$m->menu_item_parent]['children'][$m->ID] = $submenu[$m->ID];
        }
    }
	
    return $menu;
}
function adiya_popup_form(){
	global $adiya;
	
	$heading 		= adiya_set($adiya, 'popup_heading');
	$text 		= adiya_set($adiya, 'popup_text');
	$form 		= adiya_set($adiya, 'popup_form');
	?>
	<!-- BEGIN TRIAL POPUP -->
	<div class="popup js-popup" id="trial-popup">
		<div class="popup__row">
			<div class="popup__cell">
				<div class="popup__window popup__window_bg">
                    <button class="popup__close close-button js-popup-close"></button>
                    <div class="popup__content">
                    <?php if($heading && $text):?>
                    	<div class="trial-form">
                        	<?php if($heading):?>
                        	<span class="trial-form__title"><?php echo wp_kses( $heading , adiya_expanded_alowed_tags());?></span>
                            <?php 
								endif;
								if($text):
							?>
                            <span class="trial-form__text"><?php echo esc_html($text);?></span>
                            <?php endif;?>
                        </div>
                    <?php 
						endif;
						if($form){
							$checkone = str_replace("`{`","[",$form);
							$checktwo = str_replace("`}`","]",$checkone);
							$cf7_code = str_replace("``","\"",$checktwo);
							echo do_shortcode($cf7_code);
						}
					?>
                    </div>  
                    <span class="popup__pseudotitle" data-title="<?php echo esc_attr (strip_tags($heading));?>"></span>        
				</div>
            </div>
            <div class="popup__mask js-popup-close"></div>
        </div>
	</div>
	<!-- TRIAL POPUP END --> 
    <?php
}

// function to display number of posts.

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

// function to count views.
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

function adiya_gfonts_prefetch() {
	echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
	echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
}
add_action( 'wp_head', 'adiya_gfonts_prefetch' );

function adiya_Rfonts_url() {
    $font_url = '';
    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'adiya' ) ) {
		$font_url = add_query_arg( 'family',  '&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap', "//fonts.googleapis.com/css2" );
    }
    return $font_url;
}
function adiya_Nfonts_url() {
    $font_url = '';
    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'adiya' ) ) {
		$font_url = add_query_arg( 'family',  '&family=Noto+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap', "//fonts.googleapis.com/css2" );
    }
    return $font_url;
}
function adiya_scripts() {
    wp_enqueue_style( 'adiya-roboto-fonts', adiya_Rfonts_url(), array(), '1.0.0' );
	wp_enqueue_style( 'adiya-noto-fonts', adiya_Nfonts_url(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'adiya_scripts' );

    // Enqueue the fonts
    function add_fonts_to_theme(){
        wp_enqueue_style("adding-google-fonts", all_google_fonts());
     }
     //add_action("wp_enqueue_scripts","add_fonts_to_theme");

    // Choose the fonts 
    function all_google_fonts() {
        $fonts = array(
               "Noto:ital,wght@0,400;0,700;1,400;1,700",
			   "Serif:ital,wght@0,400;0,700;1,400;1,700",
               "Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900",

            );
        $fonts_collection = add_query_arg(array(
            "family"=>urlencode(implode("|",$fonts)),
            "subset"=>"latin"
            ),'https://fonts.googleapis.com/css');
        return $fonts_collection;
     }
     
function adiya_bar_check(){
	if(is_admin_bar_showing()){
		?>
		<script>
			jQuery(document).ready(function($) {
				$('header').addClass('admintbar');
			});
		</script>
		<?php
	}
}