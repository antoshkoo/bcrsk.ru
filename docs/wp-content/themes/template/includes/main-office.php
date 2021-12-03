<a id="office"></a>
<section id="office-list" class="main-color">
  <div class="container">
    <h2 class="section-title white">Аренда офисов</h2>
  </div>
  <div class="container">
    <?php
			$args = array();
			query_posts('cat=19&posts_per_page=1');
			if( have_posts() ){ while( have_posts() ){ the_post();
			?>
    <div class="office-list-elem">
      <h3 class="office-elem-title">
        <!-- <?php the_permalink(); ?>">
						<?php the_field('type');?>
						<?php the_field('S');?>м² на <?php the_field('floor');?> этаже
						#<?php the_title(); ?> -->
      </h3>
      <div class="office-elem-content">
        <div class="office-elem-content-text">
          <div class="office-elem-content-metrics">
            <div class="office-elem-content-metric">
              <div class="office-elem-content-text-metric-title">
                Назначение
              </div>
              <div class="office-elem-content-text-metric-value">
                <?php the_field('type');?>
              </div>
            </div>
            <div class="office-elem-content-metric">
              <div class="office-elem-content-text-metric-title">Площадь</div>
              <div class="office-elem-content-text-metric-value">
                <?php the_field('S');?>
                м²
              </div>
            </div>
            <div class="office-elem-content-metric">
              <div class="office-elem-content-text-metric-title">Этаж</div>
              <div class="office-elem-content-text-metric-value">
                <?php the_field('floor');?>
              </div>
            </div>
            <div class="office-elem-content-metric">
              <div class="office-elem-content-text-metric-title">
                <nobr>Ставка м²/год</nobr> <small>(без ндс)</small>
              </div>
              <div class="office-elem-content-text-metric-value">
                <?php the_field('cost');?>₽
              </div>
            </div>
            <div class="office-elem-content-metric">
              <div class="office-elem-content-text-metric-title">Статус</div>
              <div class="office-elem-content-text-metric-value">
                <?php the_field('status'); ?>
              </div>
            </div>
            <?php if ( has_post_thumbnail() ) { ?>
            <div class="office-elem-content-metric">
              <div class="office-elem-content-text-metric-title">
                Поэтажный план
              </div>
              <div class="office-elem-content-text-metric-title">
                <a href="">
                  <img
                    src="<?php echo get_template_directory_uri() ?>/images/icon-plan.svg"
                    width="40%"
                  />
                </a>
                <!-- <?php echo the_post_thumbnail( 'post-thumbnail-small');?> -->
              </div>
            </div>
            <?php } else {} ?>
          </div>
          <div class="office-elem-content-description">
            <?php the_field('description');?>
          </div>
          <div class="office-elem-content-profits">
            <div class="office-elem-content-profit">
              Местное кондиционирование
            </div>
            <div class="office-elem-content-profit">Приточная вентиляция</div>
            <div class="office-elem-content-profit">Центральное отопление</div>
            <div class="office-elem-content-profit">Доступ 24/7</div>
          </div>
        </div>
        <!--
				        <div class="office-elem-content-image">
				        	<div class="swiper">
						      <div class="swiper-wrapper">
						        <div class="swiper-slide"><img src="<?php echo get_template_directory_uri() ?>/images/services-2.jpg"></div>
						        <div class="swiper-slide"><img src="<?php echo get_template_directory_uri() ?>/images/services-2.jpg"></div>
						        <div class="swiper-slide"><img src="<?php echo get_template_directory_uri() ?>/images/services-2.jpg"></div>
						      </div>
						      <div class="swiper-pagination"></div>
						    </div>
				        </div>
				    	-->
      </div>
      <div class="office-elem-content-action">
        <a href="#contacts-form" class="office-elem-content-message-button"
          >Оставить заявку на просмотр</a
        >
        <a href="/office/" class="office-elem-content-list-button"
          >Все предложения</a
        >
        <!-- <div class="partners cian">
				        	<a href="https://www.cian.ru/delovoy-centr-borodino-plaza-moskva-5536/" target="blank">
				        		<img src="<?php echo get_template_directory_uri() ?>/images/cian.svg" height="35px" alt="Циан">
				        	</a>
				        </div> -->
      </div>
    </div>
    <? } } ?>
    <div class="hr filter-white"><div></div></div>
  </div>
</section>
