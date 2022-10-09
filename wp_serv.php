<?php
/*
Template Name: Страница сервиса
*/

get_header();

$benefits = get_field('benefits');
$projects = get_field('projects');
$what_give = get_field('what_give');
$clients = get_field('clients');
$seo_block = get_field('seo_block');

?>


<? if (!empty($benefits)) { ?>
    <div class="benefits">
        <div class="benefits__in center">
            <div class="benefits__top">
                <div class="benefits__top_glide glide">
                    <div class="benefits__top_track glide__track" data-glide-el="track">
                    <div class="benefits__top_slides glide__slides">
                        <?php foreach( $benefits as $benefit) {?>
                            <div class="benefits__top_slide glide__slide">
                                <div class="benefits__top_title"><?= $benefit['title']; ?></div>
                                <div class="benefits__top_text">
                                    <?= $benefit['text']; ?>
                                </div>
                                <a href="<?= $benefit['link']; ?>" class="button benefits__button">Стать клиентом</a>
                            </div>
                        <?php }; ?>
                    </div>
                    </div>
                </div>
                <div class="benefits__arrows" v-if="sizes.window > 1280">
                    <button class="benefits__arrow benefits__arrow--prev" @click.prevent="benefits.topSlider.go('<')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 50 50" fill="#E5E5E5">
                            <path d="M15.725 23.225C15.4974 23.4628 15.319 23.7431 15.2 24.05C14.95 24.6587 14.95 25.3413 15.2 25.95C15.319 26.2569 15.4974 26.5372 15.725 26.775L23.225 34.275C23.6958 34.7458 24.3342 35.0102 25 35.0102C25.6658 35.0102 26.3042 34.7458 26.775 34.275C27.2458 33.8042 27.5102 33.1658 27.5102 32.5C27.5102 31.8342 27.2458 31.1958 26.775 30.725L23.525 27.5H32.5C33.163 27.5 33.7989 27.2366 34.2678 26.7678C34.7366 26.2989 35 25.663 35 25C35 24.337 34.7366 23.7011 34.2678 23.2322C33.7989 22.7634 33.163 22.5 32.5 22.5H23.525L26.775 19.275C27.0093 19.0426 27.1953 18.7661 27.3222 18.4614C27.4491 18.1568 27.5145 17.83 27.5145 17.5C27.5145 17.17 27.4491 16.8432 27.3222 16.5386C27.1953 16.2339 27.0093 15.9574 26.775 15.725C26.5426 15.4907 26.2661 15.3047 25.9614 15.1778C25.6568 15.0509 25.33 14.9855 25 14.9855C24.67 14.9855 24.3432 15.0509 24.0386 15.1778C23.7339 15.3047 23.4574 15.4907 23.225 15.725L15.725 23.225ZM0 25C0 29.9445 1.46622 34.778 4.21326 38.8893C6.9603 43.0005 10.8648 46.2048 15.4329 48.097C20.0011 49.9892 25.0277 50.4843 29.8773 49.5196C34.7268 48.555 39.1814 46.174 42.6777 42.6777C46.174 39.1814 48.555 34.7268 49.5196 29.8773C50.4843 25.0277 49.9892 20.0011 48.097 15.4329C46.2048 10.8648 43.0005 6.9603 38.8893 4.21326C34.778 1.46622 29.9445 0 25 0C21.717 0 18.4661 0.646644 15.4329 1.90301C12.3998 3.15938 9.6438 5.00087 7.32233 7.32233C2.63392 12.0107 0 18.3696 0 25V25ZM45 25C45 28.9556 43.827 32.8224 41.6294 36.1114C39.4318 39.4004 36.3082 41.9638 32.6537 43.4776C28.9991 44.9913 24.9778 45.3874 21.0982 44.6157C17.2186 43.844 13.6549 41.9392 10.8579 39.1421C8.06081 36.3451 6.156 32.7814 5.38429 28.9018C4.61259 25.0222 5.00866 21.0009 6.52241 17.3463C8.03616 13.6918 10.5996 10.5682 13.8886 8.37061C17.1776 6.17298 21.0444 5 25 5C30.3043 5 35.3914 7.10714 39.1421 10.8579C42.8929 14.6086 45 19.6957 45 25Z"/>
                        </svg>
                    </button>
                    <button class="benefits__arrow benefits__arrow--next" @click.prevent="benefits.topSlider.go('>')">
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
            <div class="benefits__arrows" v-if="sizes.window <= 1280">
                <button class="benefits__arrow benefits__arrow--prev" @click.prevent="benefits.topSlider.go('<')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 50 50" fill="#E5E5E5">
                        <path d="M15.725 23.225C15.4974 23.4628 15.319 23.7431 15.2 24.05C14.95 24.6587 14.95 25.3413 15.2 25.95C15.319 26.2569 15.4974 26.5372 15.725 26.775L23.225 34.275C23.6958 34.7458 24.3342 35.0102 25 35.0102C25.6658 35.0102 26.3042 34.7458 26.775 34.275C27.2458 33.8042 27.5102 33.1658 27.5102 32.5C27.5102 31.8342 27.2458 31.1958 26.775 30.725L23.525 27.5H32.5C33.163 27.5 33.7989 27.2366 34.2678 26.7678C34.7366 26.2989 35 25.663 35 25C35 24.337 34.7366 23.7011 34.2678 23.2322C33.7989 22.7634 33.163 22.5 32.5 22.5H23.525L26.775 19.275C27.0093 19.0426 27.1953 18.7661 27.3222 18.4614C27.4491 18.1568 27.5145 17.83 27.5145 17.5C27.5145 17.17 27.4491 16.8432 27.3222 16.5386C27.1953 16.2339 27.0093 15.9574 26.775 15.725C26.5426 15.4907 26.2661 15.3047 25.9614 15.1778C25.6568 15.0509 25.33 14.9855 25 14.9855C24.67 14.9855 24.3432 15.0509 24.0386 15.1778C23.7339 15.3047 23.4574 15.4907 23.225 15.725L15.725 23.225ZM0 25C0 29.9445 1.46622 34.778 4.21326 38.8893C6.9603 43.0005 10.8648 46.2048 15.4329 48.097C20.0011 49.9892 25.0277 50.4843 29.8773 49.5196C34.7268 48.555 39.1814 46.174 42.6777 42.6777C46.174 39.1814 48.555 34.7268 49.5196 29.8773C50.4843 25.0277 49.9892 20.0011 48.097 15.4329C46.2048 10.8648 43.0005 6.9603 38.8893 4.21326C34.778 1.46622 29.9445 0 25 0C21.717 0 18.4661 0.646644 15.4329 1.90301C12.3998 3.15938 9.6438 5.00087 7.32233 7.32233C2.63392 12.0107 0 18.3696 0 25V25ZM45 25C45 28.9556 43.827 32.8224 41.6294 36.1114C39.4318 39.4004 36.3082 41.9638 32.6537 43.4776C28.9991 44.9913 24.9778 45.3874 21.0982 44.6157C17.2186 43.844 13.6549 41.9392 10.8579 39.1421C8.06081 36.3451 6.156 32.7814 5.38429 28.9018C4.61259 25.0222 5.00866 21.0009 6.52241 17.3463C8.03616 13.6918 10.5996 10.5682 13.8886 8.37061C17.1776 6.17298 21.0444 5 25 5C30.3043 5 35.3914 7.10714 39.1421 10.8579C42.8929 14.6086 45 19.6957 45 25Z"/>
                    </svg>
                </button>
                <div class="benefits__arrows_count">
                    <div class="count">{{ benefits.index + 1 }}</div>
                    <div class="delim">/</div>
                    <div class="length">4</div>
                </div>
                <button class="benefits__arrow benefits__arrow--next" @click.prevent="benefits.topSlider.go('>')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 50 50" fill="#E5E5E5">
                        <path d="M15.725 23.225C15.4974 23.4628 15.319 23.7431 15.2 24.05C14.95 24.6587 14.95 25.3413 15.2 25.95C15.319 26.2569 15.4974 26.5372 15.725 26.775L23.225 34.275C23.6958 34.7458 24.3342 35.0102 25 35.0102C25.6658 35.0102 26.3042 34.7458 26.775 34.275C27.2458 33.8042 27.5102 33.1658 27.5102 32.5C27.5102 31.8342 27.2458 31.1958 26.775 30.725L23.525 27.5H32.5C33.163 27.5 33.7989 27.2366 34.2678 26.7678C34.7366 26.2989 35 25.663 35 25C35 24.337 34.7366 23.7011 34.2678 23.2322C33.7989 22.7634 33.163 22.5 32.5 22.5H23.525L26.775 19.275C27.0093 19.0426 27.1953 18.7661 27.3222 18.4614C27.4491 18.1568 27.5145 17.83 27.5145 17.5C27.5145 17.17 27.4491 16.8432 27.3222 16.5386C27.1953 16.2339 27.0093 15.9574 26.775 15.725C26.5426 15.4907 26.2661 15.3047 25.9614 15.1778C25.6568 15.0509 25.33 14.9855 25 14.9855C24.67 14.9855 24.3432 15.0509 24.0386 15.1778C23.7339 15.3047 23.4574 15.4907 23.225 15.725L15.725 23.225ZM0 25C0 29.9445 1.46622 34.778 4.21326 38.8893C6.9603 43.0005 10.8648 46.2048 15.4329 48.097C20.0011 49.9892 25.0277 50.4843 29.8773 49.5196C34.7268 48.555 39.1814 46.174 42.6777 42.6777C46.174 39.1814 48.555 34.7268 49.5196 29.8773C50.4843 25.0277 49.9892 20.0011 48.097 15.4329C46.2048 10.8648 43.0005 6.9603 38.8893 4.21326C34.778 1.46622 29.9445 0 25 0C21.717 0 18.4661 0.646644 15.4329 1.90301C12.3998 3.15938 9.6438 5.00087 7.32233 7.32233C2.63392 12.0107 0 18.3696 0 25V25ZM45 25C45 28.9556 43.827 32.8224 41.6294 36.1114C39.4318 39.4004 36.3082 41.9638 32.6537 43.4776C28.9991 44.9913 24.9778 45.3874 21.0982 44.6157C17.2186 43.844 13.6549 41.9392 10.8579 39.1421C8.06081 36.3451 6.156 32.7814 5.38429 28.9018C4.61259 25.0222 5.00866 21.0009 6.52241 17.3463C8.03616 13.6918 10.5996 10.5682 13.8886 8.37061C17.1776 6.17298 21.0444 5 25 5C30.3043 5 35.3914 7.10714 39.1421 10.8579C42.8929 14.6086 45 19.6957 45 25Z"/>
                    </svg>
                </button>
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
                <div class="projects__right"  v-if="sizes.window > 860">
                    <button class="projects__arrow projects__arrow--prev" @click.prevent="projects.slider.go('<')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 50 50" fill="#E5E5E5">
                            <path d="M15.725 23.225C15.4974 23.4628 15.319 23.7431 15.2 24.05C14.95 24.6587 14.95 25.3413 15.2 25.95C15.319 26.2569 15.4974 26.5372 15.725 26.775L23.225 34.275C23.6958 34.7458 24.3342 35.0102 25 35.0102C25.6658 35.0102 26.3042 34.7458 26.775 34.275C27.2458 33.8042 27.5102 33.1658 27.5102 32.5C27.5102 31.8342 27.2458 31.1958 26.775 30.725L23.525 27.5H32.5C33.163 27.5 33.7989 27.2366 34.2678 26.7678C34.7366 26.2989 35 25.663 35 25C35 24.337 34.7366 23.7011 34.2678 23.2322C33.7989 22.7634 33.163 22.5 32.5 22.5H23.525L26.775 19.275C27.0093 19.0426 27.1953 18.7661 27.3222 18.4614C27.4491 18.1568 27.5145 17.83 27.5145 17.5C27.5145 17.17 27.4491 16.8432 27.3222 16.5386C27.1953 16.2339 27.0093 15.9574 26.775 15.725C26.5426 15.4907 26.2661 15.3047 25.9614 15.1778C25.6568 15.0509 25.33 14.9855 25 14.9855C24.67 14.9855 24.3432 15.0509 24.0386 15.1778C23.7339 15.3047 23.4574 15.4907 23.225 15.725L15.725 23.225ZM0 25C0 29.9445 1.46622 34.778 4.21326 38.8893C6.9603 43.0005 10.8648 46.2048 15.4329 48.097C20.0011 49.9892 25.0277 50.4843 29.8773 49.5196C34.7268 48.555 39.1814 46.174 42.6777 42.6777C46.174 39.1814 48.555 34.7268 49.5196 29.8773C50.4843 25.0277 49.9892 20.0011 48.097 15.4329C46.2048 10.8648 43.0005 6.9603 38.8893 4.21326C34.778 1.46622 29.9445 0 25 0C21.717 0 18.4661 0.646644 15.4329 1.90301C12.3998 3.15938 9.6438 5.00087 7.32233 7.32233C2.63392 12.0107 0 18.3696 0 25V25ZM45 25C45 28.9556 43.827 32.8224 41.6294 36.1114C39.4318 39.4004 36.3082 41.9638 32.6537 43.4776C28.9991 44.9913 24.9778 45.3874 21.0982 44.6157C17.2186 43.844 13.6549 41.9392 10.8579 39.1421C8.06081 36.3451 6.156 32.7814 5.38429 28.9018C4.61259 25.0222 5.00866 21.0009 6.52241 17.3463C8.03616 13.6918 10.5996 10.5682 13.8886 8.37061C17.1776 6.17298 21.0444 5 25 5C30.3043 5 35.3914 7.10714 39.1421 10.8579C42.8929 14.6086 45 19.6957 45 25Z"/>
                        </svg>
                    </button>
                    <button class="projects__arrow projects__arrow--next" @click.prevent="projects.slider.go('>')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 50 50" fill="#E5E5E5">
                            <path d="M15.725 23.225C15.4974 23.4628 15.319 23.7431 15.2 24.05C14.95 24.6587 14.95 25.3413 15.2 25.95C15.319 26.2569 15.4974 26.5372 15.725 26.775L23.225 34.275C23.6958 34.7458 24.3342 35.0102 25 35.0102C25.6658 35.0102 26.3042 34.7458 26.775 34.275C27.2458 33.8042 27.5102 33.1658 27.5102 32.5C27.5102 31.8342 27.2458 31.1958 26.775 30.725L23.525 27.5H32.5C33.163 27.5 33.7989 27.2366 34.2678 26.7678C34.7366 26.2989 35 25.663 35 25C35 24.337 34.7366 23.7011 34.2678 23.2322C33.7989 22.7634 33.163 22.5 32.5 22.5H23.525L26.775 19.275C27.0093 19.0426 27.1953 18.7661 27.3222 18.4614C27.4491 18.1568 27.5145 17.83 27.5145 17.5C27.5145 17.17 27.4491 16.8432 27.3222 16.5386C27.1953 16.2339 27.0093 15.9574 26.775 15.725C26.5426 15.4907 26.2661 15.3047 25.9614 15.1778C25.6568 15.0509 25.33 14.9855 25 14.9855C24.67 14.9855 24.3432 15.0509 24.0386 15.1778C23.7339 15.3047 23.4574 15.4907 23.225 15.725L15.725 23.225ZM0 25C0 29.9445 1.46622 34.778 4.21326 38.8893C6.9603 43.0005 10.8648 46.2048 15.4329 48.097C20.0011 49.9892 25.0277 50.4843 29.8773 49.5196C34.7268 48.555 39.1814 46.174 42.6777 42.6777C46.174 39.1814 48.555 34.7268 49.5196 29.8773C50.4843 25.0277 49.9892 20.0011 48.097 15.4329C46.2048 10.8648 43.0005 6.9603 38.8893 4.21326C34.778 1.46622 29.9445 0 25 0C21.717 0 18.4661 0.646644 15.4329 1.90301C12.3998 3.15938 9.6438 5.00087 7.32233 7.32233C2.63392 12.0107 0 18.3696 0 25V25ZM45 25C45 28.9556 43.827 32.8224 41.6294 36.1114C39.4318 39.4004 36.3082 41.9638 32.6537 43.4776C28.9991 44.9913 24.9778 45.3874 21.0982 44.6157C17.2186 43.844 13.6549 41.9392 10.8579 39.1421C8.06081 36.3451 6.156 32.7814 5.38429 28.9018C4.61259 25.0222 5.00866 21.0009 6.52241 17.3463C8.03616 13.6918 10.5996 10.5682 13.8886 8.37061C17.1776 6.17298 21.0444 5 25 5C30.3043 5 35.3914 7.10714 39.1421 10.8579C42.8929 14.6086 45 19.6957 45 25Z"/>
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
                                                $size = 'medium';
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
                    <div class="offer__item" >
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
            <button class="clients__arrow clients__arrow--prev" @click.prevent="clients.slider.go('<')">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 50 50" fill="#E5E5E5">
                    <path d="M15.725 23.225C15.4974 23.4628 15.319 23.7431 15.2 24.05C14.95 24.6587 14.95 25.3413 15.2 25.95C15.319 26.2569 15.4974 26.5372 15.725 26.775L23.225 34.275C23.6958 34.7458 24.3342 35.0102 25 35.0102C25.6658 35.0102 26.3042 34.7458 26.775 34.275C27.2458 33.8042 27.5102 33.1658 27.5102 32.5C27.5102 31.8342 27.2458 31.1958 26.775 30.725L23.525 27.5H32.5C33.163 27.5 33.7989 27.2366 34.2678 26.7678C34.7366 26.2989 35 25.663 35 25C35 24.337 34.7366 23.7011 34.2678 23.2322C33.7989 22.7634 33.163 22.5 32.5 22.5H23.525L26.775 19.275C27.0093 19.0426 27.1953 18.7661 27.3222 18.4614C27.4491 18.1568 27.5145 17.83 27.5145 17.5C27.5145 17.17 27.4491 16.8432 27.3222 16.5386C27.1953 16.2339 27.0093 15.9574 26.775 15.725C26.5426 15.4907 26.2661 15.3047 25.9614 15.1778C25.6568 15.0509 25.33 14.9855 25 14.9855C24.67 14.9855 24.3432 15.0509 24.0386 15.1778C23.7339 15.3047 23.4574 15.4907 23.225 15.725L15.725 23.225ZM0 25C0 29.9445 1.46622 34.778 4.21326 38.8893C6.9603 43.0005 10.8648 46.2048 15.4329 48.097C20.0011 49.9892 25.0277 50.4843 29.8773 49.5196C34.7268 48.555 39.1814 46.174 42.6777 42.6777C46.174 39.1814 48.555 34.7268 49.5196 29.8773C50.4843 25.0277 49.9892 20.0011 48.097 15.4329C46.2048 10.8648 43.0005 6.9603 38.8893 4.21326C34.778 1.46622 29.9445 0 25 0C21.717 0 18.4661 0.646644 15.4329 1.90301C12.3998 3.15938 9.6438 5.00087 7.32233 7.32233C2.63392 12.0107 0 18.3696 0 25V25ZM45 25C45 28.9556 43.827 32.8224 41.6294 36.1114C39.4318 39.4004 36.3082 41.9638 32.6537 43.4776C28.9991 44.9913 24.9778 45.3874 21.0982 44.6157C17.2186 43.844 13.6549 41.9392 10.8579 39.1421C8.06081 36.3451 6.156 32.7814 5.38429 28.9018C4.61259 25.0222 5.00866 21.0009 6.52241 17.3463C8.03616 13.6918 10.5996 10.5682 13.8886 8.37061C17.1776 6.17298 21.0444 5 25 5C30.3043 5 35.3914 7.10714 39.1421 10.8579C42.8929 14.6086 45 19.6957 45 25Z"/>
                </svg>
            </button>
            <button class="clients__arrow clients__arrow--next" @click.prevent="clients.slider.go('>')">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 50 50" fill="#E5E5E5">
                    <path d="M15.725 23.225C15.4974 23.4628 15.319 23.7431 15.2 24.05C14.95 24.6587 14.95 25.3413 15.2 25.95C15.319 26.2569 15.4974 26.5372 15.725 26.775L23.225 34.275C23.6958 34.7458 24.3342 35.0102 25 35.0102C25.6658 35.0102 26.3042 34.7458 26.775 34.275C27.2458 33.8042 27.5102 33.1658 27.5102 32.5C27.5102 31.8342 27.2458 31.1958 26.775 30.725L23.525 27.5H32.5C33.163 27.5 33.7989 27.2366 34.2678 26.7678C34.7366 26.2989 35 25.663 35 25C35 24.337 34.7366 23.7011 34.2678 23.2322C33.7989 22.7634 33.163 22.5 32.5 22.5H23.525L26.775 19.275C27.0093 19.0426 27.1953 18.7661 27.3222 18.4614C27.4491 18.1568 27.5145 17.83 27.5145 17.5C27.5145 17.17 27.4491 16.8432 27.3222 16.5386C27.1953 16.2339 27.0093 15.9574 26.775 15.725C26.5426 15.4907 26.2661 15.3047 25.9614 15.1778C25.6568 15.0509 25.33 14.9855 25 14.9855C24.67 14.9855 24.3432 15.0509 24.0386 15.1778C23.7339 15.3047 23.4574 15.4907 23.225 15.725L15.725 23.225ZM0 25C0 29.9445 1.46622 34.778 4.21326 38.8893C6.9603 43.0005 10.8648 46.2048 15.4329 48.097C20.0011 49.9892 25.0277 50.4843 29.8773 49.5196C34.7268 48.555 39.1814 46.174 42.6777 42.6777C46.174 39.1814 48.555 34.7268 49.5196 29.8773C50.4843 25.0277 49.9892 20.0011 48.097 15.4329C46.2048 10.8648 43.0005 6.9603 38.8893 4.21326C34.778 1.46622 29.9445 0 25 0C21.717 0 18.4661 0.646644 15.4329 1.90301C12.3998 3.15938 9.6438 5.00087 7.32233 7.32233C2.63392 12.0107 0 18.3696 0 25V25ZM45 25C45 28.9556 43.827 32.8224 41.6294 36.1114C39.4318 39.4004 36.3082 41.9638 32.6537 43.4776C28.9991 44.9913 24.9778 45.3874 21.0982 44.6157C17.2186 43.844 13.6549 41.9392 10.8579 39.1421C8.06081 36.3451 6.156 32.7814 5.38429 28.9018C4.61259 25.0222 5.00866 21.0009 6.52241 17.3463C8.03616 13.6918 10.5996 10.5682 13.8886 8.37061C17.1776 6.17298 21.0444 5 25 5C30.3043 5 35.3914 7.10714 39.1421 10.8579C42.8929 14.6086 45 19.6957 45 25Z"/>
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
        <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Af09648f67f59eed6e5cfdf38646c6fef2f6df04c3d947044fcdedf9078c9e3fd&amp;source=constructor" width="100%" height="100%" frameborder="0"></iframe>
    </div>
    <div class="map__in center">
        <div class="map__contacts">
            <div class="map__contacts_left">
                <div class="map__contact map__contact--address">
                    <div class="title">Адрес</div>
                    <div class="text">г. Иркутск, ул. Баррикад, 51/9</div>
                </div>
                <div class="map__contact map__contact--address">
                    <div class="title">Горячая линия</div>
                    <a href="tel:88005512069" class="text">8 800 551-20-69</a>
                </div>
                <div class="map__contact map__contact--address">
                    <div class="title">Телефон</div>
                    <a href="tel:88005512069" class="text">+7 (3952) 265-994</a>
                </div>
                <div class="map__contact map__contact--address">
                    <div class="title">Почта</div>
                    <a href="mailto:opt@auvint.ru" class="text">opt@auvint.ru</a>
                </div>
            </div>
            <div class="map__contacts_right">
                <div class="avatar">
                    <img src='https://dummyimage.com/110x110.jpg' alt=''/>
                </div>
                <div class="texts">
                    <div class="name">Связаться с руководителем</div>
                    <div class="texts_button">Написать</div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>