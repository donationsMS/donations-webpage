
<style type="text/css">

<?php
if ( $citylogic_slider_has_min_width ) {
?>

/* Minimum slider width */
.slider-container.default .slider .slide img {
	min-width: <?php echo $citylogic_slider_min_width; ?>px;
}
	
<?php
}
?>

<?php
if ( $citylogic_header_image_has_min_width ) {
?>

/* Minimum slider width */
.header-image img {
	min-width: <?php echo $citylogic_header_image_min_width; ?>px;
}
	
<?php
}
?>

<?php
echo '/* Navigation Menu Rollover Font Color */';
echo '@media only screen and (min-width: ' .$mobile_menu_breakpoint. 'px) {';
?>
	.main-navigation.rollover-font-color .menu > ul > li > a:hover,
	.main-navigation.rollover-font-color ul.menu > li > a:hover,
	.site-header.transparent .site-container .main-navigation.rollover-font-color .menu > ul > li > a:hover,
	.site-header.transparent .site-container .main-navigation.rollover-font-color ul.menu > li > a:hover,
	.main-navigation.rollover-font-color .menu > ul > li.current-menu-item > a,
	.main-navigation.rollover-font-color ul.menu > li.current-menu-item > a,
	.main-navigation.rollover-font-color .menu > ul > li.current_page_item > a,
	.main-navigation.rollover-font-color ul.menu > li.current_page_item > a,
	.main-navigation.rollover-font-color .menu > ul > li.current-menu-parent > a,
	.main-navigation.rollover-font-color ul.menu > li.current-menu-parent > a,
	.main-navigation.rollover-font-color .menu > ul > li.current_page_parent > a,
	.main-navigation.rollover-font-color ul.menu > li.current_page_parent > a,
	.main-navigation.rollover-font-color .menu > ul > li.current-menu-ancestor > a,
	.main-navigation.rollover-font-color ul.menu > li.current-menu-ancestor > a,
	.main-navigation.rollover-font-color .menu > ul > li.current_page_ancestor > a,
	.main-navigation.rollover-font-color ul.menu > ul > li.current_page_ancestor > a,
	.main-navigation.rollover-font-color button,
	.main-navigation.rollover-font-color .search-button a:hover,
	.site-header.transparent .site-container .main-navigation.rollover-font-color .search-button a:hover,
	.main-navigation.rollover-font-color .search-button a:hover .otb-fa-search,
	.site-header.transparent .site-container .main-navigation.rollover-font-color .search-button a:hover .otb-fa-search {
		color: #0082cd !important;
	}
}

</style>
