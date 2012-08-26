<?php

include_once( ABSPATH . 'wp-includes/class-simplepie.php' );
include_once( dirname(__FILE__) . '/interface-wp-client.php' );

class WP_RSS_Client extends SimplePie implements WP_Client{

    private $response;
    private $error_message;
    private $error_code;

    function __construct( $site_ID ) {
        parent::SimplePie();
        $this->set_feed_url( get_post_meta( $site_ID, 'syn_feed_url', true ) );
    }

    public function new_post($post_ID) {
        // Not supported
        return false;
    }

    public function edit_post($post_ID, $ext_ID) {
        // Not supported
        return false;
    }

    public function delete_post($ext_ID) {
        // Not supported
        return false;
    }

    public function set_options($options, $ext_ID) {
        // Not supported
        return false;
    }

    public function test_connection() {
        // TODO: Implement test_connection() method.
        return true;
    }

    public function is_post_exists($ext_ID) {
        // Not supported
        return false;
    }

    public function get_response() {
        return $this->response;
    }

    public function get_error_code() {
        return $this->error_code;
    }

    public function get_error_message() {
        return $this->error_message;
    }

    public static function display_settings($site) {

        $feed_url   = get_post_meta( $site->ID, 'syn_feed_url', true );

        ?>

        <p>
            <label for=feed_url><?php echo esc_html__( 'Enter feed URL', 'push-syndication' ); ?></label>
        </p>
        <p>
            <input type="text" name="feed_url" id="feed_url" size="100" value="<?php echo esc_attr( $feed_url ); ?>" />
        </p>

        <?php

    }

    public static function save_settings( $site_ID ) {
        update_post_meta( $site_ID, 'syn_feed_url', esc_url_raw( $_POST['feed_url'] ) );
        return true;
    }

    public function get_post( $ext_ID ) {
        // TODO: Implement get_post() method.
    }

    public function get_posts( $args ) {
        
        $this->init();
        $this->handle_content_type();

        // hold all the posts
        $posts = array();

        foreach( $this->get_items() as $item ) {

        }

    }

}