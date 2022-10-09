<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package auvint
 */

get_header();
?>

        <div class="page_error center">
    <div class="page_error__l-side">
        <div class="page_error__title">4<span>0</span>4</div>
        <div class="page_error__text"><span>Упс...</span> Такой странице не сущестует</div>
        <a href="/" class="page_error__link">Вернутся на главную</a>
    </div>
    <div class="page_error__r-side">
        <picture><source srcset="<?php echo get_theme_file_uri(); ?>/img/bg_error.webp" type="image/webp"><img src="<?php echo get_theme_file_uri(); ?>/img/bg_error.png" alt=""></picture>
    </div>
</div>
<?php
get_footer();