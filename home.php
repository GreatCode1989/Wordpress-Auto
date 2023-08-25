<?php
/*
Template Name: home

*/
?>

<?php get_header(); ?>

<section class="services">
    <div class="container">
        <h2 class="title">НАШИ УСЛУГИ</h2>
        <div class="services__inner">
            <div class="services__content">
                <div class="services__content-box">
                    
                      <?php the_field('service-text'); ?>
               
                    </div>
                    <a class="button button--decor" href="#">КОНСУЛЬТАЦИЯ ЭКСПЕРТА</a>
                </div>
            
            <ol class="services__list">
            <?php the_field('service-item'); ?>
            </ol>
        </div>
        </div>
</section>


<section class="benefits">
    <div class="container">
        <div class="benefits__inner">
            <img data-wow-delay="2s" class="benefits__images wow animate__fadeInUp"
                src="<?php the_field('bony-img'); ?>" alt="car">
            <div class="benefits__content">
                <h2 class="title benefits__title">ПОЧЕМУ МЫ?</h2>
                <ul class="benefits__list">
                <?php the_field('benefis-text'); ?>
                </ul>
            </div>
        </div>
    </div>
</section>


<section class="carousel">
    <div class="container">
        <h2 class="title">
            ПРИГНАННЫЕ НАМИ АВТО
        </h2>
        <div class="carousel__inner">

            <?php
            global $post;

            $myposts = get_posts([
                'numberposts' => -1,
                'category'    =>  2
            ]);

            if ($myposts) {
                foreach ($myposts as $post) {
                    setup_postdata($post);
                    ?>

                    <div class="carousel__item">
                        <div class="carousel__item-box">

                            <?php the_post_thumbnail(
                                array(380, 250),
                                array(
                                    'class' => "carousel__item-img"
                                )

                            ); ?>

                            <h4 class="carousel__item-title">
                                <?php the_title(); ?>
                            </h4>
                            <p class="carousel__item-text">
                                <?php the_content(); ?>
                            </p>
                        </div>
                    </div>


                    <?php
                }
            }

            wp_reset_postdata(); // Сбрасываем $post
            ?>



        </div>
    </div>
</section>



<section class="contacts">
    <div class="container">
        <div class="contacts__inner">
            <div class="contacts__info">
                <h2 class="title">
                    КОНТАКТЫ
                </h2>
                <ul class="contacts__list">
                    <li class="contacts__item">
                        <p class="contacts__item-title">Адрес</p>
                        <p class="contacts__item-text">
                        <?php the_field('address') ?>
                        </p>
                    </li>
                    <li class="contacts__item">
                        <p class="contacts__item-title">Время работы</p>
                        <p class="contacts__item-text">
                        <?php the_field('working-hour') ?>
                        </p>
                    </li>
                    <li class="contacts__item">
                        <p class="contacts__item-title">Телефон</p>
                        <p class="contacts__item-text">
                        <a href="<?php the_field('phone-number') ?>"><?php the_field('phone') ?></a>
                        </p>
                    </li>
                </ul>
            </div>
            <form class="contacts__form">
                <h2 class="title contacts__title">Оставить заявку</h2>
               <?php echo do_shortcode('[contact-form-7 id="a9b0806" title="Контактная форма"]') ?>
            </form>
        </div>
    </div>
</section>

<?php get_footer(); ?>