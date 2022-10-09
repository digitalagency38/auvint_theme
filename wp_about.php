<?php
/*
Template Name: О компании
*/

get_header();

$what_give = get_field('what_give');
$numbers = get_field('numbers');
$clients = get_field('clients');
$sertificates = get_field('список');
$about = get_field('about');
$seo_block = get_field('seo_block');
$form_data = get_field('form_data');

//echo var_dump($services['list']);

?>

      <div class="breadcrumbs">
    <div class="breadcrumbs__in center">
        <?php if(function_exists('bcn_display'))
        {
            bcn_display();
        }?>
    </div>
</div>
<? if (!empty($about)) { ?>
<div class="about">
    <div class="about__in center">
        <div class="about__title"><?= $about['title']; ?></div>
        <div class="about__image">
            <img src='<?= $about['image']; ?>' alt=''/>
        </div>
        <div class="about__texts" :class="{'isOpened': about.textsOpened}">
            <div class="about__texts_left">
                <?= $about['text_left']; ?>
            </div>
            <div class="about__texts_right">
                <?= $about['text_right']; ?>
            </div>
        </div>
        <div class="about__more" v-if="sizes.window <= 1280" @click="about.toggleTexts.apply(about)">
            Показать всё
        </div>
    </div>
</div>
<? }; ?>
<? if (!empty($numbers)) { ?>
    <div class="numbers" style="--background: url('../img/numbers_bg.jpg') 50% 50% / cover no-repeat">
        <div class="numbers__in center">
        <div class="numbers__title"><?= $numbers['title']?></div>
        <div class="numbers__items">
            <?php foreach( $numbers['list'] as $number) {?>
                <div class="numbers__item">
                    <div class="title"><?= $number['title']; ?></div>
                    <div class="text"><?= $number['subtitle']; ?></div>
                </div>
            <? }; ?>
        </div>
        </div>
    </div>
<? }; ?>

<? if (!empty($clients)) { ?>
    <div class="clients" style="--background: url('../img/clients_bg.jpg') 50% 50% / cover no-repeat">
        <div class="clients__in center">
        <div class="clients__row">
            <div class="clients__title">Наши клиенты</div>
            <div class="clients__arrows" v-if="sizes.window > 860">
            <button class="clients__arrow clients__arrow--prev" :class="{'isDisabled': clients.index === 0}" @click.prevent="clients.slider.go('<')">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 50 50" fill="#E5E5E5">
                    <path d="M15.725 23.225C15.4974 23.4628 15.319 23.7431 15.2 24.05C14.95 24.6587 14.95 25.3413 15.2 25.95C15.319 26.2569 15.4974 26.5372 15.725 26.775L23.225 34.275C23.6958 34.7458 24.3342 35.0102 25 35.0102C25.6658 35.0102 26.3042 34.7458 26.775 34.275C27.2458 33.8042 27.5102 33.1658 27.5102 32.5C27.5102 31.8342 27.2458 31.1958 26.775 30.725L23.525 27.5H32.5C33.163 27.5 33.7989 27.2366 34.2678 26.7678C34.7366 26.2989 35 25.663 35 25C35 24.337 34.7366 23.7011 34.2678 23.2322C33.7989 22.7634 33.163 22.5 32.5 22.5H23.525L26.775 19.275C27.0093 19.0426 27.1953 18.7661 27.3222 18.4614C27.4491 18.1568 27.5145 17.83 27.5145 17.5C27.5145 17.17 27.4491 16.8432 27.3222 16.5386C27.1953 16.2339 27.0093 15.9574 26.775 15.725C26.5426 15.4907 26.2661 15.3047 25.9614 15.1778C25.6568 15.0509 25.33 14.9855 25 14.9855C24.67 14.9855 24.3432 15.0509 24.0386 15.1778C23.7339 15.3047 23.4574 15.4907 23.225 15.725L15.725 23.225ZM0 25C0 29.9445 1.46622 34.778 4.21326 38.8893C6.9603 43.0005 10.8648 46.2048 15.4329 48.097C20.0011 49.9892 25.0277 50.4843 29.8773 49.5196C34.7268 48.555 39.1814 46.174 42.6777 42.6777C46.174 39.1814 48.555 34.7268 49.5196 29.8773C50.4843 25.0277 49.9892 20.0011 48.097 15.4329C46.2048 10.8648 43.0005 6.9603 38.8893 4.21326C34.778 1.46622 29.9445 0 25 0C21.717 0 18.4661 0.646644 15.4329 1.90301C12.3998 3.15938 9.6438 5.00087 7.32233 7.32233C2.63392 12.0107 0 18.3696 0 25V25ZM45 25C45 28.9556 43.827 32.8224 41.6294 36.1114C39.4318 39.4004 36.3082 41.9638 32.6537 43.4776C28.9991 44.9913 24.9778 45.3874 21.0982 44.6157C17.2186 43.844 13.6549 41.9392 10.8579 39.1421C8.06081 36.3451 6.156 32.7814 5.38429 28.9018C4.61259 25.0222 5.00866 21.0009 6.52241 17.3463C8.03616 13.6918 10.5996 10.5682 13.8886 8.37061C17.1776 6.17298 21.0444 5 25 5C30.3043 5 35.3914 7.10714 39.1421 10.8579C42.8929 14.6086 45 19.6957 45 25Z"/>
                </svg>
            </button>
            <button class="clients__arrow clients__arrow--next" :class="{'isDisabled': clients.index === <?= count($clients) - 1; ?>}" @click.prevent="clients.slider.go('>')">
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
<? if (!empty($what_give)) { ?>
    <div class="offer">
        <div class="offer__in center">
            <div class="offer__title">Что мы предлагаем</div>
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

<? if (!empty($sertificates)) { ?>
    <div class="sertificates">
        <div class="sertificates__in center">
        <div class="sertificates__row">
            <div class="sertificates__title">Сертификаты</div>
            <div class="sertificates__arrows" v-if="sizes.window > 860">
            <button class="sertificates__arrow sertificates__arrow--prev" :class="{'isDisabled': sertificates.index === 0}" @click.prevent="sertificates.slider.go('<')">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 50 50" fill="#E5E5E5">
                    <path d="M15.725 23.225C15.4974 23.4628 15.319 23.7431 15.2 24.05C14.95 24.6587 14.95 25.3413 15.2 25.95C15.319 26.2569 15.4974 26.5372 15.725 26.775L23.225 34.275C23.6958 34.7458 24.3342 35.0102 25 35.0102C25.6658 35.0102 26.3042 34.7458 26.775 34.275C27.2458 33.8042 27.5102 33.1658 27.5102 32.5C27.5102 31.8342 27.2458 31.1958 26.775 30.725L23.525 27.5H32.5C33.163 27.5 33.7989 27.2366 34.2678 26.7678C34.7366 26.2989 35 25.663 35 25C35 24.337 34.7366 23.7011 34.2678 23.2322C33.7989 22.7634 33.163 22.5 32.5 22.5H23.525L26.775 19.275C27.0093 19.0426 27.1953 18.7661 27.3222 18.4614C27.4491 18.1568 27.5145 17.83 27.5145 17.5C27.5145 17.17 27.4491 16.8432 27.3222 16.5386C27.1953 16.2339 27.0093 15.9574 26.775 15.725C26.5426 15.4907 26.2661 15.3047 25.9614 15.1778C25.6568 15.0509 25.33 14.9855 25 14.9855C24.67 14.9855 24.3432 15.0509 24.0386 15.1778C23.7339 15.3047 23.4574 15.4907 23.225 15.725L15.725 23.225ZM0 25C0 29.9445 1.46622 34.778 4.21326 38.8893C6.9603 43.0005 10.8648 46.2048 15.4329 48.097C20.0011 49.9892 25.0277 50.4843 29.8773 49.5196C34.7268 48.555 39.1814 46.174 42.6777 42.6777C46.174 39.1814 48.555 34.7268 49.5196 29.8773C50.4843 25.0277 49.9892 20.0011 48.097 15.4329C46.2048 10.8648 43.0005 6.9603 38.8893 4.21326C34.778 1.46622 29.9445 0 25 0C21.717 0 18.4661 0.646644 15.4329 1.90301C12.3998 3.15938 9.6438 5.00087 7.32233 7.32233C2.63392 12.0107 0 18.3696 0 25V25ZM45 25C45 28.9556 43.827 32.8224 41.6294 36.1114C39.4318 39.4004 36.3082 41.9638 32.6537 43.4776C28.9991 44.9913 24.9778 45.3874 21.0982 44.6157C17.2186 43.844 13.6549 41.9392 10.8579 39.1421C8.06081 36.3451 6.156 32.7814 5.38429 28.9018C4.61259 25.0222 5.00866 21.0009 6.52241 17.3463C8.03616 13.6918 10.5996 10.5682 13.8886 8.37061C17.1776 6.17298 21.0444 5 25 5C30.3043 5 35.3914 7.10714 39.1421 10.8579C42.8929 14.6086 45 19.6957 45 25Z"/>
                </svg>
            </button>
            <button class="sertificates__arrow sertificates__arrow--next" :class="{'isDisabled': sertificates.index === <?= count($sertificates) - 1; ?>}" @click.prevent="sertificates.slider.go('>')">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 50 50" fill="#E5E5E5">
                    <path d="M15.725 23.225C15.4974 23.4628 15.319 23.7431 15.2 24.05C14.95 24.6587 14.95 25.3413 15.2 25.95C15.319 26.2569 15.4974 26.5372 15.725 26.775L23.225 34.275C23.6958 34.7458 24.3342 35.0102 25 35.0102C25.6658 35.0102 26.3042 34.7458 26.775 34.275C27.2458 33.8042 27.5102 33.1658 27.5102 32.5C27.5102 31.8342 27.2458 31.1958 26.775 30.725L23.525 27.5H32.5C33.163 27.5 33.7989 27.2366 34.2678 26.7678C34.7366 26.2989 35 25.663 35 25C35 24.337 34.7366 23.7011 34.2678 23.2322C33.7989 22.7634 33.163 22.5 32.5 22.5H23.525L26.775 19.275C27.0093 19.0426 27.1953 18.7661 27.3222 18.4614C27.4491 18.1568 27.5145 17.83 27.5145 17.5C27.5145 17.17 27.4491 16.8432 27.3222 16.5386C27.1953 16.2339 27.0093 15.9574 26.775 15.725C26.5426 15.4907 26.2661 15.3047 25.9614 15.1778C25.6568 15.0509 25.33 14.9855 25 14.9855C24.67 14.9855 24.3432 15.0509 24.0386 15.1778C23.7339 15.3047 23.4574 15.4907 23.225 15.725L15.725 23.225ZM0 25C0 29.9445 1.46622 34.778 4.21326 38.8893C6.9603 43.0005 10.8648 46.2048 15.4329 48.097C20.0011 49.9892 25.0277 50.4843 29.8773 49.5196C34.7268 48.555 39.1814 46.174 42.6777 42.6777C46.174 39.1814 48.555 34.7268 49.5196 29.8773C50.4843 25.0277 49.9892 20.0011 48.097 15.4329C46.2048 10.8648 43.0005 6.9603 38.8893 4.21326C34.778 1.46622 29.9445 0 25 0C21.717 0 18.4661 0.646644 15.4329 1.90301C12.3998 3.15938 9.6438 5.00087 7.32233 7.32233C2.63392 12.0107 0 18.3696 0 25V25ZM45 25C45 28.9556 43.827 32.8224 41.6294 36.1114C39.4318 39.4004 36.3082 41.9638 32.6537 43.4776C28.9991 44.9913 24.9778 45.3874 21.0982 44.6157C17.2186 43.844 13.6549 41.9392 10.8579 39.1421C8.06081 36.3451 6.156 32.7814 5.38429 28.9018C4.61259 25.0222 5.00866 21.0009 6.52241 17.3463C8.03616 13.6918 10.5996 10.5682 13.8886 8.37061C17.1776 6.17298 21.0444 5 25 5C30.3043 5 35.3914 7.10714 39.1421 10.8579C42.8929 14.6086 45 19.6957 45 25Z"/>
                </svg>
            </button>
            </div>
        </div>
        <div class="sertificates__slider glide">
            <div class="sertificates__track glide__track" data-glide-el="track">
                <div class="glide__slides sertificates__slides">
                <?php foreach( $sertificates as $sertificate) { ?>
                <div class="sertificates__item">
                    <img src="<?= $sertificate['image'];?>" alt="">
                </div>
                <? }; ?>
                </div>
            </div>
        </div>
        </div>
    </div>
<? }; ?>
<? if (!empty($form_data)) { ?>
<div class="formBlock noMarginBottom">
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