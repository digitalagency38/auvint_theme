<?php
/*
Template Name: Категории товаров
*/

get_header();

$args = array(
    'numberposts' => -1,
    'post_type'   => 'categories'
);

$categories = get_posts( $args );

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
    Каталог товаров
</h1>
<div class="page_categories">
    <div class="page_categories__in center">
            <? foreach ($categories as $post) { // Переменная должна быть названа обязательно $post (IMPORTANT) ?>
                <?php setup_postdata($post); ?>
                    <a href="<?= get_post_permalink(); ?>" class="header__catalog_item">
                        <div class="header__catalog_image"><img src="<?= get_field('image'); ?>" alt=""></div>
                        <div class="header__catalog_info">
                            <div class="header__catalog_name"><?= get_field('name'); ?></div>
                            <div class="header__catalog_price">
                                <div class="from">от</div>
                                <div class="price"><?= get_field('price'); ?></div>
                            </div>
                            <div class="header__catalog_more">
                                Подробнее
                            </div>
                        </div>
                    </a>
                <?php } ?>
            <?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
    </div>
</div>

<!-- <main>
            <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, soluta.</span>
            <button data-modal-id="1">Modal1 Opener</button>
            <button data-modal-id="2">Modal2 Opener</button>
            <img src="img/icons/icons.svg#benefit_1" alt="benefit_1"/>
            <picture><source srcset="img/download.webp" type="image/webp"><img src="img/download.png" width="100" alt=""></picture>
            {{ isMounted }}
        </main> -->
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