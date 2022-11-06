<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package auvint
 */
$site_socials = get_theme_mod('site_socials');
$site_socials_decoded = json_decode($site_socials);


?>
<footer class="footer">
    <div class="footer__top">
        <div class="footer__in center">
            <div class="footer__left">
                <a href="#" class="footer__logo">
                    <img src="<?= get_template_directory_uri();?>/src/dist/img/svg/logo.svg" width="100%" alt="">
                </a>
                <nav class="footer__mobile_menu" v-if="sizes.window <= 1280">
                <?
                        wp_nav_menu( [
                            'theme_location'  => '',
                            'menu'            => 'Меню футер 1',
                            'container'       => 'nav',
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
                    <?
                        wp_nav_menu( [
                            'theme_location'  => '',
                            'menu'            => 'Меню футер 2',
                            'container'       => 'nav',
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
                    <?
                        wp_nav_menu( [
                            'theme_location'  => '',
                            'menu'            => 'Меню футер 3',
                            'container'       => 'nav',
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
                </nav>
                <ul class="footer__info_items">
                    <li class="footer__info_item">ООО Аувинт</li>
                    <li class="footer__info_item">ИНН 3849081686</li>
                    <li class="footer__info_item">КПП 384901001</li>
                </ul>
                <?php if( $site_socials_decoded ) { ?>
                    <div class="footer__socials">
                        <?php foreach ($site_socials_decoded as $icon) { ?>                            
                            <a href="<?= $icon->link; ?>" target="_blank" class="footer__social">
                                <img src="<?= $icon->image_url; ?>"
                                    alt="">
                            </a>
                        <?php }; ?>
                    </div>
                <?php }; ?>
            </div>
            <div class="footer__right" v-if="sizes.window > 1280">
                <nav class="footer__menu">
                    <?
                        wp_nav_menu( [
                            'theme_location'  => '',
                            'menu'            => 'Меню футер 1',
                            'container'       => 'nav',
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
                    <?
                        wp_nav_menu( [
                            'theme_location'  => '',
                            'menu'            => 'Меню футер 2',
                            'container'       => 'nav',
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
                    <?
                        wp_nav_menu( [
                            'theme_location'  => '',
                            'menu'            => 'Меню футер 3',
                            'container'       => 'nav',
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
                </nav>
            </div>
        </div>
    </div>
    <div class="header__top">
        <div class="header__top_in center">
            <div class="header__top_left">
                <span class="footer__bottom_link">Компания Аувинт | 2010-2022</span>
                <span class="footer__bottom_link">Все права защищены</span>
                
                <a href="<?= get_privacy_policy_url(); ?>" class="footer__bottom_link">Политика в отношении обработки персональных данных</a>
            </div>
        </div>
    </div>
</footer>
</div>
<?php wp_footer(); ?>
</body>

</html>