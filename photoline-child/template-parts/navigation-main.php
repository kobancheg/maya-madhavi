<?php
/**
 * @package Photoline
 */
?>

<?php 
	if ( has_nav_menu('primary') ) { ?>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<h1 class="menu-toggle"><span class="screen-reader-text"><?php _e( 'Menu', 'photoline' ); ?></span></h1>
<?php
$form = '
	<form role="search" method="get" class="search-form" action="'. esc_url( home_url('/') ).'">
	<label>
		<input type="search" class="search-field" placeholder="Поиск" value="" name="s">
	</label>
	<input type="submit" class="search-submit" value="">
</form>';
		wp_nav_menu(
		array(
			'theme_location' => 'primary',
			'menu_class' => 'nav-menu',
			'container'       => 'div',
			'container_class' => 'menu-main',
            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul><div class="search-top">'.$form.'</div>'
		) ); ?>
		</nav>
<?php
	} ?>