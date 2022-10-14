<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

	<div id="primary" <?php astra_primary_class(); ?>>

		<?php astra_primary_content_top(); ?>

		<?php astra_content_page_loop(); ?>

        <?php
        $host="localhost";
        $username="root";
        $password="";
        $database="wp_rads";

        $link=mysqli_connect($host,$username,$password,$database);

        if($_POST['submit']) {
            if ($link->connect_error) {
                die("Connection failed: " . $link->connect_error);
            }
            $sql = "INSERT INTO wp_test (test_data) VALUES ('".$_POST['test_data']."')";
            if ($link->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $link->error;
            }
            $link->close();
        } else {
        ?>
            <form id="formid" action="" method="POST">
                <input type="text" name="test_data" value="" />
                <input type="submit" name="submit" value="submit" />
            </form>
        <?php
        }

        /*
        if($_POST['submit']) {
            // we will add the code to process submitted form here
            // we can also echo some text here if form is submitted
            global $wpdb;
            $tablename = $wpdb->prefix.'test';
            $wpdb->insert( $tablename, array('test_data' => $_POST['test_data']), array('%s'));
        } else {
        ?>
            <form id="formid" action="" method="POST">
                <input type="text" name="test_data" value="" />
                <input type="submit" name="submit" value="submit" />
            </form>
        <?php
        }
        */
        ?>

		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
