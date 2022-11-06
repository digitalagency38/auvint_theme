<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package auvint
 */


$post_type = get_post_type();
$post = get_post();
$site_email = get_option('site_email');
$site_phone = get_option('site_phone');
$site_hot = get_option('site_hot');
$site_address = get_option('site_address');
$site_map = get_option('site_map');
$ruk_data = get_field('ruk_data', 6);

if ($post_type === 'services') {
	$benefits = get_field('benefits');
	$projects = get_field('projects');
	$what_give = get_field('what_give');
	$clients = get_field('clients');
	$seo_block = get_field('seo_block');
	$categories = get_field('catalog');
	$form_data = get_field('form_data');
	$form_code = get_field('form_code');
}
if ($post_type === 'categories') {
	$products_list = get_field('products_list');
	$projects = get_field('projects');
	$seo_block = get_field('seo_block');
	$form_data = get_field('form_data');
	$form_code = get_field('form_code');
};

if ($post_type === 'news') {
	$news_list = get_field('news_list');
};

if ($post_type === 'products' || $post_type === 'portfolio') {
	$gallery = get_field('gallery');
	$seo_block = get_field('seo_block');
    $args = array(
        'numberposts' => 6,
        'post_type'   => 'portfolio'
    );

    $portfolio = get_posts( $args );
};

?>
<pre style="display: none;"><?= print_r($ruk_data) ?></pre>
<? if ($post_type === 'categories') { ?>
<div class="pageTop">


	<div class="pageTop__background">
		<?php auvint_post_thumbnail(); ?>
	</div>
	<div class="pageTop__wrap center">
		<div class="pageTop__left">
			<div class="pageTop__src">
				<div class="breadcrumbs" v-if="sizes.window > 1280">
					<div class="breadcrumbs__in">
						<?php if(function_exists('bcn_display'))
			{
				bcn_display();
			}?>
					</div>
				</div>
				<?php
					if ( is_singular() ) :
						the_title( '<h1 class="page__title">', '</h1>' );
					else :
						the_title( '<h1 class="page__title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
					endif;
				?>
				<div class="pageTop__in">
					<div class="pageTop__description">
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
					<a href="#content" class="button pageTop__button">Подробнее</a>
				</div>

				<!-- <h1 class="page__title center">
						Отраслевые решения
					</h1> -->

			</div>

		</div>
		<div class="pageTop__image">
			<img src="<?= get_field('banner_Image'); ?>" alt="">
		</div>
	</div>

</div>
<? if (!empty($products_list)) { ?>
<div class="contentPage" id="content">
	<div class="contentPage__in center">
		<div class="categoriesProducts">
			<div class="categoriesProducts__title">Товары</div>
			<div class="categoriesProducts__items">
				<?php foreach( $products_list as $post) { // Переменная должна быть названа обязательно $post (IMPORTANT) ?>
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
                            <!--<?= get_field('date'); ?>-->
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
	</div>
</div>
<? }; ?>

<? if (!empty($form_data)) { ?>
<div class="formBlock 123">
	<div class="formBlock__in center">
		<div class="formBlock__title"><?= $form_data['title']; ?></div>
		<div class="formBlock__subtitle"><?= $form_data['subtitle']; ?></div>
		<div class="formBlock__form"><?= do_shortcode($form_data['form_code']); ?></div>
		<div class="formBlock__success">
			<div class="title">Спасибо, ваша заявка принята</div>
			<div class="description">Мы свяжемся с вами в ближайшее время. Мы работаем с понедельника по субботу с 10:00 до 18:00. А пока можете посмотреть наше портфолио</div>
			<a href="<?= $form_data['link']; ?>" class="button">Перейти в портфолио</a>
		</div>		
	</div>
</div>
<? }; ?>
<? if (!empty($projects)) { ?>
<div class="projects projects--noBg">
	<div class="projects__in center">
		<div class="projects__top">
			<div class="projects__left">
				<div class="projects__title"><?= $projects['title']; ?></div>
				<a href="<?= $projects['link']; ?>" class="projects__link">Все работы</a>
			</div>
			<div class="projects__right" v-if="sizes.window > 860">
				<button class="projects__arrow projects__arrow--prev" :class="{'isDisabled': projects.index === 0}"
					@click.prevent="projects.slider.go('<')">
					<svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 50 50" fill="#E5E5E5">
						<path
							d="M15.725 23.225C15.4974 23.4628 15.319 23.7431 15.2 24.05C14.95 24.6587 14.95 25.3413 15.2 25.95C15.319 26.2569 15.4974 26.5372 15.725 26.775L23.225 34.275C23.6958 34.7458 24.3342 35.0102 25 35.0102C25.6658 35.0102 26.3042 34.7458 26.775 34.275C27.2458 33.8042 27.5102 33.1658 27.5102 32.5C27.5102 31.8342 27.2458 31.1958 26.775 30.725L23.525 27.5H32.5C33.163 27.5 33.7989 27.2366 34.2678 26.7678C34.7366 26.2989 35 25.663 35 25C35 24.337 34.7366 23.7011 34.2678 23.2322C33.7989 22.7634 33.163 22.5 32.5 22.5H23.525L26.775 19.275C27.0093 19.0426 27.1953 18.7661 27.3222 18.4614C27.4491 18.1568 27.5145 17.83 27.5145 17.5C27.5145 17.17 27.4491 16.8432 27.3222 16.5386C27.1953 16.2339 27.0093 15.9574 26.775 15.725C26.5426 15.4907 26.2661 15.3047 25.9614 15.1778C25.6568 15.0509 25.33 14.9855 25 14.9855C24.67 14.9855 24.3432 15.0509 24.0386 15.1778C23.7339 15.3047 23.4574 15.4907 23.225 15.725L15.725 23.225ZM0 25C0 29.9445 1.46622 34.778 4.21326 38.8893C6.9603 43.0005 10.8648 46.2048 15.4329 48.097C20.0011 49.9892 25.0277 50.4843 29.8773 49.5196C34.7268 48.555 39.1814 46.174 42.6777 42.6777C46.174 39.1814 48.555 34.7268 49.5196 29.8773C50.4843 25.0277 49.9892 20.0011 48.097 15.4329C46.2048 10.8648 43.0005 6.9603 38.8893 4.21326C34.778 1.46622 29.9445 0 25 0C21.717 0 18.4661 0.646644 15.4329 1.90301C12.3998 3.15938 9.6438 5.00087 7.32233 7.32233C2.63392 12.0107 0 18.3696 0 25V25ZM45 25C45 28.9556 43.827 32.8224 41.6294 36.1114C39.4318 39.4004 36.3082 41.9638 32.6537 43.4776C28.9991 44.9913 24.9778 45.3874 21.0982 44.6157C17.2186 43.844 13.6549 41.9392 10.8579 39.1421C8.06081 36.3451 6.156 32.7814 5.38429 28.9018C4.61259 25.0222 5.00866 21.0009 6.52241 17.3463C8.03616 13.6918 10.5996 10.5682 13.8886 8.37061C17.1776 6.17298 21.0444 5 25 5C30.3043 5 35.3914 7.10714 39.1421 10.8579C42.8929 14.6086 45 19.6957 45 25Z" />
					</svg>
				</button>
				<button class="projects__arrow projects__arrow--next"
					:class="{'isDisabled': projects.index === <?= count($projects['товары']) - 1; ?>}"
					@click.prevent="projects.slider.go('>')">
					<svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 50 50" fill="#E5E5E5">
						<path
							d="M15.725 23.225C15.4974 23.4628 15.319 23.7431 15.2 24.05C14.95 24.6587 14.95 25.3413 15.2 25.95C15.319 26.2569 15.4974 26.5372 15.725 26.775L23.225 34.275C23.6958 34.7458 24.3342 35.0102 25 35.0102C25.6658 35.0102 26.3042 34.7458 26.775 34.275C27.2458 33.8042 27.5102 33.1658 27.5102 32.5C27.5102 31.8342 27.2458 31.1958 26.775 30.725L23.525 27.5H32.5C33.163 27.5 33.7989 27.2366 34.2678 26.7678C34.7366 26.2989 35 25.663 35 25C35 24.337 34.7366 23.7011 34.2678 23.2322C33.7989 22.7634 33.163 22.5 32.5 22.5H23.525L26.775 19.275C27.0093 19.0426 27.1953 18.7661 27.3222 18.4614C27.4491 18.1568 27.5145 17.83 27.5145 17.5C27.5145 17.17 27.4491 16.8432 27.3222 16.5386C27.1953 16.2339 27.0093 15.9574 26.775 15.725C26.5426 15.4907 26.2661 15.3047 25.9614 15.1778C25.6568 15.0509 25.33 14.9855 25 14.9855C24.67 14.9855 24.3432 15.0509 24.0386 15.1778C23.7339 15.3047 23.4574 15.4907 23.225 15.725L15.725 23.225ZM0 25C0 29.9445 1.46622 34.778 4.21326 38.8893C6.9603 43.0005 10.8648 46.2048 15.4329 48.097C20.0011 49.9892 25.0277 50.4843 29.8773 49.5196C34.7268 48.555 39.1814 46.174 42.6777 42.6777C46.174 39.1814 48.555 34.7268 49.5196 29.8773C50.4843 25.0277 49.9892 20.0011 48.097 15.4329C46.2048 10.8648 43.0005 6.9603 38.8893 4.21326C34.778 1.46622 29.9445 0 25 0C21.717 0 18.4661 0.646644 15.4329 1.90301C12.3998 3.15938 9.6438 5.00087 7.32233 7.32233C2.63392 12.0107 0 18.3696 0 25V25ZM45 25C45 28.9556 43.827 32.8224 41.6294 36.1114C39.4318 39.4004 36.3082 41.9638 32.6537 43.4776C28.9991 44.9913 24.9778 45.3874 21.0982 44.6157C17.2186 43.844 13.6549 41.9392 10.8579 39.1421C8.06081 36.3451 6.156 32.7814 5.38429 28.9018C4.61259 25.0222 5.00866 21.0009 6.52241 17.3463C8.03616 13.6918 10.5996 10.5682 13.8886 8.37061C17.1776 6.17298 21.0444 5 25 5C30.3043 5 35.3914 7.10714 39.1421 10.8579C42.8929 14.6086 45 19.6957 45 25Z" />
					</svg>
				</button>
			</div>
		</div>
		<div class="projects__slider glide">
			<div class="projects__track glide__track" data-glide-el="track">
				<div class="glide__slides projects__slides">
					<?php foreach( $projects['товары'] as $post) { // Переменная должна быть названа обязательно $post (IMPORTANT) ?>
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
								<svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34"
									fill="#6297BC">
									<path
										d="M23.1832 15.8166C23.3349 15.9751 23.4538 16.162 23.5332 16.3666C23.6999 16.7724 23.6999 17.2275 23.5332 17.6333C23.4538 17.8378 23.3349 18.0247 23.1832 18.1833L18.1832 23.1833C17.8693 23.4971 17.4437 23.6734 16.9998 23.6734C16.556 23.6734 16.1303 23.4971 15.8165 23.1833C15.5027 22.8694 15.3264 22.4438 15.3264 21.9999C15.3264 21.5561 15.5027 21.1304 15.8165 20.8166L17.9832 18.6666H11.9998C11.5578 18.6666 11.1339 18.491 10.8213 18.1784C10.5088 17.8659 10.3332 17.4419 10.3332 16.9999C10.3332 16.5579 10.5088 16.134 10.8213 15.8214C11.1339 15.5088 11.5578 15.3333 11.9998 15.3333H17.9832L15.8165 13.1833C15.6603 13.0283 15.5363 12.844 15.4517 12.6409C15.3671 12.4378 15.3235 12.2199 15.3235 11.9999C15.3235 11.7799 15.3671 11.5621 15.4517 11.359C15.5363 11.1559 15.6603 10.9715 15.8165 10.8166C15.9714 10.6604 16.1558 10.5364 16.3589 10.4518C16.562 10.3672 16.7798 10.3236 16.9998 10.3236C17.2199 10.3236 17.4377 10.3672 17.6408 10.4518C17.8439 10.5364 18.0282 10.6604 18.1832 10.8166L23.1832 15.8166ZM33.6665 16.9999C33.6665 20.2963 32.689 23.5186 30.8577 26.2594C29.0263 29.0002 26.4233 31.1365 23.3779 32.3979C20.3325 33.6594 16.9813 33.9894 13.7483 33.3463C10.5153 32.7033 7.5456 31.1159 5.21472 28.785C2.88385 26.4542 1.2965 23.4844 0.653412 20.2514C0.0103264 17.0184 0.340382 13.6673 1.60184 10.6219C2.8633 7.57643 4.99951 4.97345 7.74033 3.14209C10.4812 1.31073 13.7035 0.333252 16.9998 0.333252C19.1885 0.333252 21.3558 0.764348 23.3779 1.60193C25.4 2.4395 27.2373 3.66716 28.785 5.21481C31.9106 8.34041 33.6665 12.5796 33.6665 16.9999ZM3.6665 16.9999C3.6665 19.637 4.44849 22.2149 5.91358 24.4075C7.37866 26.6002 9.46104 28.3091 11.8974 29.3183C14.3337 30.3275 17.0146 30.5915 19.601 30.0771C22.1875 29.5626 24.5632 28.2927 26.4279 26.428C28.2926 24.5633 29.5625 22.1875 30.077 19.6011C30.5914 17.0147 30.3274 14.3338 29.3182 11.8975C28.3091 9.46113 26.6001 7.37874 24.4074 5.91366C22.2148 4.44857 19.6369 3.66659 16.9998 3.66659C13.4636 3.66659 10.0722 5.07134 7.57174 7.57183C5.07126 10.0723 3.6665 13.4637 3.6665 16.9999Z" />
								</svg>
							</div>
						</a>
					</article>
					<?php } ?>
					<?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
				</div>
			</div>
		</div>
	</div>
</div>
<? }; ?>
<? if (!empty($seo_block)) { ?>
<div class="seo_block">
	<div class="seo_block__in center">
		<div class="seo_block__title"><?= $seo_block['title'];?></div>
		<div class="seo_block__text"><?= $seo_block['text'];?></div>
	</div>
</div>
<? }; ?>

<div class="map">
    <div class="map__frame">
        <?= $site_map; ?>
    </div>
    <div class="map__in center">
        <div class="map__contacts">
            <div class="map__contacts_left">
                <? if (!empty($site_address)) { ?>
                    <div class="map__contact map__contact--address">
                        <div class="title">Адрес</div>
                        <div class="text"><?= $site_address; ?></div>
                    </div>
                <? }; ?>
                <? if (!empty($site_hot)) { ?>
                    <div class="map__contact map__contact--address">
                        <div class="title">Горячая линия</div>
                        <a href="tel:<?= $site_hot; ?>" class="text"><?= $site_hot; ?></a>
                    </div>
                <? }; ?>
                <? if (!empty($site_phone)) { ?>
                    <div class="map__contact map__contact--address">
                        <div class="title">Телефон</div>
                        <a href="tel:<?= $site_phone; ?>" class="text zphone"><?= $site_phone; ?></a>
                    </div>
                <? }; ?>
                <? if (!empty($site_email)) { ?>
                    <div class="map__contact map__contact--address">
                        <div class="title">Почта</div>
                        <a href="mailto:<?= $site_email; ?>" class="text"><?= $site_email; ?></a>
                    </div>
                <? }; ?>
            </div>
            <? if (!empty($ruk_data)) { ?>
                <div class="map__contacts_right">
                    <div class="avatar">
                        <img src='<?= $ruk_data['image']; ?>' alt=''/>
                    </div>
                    <div class="texts">
                        <div class="name"><?= $ruk_data['title']; ?>м</div>
                        <a href="<?= $ruk_data['link']; ?>" class="texts_button">Написать</a>
                    </div>
                </div>
            <? }; ?>
        </div>
    </div>
</div>

<? } elseif ($post_type === 'services') { ?>
	<div class="pageTop">


<div class="pageTop__background">
	<?php auvint_post_thumbnail(); ?>
</div>
<div class="pageTop__wrap center">
	<div class="pageTop__left">
		<div class="pageTop__src">
			<div class="breadcrumbs" v-if="sizes.window > 1280">
				<div class="breadcrumbs__in">
					<?php if(function_exists('bcn_display'))
		{
			bcn_display();
		}?>
				</div>
			</div>
			<?php
				if ( is_singular() ) :
					the_title( '<h1 class="page__title">', '</h1>' );
				else :
					the_title( '<h1 class="page__title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
				endif;
			?>
			<div class="pageTop__in">
				<div class="pageTop__description">
					<?= get_field('short_description'); ?>
				</div>
				<a href="#content" class="button pageTop__button">Подробнее</a>
			</div>

			<!-- <h1 class="page__title center">
					Отраслевые решения
				</h1> -->

		</div>

	</div>
	<div class="pageTop__image">
		<img src="<?= get_field('banner_Image'); ?>" alt="">
	</div>
</div>

</div>


<div class="contentPage" id="content">
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
<? if (!empty($benefits)) { ?>
    <div class="benefits">
        <div class="benefits__in center">
            <div class="benefits__top">
                <div class="benefits__top_glide">
                    <div class="benefits__top_slide glide__slide">
                        <div class="benefits__top_title"><?= get_field('benefits_title'); ?></div>
                        <div class="benefits__top_text">
                            <?= get_field('benefits_text'); ?>
                        </div>
                        <a href="<?= get_field('benefits_link'); ?>" class="button benefits__button">Стать клиентом</a>
                    </div>
                </div>
                <div class="benefits__arrows" v-if="sizes.window > 860">
                    <button class="benefits__arrow benefits__arrow--prev" :class="{'isDisabled': benefits.index === 0}" @click.prevent="benefits.bottomSlider.go('<')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 50 50" fill="#E5E5E5">
                            <path d="M15.725 23.225C15.4974 23.4628 15.319 23.7431 15.2 24.05C14.95 24.6587 14.95 25.3413 15.2 25.95C15.319 26.2569 15.4974 26.5372 15.725 26.775L23.225 34.275C23.6958 34.7458 24.3342 35.0102 25 35.0102C25.6658 35.0102 26.3042 34.7458 26.775 34.275C27.2458 33.8042 27.5102 33.1658 27.5102 32.5C27.5102 31.8342 27.2458 31.1958 26.775 30.725L23.525 27.5H32.5C33.163 27.5 33.7989 27.2366 34.2678 26.7678C34.7366 26.2989 35 25.663 35 25C35 24.337 34.7366 23.7011 34.2678 23.2322C33.7989 22.7634 33.163 22.5 32.5 22.5H23.525L26.775 19.275C27.0093 19.0426 27.1953 18.7661 27.3222 18.4614C27.4491 18.1568 27.5145 17.83 27.5145 17.5C27.5145 17.17 27.4491 16.8432 27.3222 16.5386C27.1953 16.2339 27.0093 15.9574 26.775 15.725C26.5426 15.4907 26.2661 15.3047 25.9614 15.1778C25.6568 15.0509 25.33 14.9855 25 14.9855C24.67 14.9855 24.3432 15.0509 24.0386 15.1778C23.7339 15.3047 23.4574 15.4907 23.225 15.725L15.725 23.225ZM0 25C0 29.9445 1.46622 34.778 4.21326 38.8893C6.9603 43.0005 10.8648 46.2048 15.4329 48.097C20.0011 49.9892 25.0277 50.4843 29.8773 49.5196C34.7268 48.555 39.1814 46.174 42.6777 42.6777C46.174 39.1814 48.555 34.7268 49.5196 29.8773C50.4843 25.0277 49.9892 20.0011 48.097 15.4329C46.2048 10.8648 43.0005 6.9603 38.8893 4.21326C34.778 1.46622 29.9445 0 25 0C21.717 0 18.4661 0.646644 15.4329 1.90301C12.3998 3.15938 9.6438 5.00087 7.32233 7.32233C2.63392 12.0107 0 18.3696 0 25V25ZM45 25C45 28.9556 43.827 32.8224 41.6294 36.1114C39.4318 39.4004 36.3082 41.9638 32.6537 43.4776C28.9991 44.9913 24.9778 45.3874 21.0982 44.6157C17.2186 43.844 13.6549 41.9392 10.8579 39.1421C8.06081 36.3451 6.156 32.7814 5.38429 28.9018C4.61259 25.0222 5.00866 21.0009 6.52241 17.3463C8.03616 13.6918 10.5996 10.5682 13.8886 8.37061C17.1776 6.17298 21.0444 5 25 5C30.3043 5 35.3914 7.10714 39.1421 10.8579C42.8929 14.6086 45 19.6957 45 25Z"/>
                        </svg>
                    </button>
                    <button class="benefits__arrow benefits__arrow--next" :class="{'isDisabled': benefits.index === <?= count($benefits) - 1; ?>}" @click.prevent="benefits.bottomSlider.go('>')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 50 50" fill="#E5E5E5">
                            <path d="M15.725 23.225C15.4974 23.4628 15.319 23.7431 15.2 24.05C14.95 24.6587 14.95 25.3413 15.2 25.95C15.319 26.2569 15.4974 26.5372 15.725 26.775L23.225 34.275C23.6958 34.7458 24.3342 35.0102 25 35.0102C25.6658 35.0102 26.3042 34.7458 26.775 34.275C27.2458 33.8042 27.5102 33.1658 27.5102 32.5C27.5102 31.8342 27.2458 31.1958 26.775 30.725L23.525 27.5H32.5C33.163 27.5 33.7989 27.2366 34.2678 26.7678C34.7366 26.2989 35 25.663 35 25C35 24.337 34.7366 23.7011 34.2678 23.2322C33.7989 22.7634 33.163 22.5 32.5 22.5H23.525L26.775 19.275C27.0093 19.0426 27.1953 18.7661 27.3222 18.4614C27.4491 18.1568 27.5145 17.83 27.5145 17.5C27.5145 17.17 27.4491 16.8432 27.3222 16.5386C27.1953 16.2339 27.0093 15.9574 26.775 15.725C26.5426 15.4907 26.2661 15.3047 25.9614 15.1778C25.6568 15.0509 25.33 14.9855 25 14.9855C24.67 14.9855 24.3432 15.0509 24.0386 15.1778C23.7339 15.3047 23.4574 15.4907 23.225 15.725L15.725 23.225ZM0 25C0 29.9445 1.46622 34.778 4.21326 38.8893C6.9603 43.0005 10.8648 46.2048 15.4329 48.097C20.0011 49.9892 25.0277 50.4843 29.8773 49.5196C34.7268 48.555 39.1814 46.174 42.6777 42.6777C46.174 39.1814 48.555 34.7268 49.5196 29.8773C50.4843 25.0277 49.9892 20.0011 48.097 15.4329C46.2048 10.8648 43.0005 6.9603 38.8893 4.21326C34.778 1.46622 29.9445 0 25 0C21.717 0 18.4661 0.646644 15.4329 1.90301C12.3998 3.15938 9.6438 5.00087 7.32233 7.32233C2.63392 12.0107 0 18.3696 0 25V25ZM45 25C45 28.9556 43.827 32.8224 41.6294 36.1114C39.4318 39.4004 36.3082 41.9638 32.6537 43.4776C28.9991 44.9913 24.9778 45.3874 21.0982 44.6157C17.2186 43.844 13.6549 41.9392 10.8579 39.1421C8.06081 36.3451 6.156 32.7814 5.38429 28.9018C4.61259 25.0222 5.00866 21.0009 6.52241 17.3463C8.03616 13.6918 10.5996 10.5682 13.8886 8.37061C17.1776 6.17298 21.0444 5 25 5C30.3043 5 35.3914 7.10714 39.1421 10.8579C42.8929 14.6086 45 19.6957 45 25Z"/>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="benefits__bottom">
                <div class="benefits__bottom_glide glide">
                    <div class="benefits__bottom_track glide__track" data-glide-el="track">
                    <div class="benefits__bottom_slides glide__slides">
                        <?php foreach( $benefits as $benefit) {?>
                            <div class="benefits__bottom_slide glide__slide" style="--background: url('<?= $benefit['image']; ?>') 50% 50% / cover no-repeat">
                                <div class="benefits__bottom_title"><?= $benefit['title2']; ?></div>
                                <div class="benefits__bottom_text">
                                    <?= $benefit['text2']; ?>
                                </div>
                            </div>
                        <?php }; ?>
                    </div>
                    </div>
                </div>
            </div>
            <div class="benefits__arrows" v-if="sizes.window <= 860">
                <button class="benefits__arrow benefits__arrow--prev" :class="{'isDisabled': benefits.index === 0}" @click.prevent="benefits.bottomSlider.go('<')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 50 50">
                        <path d="M15.725 23.225C15.4974 23.4628 15.319 23.7431 15.2 24.05C14.95 24.6587 14.95 25.3413 15.2 25.95C15.319 26.2569 15.4974 26.5372 15.725 26.775L23.225 34.275C23.6958 34.7458 24.3342 35.0102 25 35.0102C25.6658 35.0102 26.3042 34.7458 26.775 34.275C27.2458 33.8042 27.5102 33.1658 27.5102 32.5C27.5102 31.8342 27.2458 31.1958 26.775 30.725L23.525 27.5H32.5C33.163 27.5 33.7989 27.2366 34.2678 26.7678C34.7366 26.2989 35 25.663 35 25C35 24.337 34.7366 23.7011 34.2678 23.2322C33.7989 22.7634 33.163 22.5 32.5 22.5H23.525L26.775 19.275C27.0093 19.0426 27.1953 18.7661 27.3222 18.4614C27.4491 18.1568 27.5145 17.83 27.5145 17.5C27.5145 17.17 27.4491 16.8432 27.3222 16.5386C27.1953 16.2339 27.0093 15.9574 26.775 15.725C26.5426 15.4907 26.2661 15.3047 25.9614 15.1778C25.6568 15.0509 25.33 14.9855 25 14.9855C24.67 14.9855 24.3432 15.0509 24.0386 15.1778C23.7339 15.3047 23.4574 15.4907 23.225 15.725L15.725 23.225ZM0 25C0 29.9445 1.46622 34.778 4.21326 38.8893C6.9603 43.0005 10.8648 46.2048 15.4329 48.097C20.0011 49.9892 25.0277 50.4843 29.8773 49.5196C34.7268 48.555 39.1814 46.174 42.6777 42.6777C46.174 39.1814 48.555 34.7268 49.5196 29.8773C50.4843 25.0277 49.9892 20.0011 48.097 15.4329C46.2048 10.8648 43.0005 6.9603 38.8893 4.21326C34.778 1.46622 29.9445 0 25 0C21.717 0 18.4661 0.646644 15.4329 1.90301C12.3998 3.15938 9.6438 5.00087 7.32233 7.32233C2.63392 12.0107 0 18.3696 0 25V25ZM45 25C45 28.9556 43.827 32.8224 41.6294 36.1114C39.4318 39.4004 36.3082 41.9638 32.6537 43.4776C28.9991 44.9913 24.9778 45.3874 21.0982 44.6157C17.2186 43.844 13.6549 41.9392 10.8579 39.1421C8.06081 36.3451 6.156 32.7814 5.38429 28.9018C4.61259 25.0222 5.00866 21.0009 6.52241 17.3463C8.03616 13.6918 10.5996 10.5682 13.8886 8.37061C17.1776 6.17298 21.0444 5 25 5C30.3043 5 35.3914 7.10714 39.1421 10.8579C42.8929 14.6086 45 19.6957 45 25Z"/>
                    </svg>
                </button>
                <div class="benefits__arrows_count">
                    <div class="count">{{ benefits.index + 1 }}</div>
                    <div class="delim">/</div>
                    <div class="length"><?= count($benefits); ?></div>
                </div>
                <button class="benefits__arrow benefits__arrow--next" :class="{'isDisabled': benefits.index === <?= count($benefits) - 1; ?>}" @click.prevent="benefits.bottomSlider.go('>')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 50 50">
                        <path d="M15.725 23.225C15.4974 23.4628 15.319 23.7431 15.2 24.05C14.95 24.6587 14.95 25.3413 15.2 25.95C15.319 26.2569 15.4974 26.5372 15.725 26.775L23.225 34.275C23.6958 34.7458 24.3342 35.0102 25 35.0102C25.6658 35.0102 26.3042 34.7458 26.775 34.275C27.2458 33.8042 27.5102 33.1658 27.5102 32.5C27.5102 31.8342 27.2458 31.1958 26.775 30.725L23.525 27.5H32.5C33.163 27.5 33.7989 27.2366 34.2678 26.7678C34.7366 26.2989 35 25.663 35 25C35 24.337 34.7366 23.7011 34.2678 23.2322C33.7989 22.7634 33.163 22.5 32.5 22.5H23.525L26.775 19.275C27.0093 19.0426 27.1953 18.7661 27.3222 18.4614C27.4491 18.1568 27.5145 17.83 27.5145 17.5C27.5145 17.17 27.4491 16.8432 27.3222 16.5386C27.1953 16.2339 27.0093 15.9574 26.775 15.725C26.5426 15.4907 26.2661 15.3047 25.9614 15.1778C25.6568 15.0509 25.33 14.9855 25 14.9855C24.67 14.9855 24.3432 15.0509 24.0386 15.1778C23.7339 15.3047 23.4574 15.4907 23.225 15.725L15.725 23.225ZM0 25C0 29.9445 1.46622 34.778 4.21326 38.8893C6.9603 43.0005 10.8648 46.2048 15.4329 48.097C20.0011 49.9892 25.0277 50.4843 29.8773 49.5196C34.7268 48.555 39.1814 46.174 42.6777 42.6777C46.174 39.1814 48.555 34.7268 49.5196 29.8773C50.4843 25.0277 49.9892 20.0011 48.097 15.4329C46.2048 10.8648 43.0005 6.9603 38.8893 4.21326C34.778 1.46622 29.9445 0 25 0C21.717 0 18.4661 0.646644 15.4329 1.90301C12.3998 3.15938 9.6438 5.00087 7.32233 7.32233C2.63392 12.0107 0 18.3696 0 25V25ZM45 25C45 28.9556 43.827 32.8224 41.6294 36.1114C39.4318 39.4004 36.3082 41.9638 32.6537 43.4776C28.9991 44.9913 24.9778 45.3874 21.0982 44.6157C17.2186 43.844 13.6549 41.9392 10.8579 39.1421C8.06081 36.3451 6.156 32.7814 5.38429 28.9018C4.61259 25.0222 5.00866 21.0009 6.52241 17.3463C8.03616 13.6918 10.5996 10.5682 13.8886 8.37061C17.1776 6.17298 21.0444 5 25 5C30.3043 5 35.3914 7.10714 39.1421 10.8579C42.8929 14.6086 45 19.6957 45 25Z"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
<? }; ?>
<? if (!empty($form_data)) { ?>
<div class="formBlock">
	<div class="formBlock__in center">
		<div class="formBlock__title"><?= $form_data['title']; ?></div>
		<div class="formBlock__subtitle"><?= $form_data['subtitle']; ?></div>
		<div class="formBlock__form"><?= do_shortcode($form_data['form_code']); ?></div>
		<div class="formBlock__success">
			<div class="title">Спасибо, ваша заявка принята</div>
			<div class="description">Мы свяжемся с вами в ближайшее время. Мы работаем с понедельника по субботу с 10:00 до 18:00. А пока можете посмотреть наше портфолио</div>
			<a href="<?= $form_data['link']; ?>" class="button">Перейти в портфолио</a>
		</div>		
	</div>
</div>
<? }; ?>

<? if (!empty($categories)) { ?>
<div class="categories">
    <div class="categories__in center">
        <div class="categories__top">
            <div class="categories__left">
                <div class="categories__title"><?= $categories['title']; ?></div>
            </div>
            <div class="categories__right"  v-if="sizes.window > 860">
                <button class="categories__arrow categories__arrow--prev" :class="{'isDisabled': categories.index === 0}" @click.prevent="categories.slider.go('<')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 50 50" fill="#E5E5E5">
                        <path d="M15.725 23.225C15.4974 23.4628 15.319 23.7431 15.2 24.05C14.95 24.6587 14.95 25.3413 15.2 25.95C15.319 26.2569 15.4974 26.5372 15.725 26.775L23.225 34.275C23.6958 34.7458 24.3342 35.0102 25 35.0102C25.6658 35.0102 26.3042 34.7458 26.775 34.275C27.2458 33.8042 27.5102 33.1658 27.5102 32.5C27.5102 31.8342 27.2458 31.1958 26.775 30.725L23.525 27.5H32.5C33.163 27.5 33.7989 27.2366 34.2678 26.7678C34.7366 26.2989 35 25.663 35 25C35 24.337 34.7366 23.7011 34.2678 23.2322C33.7989 22.7634 33.163 22.5 32.5 22.5H23.525L26.775 19.275C27.0093 19.0426 27.1953 18.7661 27.3222 18.4614C27.4491 18.1568 27.5145 17.83 27.5145 17.5C27.5145 17.17 27.4491 16.8432 27.3222 16.5386C27.1953 16.2339 27.0093 15.9574 26.775 15.725C26.5426 15.4907 26.2661 15.3047 25.9614 15.1778C25.6568 15.0509 25.33 14.9855 25 14.9855C24.67 14.9855 24.3432 15.0509 24.0386 15.1778C23.7339 15.3047 23.4574 15.4907 23.225 15.725L15.725 23.225ZM0 25C0 29.9445 1.46622 34.778 4.21326 38.8893C6.9603 43.0005 10.8648 46.2048 15.4329 48.097C20.0011 49.9892 25.0277 50.4843 29.8773 49.5196C34.7268 48.555 39.1814 46.174 42.6777 42.6777C46.174 39.1814 48.555 34.7268 49.5196 29.8773C50.4843 25.0277 49.9892 20.0011 48.097 15.4329C46.2048 10.8648 43.0005 6.9603 38.8893 4.21326C34.778 1.46622 29.9445 0 25 0C21.717 0 18.4661 0.646644 15.4329 1.90301C12.3998 3.15938 9.6438 5.00087 7.32233 7.32233C2.63392 12.0107 0 18.3696 0 25V25ZM45 25C45 28.9556 43.827 32.8224 41.6294 36.1114C39.4318 39.4004 36.3082 41.9638 32.6537 43.4776C28.9991 44.9913 24.9778 45.3874 21.0982 44.6157C17.2186 43.844 13.6549 41.9392 10.8579 39.1421C8.06081 36.3451 6.156 32.7814 5.38429 28.9018C4.61259 25.0222 5.00866 21.0009 6.52241 17.3463C8.03616 13.6918 10.5996 10.5682 13.8886 8.37061C17.1776 6.17298 21.0444 5 25 5C30.3043 5 35.3914 7.10714 39.1421 10.8579C42.8929 14.6086 45 19.6957 45 25Z"/>
                    </svg>
                </button>
                <button class="categories__arrow categories__arrow--next" :class="{'isDisabled': categories.index === <?= count($categories['list']) - 1; ?>}" @click.prevent="categories.slider.go('>')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 50 50" fill="#E5E5E5">
                        <path d="M15.725 23.225C15.4974 23.4628 15.319 23.7431 15.2 24.05C14.95 24.6587 14.95 25.3413 15.2 25.95C15.319 26.2569 15.4974 26.5372 15.725 26.775L23.225 34.275C23.6958 34.7458 24.3342 35.0102 25 35.0102C25.6658 35.0102 26.3042 34.7458 26.775 34.275C27.2458 33.8042 27.5102 33.1658 27.5102 32.5C27.5102 31.8342 27.2458 31.1958 26.775 30.725L23.525 27.5H32.5C33.163 27.5 33.7989 27.2366 34.2678 26.7678C34.7366 26.2989 35 25.663 35 25C35 24.337 34.7366 23.7011 34.2678 23.2322C33.7989 22.7634 33.163 22.5 32.5 22.5H23.525L26.775 19.275C27.0093 19.0426 27.1953 18.7661 27.3222 18.4614C27.4491 18.1568 27.5145 17.83 27.5145 17.5C27.5145 17.17 27.4491 16.8432 27.3222 16.5386C27.1953 16.2339 27.0093 15.9574 26.775 15.725C26.5426 15.4907 26.2661 15.3047 25.9614 15.1778C25.6568 15.0509 25.33 14.9855 25 14.9855C24.67 14.9855 24.3432 15.0509 24.0386 15.1778C23.7339 15.3047 23.4574 15.4907 23.225 15.725L15.725 23.225ZM0 25C0 29.9445 1.46622 34.778 4.21326 38.8893C6.9603 43.0005 10.8648 46.2048 15.4329 48.097C20.0011 49.9892 25.0277 50.4843 29.8773 49.5196C34.7268 48.555 39.1814 46.174 42.6777 42.6777C46.174 39.1814 48.555 34.7268 49.5196 29.8773C50.4843 25.0277 49.9892 20.0011 48.097 15.4329C46.2048 10.8648 43.0005 6.9603 38.8893 4.21326C34.778 1.46622 29.9445 0 25 0C21.717 0 18.4661 0.646644 15.4329 1.90301C12.3998 3.15938 9.6438 5.00087 7.32233 7.32233C2.63392 12.0107 0 18.3696 0 25V25ZM45 25C45 28.9556 43.827 32.8224 41.6294 36.1114C39.4318 39.4004 36.3082 41.9638 32.6537 43.4776C28.9991 44.9913 24.9778 45.3874 21.0982 44.6157C17.2186 43.844 13.6549 41.9392 10.8579 39.1421C8.06081 36.3451 6.156 32.7814 5.38429 28.9018C4.61259 25.0222 5.00866 21.0009 6.52241 17.3463C8.03616 13.6918 10.5996 10.5682 13.8886 8.37061C17.1776 6.17298 21.0444 5 25 5C30.3043 5 35.3914 7.10714 39.1421 10.8579C42.8929 14.6086 45 19.6957 45 25Z"/>
                    </svg>
                </button>
            </div>
        </div>
        <div class="categories__slider glide">
            <div class="categories__track glide__track" data-glide-el="track">
                <div class="glide__slides categories__slides">
				<?php foreach( $categories['list'] as $post) { // Переменная должна быть названа обязательно $post (IMPORTANT) ?>
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
                </div>
            </div>
        </div>
    </div>
</div>
<? }; ?>




<? if (!empty($projects)) { ?>
<div class="projects proj_new">
	<div class="projects__in center">
		<div class="projects__top">
			<div class="projects__left">
				<div class="projects__title"><?= $projects['title']; ?></div>
				<a href="<?= $projects['link']; ?>" class="projects__link">Все работы</a>
			</div>
			<div class="projects__right" v-if="sizes.window > 860">
				<button class="projects__arrow projects__arrow--prev" :class="{'isDisabled': projects.index === 0}"
					@click.prevent="projects.slider.go('<')">
					<svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 50 50" fill="#E5E5E5">
						<path
							d="M15.725 23.225C15.4974 23.4628 15.319 23.7431 15.2 24.05C14.95 24.6587 14.95 25.3413 15.2 25.95C15.319 26.2569 15.4974 26.5372 15.725 26.775L23.225 34.275C23.6958 34.7458 24.3342 35.0102 25 35.0102C25.6658 35.0102 26.3042 34.7458 26.775 34.275C27.2458 33.8042 27.5102 33.1658 27.5102 32.5C27.5102 31.8342 27.2458 31.1958 26.775 30.725L23.525 27.5H32.5C33.163 27.5 33.7989 27.2366 34.2678 26.7678C34.7366 26.2989 35 25.663 35 25C35 24.337 34.7366 23.7011 34.2678 23.2322C33.7989 22.7634 33.163 22.5 32.5 22.5H23.525L26.775 19.275C27.0093 19.0426 27.1953 18.7661 27.3222 18.4614C27.4491 18.1568 27.5145 17.83 27.5145 17.5C27.5145 17.17 27.4491 16.8432 27.3222 16.5386C27.1953 16.2339 27.0093 15.9574 26.775 15.725C26.5426 15.4907 26.2661 15.3047 25.9614 15.1778C25.6568 15.0509 25.33 14.9855 25 14.9855C24.67 14.9855 24.3432 15.0509 24.0386 15.1778C23.7339 15.3047 23.4574 15.4907 23.225 15.725L15.725 23.225ZM0 25C0 29.9445 1.46622 34.778 4.21326 38.8893C6.9603 43.0005 10.8648 46.2048 15.4329 48.097C20.0011 49.9892 25.0277 50.4843 29.8773 49.5196C34.7268 48.555 39.1814 46.174 42.6777 42.6777C46.174 39.1814 48.555 34.7268 49.5196 29.8773C50.4843 25.0277 49.9892 20.0011 48.097 15.4329C46.2048 10.8648 43.0005 6.9603 38.8893 4.21326C34.778 1.46622 29.9445 0 25 0C21.717 0 18.4661 0.646644 15.4329 1.90301C12.3998 3.15938 9.6438 5.00087 7.32233 7.32233C2.63392 12.0107 0 18.3696 0 25V25ZM45 25C45 28.9556 43.827 32.8224 41.6294 36.1114C39.4318 39.4004 36.3082 41.9638 32.6537 43.4776C28.9991 44.9913 24.9778 45.3874 21.0982 44.6157C17.2186 43.844 13.6549 41.9392 10.8579 39.1421C8.06081 36.3451 6.156 32.7814 5.38429 28.9018C4.61259 25.0222 5.00866 21.0009 6.52241 17.3463C8.03616 13.6918 10.5996 10.5682 13.8886 8.37061C17.1776 6.17298 21.0444 5 25 5C30.3043 5 35.3914 7.10714 39.1421 10.8579C42.8929 14.6086 45 19.6957 45 25Z" />
					</svg>
				</button>
				<button class="projects__arrow projects__arrow--next"
					:class="{'isDisabled': projects.index === <?= count($projects['товары']) - 1; ?>}"
					@click.prevent="projects.slider.go('>')">
					<svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 50 50" fill="#E5E5E5">
						<path
							d="M15.725 23.225C15.4974 23.4628 15.319 23.7431 15.2 24.05C14.95 24.6587 14.95 25.3413 15.2 25.95C15.319 26.2569 15.4974 26.5372 15.725 26.775L23.225 34.275C23.6958 34.7458 24.3342 35.0102 25 35.0102C25.6658 35.0102 26.3042 34.7458 26.775 34.275C27.2458 33.8042 27.5102 33.1658 27.5102 32.5C27.5102 31.8342 27.2458 31.1958 26.775 30.725L23.525 27.5H32.5C33.163 27.5 33.7989 27.2366 34.2678 26.7678C34.7366 26.2989 35 25.663 35 25C35 24.337 34.7366 23.7011 34.2678 23.2322C33.7989 22.7634 33.163 22.5 32.5 22.5H23.525L26.775 19.275C27.0093 19.0426 27.1953 18.7661 27.3222 18.4614C27.4491 18.1568 27.5145 17.83 27.5145 17.5C27.5145 17.17 27.4491 16.8432 27.3222 16.5386C27.1953 16.2339 27.0093 15.9574 26.775 15.725C26.5426 15.4907 26.2661 15.3047 25.9614 15.1778C25.6568 15.0509 25.33 14.9855 25 14.9855C24.67 14.9855 24.3432 15.0509 24.0386 15.1778C23.7339 15.3047 23.4574 15.4907 23.225 15.725L15.725 23.225ZM0 25C0 29.9445 1.46622 34.778 4.21326 38.8893C6.9603 43.0005 10.8648 46.2048 15.4329 48.097C20.0011 49.9892 25.0277 50.4843 29.8773 49.5196C34.7268 48.555 39.1814 46.174 42.6777 42.6777C46.174 39.1814 48.555 34.7268 49.5196 29.8773C50.4843 25.0277 49.9892 20.0011 48.097 15.4329C46.2048 10.8648 43.0005 6.9603 38.8893 4.21326C34.778 1.46622 29.9445 0 25 0C21.717 0 18.4661 0.646644 15.4329 1.90301C12.3998 3.15938 9.6438 5.00087 7.32233 7.32233C2.63392 12.0107 0 18.3696 0 25V25ZM45 25C45 28.9556 43.827 32.8224 41.6294 36.1114C39.4318 39.4004 36.3082 41.9638 32.6537 43.4776C28.9991 44.9913 24.9778 45.3874 21.0982 44.6157C17.2186 43.844 13.6549 41.9392 10.8579 39.1421C8.06081 36.3451 6.156 32.7814 5.38429 28.9018C4.61259 25.0222 5.00866 21.0009 6.52241 17.3463C8.03616 13.6918 10.5996 10.5682 13.8886 8.37061C17.1776 6.17298 21.0444 5 25 5C30.3043 5 35.3914 7.10714 39.1421 10.8579C42.8929 14.6086 45 19.6957 45 25Z" />
					</svg>
				</button>
			</div>
		</div>
		<div class="projects__slider glide">
			<div class="projects__track glide__track" data-glide-el="track">
				<div class="glide__slides projects__slides">
					<?php foreach( $projects['товары'] as $post) { // Переменная должна быть названа обязательно $post (IMPORTANT) ?>
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
								<svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34"
									fill="#6297BC">
									<path
										d="M23.1832 15.8166C23.3349 15.9751 23.4538 16.162 23.5332 16.3666C23.6999 16.7724 23.6999 17.2275 23.5332 17.6333C23.4538 17.8378 23.3349 18.0247 23.1832 18.1833L18.1832 23.1833C17.8693 23.4971 17.4437 23.6734 16.9998 23.6734C16.556 23.6734 16.1303 23.4971 15.8165 23.1833C15.5027 22.8694 15.3264 22.4438 15.3264 21.9999C15.3264 21.5561 15.5027 21.1304 15.8165 20.8166L17.9832 18.6666H11.9998C11.5578 18.6666 11.1339 18.491 10.8213 18.1784C10.5088 17.8659 10.3332 17.4419 10.3332 16.9999C10.3332 16.5579 10.5088 16.134 10.8213 15.8214C11.1339 15.5088 11.5578 15.3333 11.9998 15.3333H17.9832L15.8165 13.1833C15.6603 13.0283 15.5363 12.844 15.4517 12.6409C15.3671 12.4378 15.3235 12.2199 15.3235 11.9999C15.3235 11.7799 15.3671 11.5621 15.4517 11.359C15.5363 11.1559 15.6603 10.9715 15.8165 10.8166C15.9714 10.6604 16.1558 10.5364 16.3589 10.4518C16.562 10.3672 16.7798 10.3236 16.9998 10.3236C17.2199 10.3236 17.4377 10.3672 17.6408 10.4518C17.8439 10.5364 18.0282 10.6604 18.1832 10.8166L23.1832 15.8166ZM33.6665 16.9999C33.6665 20.2963 32.689 23.5186 30.8577 26.2594C29.0263 29.0002 26.4233 31.1365 23.3779 32.3979C20.3325 33.6594 16.9813 33.9894 13.7483 33.3463C10.5153 32.7033 7.5456 31.1159 5.21472 28.785C2.88385 26.4542 1.2965 23.4844 0.653412 20.2514C0.0103264 17.0184 0.340382 13.6673 1.60184 10.6219C2.8633 7.57643 4.99951 4.97345 7.74033 3.14209C10.4812 1.31073 13.7035 0.333252 16.9998 0.333252C19.1885 0.333252 21.3558 0.764348 23.3779 1.60193C25.4 2.4395 27.2373 3.66716 28.785 5.21481C31.9106 8.34041 33.6665 12.5796 33.6665 16.9999ZM3.6665 16.9999C3.6665 19.637 4.44849 22.2149 5.91358 24.4075C7.37866 26.6002 9.46104 28.3091 11.8974 29.3183C14.3337 30.3275 17.0146 30.5915 19.601 30.0771C22.1875 29.5626 24.5632 28.2927 26.4279 26.428C28.2926 24.5633 29.5625 22.1875 30.077 19.6011C30.5914 17.0147 30.3274 14.3338 29.3182 11.8975C28.3091 9.46113 26.6001 7.37874 24.4074 5.91366C22.2148 4.44857 19.6369 3.66659 16.9998 3.66659C13.4636 3.66659 10.0722 5.07134 7.57174 7.57183C5.07126 10.0723 3.6665 13.4637 3.6665 16.9999Z" />
								</svg>
							</div>
						</a>
					</article>
					<?php } ?>
					<?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
				</div>
			</div>
		</div>
	</div>
</div>
<? }; ?>
<? if (!empty($what_give)) { ?>
<div class="offer new_offer">
	<div class="offer__in center">
		<div class="offer__title">Схема работы:</div>
		<div class="offer__items">
			<?php foreach( $what_give as $key => $item) { ?>
			<div class="offer__item">
				<div class="offer__item_in">
					<div class="offer__item_left">0<?= $key + 1;?></div>
					<div class="offer__item_right">
						<div class="title"><?= $item['title']; ?></div>
						<div class="text"><?= $item['text']; ?></div>
					</div>
				</div>
			</div>
			<? }; ?>
		</div>
	</div>
</div>
<? }; ?>
<? if (!empty($clients)) { ?>
<div class="clients new_serv" style="--background: url('../img/clients_bg.jpg') 50% 50% / cover no-repeat">
	<div class="clients__in center">
		<div class="clients__row">
			<div class="clients__title">Нам доверяют</div>
			<div class="clients__arrows" v-if="sizes.window > 860">
				<button class="clients__arrow clients__arrow--prev" :class="{'isDisabled': clients.index === 0}"
					@click.prevent="clients.slider.go('<')">
					<svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 50 50" fill="#E5E5E5">
						<path
							d="M15.725 23.225C15.4974 23.4628 15.319 23.7431 15.2 24.05C14.95 24.6587 14.95 25.3413 15.2 25.95C15.319 26.2569 15.4974 26.5372 15.725 26.775L23.225 34.275C23.6958 34.7458 24.3342 35.0102 25 35.0102C25.6658 35.0102 26.3042 34.7458 26.775 34.275C27.2458 33.8042 27.5102 33.1658 27.5102 32.5C27.5102 31.8342 27.2458 31.1958 26.775 30.725L23.525 27.5H32.5C33.163 27.5 33.7989 27.2366 34.2678 26.7678C34.7366 26.2989 35 25.663 35 25C35 24.337 34.7366 23.7011 34.2678 23.2322C33.7989 22.7634 33.163 22.5 32.5 22.5H23.525L26.775 19.275C27.0093 19.0426 27.1953 18.7661 27.3222 18.4614C27.4491 18.1568 27.5145 17.83 27.5145 17.5C27.5145 17.17 27.4491 16.8432 27.3222 16.5386C27.1953 16.2339 27.0093 15.9574 26.775 15.725C26.5426 15.4907 26.2661 15.3047 25.9614 15.1778C25.6568 15.0509 25.33 14.9855 25 14.9855C24.67 14.9855 24.3432 15.0509 24.0386 15.1778C23.7339 15.3047 23.4574 15.4907 23.225 15.725L15.725 23.225ZM0 25C0 29.9445 1.46622 34.778 4.21326 38.8893C6.9603 43.0005 10.8648 46.2048 15.4329 48.097C20.0011 49.9892 25.0277 50.4843 29.8773 49.5196C34.7268 48.555 39.1814 46.174 42.6777 42.6777C46.174 39.1814 48.555 34.7268 49.5196 29.8773C50.4843 25.0277 49.9892 20.0011 48.097 15.4329C46.2048 10.8648 43.0005 6.9603 38.8893 4.21326C34.778 1.46622 29.9445 0 25 0C21.717 0 18.4661 0.646644 15.4329 1.90301C12.3998 3.15938 9.6438 5.00087 7.32233 7.32233C2.63392 12.0107 0 18.3696 0 25V25ZM45 25C45 28.9556 43.827 32.8224 41.6294 36.1114C39.4318 39.4004 36.3082 41.9638 32.6537 43.4776C28.9991 44.9913 24.9778 45.3874 21.0982 44.6157C17.2186 43.844 13.6549 41.9392 10.8579 39.1421C8.06081 36.3451 6.156 32.7814 5.38429 28.9018C4.61259 25.0222 5.00866 21.0009 6.52241 17.3463C8.03616 13.6918 10.5996 10.5682 13.8886 8.37061C17.1776 6.17298 21.0444 5 25 5C30.3043 5 35.3914 7.10714 39.1421 10.8579C42.8929 14.6086 45 19.6957 45 25Z" />
					</svg>
				</button>
				<button class="clients__arrow clients__arrow--next"
					:class="{'isDisabled': clients.index === <?= count($clients) - 1; ?>}"
					@click.prevent="clients.slider.go('>')">
					<svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 50 50" fill="#E5E5E5">
						<path
							d="M15.725 23.225C15.4974 23.4628 15.319 23.7431 15.2 24.05C14.95 24.6587 14.95 25.3413 15.2 25.95C15.319 26.2569 15.4974 26.5372 15.725 26.775L23.225 34.275C23.6958 34.7458 24.3342 35.0102 25 35.0102C25.6658 35.0102 26.3042 34.7458 26.775 34.275C27.2458 33.8042 27.5102 33.1658 27.5102 32.5C27.5102 31.8342 27.2458 31.1958 26.775 30.725L23.525 27.5H32.5C33.163 27.5 33.7989 27.2366 34.2678 26.7678C34.7366 26.2989 35 25.663 35 25C35 24.337 34.7366 23.7011 34.2678 23.2322C33.7989 22.7634 33.163 22.5 32.5 22.5H23.525L26.775 19.275C27.0093 19.0426 27.1953 18.7661 27.3222 18.4614C27.4491 18.1568 27.5145 17.83 27.5145 17.5C27.5145 17.17 27.4491 16.8432 27.3222 16.5386C27.1953 16.2339 27.0093 15.9574 26.775 15.725C26.5426 15.4907 26.2661 15.3047 25.9614 15.1778C25.6568 15.0509 25.33 14.9855 25 14.9855C24.67 14.9855 24.3432 15.0509 24.0386 15.1778C23.7339 15.3047 23.4574 15.4907 23.225 15.725L15.725 23.225ZM0 25C0 29.9445 1.46622 34.778 4.21326 38.8893C6.9603 43.0005 10.8648 46.2048 15.4329 48.097C20.0011 49.9892 25.0277 50.4843 29.8773 49.5196C34.7268 48.555 39.1814 46.174 42.6777 42.6777C46.174 39.1814 48.555 34.7268 49.5196 29.8773C50.4843 25.0277 49.9892 20.0011 48.097 15.4329C46.2048 10.8648 43.0005 6.9603 38.8893 4.21326C34.778 1.46622 29.9445 0 25 0C21.717 0 18.4661 0.646644 15.4329 1.90301C12.3998 3.15938 9.6438 5.00087 7.32233 7.32233C2.63392 12.0107 0 18.3696 0 25V25ZM45 25C45 28.9556 43.827 32.8224 41.6294 36.1114C39.4318 39.4004 36.3082 41.9638 32.6537 43.4776C28.9991 44.9913 24.9778 45.3874 21.0982 44.6157C17.2186 43.844 13.6549 41.9392 10.8579 39.1421C8.06081 36.3451 6.156 32.7814 5.38429 28.9018C4.61259 25.0222 5.00866 21.0009 6.52241 17.3463C8.03616 13.6918 10.5996 10.5682 13.8886 8.37061C17.1776 6.17298 21.0444 5 25 5C30.3043 5 35.3914 7.10714 39.1421 10.8579C42.8929 14.6086 45 19.6957 45 25Z" />
					</svg>
				</button>
			</div>
		</div>
		<div class="clients__slider glide">
			<div class="clients__track glide__track" data-glide-el="track">
				<div class="glide__slides clients__slides">
					<?php foreach( $clients as $client) { ?>
					<div class="clients__item">
						<div class="icon">
							<img src="<?= $client['image']; ?>" alt="">
						</div>
						<div class="text"><?= $client['name']; ?></div>
					</div>
					<? }; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<? }; ?>
<? if (!empty($seo_block)) { ?>
<div class="seo_block">
	<div class="seo_block__in center">
		<div class="seo_block__title"><?= $seo_block['title'];?></div>
		<div class="seo_block__text"><?= $seo_block['text'];?></div>
	</div>
</div>
<? }; ?>
<div class="map">
    <div class="map__frame">
        <?= $site_map; ?>
    </div>
    <div class="map__in center">
        <div class="map__contacts">
            <div class="map__contacts_left">
                <? if (!empty($site_address)) { ?>
                    <div class="map__contact map__contact--address">
                        <div class="title">Адрес</div>
                        <div class="text"><?= $site_address; ?></div>
                    </div>
                <? }; ?>
                <? if (!empty($site_hot)) { ?>
                    <div class="map__contact map__contact--address">
                        <div class="title">Горячая линия</div>
                        <a href="tel:<?= $site_hot; ?>" class="text"><?= $site_hot; ?></a>
                    </div>
                <? }; ?>
                <? if (!empty($site_phone)) { ?>
                    <div class="map__contact map__contact--address">
                        <div class="title">Телефон</div>
                        <a href="tel:<?= $site_phone; ?>" class="text zphone"><?= $site_phone; ?></a>
                    </div>
                <? }; ?>
                <? if (!empty($site_email)) { ?>
                    <div class="map__contact map__contact--address">
                        <div class="title">Почта</div>
                        <a href="mailto:<?= $site_email; ?>" class="text"><?= $site_email; ?></a>
                    </div>
                <? }; ?>
            </div>
            <? if (!empty($ruk_data)) { ?>
                <div class="map__contacts_right">
                    <div class="avatar">
                        <img src='<?= $ruk_data['image']; ?>' alt=''/>
                    </div>
                    <div class="texts">
                        <div class="name"><?= $ruk_data['title']; ?>м</div>
                        <a href="<?= $ruk_data['link']; ?>" class="texts_button">Написать</a>
                    </div>
                </div>
            <? }; ?>
        </div>
    </div>
</div>
<? } elseif ($post_type === 'news') { ?>

<div class="breadcrumbs" v-if="sizes.window > 1280">
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
<div class="contentPage contentPage--news" id="content">
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
<?if (!empty($news_list)) { ?>
<div class="projects proj_new">
	<div class="projects__in center">
		<div class="projects__top">
			<div class="projects__left">
				<div class="projects__title">Статьи и новости</div>
				<a href="/news" class="projects__link">Все новости</a>
			</div>
			<div class="projects__right" v-if="sizes.window > 860">
				<button class="projects__arrow projects__arrow--prev" :class="{'isDisabled': projects.index === 0}"
					@click.prevent="projects.slider.go('<')">
					<svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 50 50" fill="#E5E5E5">
						<path
							d="M15.725 23.225C15.4974 23.4628 15.319 23.7431 15.2 24.05C14.95 24.6587 14.95 25.3413 15.2 25.95C15.319 26.2569 15.4974 26.5372 15.725 26.775L23.225 34.275C23.6958 34.7458 24.3342 35.0102 25 35.0102C25.6658 35.0102 26.3042 34.7458 26.775 34.275C27.2458 33.8042 27.5102 33.1658 27.5102 32.5C27.5102 31.8342 27.2458 31.1958 26.775 30.725L23.525 27.5H32.5C33.163 27.5 33.7989 27.2366 34.2678 26.7678C34.7366 26.2989 35 25.663 35 25C35 24.337 34.7366 23.7011 34.2678 23.2322C33.7989 22.7634 33.163 22.5 32.5 22.5H23.525L26.775 19.275C27.0093 19.0426 27.1953 18.7661 27.3222 18.4614C27.4491 18.1568 27.5145 17.83 27.5145 17.5C27.5145 17.17 27.4491 16.8432 27.3222 16.5386C27.1953 16.2339 27.0093 15.9574 26.775 15.725C26.5426 15.4907 26.2661 15.3047 25.9614 15.1778C25.6568 15.0509 25.33 14.9855 25 14.9855C24.67 14.9855 24.3432 15.0509 24.0386 15.1778C23.7339 15.3047 23.4574 15.4907 23.225 15.725L15.725 23.225ZM0 25C0 29.9445 1.46622 34.778 4.21326 38.8893C6.9603 43.0005 10.8648 46.2048 15.4329 48.097C20.0011 49.9892 25.0277 50.4843 29.8773 49.5196C34.7268 48.555 39.1814 46.174 42.6777 42.6777C46.174 39.1814 48.555 34.7268 49.5196 29.8773C50.4843 25.0277 49.9892 20.0011 48.097 15.4329C46.2048 10.8648 43.0005 6.9603 38.8893 4.21326C34.778 1.46622 29.9445 0 25 0C21.717 0 18.4661 0.646644 15.4329 1.90301C12.3998 3.15938 9.6438 5.00087 7.32233 7.32233C2.63392 12.0107 0 18.3696 0 25V25ZM45 25C45 28.9556 43.827 32.8224 41.6294 36.1114C39.4318 39.4004 36.3082 41.9638 32.6537 43.4776C28.9991 44.9913 24.9778 45.3874 21.0982 44.6157C17.2186 43.844 13.6549 41.9392 10.8579 39.1421C8.06081 36.3451 6.156 32.7814 5.38429 28.9018C4.61259 25.0222 5.00866 21.0009 6.52241 17.3463C8.03616 13.6918 10.5996 10.5682 13.8886 8.37061C17.1776 6.17298 21.0444 5 25 5C30.3043 5 35.3914 7.10714 39.1421 10.8579C42.8929 14.6086 45 19.6957 45 25Z" />
					</svg>
				</button>
				<button class="projects__arrow projects__arrow--next"
					:class="{'isDisabled': projects.index === <?= count($news_list) - 1; ?>}"
					@click.prevent="projects.slider.go('>')">
					<svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 50 50" fill="#E5E5E5">
						<path
							d="M15.725 23.225C15.4974 23.4628 15.319 23.7431 15.2 24.05C14.95 24.6587 14.95 25.3413 15.2 25.95C15.319 26.2569 15.4974 26.5372 15.725 26.775L23.225 34.275C23.6958 34.7458 24.3342 35.0102 25 35.0102C25.6658 35.0102 26.3042 34.7458 26.775 34.275C27.2458 33.8042 27.5102 33.1658 27.5102 32.5C27.5102 31.8342 27.2458 31.1958 26.775 30.725L23.525 27.5H32.5C33.163 27.5 33.7989 27.2366 34.2678 26.7678C34.7366 26.2989 35 25.663 35 25C35 24.337 34.7366 23.7011 34.2678 23.2322C33.7989 22.7634 33.163 22.5 32.5 22.5H23.525L26.775 19.275C27.0093 19.0426 27.1953 18.7661 27.3222 18.4614C27.4491 18.1568 27.5145 17.83 27.5145 17.5C27.5145 17.17 27.4491 16.8432 27.3222 16.5386C27.1953 16.2339 27.0093 15.9574 26.775 15.725C26.5426 15.4907 26.2661 15.3047 25.9614 15.1778C25.6568 15.0509 25.33 14.9855 25 14.9855C24.67 14.9855 24.3432 15.0509 24.0386 15.1778C23.7339 15.3047 23.4574 15.4907 23.225 15.725L15.725 23.225ZM0 25C0 29.9445 1.46622 34.778 4.21326 38.8893C6.9603 43.0005 10.8648 46.2048 15.4329 48.097C20.0011 49.9892 25.0277 50.4843 29.8773 49.5196C34.7268 48.555 39.1814 46.174 42.6777 42.6777C46.174 39.1814 48.555 34.7268 49.5196 29.8773C50.4843 25.0277 49.9892 20.0011 48.097 15.4329C46.2048 10.8648 43.0005 6.9603 38.8893 4.21326C34.778 1.46622 29.9445 0 25 0C21.717 0 18.4661 0.646644 15.4329 1.90301C12.3998 3.15938 9.6438 5.00087 7.32233 7.32233C2.63392 12.0107 0 18.3696 0 25V25ZM45 25C45 28.9556 43.827 32.8224 41.6294 36.1114C39.4318 39.4004 36.3082 41.9638 32.6537 43.4776C28.9991 44.9913 24.9778 45.3874 21.0982 44.6157C17.2186 43.844 13.6549 41.9392 10.8579 39.1421C8.06081 36.3451 6.156 32.7814 5.38429 28.9018C4.61259 25.0222 5.00866 21.0009 6.52241 17.3463C8.03616 13.6918 10.5996 10.5682 13.8886 8.37061C17.1776 6.17298 21.0444 5 25 5C30.3043 5 35.3914 7.10714 39.1421 10.8579C42.8929 14.6086 45 19.6957 45 25Z" />
					</svg>
				</button>
			</div>
		</div>
		<div class="projects__slider glide">
			<div class="projects__track glide__track" data-glide-el="track">
				<div class="glide__slides projects__slides">
					<?php foreach( $news_list as $post) { // Переменная должна быть названа обязательно $post (IMPORTANT) ?>
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
						</div>
						<a href="<?= get_post_permalink(); ?>" class="projects__slide_bottom">
							<div class="text">Подробнее</div>
							<div class="arrow">
								<svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34"
									fill="#6297BC">
									<path
										d="M23.1832 15.8166C23.3349 15.9751 23.4538 16.162 23.5332 16.3666C23.6999 16.7724 23.6999 17.2275 23.5332 17.6333C23.4538 17.8378 23.3349 18.0247 23.1832 18.1833L18.1832 23.1833C17.8693 23.4971 17.4437 23.6734 16.9998 23.6734C16.556 23.6734 16.1303 23.4971 15.8165 23.1833C15.5027 22.8694 15.3264 22.4438 15.3264 21.9999C15.3264 21.5561 15.5027 21.1304 15.8165 20.8166L17.9832 18.6666H11.9998C11.5578 18.6666 11.1339 18.491 10.8213 18.1784C10.5088 17.8659 10.3332 17.4419 10.3332 16.9999C10.3332 16.5579 10.5088 16.134 10.8213 15.8214C11.1339 15.5088 11.5578 15.3333 11.9998 15.3333H17.9832L15.8165 13.1833C15.6603 13.0283 15.5363 12.844 15.4517 12.6409C15.3671 12.4378 15.3235 12.2199 15.3235 11.9999C15.3235 11.7799 15.3671 11.5621 15.4517 11.359C15.5363 11.1559 15.6603 10.9715 15.8165 10.8166C15.9714 10.6604 16.1558 10.5364 16.3589 10.4518C16.562 10.3672 16.7798 10.3236 16.9998 10.3236C17.2199 10.3236 17.4377 10.3672 17.6408 10.4518C17.8439 10.5364 18.0282 10.6604 18.1832 10.8166L23.1832 15.8166ZM33.6665 16.9999C33.6665 20.2963 32.689 23.5186 30.8577 26.2594C29.0263 29.0002 26.4233 31.1365 23.3779 32.3979C20.3325 33.6594 16.9813 33.9894 13.7483 33.3463C10.5153 32.7033 7.5456 31.1159 5.21472 28.785C2.88385 26.4542 1.2965 23.4844 0.653412 20.2514C0.0103264 17.0184 0.340382 13.6673 1.60184 10.6219C2.8633 7.57643 4.99951 4.97345 7.74033 3.14209C10.4812 1.31073 13.7035 0.333252 16.9998 0.333252C19.1885 0.333252 21.3558 0.764348 23.3779 1.60193C25.4 2.4395 27.2373 3.66716 28.785 5.21481C31.9106 8.34041 33.6665 12.5796 33.6665 16.9999ZM3.6665 16.9999C3.6665 19.637 4.44849 22.2149 5.91358 24.4075C7.37866 26.6002 9.46104 28.3091 11.8974 29.3183C14.3337 30.3275 17.0146 30.5915 19.601 30.0771C22.1875 29.5626 24.5632 28.2927 26.4279 26.428C28.2926 24.5633 29.5625 22.1875 30.077 19.6011C30.5914 17.0147 30.3274 14.3338 29.3182 11.8975C28.3091 9.46113 26.6001 7.37874 24.4074 5.91366C22.2148 4.44857 19.6369 3.66659 16.9998 3.66659C13.4636 3.66659 10.0722 5.07134 7.57174 7.57183C5.07126 10.0723 3.6665 13.4637 3.6665 16.9999Z" />
								</svg>
							</div>
						</a>
					</article>
					<?php } ?>
					<?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
				</div>
			</div>
		</div>
	</div>
</div>
<? }; ?>
<? } elseif ($post_type === 'portfolio') { ?>

<div class="breadcrumbs">
	<div class="breadcrumbs__in center">
		<?php if(function_exists('bcn_display'))
			{
				bcn_display();
			}?>
	</div>
</div>
<!-- <h1 class="page__title center">
				Наше портфолио
			</h1> -->
<div class="portfolioPage">
	<div class="portfolioPage__in center">
		<div class="portfolioPage__image">
			<?php auvint_post_thumbnail(); ?>
		</div>
		<div class="portfolioPage__date">
            <!--<?= get_field('date'); ?>-->
<?= get_the_date(); ?>
		</div>
		<h1 class="portfolioPage__title">
			<? the_title(); ?>
		</h1>
		<div class="portfolioPage__editor">
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
<? if (!empty($gallery)) { ?>
<div class="portfolioSlider">
	<div class="portfolioSlider__in center">
		<div class="portfolioSlider__top">
			<div class="portfolioSlider__arrows" v-if="sizes.window > 1280">
				<button class="portfolioSlider__arrow portfolioSlider__arrow--prev"
					:class="{'isDisabled': portfolioSlider.index === 0}"
					@click.prevent="portfolioSlider.slider.go('<')">
					<svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 50 50" fill="#E5E5E5">
						<path
							d="M15.725 23.225C15.4974 23.4628 15.319 23.7431 15.2 24.05C14.95 24.6587 14.95 25.3413 15.2 25.95C15.319 26.2569 15.4974 26.5372 15.725 26.775L23.225 34.275C23.6958 34.7458 24.3342 35.0102 25 35.0102C25.6658 35.0102 26.3042 34.7458 26.775 34.275C27.2458 33.8042 27.5102 33.1658 27.5102 32.5C27.5102 31.8342 27.2458 31.1958 26.775 30.725L23.525 27.5H32.5C33.163 27.5 33.7989 27.2366 34.2678 26.7678C34.7366 26.2989 35 25.663 35 25C35 24.337 34.7366 23.7011 34.2678 23.2322C33.7989 22.7634 33.163 22.5 32.5 22.5H23.525L26.775 19.275C27.0093 19.0426 27.1953 18.7661 27.3222 18.4614C27.4491 18.1568 27.5145 17.83 27.5145 17.5C27.5145 17.17 27.4491 16.8432 27.3222 16.5386C27.1953 16.2339 27.0093 15.9574 26.775 15.725C26.5426 15.4907 26.2661 15.3047 25.9614 15.1778C25.6568 15.0509 25.33 14.9855 25 14.9855C24.67 14.9855 24.3432 15.0509 24.0386 15.1778C23.7339 15.3047 23.4574 15.4907 23.225 15.725L15.725 23.225ZM0 25C0 29.9445 1.46622 34.778 4.21326 38.8893C6.9603 43.0005 10.8648 46.2048 15.4329 48.097C20.0011 49.9892 25.0277 50.4843 29.8773 49.5196C34.7268 48.555 39.1814 46.174 42.6777 42.6777C46.174 39.1814 48.555 34.7268 49.5196 29.8773C50.4843 25.0277 49.9892 20.0011 48.097 15.4329C46.2048 10.8648 43.0005 6.9603 38.8893 4.21326C34.778 1.46622 29.9445 0 25 0C21.717 0 18.4661 0.646644 15.4329 1.90301C12.3998 3.15938 9.6438 5.00087 7.32233 7.32233C2.63392 12.0107 0 18.3696 0 25V25ZM45 25C45 28.9556 43.827 32.8224 41.6294 36.1114C39.4318 39.4004 36.3082 41.9638 32.6537 43.4776C28.9991 44.9913 24.9778 45.3874 21.0982 44.6157C17.2186 43.844 13.6549 41.9392 10.8579 39.1421C8.06081 36.3451 6.156 32.7814 5.38429 28.9018C4.61259 25.0222 5.00866 21.0009 6.52241 17.3463C8.03616 13.6918 10.5996 10.5682 13.8886 8.37061C17.1776 6.17298 21.0444 5 25 5C30.3043 5 35.3914 7.10714 39.1421 10.8579C42.8929 14.6086 45 19.6957 45 25Z" />
					</svg>
				</button>
				<button class="portfolioSlider__arrow portfolioSlider__arrow--next"
					:class="{'isDisabled': portfolioSlider.index === <?= count($gallery) - 1; ?>}"
					@click.prevent="portfolioSlider.slider.go('>')">
					<svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 50 50" fill="#E5E5E5">
						<path
							d="M15.725 23.225C15.4974 23.4628 15.319 23.7431 15.2 24.05C14.95 24.6587 14.95 25.3413 15.2 25.95C15.319 26.2569 15.4974 26.5372 15.725 26.775L23.225 34.275C23.6958 34.7458 24.3342 35.0102 25 35.0102C25.6658 35.0102 26.3042 34.7458 26.775 34.275C27.2458 33.8042 27.5102 33.1658 27.5102 32.5C27.5102 31.8342 27.2458 31.1958 26.775 30.725L23.525 27.5H32.5C33.163 27.5 33.7989 27.2366 34.2678 26.7678C34.7366 26.2989 35 25.663 35 25C35 24.337 34.7366 23.7011 34.2678 23.2322C33.7989 22.7634 33.163 22.5 32.5 22.5H23.525L26.775 19.275C27.0093 19.0426 27.1953 18.7661 27.3222 18.4614C27.4491 18.1568 27.5145 17.83 27.5145 17.5C27.5145 17.17 27.4491 16.8432 27.3222 16.5386C27.1953 16.2339 27.0093 15.9574 26.775 15.725C26.5426 15.4907 26.2661 15.3047 25.9614 15.1778C25.6568 15.0509 25.33 14.9855 25 14.9855C24.67 14.9855 24.3432 15.0509 24.0386 15.1778C23.7339 15.3047 23.4574 15.4907 23.225 15.725L15.725 23.225ZM0 25C0 29.9445 1.46622 34.778 4.21326 38.8893C6.9603 43.0005 10.8648 46.2048 15.4329 48.097C20.0011 49.9892 25.0277 50.4843 29.8773 49.5196C34.7268 48.555 39.1814 46.174 42.6777 42.6777C46.174 39.1814 48.555 34.7268 49.5196 29.8773C50.4843 25.0277 49.9892 20.0011 48.097 15.4329C46.2048 10.8648 43.0005 6.9603 38.8893 4.21326C34.778 1.46622 29.9445 0 25 0C21.717 0 18.4661 0.646644 15.4329 1.90301C12.3998 3.15938 9.6438 5.00087 7.32233 7.32233C2.63392 12.0107 0 18.3696 0 25V25ZM45 25C45 28.9556 43.827 32.8224 41.6294 36.1114C39.4318 39.4004 36.3082 41.9638 32.6537 43.4776C28.9991 44.9913 24.9778 45.3874 21.0982 44.6157C17.2186 43.844 13.6549 41.9392 10.8579 39.1421C8.06081 36.3451 6.156 32.7814 5.38429 28.9018C4.61259 25.0222 5.00866 21.0009 6.52241 17.3463C8.03616 13.6918 10.5996 10.5682 13.8886 8.37061C17.1776 6.17298 21.0444 5 25 5C30.3043 5 35.3914 7.10714 39.1421 10.8579C42.8929 14.6086 45 19.6957 45 25Z" />
					</svg>
				</button>
			</div>
		</div>
		<div class="glide portfolioSlider__glide">
			<div class="glide__track portfolioSlider__track" data-glide-el="track">
				<div class="glide__slides portfolioSlider__slides">
					<?php foreach( $gallery as $gallery_item) { ?>
					<div class="portfolioSlider__slide glide__slide">
						<img src='<?= $gallery_item['image']; ?>' alt='' />
					</div>
					<?php }; ?>
				</div>
			</div>
		</div>
		<div class="portfolioSlider__arrows" v-if="sizes.window <= 1280">
			<button class="portfolioSlider__arrow portfolioSlider__arrow--prev"
				@click.prevent="portfolioSlider.slider.go('<')">
				<svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 50 50" fill="#E5E5E5">
					<path
						d="M15.725 23.225C15.4974 23.4628 15.319 23.7431 15.2 24.05C14.95 24.6587 14.95 25.3413 15.2 25.95C15.319 26.2569 15.4974 26.5372 15.725 26.775L23.225 34.275C23.6958 34.7458 24.3342 35.0102 25 35.0102C25.6658 35.0102 26.3042 34.7458 26.775 34.275C27.2458 33.8042 27.5102 33.1658 27.5102 32.5C27.5102 31.8342 27.2458 31.1958 26.775 30.725L23.525 27.5H32.5C33.163 27.5 33.7989 27.2366 34.2678 26.7678C34.7366 26.2989 35 25.663 35 25C35 24.337 34.7366 23.7011 34.2678 23.2322C33.7989 22.7634 33.163 22.5 32.5 22.5H23.525L26.775 19.275C27.0093 19.0426 27.1953 18.7661 27.3222 18.4614C27.4491 18.1568 27.5145 17.83 27.5145 17.5C27.5145 17.17 27.4491 16.8432 27.3222 16.5386C27.1953 16.2339 27.0093 15.9574 26.775 15.725C26.5426 15.4907 26.2661 15.3047 25.9614 15.1778C25.6568 15.0509 25.33 14.9855 25 14.9855C24.67 14.9855 24.3432 15.0509 24.0386 15.1778C23.7339 15.3047 23.4574 15.4907 23.225 15.725L15.725 23.225ZM0 25C0 29.9445 1.46622 34.778 4.21326 38.8893C6.9603 43.0005 10.8648 46.2048 15.4329 48.097C20.0011 49.9892 25.0277 50.4843 29.8773 49.5196C34.7268 48.555 39.1814 46.174 42.6777 42.6777C46.174 39.1814 48.555 34.7268 49.5196 29.8773C50.4843 25.0277 49.9892 20.0011 48.097 15.4329C46.2048 10.8648 43.0005 6.9603 38.8893 4.21326C34.778 1.46622 29.9445 0 25 0C21.717 0 18.4661 0.646644 15.4329 1.90301C12.3998 3.15938 9.6438 5.00087 7.32233 7.32233C2.63392 12.0107 0 18.3696 0 25V25ZM45 25C45 28.9556 43.827 32.8224 41.6294 36.1114C39.4318 39.4004 36.3082 41.9638 32.6537 43.4776C28.9991 44.9913 24.9778 45.3874 21.0982 44.6157C17.2186 43.844 13.6549 41.9392 10.8579 39.1421C8.06081 36.3451 6.156 32.7814 5.38429 28.9018C4.61259 25.0222 5.00866 21.0009 6.52241 17.3463C8.03616 13.6918 10.5996 10.5682 13.8886 8.37061C17.1776 6.17298 21.0444 5 25 5C30.3043 5 35.3914 7.10714 39.1421 10.8579C42.8929 14.6086 45 19.6957 45 25Z" />
				</svg>
			</button>
			<div class="portfolioSlider__arrows_count">
				<div class="count">{{ portfolioSlider.index + 1 }}</div>
				<div class="delim">/</div>
				<div class="length"><?= count($gallery); ?></div>
			</div>
			<button class="portfolioSlider__arrow portfolioSlider__arrow--next"
				@click.prevent="portfolioSlider.slider.go('>')">
				<svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 50 50" fill="#E5E5E5">
					<path
						d="M15.725 23.225C15.4974 23.4628 15.319 23.7431 15.2 24.05C14.95 24.6587 14.95 25.3413 15.2 25.95C15.319 26.2569 15.4974 26.5372 15.725 26.775L23.225 34.275C23.6958 34.7458 24.3342 35.0102 25 35.0102C25.6658 35.0102 26.3042 34.7458 26.775 34.275C27.2458 33.8042 27.5102 33.1658 27.5102 32.5C27.5102 31.8342 27.2458 31.1958 26.775 30.725L23.525 27.5H32.5C33.163 27.5 33.7989 27.2366 34.2678 26.7678C34.7366 26.2989 35 25.663 35 25C35 24.337 34.7366 23.7011 34.2678 23.2322C33.7989 22.7634 33.163 22.5 32.5 22.5H23.525L26.775 19.275C27.0093 19.0426 27.1953 18.7661 27.3222 18.4614C27.4491 18.1568 27.5145 17.83 27.5145 17.5C27.5145 17.17 27.4491 16.8432 27.3222 16.5386C27.1953 16.2339 27.0093 15.9574 26.775 15.725C26.5426 15.4907 26.2661 15.3047 25.9614 15.1778C25.6568 15.0509 25.33 14.9855 25 14.9855C24.67 14.9855 24.3432 15.0509 24.0386 15.1778C23.7339 15.3047 23.4574 15.4907 23.225 15.725L15.725 23.225ZM0 25C0 29.9445 1.46622 34.778 4.21326 38.8893C6.9603 43.0005 10.8648 46.2048 15.4329 48.097C20.0011 49.9892 25.0277 50.4843 29.8773 49.5196C34.7268 48.555 39.1814 46.174 42.6777 42.6777C46.174 39.1814 48.555 34.7268 49.5196 29.8773C50.4843 25.0277 49.9892 20.0011 48.097 15.4329C46.2048 10.8648 43.0005 6.9603 38.8893 4.21326C34.778 1.46622 29.9445 0 25 0C21.717 0 18.4661 0.646644 15.4329 1.90301C12.3998 3.15938 9.6438 5.00087 7.32233 7.32233C2.63392 12.0107 0 18.3696 0 25V25ZM45 25C45 28.9556 43.827 32.8224 41.6294 36.1114C39.4318 39.4004 36.3082 41.9638 32.6537 43.4776C28.9991 44.9913 24.9778 45.3874 21.0982 44.6157C17.2186 43.844 13.6549 41.9392 10.8579 39.1421C8.06081 36.3451 6.156 32.7814 5.38429 28.9018C4.61259 25.0222 5.00866 21.0009 6.52241 17.3463C8.03616 13.6918 10.5996 10.5682 13.8886 8.37061C17.1776 6.17298 21.0444 5 25 5C30.3043 5 35.3914 7.10714 39.1421 10.8579C42.8929 14.6086 45 19.6957 45 25Z" />
				</svg>
			</button>
		</div>
	</div>
</div>
<? }; ?>
<? if (!empty($portfolio)) { ?>
<div class="portfolioSlider__wrapper hasPadding">
	<div class="projects">
		<div class="projects__in center">
			<div class="projects__top">
				<div class="projects__left">
					<div class="projects__title">Посмотрите остальные работы</div>
				</div>
				<? if (count($portfolio) > 3) { ?>
				<div class="projects__right" v-if="sizes.window > 860">
					<button class="projects__arrow projects__arrow--prev" :class="{'isDisabled': projects.index === 0}"
						@click.prevent="projects.slider.go('<')">
						<svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 50 50" fill="#E5E5E5">
							<path
								d="M15.725 23.225C15.4974 23.4628 15.319 23.7431 15.2 24.05C14.95 24.6587 14.95 25.3413 15.2 25.95C15.319 26.2569 15.4974 26.5372 15.725 26.775L23.225 34.275C23.6958 34.7458 24.3342 35.0102 25 35.0102C25.6658 35.0102 26.3042 34.7458 26.775 34.275C27.2458 33.8042 27.5102 33.1658 27.5102 32.5C27.5102 31.8342 27.2458 31.1958 26.775 30.725L23.525 27.5H32.5C33.163 27.5 33.7989 27.2366 34.2678 26.7678C34.7366 26.2989 35 25.663 35 25C35 24.337 34.7366 23.7011 34.2678 23.2322C33.7989 22.7634 33.163 22.5 32.5 22.5H23.525L26.775 19.275C27.0093 19.0426 27.1953 18.7661 27.3222 18.4614C27.4491 18.1568 27.5145 17.83 27.5145 17.5C27.5145 17.17 27.4491 16.8432 27.3222 16.5386C27.1953 16.2339 27.0093 15.9574 26.775 15.725C26.5426 15.4907 26.2661 15.3047 25.9614 15.1778C25.6568 15.0509 25.33 14.9855 25 14.9855C24.67 14.9855 24.3432 15.0509 24.0386 15.1778C23.7339 15.3047 23.4574 15.4907 23.225 15.725L15.725 23.225ZM0 25C0 29.9445 1.46622 34.778 4.21326 38.8893C6.9603 43.0005 10.8648 46.2048 15.4329 48.097C20.0011 49.9892 25.0277 50.4843 29.8773 49.5196C34.7268 48.555 39.1814 46.174 42.6777 42.6777C46.174 39.1814 48.555 34.7268 49.5196 29.8773C50.4843 25.0277 49.9892 20.0011 48.097 15.4329C46.2048 10.8648 43.0005 6.9603 38.8893 4.21326C34.778 1.46622 29.9445 0 25 0C21.717 0 18.4661 0.646644 15.4329 1.90301C12.3998 3.15938 9.6438 5.00087 7.32233 7.32233C2.63392 12.0107 0 18.3696 0 25V25ZM45 25C45 28.9556 43.827 32.8224 41.6294 36.1114C39.4318 39.4004 36.3082 41.9638 32.6537 43.4776C28.9991 44.9913 24.9778 45.3874 21.0982 44.6157C17.2186 43.844 13.6549 41.9392 10.8579 39.1421C8.06081 36.3451 6.156 32.7814 5.38429 28.9018C4.61259 25.0222 5.00866 21.0009 6.52241 17.3463C8.03616 13.6918 10.5996 10.5682 13.8886 8.37061C17.1776 6.17298 21.0444 5 25 5C30.3043 5 35.3914 7.10714 39.1421 10.8579C42.8929 14.6086 45 19.6957 45 25Z" />
						</svg>
					</button>
					<button class="projects__arrow projects__arrow--next"
						:class="{'isDisabled': projects.index === <?= count($projects['products']) - 1; ?>}"
						@click.prevent="projects.slider.go('>')">
						<svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 50 50" fill="#E5E5E5">
							<path
								d="M15.725 23.225C15.4974 23.4628 15.319 23.7431 15.2 24.05C14.95 24.6587 14.95 25.3413 15.2 25.95C15.319 26.2569 15.4974 26.5372 15.725 26.775L23.225 34.275C23.6958 34.7458 24.3342 35.0102 25 35.0102C25.6658 35.0102 26.3042 34.7458 26.775 34.275C27.2458 33.8042 27.5102 33.1658 27.5102 32.5C27.5102 31.8342 27.2458 31.1958 26.775 30.725L23.525 27.5H32.5C33.163 27.5 33.7989 27.2366 34.2678 26.7678C34.7366 26.2989 35 25.663 35 25C35 24.337 34.7366 23.7011 34.2678 23.2322C33.7989 22.7634 33.163 22.5 32.5 22.5H23.525L26.775 19.275C27.0093 19.0426 27.1953 18.7661 27.3222 18.4614C27.4491 18.1568 27.5145 17.83 27.5145 17.5C27.5145 17.17 27.4491 16.8432 27.3222 16.5386C27.1953 16.2339 27.0093 15.9574 26.775 15.725C26.5426 15.4907 26.2661 15.3047 25.9614 15.1778C25.6568 15.0509 25.33 14.9855 25 14.9855C24.67 14.9855 24.3432 15.0509 24.0386 15.1778C23.7339 15.3047 23.4574 15.4907 23.225 15.725L15.725 23.225ZM0 25C0 29.9445 1.46622 34.778 4.21326 38.8893C6.9603 43.0005 10.8648 46.2048 15.4329 48.097C20.0011 49.9892 25.0277 50.4843 29.8773 49.5196C34.7268 48.555 39.1814 46.174 42.6777 42.6777C46.174 39.1814 48.555 34.7268 49.5196 29.8773C50.4843 25.0277 49.9892 20.0011 48.097 15.4329C46.2048 10.8648 43.0005 6.9603 38.8893 4.21326C34.778 1.46622 29.9445 0 25 0C21.717 0 18.4661 0.646644 15.4329 1.90301C12.3998 3.15938 9.6438 5.00087 7.32233 7.32233C2.63392 12.0107 0 18.3696 0 25V25ZM45 25C45 28.9556 43.827 32.8224 41.6294 36.1114C39.4318 39.4004 36.3082 41.9638 32.6537 43.4776C28.9991 44.9913 24.9778 45.3874 21.0982 44.6157C17.2186 43.844 13.6549 41.9392 10.8579 39.1421C8.06081 36.3451 6.156 32.7814 5.38429 28.9018C4.61259 25.0222 5.00866 21.0009 6.52241 17.3463C8.03616 13.6918 10.5996 10.5682 13.8886 8.37061C17.1776 6.17298 21.0444 5 25 5C30.3043 5 35.3914 7.10714 39.1421 10.8579C42.8929 14.6086 45 19.6957 45 25Z" />
						</svg>
					</button>
				</div>
				<? }; ?>
			</div>
            
			<div class="projects__slider glide">
				<div class="projects__track glide__track" data-glide-el="track">
					<div class="glide__slides projects__slides">
						<? foreach ($portfolio as $post) { // Переменная должна быть названа обязательно $post (IMPORTANT) ?>
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
									<svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34"
										fill="#6297BC">
										<path
											d="M23.1832 15.8166C23.3349 15.9751 23.4538 16.162 23.5332 16.3666C23.6999 16.7724 23.6999 17.2275 23.5332 17.6333C23.4538 17.8378 23.3349 18.0247 23.1832 18.1833L18.1832 23.1833C17.8693 23.4971 17.4437 23.6734 16.9998 23.6734C16.556 23.6734 16.1303 23.4971 15.8165 23.1833C15.5027 22.8694 15.3264 22.4438 15.3264 21.9999C15.3264 21.5561 15.5027 21.1304 15.8165 20.8166L17.9832 18.6666H11.9998C11.5578 18.6666 11.1339 18.491 10.8213 18.1784C10.5088 17.8659 10.3332 17.4419 10.3332 16.9999C10.3332 16.5579 10.5088 16.134 10.8213 15.8214C11.1339 15.5088 11.5578 15.3333 11.9998 15.3333H17.9832L15.8165 13.1833C15.6603 13.0283 15.5363 12.844 15.4517 12.6409C15.3671 12.4378 15.3235 12.2199 15.3235 11.9999C15.3235 11.7799 15.3671 11.5621 15.4517 11.359C15.5363 11.1559 15.6603 10.9715 15.8165 10.8166C15.9714 10.6604 16.1558 10.5364 16.3589 10.4518C16.562 10.3672 16.7798 10.3236 16.9998 10.3236C17.2199 10.3236 17.4377 10.3672 17.6408 10.4518C17.8439 10.5364 18.0282 10.6604 18.1832 10.8166L23.1832 15.8166ZM33.6665 16.9999C33.6665 20.2963 32.689 23.5186 30.8577 26.2594C29.0263 29.0002 26.4233 31.1365 23.3779 32.3979C20.3325 33.6594 16.9813 33.9894 13.7483 33.3463C10.5153 32.7033 7.5456 31.1159 5.21472 28.785C2.88385 26.4542 1.2965 23.4844 0.653412 20.2514C0.0103264 17.0184 0.340382 13.6673 1.60184 10.6219C2.8633 7.57643 4.99951 4.97345 7.74033 3.14209C10.4812 1.31073 13.7035 0.333252 16.9998 0.333252C19.1885 0.333252 21.3558 0.764348 23.3779 1.60193C25.4 2.4395 27.2373 3.66716 28.785 5.21481C31.9106 8.34041 33.6665 12.5796 33.6665 16.9999ZM3.6665 16.9999C3.6665 19.637 4.44849 22.2149 5.91358 24.4075C7.37866 26.6002 9.46104 28.3091 11.8974 29.3183C14.3337 30.3275 17.0146 30.5915 19.601 30.0771C22.1875 29.5626 24.5632 28.2927 26.4279 26.428C28.2926 24.5633 29.5625 22.1875 30.077 19.6011C30.5914 17.0147 30.3274 14.3338 29.3182 11.8975C28.3091 9.46113 26.6001 7.37874 24.4074 5.91366C22.2148 4.44857 19.6369 3.66659 16.9998 3.66659C13.4636 3.66659 10.0722 5.07134 7.57174 7.57183C5.07126 10.0723 3.6665 13.4637 3.6665 16.9999Z" />
									</svg>
								</div>
							</a>
						</article>
						<?php } ?>
						<?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<? }; ?>
<? if (!empty($seo_block)) { ?>
<div class="seo_block">
	<div class="seo_block__in center">
		<div class="seo_block__title"><?= $seo_block['title']; ?></div>
		<div class="seo_block__text">
			<?= $seo_block['text']; ?>
		</div>
	</div>
</div>
<? }; ?>

<? } else { ?>
<div class="breadcrumbs" v-if="sizes.window > 1280">
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
<div class="contentPage" id="content">
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
<? }; ?>