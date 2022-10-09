<?php
/*
Template Name: Портфолио
*/

get_header();

$args = array(
    'numberposts' => -1,
    'post_type'   => 'portfolio'
);

$products = get_posts( $args );

$seo = get_field('seo_block');

?>

<div class="breadcrumbs">
    <div class="breadcrumbs__in center">
        <?php if(function_exists('bcn_display'))
        {
            bcn_display();
        }?>
    </div>
</div>
<h1 class="page__title center">
    Портфолио
</h1>
<div class="page_categories hasPadding">
    <div class="page_categories__in center">
        <? foreach ($products as $post) { // Переменная должна быть названа обязательно $post (IMPORTANT) ?>
            <?php setup_postdata($post); ?>
                <article class="projects__slide">
                    <div class="projects__slide_top">
                        <div class="projects__slide_image">
                            <div class="projects__slide_image--in">
                                <?
                                    $image = get_field('image');
                                    $size = 'large';
                                    $alt = $image['alt'];
                                    $thumb = $image['sizes'][ $size ];

                                    if( $image ):
                                ?>
                                    <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" />
                                <?php endif; ?>
                            </div>
                        </div>
                        <time class="projects__slide_date">
                            <!--<?= get_field('date'); ?>-->
<?= get_the_date(); ?>
                        </time>
                        <h3 class="projects__slide_name">
                            <?= get_field('name'); ?>
                        </h3>
                        <p class="projects__slide_text">
                            <?= get_field('description'); ?>
                        </p>
                    </div>
                    <a href="<?= get_post_permalink(); ?>" class="projects__slide_bottom">
                        <div class="text">Подробнее</div>
                        <div class="arrow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34" fill="#6297BC">
                                <path d="M23.1832 15.8166C23.3349 15.9751 23.4538 16.162 23.5332 16.3666C23.6999 16.7724 23.6999 17.2275 23.5332 17.6333C23.4538 17.8378 23.3349 18.0247 23.1832 18.1833L18.1832 23.1833C17.8693 23.4971 17.4437 23.6734 16.9998 23.6734C16.556 23.6734 16.1303 23.4971 15.8165 23.1833C15.5027 22.8694 15.3264 22.4438 15.3264 21.9999C15.3264 21.5561 15.5027 21.1304 15.8165 20.8166L17.9832 18.6666H11.9998C11.5578 18.6666 11.1339 18.491 10.8213 18.1784C10.5088 17.8659 10.3332 17.4419 10.3332 16.9999C10.3332 16.5579 10.5088 16.134 10.8213 15.8214C11.1339 15.5088 11.5578 15.3333 11.9998 15.3333H17.9832L15.8165 13.1833C15.6603 13.0283 15.5363 12.844 15.4517 12.6409C15.3671 12.4378 15.3235 12.2199 15.3235 11.9999C15.3235 11.7799 15.3671 11.5621 15.4517 11.359C15.5363 11.1559 15.6603 10.9715 15.8165 10.8166C15.9714 10.6604 16.1558 10.5364 16.3589 10.4518C16.562 10.3672 16.7798 10.3236 16.9998 10.3236C17.2199 10.3236 17.4377 10.3672 17.6408 10.4518C17.8439 10.5364 18.0282 10.6604 18.1832 10.8166L23.1832 15.8166ZM33.6665 16.9999C33.6665 20.2963 32.689 23.5186 30.8577 26.2594C29.0263 29.0002 26.4233 31.1365 23.3779 32.3979C20.3325 33.6594 16.9813 33.9894 13.7483 33.3463C10.5153 32.7033 7.5456 31.1159 5.21472 28.785C2.88385 26.4542 1.2965 23.4844 0.653412 20.2514C0.0103264 17.0184 0.340382 13.6673 1.60184 10.6219C2.8633 7.57643 4.99951 4.97345 7.74033 3.14209C10.4812 1.31073 13.7035 0.333252 16.9998 0.333252C19.1885 0.333252 21.3558 0.764348 23.3779 1.60193C25.4 2.4395 27.2373 3.66716 28.785 5.21481C31.9106 8.34041 33.6665 12.5796 33.6665 16.9999ZM3.6665 16.9999C3.6665 19.637 4.44849 22.2149 5.91358 24.4075C7.37866 26.6002 9.46104 28.3091 11.8974 29.3183C14.3337 30.3275 17.0146 30.5915 19.601 30.0771C22.1875 29.5626 24.5632 28.2927 26.4279 26.428C28.2926 24.5633 29.5625 22.1875 30.077 19.6011C30.5914 17.0147 30.3274 14.3338 29.3182 11.8975C28.3091 9.46113 26.6001 7.37874 24.4074 5.91366C22.2148 4.44857 19.6369 3.66659 16.9998 3.66659C13.4636 3.66659 10.0722 5.07134 7.57174 7.57183C5.07126 10.0723 3.6665 13.4637 3.6665 16.9999Z"/>
                            </svg>
                        </div>
                    </a>
                </article>
            <?php } ?>
        <?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
    </div>
<div class="button projects__button projects__button__more">Загрузить ещё</div>
</div>

<? if (!empty($seo)) { ?>
    <div class="seo_block">
        <div class="seo_block__in center">
            <div class="seo_block__title"><?= $seo['title']; ?></div>
            <div class="seo_block__text">
                <?= $seo['text']; ?>
            </div>
        </div>
    </div>
<? }; ?>

<?php
    get_footer();
?>