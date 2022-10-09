<?php
/*
Template Name: Товары
*/

get_header();

$args = array(
    'numberposts' => -1,
    'post_type'   => 'products'
);

$products = get_posts( $args );

$seo = get_field('seo_block');
$form_code = get_field('form_code');

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
    Товары
</h1>
<div class="page_categories">
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
                        <!-- <time class="projects__slide_date">
<?= get_the_date(); ?>
                        </time> -->
                        <h3 class="projects__slide_name">
                            <?= get_field('name'); ?>
                        </h3>
                        <p class="projects__slide_text">
                            <?= get_field('description'); ?>
                        </p>
                        <p class="projects__slide_price">
							<span class="from">от</span>
							<span class="price">
								<?= get_field('price'); ?>
							</span>
						</p>
                    </div>
                    <? if (!empty($form_code)) { ?>
                        <div class="button projects__button" data-modal-id="<?= get_the_ID(); ?>" data-product-link="<?= get_post_permalink(); ?>">
                            Заказать
                        </div>
                    <? }; ?>
                </article>
                <div class="modal" data-modal="<?= get_the_ID(); ?>">
                    <div class="modal__in">
                        <div class="modal__closer" @click="modals.closeAllModals">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 30 30" fill="none">
                                <path d="M16.7619 15.0002L24.6369 7.13773C24.8723 6.90235 25.0045 6.58311 25.0045 6.25023C25.0045 5.91735 24.8723 5.59811 24.6369 5.36273C24.4016 5.12735 24.0823 4.99512 23.7494 4.99512C23.4166 4.99512 23.0973 5.12735 22.8619 5.36273L14.9994 13.2377L7.13694 5.36273C6.90156 5.12735 6.58231 4.99512 6.24944 4.99512C5.91656 4.99512 5.59732 5.12735 5.36194 5.36273C5.12656 5.59811 4.99432 5.91735 4.99432 6.25023C4.99432 6.58311 5.12656 6.90235 5.36194 7.13773L13.2369 15.0002L5.36194 22.8627C5.24477 22.9789 5.15178 23.1172 5.08832 23.2695C5.02486 23.4218 4.99219 23.5852 4.99219 23.7502C4.99219 23.9152 5.02486 24.0786 5.08832 24.231C5.15178 24.3833 5.24477 24.5215 5.36194 24.6377C5.47814 24.7549 5.61639 24.8479 5.76871 24.9113C5.92104 24.9748 6.08442 25.0075 6.24944 25.0075C6.41445 25.0075 6.57783 24.9748 6.73016 24.9113C6.88248 24.8479 7.02073 24.7549 7.13694 24.6377L14.9994 16.7627L22.8619 24.6377C22.9781 24.7549 23.1164 24.8479 23.2687 24.9113C23.421 24.9748 23.5844 25.0075 23.7494 25.0075C23.9144 25.0075 24.0778 24.9748 24.2302 24.9113C24.3825 24.8479 24.5207 24.7549 24.6369 24.6377C24.7541 24.5215 24.8471 24.3833 24.9106 24.231C24.974 24.0786 25.0067 23.9152 25.0067 23.7502C25.0067 23.5852 24.974 23.4218 24.9106 23.2695C24.8471 23.1172 24.7541 22.9789 24.6369 22.8627L16.7619 15.0002Z" fill="black"/>
                            </svg>
                        </div>
                        <div class="modal__in-content">
                            <div class="modal__form">
                                <?= do_shortcode($form_code); ?>
                                <div class="modal__title">
                                    Заказать товар
                                </div>
                                <div class="modal__product">
                                    <div class="modal__product_left">
                                        <?
                                                $image = get_field('image');
                                                $size = 'medium';
                                                $alt = $image['alt'];

                                                $thumb = $image['sizes'][ $size ];

                                                if( $image ):
                                            ?>
                                                <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" />
                                            <?php endif; ?>
                                    </div>
                                    <div class="modal__product_right">
                                        <div class="name"><?= get_field('name'); ?></div>
                                        <div class="price"><?= get_field('price'); ?></div>
                                    </div>
                                </div>
                                <div class="modal__success">
                                    <div class="title">
                                        <span>Спасибо</span>, ваш заказ успешно оформлен
                                    </div>
                                    <div class="description">
                                        <div>Наш менеджер свяжется</div>
                                        <div>с вами в течении нескольких часов</div>
                                    </div>
                                    <a href="/" class="button">Вернутся на главную</a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            <?php } ?>
        <?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
    </div>
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