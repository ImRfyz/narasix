<?php

// comments display list
function comments_helper( $comment, $args, $depth ) {

	// Get correct tag used for the comments
	if ( 'div' === $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	} ?>

	<<?php echo $tag; ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>">

	<?php
	// Switch between different comment types
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' : ?>
		<div class="pingback-entry"><span class="pingback-heading"><?php esc_html_e( 'Pingback:', 'narasix' ); ?></span> <?php comment_author_link(); ?></div>
	<?php
		break;
		default :

		if ( 'div' != $args['style'] ) { ?>
			<div id="div-comment-<?php comment_ID() ?>" class="flex mb-4">
		<?php } ?>
      <div class="mr-3 flex-shrink-0">
          <?php
          // Display avatar unless size is set to 0
          if ( $args['avatar_size'] != 0 ) {
              $avatar_size = ! empty( $args['avatar_size'] ) ? $args['avatar_size'] : 70; // set default avatar size
                  echo get_avatar( $comment, $avatar_size );
          }
          // Display author name
          ?>
          
      </div><!-- .comment-author -->
      
      <div class="flex-1 rounded-lg border dark:border-charcoal-700 px-4 py-4 leading-relaxed sm:px-6 sm:py-4">
          <div class="flex justify-between">
              <div>
                <span>
                <?php printf( __( '<strong>%s </strong>', 'narasix' ), get_comment_author_link() ); ?>
                </span>
                <span class="text-xs text-gray-400">
                  <?php
                    /* translators: 1: date, 2: time */
                    printf(
                        __( '%1$s at %2$s', 'narasix' ),
                        get_comment_date(),
                        get_comment_time()
                    ); 
                  ?>
                </span>
              </div>
              <?php
                  edit_comment_link( __( '(Edit)', 'narasix' ), '  ', '' ); 
              ?>
          </div><!-- .comment-meta -->
          <div class="text-[13px] wysiwyg wysiwyg-slate dark:wysiwyg-invert"><?php comment_text(); ?></div><!-- .comment-text -->
          
          <?php
            // Display comment moderation text
            if ( $comment->comment_approved == '0' ) { ?>
                <em class="italic text-sm text-blue-600"><?php _e( 'Your comment is awaiting moderation.', 'narasix' ); ?></em><br/><?php
            } ?>

            <div class="w-full text-end">
              <?php // Display comment reply button
                  $myclass = 'text-[13px] text-charcoal-800 bg-white border px-2 py-1 rounded-lg';
                  echo preg_replace( '/comment-reply-link/', 'comment-reply-link ' . $myclass, 
                      get_comment_reply_link(array_merge( $args, array(
                          'add_below' => $add_below, 
                          'depth' => $depth, 
                          'max_depth' => $args['max_depth']))), 1 ); 
              ?>
          </div>

      </div><!-- .comment-details -->
	  <?php
		if ( 'div' != $args['style'] ) { ?>
			</div>
		<?php }
	// IMPORTANT: Note that we do NOT close the opening tag, WordPress does this for us
		break;
	endswitch; // End comment_type check.
}

// Filter the default comment form fields ""
function custom_comment_form_no_fields($no_fields) {
	$no_fields['comment_notes_before'] = __( '', 'narasix' );
	$no_fields['comment_notes_after'] = __( '', 'narasix' );
	$no_fields['title_reply_before'] ='<h4 id="reply-title" class="mb-[14px] text-right sm:absolute sm:right-0 sm:mb-0 sm:-mt-[58px] sm:mr-[25px]">';
  $no_fields['title_reply_after'] ='</h4>';
  $no_fields['cancel_reply_before'] ='<span class="remove ml-4 text-[13px]">';
  $no_fields['cancel_reply_after'] ='</span>';
  $no_fields['cancel_reply_link'] =__( 'Cancel', 'narasix' );
  $no_fields['title_reply'] = __( ' ', 'narasix' );
    return $no_fields;
}
add_filter( 'comment_form_defaults', 'custom_comment_form_no_fields' );

// comments form fields
function my_update_comment_fields($fields) {
  $commenter      = wp_get_current_commenter();
  $req            = get_option('require_name_email');
  $label          = $req ? '*' : ' ' . __('(optional)', 'narasix');
  $aria_req       = $req ? "aria-required='true'" : '';
  $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    
  $fields['comment'] = $comment_field;
  $fields['author'] =
  '<div class="flex space-x-3">
      <p class="relative w-full">

      <input id="author" class="w-full focus:shadow-outline rounded-lg border bg-white px-4 py-2 text-[13px] tracking-wide focus:outline-none" name="author" type="text" placeholder="' . esc_attr__("Name", "narasix") . '" value="' . esc_attr($commenter['comment_author']) .
      '" size="30" ' . $aria_req . ' />
      </p>';
      $fields['email'] =
      '<p class="relative w-full">

      <input id="email" class="w-full focus:shadow-outline rounded-lg border bg-white px-4 py-2 text-[13px] tracking-wide focus:outline-none" name="email" type="email" placeholder="' . esc_attr__("E-mail address", "narasix") . '" value="' . esc_attr($commenter['comment_author_email']) .
      '" size="30" ' . $aria_req . ' />
      </p>';
      $fields['url'] =
      '<p class="relative w-full">

      <input id="url" class="w-full focus:shadow-outline rounded-lg border bg-white px-4 py-2 text-[13px] tracking-wide focus:outline-none" name="url" type="url"  placeholder="' . esc_attr__("Website Link", "narasix") . '" value="' . esc_attr($commenter['comment_author_url']) .
      '" size="30" />
      </p>
  </div>';

  if(isset(
    $fields['cookies']
    )
  )
    unset(
      $fields['cookies']
  );
  return $fields;
}
add_filter('comment_form_fields', 'my_update_comment_fields');

function my_update_comment_field($comment_field) {
  $comment_field =
  '<div class="relative mb-6 mt-6 w-full rounded-lg border dark:border-charcoal-700 bg-gray-50 dark:bg-charcoal-800">
    <div class="rounded-t-lg bg-white py-2 px-4 dark:bg-charcoal-800">
      <textarea id="comment" name="comment" placeholder="' . esc_attr__( " Enter comment here...", "narasix" ) . '" rows="4" class="w-full border-0 bg-white py-2 px-0 text-[13px] text-gray-900 focus:outline-none dark:bg-charcoal-800 dark:text-white dark:placeholder-gray-400"></textarea>
    </div>
    <div class="flex items-center border-t py-2 px-3 dark:border-charcoal-700">
      <button type="submit" class="rounded-lg bg-blue-700 py-2.5 px-4 text-center text-xs font-medium text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900">Send</button>
      <p class="inline-flex items-center space-x-1 ml-3">
        <input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes">
        <label for="wp-comment-cookies-consent" class="text-limit-1">Save my name, email, and website in this browser for the next time I comment.</label>
      </p>
    </div>
  </div>';
  return $comment_field;
}
add_filter('comment_form_field_comment', 'my_update_comment_field');

// comments validate
function comment_validation_init() {
  if(is_singular() && comments_open() ) { ?>
  <style>
    
  </style>
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
    $('#commentform').validate({
    
    onfocusout: function(element) {
      this.element(element);
    },
    
    rules: {
      author: {
        required: true,
        normalizer: function(value) { return $.trim(value); }
      },
    
      email: {
        required: true,
        email: true
      },
    
      comment: {
        required: true,
        normalizer: function(value) { return $.trim(value); }
      }
    },
    
    messages: {
      author: "Please enter in your name.",
      email: "Please enter a valid email address.",
      comment: "Message box can't be empty!"
    },
    
    errorElement: "small",
    errorPlacement: function(error, element) {
      element.before(error);
    }
    
    });
    });
    
    
    $(document).ready(function () {
    'use strict';
      
      var add = $('.comment-reply-link'),
        remove = $('.remove'),
        element;

      add.click(function () {
        $('div#respond').addClass('ns');
      });
      remove.click(function () {
        $('div#respond').removeClass('ns');
      });

    });

  </script>
  <?php
  }
  }
add_action('wp_footer', 'comment_validation_init');