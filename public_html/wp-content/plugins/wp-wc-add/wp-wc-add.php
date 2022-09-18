<?php
/*
Plugin Name: wp-wc-add
Description: Добавление определенных полей для дополнения woocommerce
Version: 1.0
Author: Lida Davydova
*/


class TutsplusText_Widget extends WP_Widget {
 
    public function __construct() {
     
        parent::__construct(
            'tutsplustext_widget',
            __( 'TutsPlus Text Widget', 'tutsplustextdomain' ),
            array(
                'classname'   => 'tutsplustext_widget',
                'description' => __( 'A basic text widget to demo the Tutsplus series on creating your own widgets.', 'tutsplustextdomain' )
                )
        );
       
        load_plugin_textdomain( 'tutsplustextdomain', false, basename( dirname( __FILE__ ) ) . '/languages' );
       
    }
 
    /**  
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {    
         
        extract( $args );
         
        $conn = new mysqli("localhost", "admin_57292", "2f9cf02aa3d288ab0968", "admin_57292");
        if($conn->connect_error){
            die("Ошибка: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM wp_wc_add_categories";
        $sql_country = "SELECT DISTINCT country FROM wp_wc_add_categories";
        $sql_brand_url = "SELECT DISTINCT brand_url FROM wp_wc_add_categories";
        $sql_auto_url = "SELECT DISTINCT auto_url FROM wp_wc_add_categories";
        $sql_model_url = "SELECT DISTINCT model_url FROM wp_wc_add_categories";
        $sql_categ_url = "SELECT DISTINCT categ_url FROM wp_wc_add_categories";
        $sql_url_1 = "SELECT DISTINCT url_1 FROM wp_wc_add_categories";
        $sql_url_2 = "SELECT DISTINCT url_2 FROM wp_wc_add_categories";
        $result = $conn->query($sql);
        $result_country = $conn->query($sql_country);
        $result_brand_url = $conn->query($sql_brand_url);
        $result_auto_url = $conn->query($sql_auto_url);
        $result_model_url = $conn->query($sql_model_url);
        $result_categ_url = $conn->query($sql_categ_url);
        $result_url_1 = $conn->query($sql_url_1);
        $result_url_2 = $conn->query($sql_url_2);
        global $wpdb;
        $wpdb->suppress_errors(false);
        // execute query here
        if($wpdb->last_error !== '') :
            $wpdb->print_error();
        endif;
        
        ?> 
        <style>
            .widget-footer1 {
                display: inline;
                border: none;
                width: 100px;
                padding: 5%;
            }

            .widget-footer2 {
                display: inline;
                border: none;
                width: 100px;
                padding: 5%;
            }

            .widget-footer1 tr td, .widget-footer2 tr td {
                border: none;
                padding: 3px;
            }

            .widget-footer1 tr th, .widget-footer2 tr th {
                border: none;
                font-weight: bold;
                font-size: 14px;
            }

        </style>
        <table class="widget-footer1">
            <tr><th>Бренд</td></th>
            <?
            foreach ($result_brand_url as $row)
            {   
                $r = $row['brand_url'];
                $sql = "SELECT `brand_url_id` FROM `wp_wc_add_categories` WHERE `brand_url`='$r'";
                $id = $wpdb->get_row($sql, ARRAY_A);
                foreach ($id as $i)
                {
                    ?><tr><td><a href="<?=get_category_link($i)?>"><?echo $row['brand_url'];?></a></td></tr><?
                }
            }?>
        </table>
        <table class="widget-footer1">
            <tr><th>Страна</td></th>
            <?
            foreach ($result_country as $row)
            {
                $r = $row['country'];
                $sql = "SELECT `country_id` FROM `wp_wc_add_categories` WHERE `country`='$r'";
                $id = $wpdb->get_row($sql, ARRAY_A);
                foreach ($id as $i)
                {
                    ?><tr><td><a href="<?=get_category_link($i)?>"><?echo $row['country'];?></a></td></tr><?
                }
            }?>
        </table>
        <table class="widget-footer1">
            <tr><th>Авто</td></th>
            <?
            foreach ($result_auto_url as $row)
            {
                $r = $row['auto_url'];
                $sql = "SELECT `auto_url_id` FROM `wp_wc_add_categories` WHERE `auto_url`='$r'";
                $id = $wpdb->get_row($sql, ARRAY_A);
                foreach ($id as $i)
                {
                    ?><tr><td><a href="<?=get_category_link($i)?>"><?echo $row['auto_url'];?></a></td></tr><?
                }
            }?>
        </table>
        <table class="widget-footer1">
            <tr><th>Модель</td></th>
            <?
            foreach ($result_model_url as $row)
            {
                $r = $row['model_url'];
                $sql = "SELECT `model_url_id` FROM `wp_wc_add_categories` WHERE `model_url`='$r'";
                $id = $wpdb->get_row($sql, ARRAY_A);
                foreach ($id as $i)
                {
                    ?><tr><td><a href="<?=get_category_link($i)?>"><?echo $row['model_url'];?></a></td></tr><?
                }
            }?>
        </table>
        <table class="widget-footer1">
            <tr><th>Категория</td></th>
            <?
            foreach ($result_categ_url as $row)
            {
                $r = $row['categ_url'];
                $sql = "SELECT `categ_url_id` FROM `wp_wc_add_categories` WHERE `categ_url`='$r'";
                $id = $wpdb->get_row($sql, ARRAY_A);
                foreach ($id as $i)
                {
                    ?><tr><td><a href="<?=get_category_link($i)?>"><?echo $row['categ_url'];?></a></td></tr><?
                }
            }?>
        </table>
        <table class="widget-footer2">
            <tr><th>url_1</td></th>
            <?
            foreach ($result_url_1 as $row)
            {
                $r = $row['url_1'];
                $sql = "SELECT `url_1_id` FROM `wp_wc_add_categories` WHERE `url_1`='$r'";
                $id = $wpdb->get_row($sql, ARRAY_A);
                foreach ($id as $i)
                {
                    ?><tr><td><a href="<?=get_category_link($i)?>"><?echo $row['url_1'];?></a></td></tr><?
                }
            }?>
        </table>
        <table class="widget-footer1">
            <tr><th>url_2</td></th>
            <?
            foreach ($result_url_2 as $row)
            {
                $r = $row['url_2'];
                $sql = "SELECT `url_2_id` FROM `wp_wc_add_categories` WHERE `url_2`='$r'";
                $id = $wpdb->get_row($sql, ARRAY_A);
                foreach ($id as $i)
                {
                    ?><tr><td><a href="<?=get_category_link($i)?>"><?echo $row['url_2'];?></a></td></tr><?
                }
            }?>
        </table>
        <?

    }
 
  
    /**
      * Sanitize widget form values as they are saved.
      *
      * @see WP_Widget::update()
      *
      * @param array $new_instance Values just sent to be saved.
      * @param array $old_instance Previously saved values from database.
      *
      * @return array Updated safe values to be saved.
      */
    public function update( $new_instance, $old_instance ) {       
        
         
        $instance = $old_instance;
         
        $instance['title'] = strip_tags( $new_instance['title'] );
        return $instance;
         
    }
  
    /**
      * Back-end widget form.
      *
      * @see WP_Widget::form()
      *
      * @param array $instance Previously saved values from database.
      */
    public function form( $instance ) {    
        
        $title      = esc_attr( $instance['title'] );
        ?>
         
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        
        
     
    <?php 
    }
     
}
 
/* Register the widget */
add_action( 'widgets_init', function(){
     register_widget( 'TutsplusText_Widget' );
});



if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if (function_exists('add_theme_support')) {
    add_theme_support('menus');
   }
   
add_action('woocommerce_before_main_content', 'wp_nav_menu', 10);

/// API part

add_action('rest_api_init', function() {
    register_rest_route('wl/v1', 'get/(?P<slug>[a-zA-Z0-9-]+)', [
        'methods' => 'GET',
        'callback' => 'wl_get',
    ]);
    register_rest_route('wl/v1', 'post', [
        'methods' => 'POST',
        'callback' => 'wl_post',
    ]);
});

function wl_get($slug) {
    global $wpdb;
    $wpdb->suppress_errors(false);
    // execute query here
    if($wpdb->last_error !== '') :
        $wpdb->print_error();
    endif;
    $slug = (int)$slug['slug'];
    $result=$wpdb->get_results("SELECT `id_product` FROM `wp_wc_add_parameters` WHERE `articul_product`='$slug'");
    return $result;
}

function wl_post( $request ) {
    // Get sent data and set default value

    $params = wp_parse_args( $request->get_params(), [
        'id_product' => null,
        'articul_product' => null,
        'type' => '',
        'id_complect' => null,
        'articul_complect' => null,
        'complectation' => '',
        'manufacturer' => '',
        'parameter_1' => '',
        'parameter_2' => ''
    ] );

    if ($params['type'] == '') {
        $params = wp_parse_args( $request->get_params(), [
            'country_id' => null,
            'auto_url_id' => null,
            'model_url_id' => null,
            'url_1_id' => null,
            'url_2_id' => null,
            'categ_url_id' => null,
            'brand_url_id' => null,
            'country' => '',
            'auto_url' => '',
            'model_url' => '',
            'categ_url' => '',
            'url_1' => '',
            'url_2' => '',
            'brand_url' => '',
        ] );

        $country_id = $params['country_id'];
        $auto_url_id = $params['auto_url_id'];
        $model_url_id = $params['model_url_id'];
        $url_1_id = $params['url_1_id'];
        $url_2_id = $params['url_2_id'];
        $categ_url_id = $params['categ_url_id'];
        $brand_url_id = $params['brand_url_id'];
        $country = $params['country'];
        $auto_url = $params['auto_url'];
        $model_url = $params['model_url'];
        $categ_url = $params['categ_url'];
        $url_1 = $params['url_1'];
        $url_2 = $params['url_2'];
        $brand_url = $params['brand_url'];

        global $wpdb;
        $wpdb->suppress_errors(false);
        // execute query here
        if($wpdb->last_error !== '') :
            $wpdb->print_error();
        endif;
        if ($url_1_id == null && $url_2_id == null) {
            $done = $wpdb->query("INSERT INTO `wp_wc_add_categories` (`country_id`, `auto_url_id`, `model_url_id`, `categ_url_id`, `brand_url_id`, `country`, `auto_url`, `model_url`, `categ_url`, `url_1`, `url_2`, `brand_url`) VALUES ('$country_id', '$auto_url_id', '$model_url_id', '$categ_url_id', '$brand_url_id', '$country', '$auto_url', '$model_url', '$categ_url', '$url_1', '$url_2', '$brand_url')");
        } elseif ($url_1_id == null) {
            $done = $wpdb->query("INSERT INTO `wp_wc_add_categories` (`country_id`, `auto_url_id`, `model_url_id`, `url_2_id`, `categ_url_id`, `brand_url_id`, `country`, `auto_url`, `model_url`, `categ_url`, `url_1`, `url_2`, `brand_url`) VALUES ('$country_id', '$auto_url_id', '$model_url_id', '$url_2_id', '$categ_url_id', '$brand_url_id', '$country', '$auto_url', '$model_url', '$categ_url', '$url_1', '$url_2', '$brand_url')");
        } elseif ($url_2_id == null) {
            $done = $wpdb->query("INSERT INTO `wp_wc_add_categories` (`country_id`, `auto_url_id`, `model_url_id`, `url_1_id`, `categ_url_id`, `brand_url_id`, `country`, `auto_url`, `model_url`, `categ_url`, `url_1`, `url_2`, `brand_url`) VALUES ('$country_id', '$auto_url_id', '$model_url_id', '$url_1_id', '$categ_url_id', '$brand_url_id', '$country', '$auto_url', '$model_url', '$categ_url', '$url_1', '$url_2', '$brand_url')");
        } else {
            $done = $wpdb->query("INSERT INTO `wp_wc_add_categories` (`country_id`, `auto_url_id`, `model_url_id`, `url_1_id`, `url_2_id`, `categ_url_id`, `brand_url_id`, `country`, `auto_url`, `model_url`, `categ_url`, `url_1`, `url_2`, `brand_url`) VALUES ('$country_id', '$auto_url_id', '$model_url_id', '$url_1_id', '$url_2_id', '$categ_url_id', '$brand_url_id', '$country', '$auto_url', '$model_url', '$categ_url', '$url_1', '$url_2', '$brand_url')");
        }
        
        return $params;
    }
    else {
        global $wpdb;
        $wpdb->suppress_errors(false);
        // execute query here
        if($wpdb->last_error !== '') :
            $wpdb->print_error();
        endif;
        $id_pr = (int)$params['id_product'];
        $articul_pr = (int)$params['articul_product'];
        $type = $params['type'];
        $id_cp = (int)$params['id_complect'];
        $articul_cp = (int)$params['articul_complect'];
        $complectation = $params['complectation'];
        $manufacturer = $params['manufacturer'];
        $parameter_1 = $params['parameter_1'];
        $parameter_2 = $params['parameter_2'];
        $done = $wpdb->query("INSERT INTO `wp_wc_add_parameters` (`id_product`, `articul_product`, `type`, `id_complect`, `articul_complect`, `complectation`, `manufacturer`, `parameter_1`, `parameter_2`) VALUES ('$id_pr', '$articul_pr', '$type', '$id_cp', '$articul_cp', '$complectation', '$manufacturer', '$parameter_1', '$parameter_2')");
        return $params;
    }
}



/// The changes wp pages
//add_action( 'woocommerce_after_single_product_summary', 'woocommerce_template_loop_add_to_cart', 33 );
add_action('woocommerce_after_single_product_summary','replace_add_to_cart', 15);
function replace_add_to_cart() {
    global $post;
    $id = $post->ID;
    global $product;
    $conn = new mysqli("localhost", "admin_57292", "2f9cf02aa3d288ab0968", "admin_57292");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $sql = "SELECT id_product, type FROM wp_wc_add_parameters WHERE id_complect=$id";
    $result = $conn->query($sql);

    include 'replace_add_to_cart.php';
}


add_action('woocommerce_single_product_summary', 'parameter1_complectation', 30);

function parameter1_complectation() {
    global $post;
    $id = $post->ID;
    global $product;
    $conn = new mysqli("localhost", "admin_57292", "2f9cf02aa3d288ab0968", "admin_57292");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $sql = "SELECT complectation, parameter_1, type FROM wp_wc_add_parameters WHERE id_product=$id";
    $result = $conn->query($sql);

    include 'parameter1_complectation.php';
}

add_action('woocommerce_after_single_product_summary', 'parameter2');

function parameter2() {
    global $post;
    $id = $post->ID;
    global $product;
    $conn = new mysqli("localhost", "admin_57292", "2f9cf02aa3d288ab0968", "admin_57292");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $sql = "SELECT parameter_2, manufacturer, type FROM wp_wc_add_parameters WHERE id_product=$id";
    $result = $conn->query($sql);

    include 'parameter2.php';
}


