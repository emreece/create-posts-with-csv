<?php /* Template Name: csv */ 
$row = 1;
$posttype = 'post';
if (($handle = fopen("http://localhost/wordpress/wp-content/uploads/2022/03/test1.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $row++;
        $post_slug = sanitize_title($data[0]);
        $args = array(
            'name'        => $post_slug,
            'post_type'   => $posttype,
            'post_status' => 'publish',
            'numberposts' => 1
        );
          $my_posts = get_posts($args);
        if( !$my_posts ) : // Insert the post into the database if not exists
            $my_post = array(
                'post_type' => $posttype,
                'post_title'    => wp_strip_all_tags(  $data[0] ),
                'post_content'  => '   ',
                'post_status'   => 'publish',
                'post_author'   => 1,
            ); 
            wp_insert_post( $my_post );
        else: // Get post id if it exists
            $my_post = $my_posts[0]->ID;
        endif; 
        // Update fields: 
        update_field('price', $data[1], $my_post);
    }
    fclose($handle);
}
?>