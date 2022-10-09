<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package skygold
 */


$args = array(
    'numberposts' => 7,
    'post_type'   => 'categories'
);


$site_socials = get_theme_mod('site_socials');
$site_socials_decoded = json_decode($site_socials);

$latest_categories = get_posts( $args );


$all_args = array(
    'numberposts' => -1,
    'post_type'   => 'categories'
);


$latest_categories_all = get_posts( $all_args );




$site_email = get_option('site_email');
$site_phone = get_option('site_phone');
$site_hot = get_option('site_hot');
$site_address = get_option('site_address');

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="noindex, nofollow" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_theme_file_uri(); ?>/style.css">
    <?php wp_head(); ?>
    <style>
        .projects__button__more {
            margin-left: auto;
            margin-right: auto;
            max-width: 466px;
            width: 100%;
            margin-top: 40px;
            display: block;
        }
    </style>
	<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function(){
        const ITEMS_COUNT_PER_CLICK = 12;

        const showButton = document.querySelector('.projects__button__more');
        const items = document.querySelectorAll('.projects__slide');
        const itemsCount = items.length;
        let i = ITEMS_COUNT_PER_CLICK;

        for (; i < itemsCount; ++i) {
        items[i].style.display = 'none';
        }

        i = ITEMS_COUNT_PER_CLICK;

        const callback = (event) => {
        if (i >= itemsCount) {
        alert('Больше товаров нет!');
        showButton.removeEventListener('click', callback);
        showButton.outerHTML = '';
        return;
        }

        items[i++].style.display = '';  
        items[i++].style.display = '';  
        items[i++].style.display = '';  
        items[i++].style.display = '';  
        items[i++].style.display = '';  
        if (i < itemsCount) {
        items[i++].style.display = '';
        }
        };

        showButton.addEventListener('click', callback);
    });
    </script>

</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div class="wrapper" id="app" :class="{isMobile, isTablet}">
        <div class="preloader" :class="{isLoaded}">
            <div class="preloader__in">
                <img src="<?= get_template_directory_uri();?>/src/dist/img/svg/preloader.svg" width="100%">
            </div>
        </div>
        <header class="header" :class="{ 'isMobile': sizes.window <= 1280 }">
            <div class="header__top" v-if="sizes.window > 1280">
                <div class="header__top_in center">
                    <div class="header__top_left">
                        Инженерные решения любой сложности и широкий ассортимент товаров в наличии
                    </div>
                    <div class="header__top_middle">
                        <? if(!empty($site_email)) { ?>
                        <a href="mailto:<?= $site_email; ?>" class="item"><?= $site_email; ?></a>
                        <? }; ?>
                        <? if(!empty($site_email)) { ?>
                        <div class="item"><?= $site_address; ?></div>
                        <? }; ?>
                        <?php if( $site_socials_decoded ) { ?>
                            <div class="header__socials" v-if="sizes.window > 1280">
                                <?php foreach ($site_socials_decoded as $icon) { ?>                            
                                    <a href="<?= $icon->link; ?>" target="_blank" class="header__social">
                                        <img src="<?= $icon->image_url; ?>"
                                            alt="">
                                    </a>
                                <?php }; ?>
                            </div>
                        <?php }; ?>
                    </div>
                </div>
            </div>
            <div class="header__bottom">
                <div class="header__bottom_in center">
                    <a href="/" class="header__bottom_logo">
                        <img src="<?= get_template_directory_uri();?>/src/dist/img/svg/logo.svg" width="100%" alt="">
                    </a>
                    <div class="header__bottom_buttons" v-if="sizes.window <= 1280">
                        <div class="header__bottom_button header__bottom_button--phone" @click="header.toggleMobilePhones.apply(header)">
                            <img src="<?= get_template_directory_uri();?>/src/dist/img/svg/phone_opener.svg"
                                width="100%" alt=""  v-if="!header.isMobilePhonesOpened">
                            <img src="<?= get_template_directory_uri();?>/src/dist/img/svg/phone.svg"
                                width="100%" alt="" v-else>
                        </div>
                        <div class="header__bottom_button header__bottom_button--search" @click="header.toggleMobileSearch.apply(header)">
                            <img src="<?= get_template_directory_uri();?>/src/dist/img/svg/search_opener.svg"
                                width="100%" alt="" v-if="!header.isMobileSearchOpened">
                            <img src="<?= get_template_directory_uri();?>/src/dist/img/svg/search_closer.svg"
                                width="100%" alt="" v-else>
                        </div>
                        <div class="header__bottom_button header__bottom_button--burger"
                            @click="header.toggleMobileMenu.apply(header)">
                            <img src="<?= get_template_directory_uri();?>/src/dist/img/svg/burger_opener.svg"
                                width="100%" alt="" v-if="!header.isMobileMenuOpened">
                            <img src="<?= get_template_directory_uri();?>/src/dist/img/svg/burger_closer.svg"
                                width="100%" alt="" v-else>
                        </div>
                    </div>
                    <div class="header__bottom_search" v-if="sizes.window > 1280">
                        <?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
                        <!-- <input type="text" class="input">
                <button class="search">
                    <img src="<?= get_template_directory_uri();?>/src/dist/img/svg/search.svg" width="100%" alt="">
                </button> -->
                    </div>
                    <div class="header__bottom_phones" v-if="sizes.window > 1280">
                        <? if(!empty($site_phone)) { ?>
                        <a href="tel:<?= $site_phone; ?>"><?= $site_phone; ?></a>
                        <? }; ?>
                        <? if(!empty($site_hot)) { ?>
                        <a href="tel:<?= $site_hot; ?>"><?= $site_hot; ?></a>
                        <? }; ?>
                    </div>
                </div>
            </div>
            <div class="header__menu" v-if="sizes.window > 1280">
                <div class="header__menu_in center">
                    <div class="header__menu_catalog">
                        <div class="header__menu_catalog_opener" @click="header.toggleModal.apply(header)">
                            <div class="text">Каталог</div>
                            <div class="arrow">
                                <img src="<?= get_template_directory_uri();?>/src/dist/img/svg/arrow.svg" width="100%"
                                    alt="">
                            </div>
                        </div>
                    </div>
                    <?
                wp_nav_menu( [
                    'theme_location'  => '',
                    'menu'            => 'Меню в шапке',
                    'container'       => 'nav',
                    'container_class' => 'header__menu_links',
                    'container_id'    => '',
                    'menu_class'      => 'menu',
                    'menu_id'         => '',
                    'echo'            => true,
                    'fallback_cb'     => 'wp_page_menu',
                    'before'          => '',
                    'after'           => '',
                    'link_before'     => '<span>',
                    'link_after'      => '</span>',
                    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth'           => 0,
                    'walker'          => '',
                ] );
            ?>
                </div>
            </div>
            <div class="header__catalog" v-if="sizes.window > 1280" :class="{'isOpened': header.isModalOpened}"
                v-if="sizes.window > 1280">
                <div class="header__catalog_in center">
                    <div class="header__catalog_items">
                        <? foreach ($latest_categories as $post) { // Переменная должна быть названа обязательно $post (IMPORTANT) ?>
                        <?php setup_postdata($post); ?>
                        <a href="<?= get_post_permalink(); ?>" class="header__catalog_item">
                            <div class="header__catalog_image">
                                <img src='<?= get_field('image'); ?>' alt='' />
                            </div>
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
                        <? if (count($latest_categories) > 6) { ?>
                        <a href="/catalog-tovarov/" class="header__catalog_link">Смотреть все товары</a>
                        <? }; ?>
                    </div>
                </div>
            </div>
            <div class="header__mobileMenu" :class="{'isOpened': header.isMobileMenuOpened}"
                v-if="sizes.window <= 1280">
                <div class="header__mobileMenu_catalog_opener" :class="{'isOpened': header.isMobileCatalogOpened}"
                    @click="header.toggleMobileCatalog.apply(header)">
                    <div class="text">Каталог</div>
                    <div class="arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 30 30" fill="none">
                            <path
                                d="M15.0006 15.8875L10.5756 11.4625C10.3414 11.2297 10.0246 11.099 9.69436 11.099C9.36412 11.099 9.04731 11.2297 8.81311 11.4625C8.69595 11.5787 8.60295 11.7169 8.53949 11.8693C8.47603 12.0216 8.44336 12.185 8.44336 12.35C8.44336 12.515 8.47603 12.6784 8.53949 12.8307C8.60295 12.983 8.69595 13.1213 8.81311 13.2375L14.1131 18.5375C14.2293 18.6546 14.3676 18.7476 14.5199 18.8111C14.6722 18.8746 14.8356 18.9072 15.0006 18.9072C15.1656 18.9072 15.329 18.8746 15.4813 18.8111C15.6337 18.7476 15.7719 18.6546 15.8881 18.5375L21.2506 13.2375C21.3665 13.1207 21.4581 12.9822 21.5203 12.8299C21.5825 12.6776 21.6141 12.5145 21.6131 12.35C21.6141 12.1855 21.5825 12.0224 21.5203 11.8701C21.4581 11.7178 21.3665 11.5793 21.2506 11.4625C21.0164 11.2297 20.6996 11.099 20.3694 11.099C20.0391 11.099 19.7223 11.2297 19.4881 11.4625L15.0006 15.8875Z"
                                fill="white" />
                        </svg>
                    </div>
                </div>
                <div class="header__mobileСatalog" :class="{'isOpened': header.isMobileCatalogOpened}">
                    <div class="header__mobileСatalog_items">
                        <? foreach ($latest_categories_all as $post) { // Переменная должна быть названа обязательно $post (IMPORTANT) ?>
                        <?php setup_postdata($post); ?>
                        <a href="<?= get_post_permalink(); ?>" class="header__mobileСatalog_item">
                            <div class="header__mobileСatalog_image">
                                <div class="header__mobileСatalog_image_in">
                                    <img src='<?= get_field('image'); ?>' alt='' />
                                </div>
                            </div>
                            <div class="header__mobileСatalog_info">
                                <div class="header__mobileСatalog_name"><?= get_field('name'); ?></div>
                            </div>
                        </a>
                        <?php } ?>
                        <?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
                    </div>
                </div>
                <?
            wp_nav_menu( [
                'theme_location'  => '',
                'menu'            => 'Меню в шапке',
                'container'       => 'nav',
                'container_class' => 'header__mobile_links',
                'container_id'    => '',
                'menu_class'      => 'menu',
                'menu_id'         => '',
                'echo'            => true,
                'fallback_cb'     => 'wp_page_menu',
                'before'          => '',
                'after'           => '',
                'link_before'     => '<span>',
                'link_after'      => '</span>',
                'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'depth'           => 0,
                'walker'          => '',
            ] );
        ?>
                <div class="header__mobileMenu_footer">
                    <div class="header__mobileMenu_footer-title header__mobileMenu_footer-item">
                        Инженерные решения любой сложности и широкий ассортимент товаров в наличии
                    </div>
                    <a href="mailto:opt@auvint.ru"
                        class="header__mobileMenu_footer-email header__mobileMenu_footer-item">
                        opt@auvint.ru
                    </a>
                    <div class="header__mobileMenu_footer-address header__mobileMenu_footer-item">
                        г. Иркутск, ул. Баррикад, 55
                    </div>
                    <div class="header__socials">
                        <a href="#" target="_blank" class="header__social">
                            <img src="<?= get_template_directory_uri();?>/src/dist/img/svg/instagram_white.svg" alt="">
                        </a>
                        <a href="#" target="_blank" class="header__social">
                            <img src="<?= get_template_directory_uri();?>/src/dist/img/svg/instagram_white.svg" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="header__mobileMenu header__mobileMenu--search" :class="{'isOpened': header.isMobileSearchOpened}"
                v-if="sizes.window <= 1280">
                <div class="header__mobileMenu_search">
                    <?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
                </div>
                <div class="header__mobileMenu_footer">
                    <div class="header__mobileMenu_footer-title header__mobileMenu_footer-item">
                        Инженерные решения любой сложности и широкий ассортимент товаров в наличии
                    </div>
                    <a href="mailto:opt@auvint.ru"
                        class="header__mobileMenu_footer-email header__mobileMenu_footer-item">
                        opt@auvint.ru
                    </a>
                    <div class="header__mobileMenu_footer-address header__mobileMenu_footer-item">
                        г. Иркутск, ул. Баррикад, 55
                    </div>
                    <div class="header__socials">
                        <a href="#" target="_blank" class="header__social">
                            <img src="<?= get_template_directory_uri();?>/src/dist/img/svg/instagram_white.svg" alt="">
                        </a>
                        <a href="#" target="_blank" class="header__social">
                            <img src="<?= get_template_directory_uri();?>/src/dist/img/svg/instagram_white.svg" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="header__mobileMenu header__mobileMenu--search" :class="{'isOpened': header.isMobilePhonesOpened}"
                v-if="sizes.window <= 1280">
                <div class="header__mobileMenu_search">
                <? if(!empty($site_phone)) { ?>
                    <div class="header__mobileMenu_phone">
                        <div class="title">Телефон</div>
                        <a href="tel:<?= $site_phone; ?>"><?= $site_phone; ?></a>
                        <? }; ?>
                    </div>
                    <div class="header__mobileMenu_phone">
                        <div class="title">Горячая линия</div>
                        <? if(!empty($site_hot)) { ?>
                        <a href="tel:<?= $site_hot; ?>"><?= $site_hot; ?></a>
                        <? }; ?>
                    </div>
                </div>
                <div class="header__mobileMenu_footer">
                    <div class="header__mobileMenu_footer-title header__mobileMenu_footer-item">
                        Инженерные решения любой сложности и широкий ассортимент товаров в наличии
                    </div>
                    <a href="mailto:opt@auvint.ru"
                        class="header__mobileMenu_footer-email header__mobileMenu_footer-item">
                        opt@auvint.ru
                    </a>
                    <div class="header__mobileMenu_footer-address header__mobileMenu_footer-item">
                        г. Иркутск, ул. Баррикад, 55
                    </div>
                    <div class="header__socials">
                        <a href="#" target="_blank" class="header__social">
                            <img src="<?= get_template_directory_uri();?>/src/dist/img/svg/instagram_white.svg" alt="">
                        </a>
                        <a href="#" target="_blank" class="header__social">
                            <img src="<?= get_template_directory_uri();?>/src/dist/img/svg/instagram_white.svg" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </header>