<?php
/*
Template Name: Страница Контактов
*/

get_header();


$map_code = get_field('map_code');
$rekvizity = get_field('rekvizity');
$team = get_field('team');
$form_code = get_field('form_code');
$form_image = get_field('form_image');
$form_link = get_field('form_link');



$site_email = get_option('site_email');
$site_phone = get_option('site_phone');
$site_hot = get_option('site_hot');
$site_address = get_option('site_address');

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
    Контакты
</h1>
<? if (!empty($map_code)) { ?>
    <div class="contactsMap">
        <div class="contactsMap__in center">
            <div class="contactsMap__frame">
                <?= $map_code; ?>
            </div>
        </div>
    </div>
<? }; ?>

<div class="contactsInfo">
    <div class="contactsInfo__in center">
        <div class="contactsInfo__items">
            <div class="contactsInfo__item">
                <div class="title">Адрес</div>
                <div class="text">г. Иркутск, ул. Баррикад, 51/9</div>
            </div>
            <? if (!empty($site_phone)) { ?>
                <div class="contactsInfo__item">
                    <div class="title">Телефон</div>
                    <a href="tel:<?= $site_phone; ?>" class="text"><?= $site_phone; ?></a>
                </div>
            <? }; ?>
            <? if (!empty($site_hot)) { ?>
                <div class="contactsInfo__item">
                    <div class="title">Горячая линия</div>
                    <a href="tel:<?= $site_hot; ?>" class="text"><?= $site_hot; ?></a>
                </div>
            <? }; ?>
            <? if (!empty($site_email)) { ?>
                <div class="contactsInfo__item">
                    <div class="title">Почта</div>
                    <a href="mailTo:<?= $site_email; ?>" class="text"><?= $site_email; ?></a>
                </div>
            <? }; ?>
        </div>
    </div>
</div>

<? if (!empty($rekvizity)) { ?>
    <div class="contactsInfo">
        <div class="contactsInfo__in center">
            <div class="contactsInfo__title">Реквизиты</div>
            <div class="contactsInfo__items">
                <? foreach ($rekvizity as $item) { ?>
                    <div class="contactsInfo__item">
                        <div class="title"><?= $item['title']; ?></div>
                        <div class="text"><?= $item['value']; ?></div>
                    </div> 
                <? }; ?>        
            </div>
        </div>
    </div>
<? }; ?>

<? if (!empty($team)) { ?>
    <div class="team_b center">
        <div class="team_b__title">Наша команда</div>
        <div class="team_b__blocks">
            <? foreach ($team as $item) { ?>
                <div class="team_b__block<? if (!empty($item['rukovoditel'])) {  echo ' isBoss'; }; ?>">
                    <div class="team_b__img">
                        <img src="<?= $item['avatar']; ?>" alt="">
                    </div>
                    <div class="team_b__infos">
                        <div class="team_b__name">
                            <span>ФИО</span>
                            <div><?= $item['full_name']; ?></div>
                        </div>
                        <div class="team_b__name">
                            <span>Должность:</span>
                            <div><?= $item['position']; ?></div>
                        </div>
                        <div class="team_b__name">
                            <span>Телефон:</span>
                            <div><?= $item['phone']; ?></div>
                        </div>
                        <div class="team_b__name">
                            <span>Добавочный:</span>
                            <div><?= $item['dop']; ?></div>
                        </div>
                        <div class="team_b__name">
                            <span>Почта:</span>
                            <div><?= $item['email']; ?></div>
                        </div>
                     </div>
                </div>
            <? }; ?>  
        </div>
    </div>
<? }; ?>

<? if (!empty($form_code)) { ?>
    <div class="contactsForm new_forms">
        <div class="contactsForm__in center">
            <div class="contactsForm__left">
            	<div class="contactsForm__title">Связь с руководителем</div>
                <div class="contactsForm__subtitle">Наша компания уже более 10 лет работает в сфере поставки и установки новейшего аудио-видео оборудования. На протяжении этих лет мы постоянно </div>
                <?= do_shortcode($form_code); ?>
            </div>
            <? if (!empty($form_image)) { ?>
                <div class="contactsForm__right">
                    <img src="<?= $form_image; ?>" alt="">
                </div>
            <? }; ?>
            <div class="formBlock__success">
                <div class="title">Спасибо, ваша заявка принята</div>
                <div class="description">Мы свяжемся с вами в ближайшее время. Мы работаем с понедельника по субботу с 10:00 до 18:00. А пока можете посмотреть наше портфолио</div>
                <a href="<?= $form_link; ?>" class="button">Перейти в портфолио</a>
            </div>
        </div>
    </div>
<? }; ?>


<?php
    get_footer();
?>