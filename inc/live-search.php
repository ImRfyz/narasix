<?php 
/*
 ==================
 Ajax Search
======================	 
*/
// add the ajax fetch js
// the ajax function
add_action('wp_ajax_data_fetch' , 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch','data_fetch');
function data_fetch(){

    $the_query = new WP_Query( array( 'posts_per_page' => 10, 's' => esc_attr( $_POST['keyword'] ), 'post_type' => 'post' ) );
    if( $the_query->have_posts() ) :
        while( $the_query->have_posts() ): $the_query->the_post(); ?>

            <li class="dark:hover:bg-charcoal-800 text-charcoal-800 group flex items-center space-x-2 rounded-md bg-gray-100 px-2 py-2 hover:bg-sky-700 hover:text-white">
              <span class="dark:group-hover:bg-charcoal-800 dark:hover:bg-charcoal-800 rounded border border-gray-300 bg-gray-200 px-2 group-hover:bg-sky-700">#</span>
              <a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title();?></a>
            </li>

        <?php endwhile;
		wp_reset_postdata();  
	else: 
		echo '<h3>No Results Found</h3>';
    endif;

    die();
}
// add the ajax fetch js
add_action( 'wp_footer', 'ajax_fetch' );
function ajax_fetch() {
?>
<script type="text/javascript">
function fetchResults(){
	var keyword = jQuery('#searchInput').val();
	if(keyword == ""){
		jQuery('#datafetch').html("");
	} else {
		jQuery.ajax({
			url: '<?php echo admin_url('admin-ajax.php'); ?>',
			type: 'post',
			data: { action: 'data_fetch', keyword: keyword  },
			success: function(data) {
				jQuery('#datafetch').html( data );
			}
		});
	}
    

}
</script>

<?php
}