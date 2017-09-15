<?php
/**
 * @package WordPress
 * @subpackage Hue
 * @since Hue 1.0
 */

defined('ABSPATH') or die();
 
$sidebar=get_query_var('sidebar');
dynamic_sidebar($sidebar);
?>