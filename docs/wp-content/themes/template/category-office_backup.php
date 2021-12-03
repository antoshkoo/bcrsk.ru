<?php get_header(); ?>
	<?php echo category_description($cat); ?>

	<section id="office-list">
    	<div class="container">
			<?php
			$args = array('cat' => $cat);
			query_posts( $args );
			if( have_posts() ){ while( have_posts() ){ the_post();
			?>
				<div class="office-list-elem">
					<h3 class="office-elem-title">
						<a href="<?php the_permalink(); ?>">
							<?php the_field('type');?>
							<?php the_field('S');?>м²
							на <?php the_field('floor');?> этаже
							#<?php the_title(); ?>
						</a>
					</h3>
					<div class="office-elem-content">
				        <div class="office-elem-content-text">
				            <div class="office-elem-content-metrics">
				                <div class="office-elem-content-metric">
				                    <div class="office-elem-content-text-metric-title">Назначение</div>
				                    <div class="office-elem-content-text-metric-value"><?php the_field('type');?></div>
				                </div>
				                <div class="office-elem-content-metric">
				                    <div class="office-elem-content-text-metric-title">Площадь</div>
				                    <div class="office-elem-content-text-metric-value"><?php the_field('S');?> м²</div>
				                </div>
				                <div class="office-elem-content-metric">
				                    <div class="office-elem-content-text-metric-title">Этаж</div>
				                    <div class="office-elem-content-text-metric-value"><?php the_field('floor');?></div>
				                </div>
				                <div class="office-elem-content-metric">
				                    <div class="office-elem-content-text-metric-title"><nobr>Ставка м²/год</nobr> <small>(без ндс)</small></div>
				                    <div class="office-elem-content-text-metric-value"><?php the_field('cost');?>₽</div>
				                </div>
				                <div class="office-elem-content-metric">
				                    <div class="office-elem-content-text-metric-title">Статус</div>
				                    <div class="office-elem-content-text-metric-value"><?php $category = get_the_category($post->ID); $current_cat_id = $category[1]->cat_ID; $current_cat_name = $category[1]->name; echo $current_cat_name;?></div>
				                </div>
				            </div>
				            <div class="office-elem-content-description">
				                <?php the_field('description');?>
				            </div>
				            <div class="office-elem-content-profits">
				                <div class="office-elem-content-profit">Местное кондиционирование</div>
				                <div class="office-elem-content-profit">Приточная вентиляция</div>
				                <div class="office-elem-content-profit">Центральное отопление</div>
				                <div class="office-elem-content-profit">Доступ 24/7</div>
				            </div>
				        </div>
				        <div class="office-elem-content-image">
				        	<div class="swiper">
						      <div class="swiper-wrapper">
						        <div class="swiper-slide"><img src="<?php echo get_template_directory_uri() ?>/images/services-2.jpg"></div>
						        <div class="swiper-slide"><img src="<?php echo get_template_directory_uri() ?>/images/services-2.jpg"></div>
						        <div class="swiper-slide"><img src="<?php echo get_template_directory_uri() ?>/images/services-2.jpg"></div>
						      </div>
						      <div class="swiper-pagination" ></div>
						    </div>
				        </div>
				    </div>
				    <div class="office-elem-content-action">
				        <button class="office-elem-content-action-button js-open-modal" data-modal="modal-offer">Оставить заявку на просмотр</button>
				    </div>
				</div>
			<? } } ?>
		</div>
	</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
