<?php
/**
 * Plugin Name: Tweet Plugin Tutorial
 * Plugin URI: http://kpacanek.net
 * Description: This plugin adds a simple tweet in posts.
 * Version: 1.0.0
 * Network: true
 * Author: Kamil Pacanek
 * Author URI: http://kpacanek.net
 * License: GPL2
 */

 function wpmudev_twitterlink() {
     wp_register_style('wpmudev_twitterlink', plugins_url('style.css', __FILE__ ));
     wp_enqueue_style('wpmudev_twitterlink');
 }

 add_action( 'init', 'wpmudev_twitterlink');

function tweet_link( $content ) {
  $displayOption = get_option( 'display_option' );
  $url = 'https://twitter.com/intent/tweet?url='.get_permalink();

  if($displayOption == 1){
 	  return $content . '<a href="' . $url . '">Tweet this!</a></p>';
  }
  else{
 	  return '<a class="twitter-link" href="' . $url .
      '"><div class="dashicons-before dashicons-twitter"></div></a></p>'.$content;
  }
}

add_action( 'the_content', 'tweet_link' );
add_action('admin_menu', 'tweetlink_settings_menu');

function tweetlink_settings_menu() {
	add_options_page('wpmudev Tweet Link Settings', 'wpmudev Tweet Link', 'manage_options', 'wpmudev-tweetlink-settings', 'tweetlink_settings_page', 'dashicons-twitter');
}

function tweetlink_settings_page() {
  $displayOption = get_option('display_option');
?>
  <div class="wrap"><h2>wpmudev Tweet Link Options</h2></div>
  <form method="post" action="options.php">
    <?php settings_fields( 'tweetlink_settings' ); ?>
    <?php do_settings_sections( 'tweetlink_settings' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Display as</th>
        <td>
          <select name="display_option">
            <option value="1" <?php echo $displayOption == 1 ? "selected" : "" ?>>Under post as a link</option>
            <option value="2" <?php echo $displayOption == 2 ? "selected" : "" ?>>After title as an icon</option>
          </select>
        </td>
        </tr>
    </table>

    <?php submit_button(); ?>

</form>
<?php
}

add_action( 'admin_init', 'tweetlink_settings' );

function tweetlink_settings() {
	register_setting( 'tweetlink_settings', 'display_option' );
}
?>
