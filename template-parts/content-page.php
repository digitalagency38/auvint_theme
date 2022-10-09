<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package auvint
 */

$post_type = get_post_type();

?>

<div class="breadcrumbs">
    <div class="breadcrumbs__in center">
        <?php if(function_exists('bcn_display'))
        {
            bcn_display();
        }?>
    </div>
	</div>
	<?php
		if ( is_singular() ) :
			the_title( '<h1 class="page__title center">', '</h1>' );
		else :
			the_title( '<h1 class="page__title center"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
		endif;
	?>
	<div class="contentPage noPadding" id="content">
		<div class="contentPage__in center">
			<div class="contentPage__editor">
				<?php
					the_content(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'auvint' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							wp_kses_post( get_the_title() )
						)
					);
				?>
			</div>
		</div>
	</div>