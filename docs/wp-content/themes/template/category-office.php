<?php get_header(); ?>
	<?php echo category_description($cat); ?>
	<div class="container main-profits-container">
    	<div class="hr filter-black section-title"><div></div></div>
    </div>
	<section id="office-list" class="main-color" style="margin-top: 0; padding-top: 40px;">
    	<div class="container">
			<?php
			$args = array('cat=19' => $cat);
			query_posts( $args );
			if( have_posts() ){ while( have_posts() ){ the_post();
			?>
				<div class="office-list-elem">
					<h3 class="office-elem-title">
							<?php the_field('type');?>
							<?php the_field('S');?>м²
							на <?php the_field('floor');?> этаже
							#<?php the_title(); ?>
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
				                    <div class="office-elem-content-text-metric-title"><nobr>Ставка м²/год</nobr> <nobr><small>(в т.ч. НДС)</small></nobr></div>
				                    <div class="office-elem-content-text-metric-value"><?php the_field('cost');?>₽</div>
				                </div>
				                <div class="office-elem-content-metric">
				                    <div class="office-elem-content-text-metric-title">Статус</div>
				                    <div class="office-elem-content-text-metric-value"><?php the_field('status');?></div>
				                </div>
												<?php if ( has_post_thumbnail() ) { ?>
												<div class="office-elem-content-metric">
													<div class="office-elem-content-text-metric-title">
														Поэтажный план
													</div>
														<div class="office-elem-content-text-metric-title" class="static-thumbnails">
															<a class="thumbnail-item" data-src="<?php echo  wp_get_attachment_image_src( get_post_thumbnail_id(), 'post-thumbnail-big')[0] ?>">
																<img
																	src="<?php echo get_template_directory_uri() ?>/images/icon-plan.svg"
																	width="40%"
																/>
															</a>
														</div>
												</div>
            						<?php } else {} ?>
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
				        <!-- <div class="office-elem-content-image">
				        	<div class="swiper">
						      <div class="swiper-wrapper">
						        <div class="swiper-slide"><img src="<?php echo get_template_directory_uri() ?>/images/services-2.jpg"></div>
						        <div class="swiper-slide"><img src="<?php echo get_template_directory_uri() ?>/images/services-2.jpg"></div>
						        <div class="swiper-slide"><img src="<?php echo get_template_directory_uri() ?>/images/services-2.jpg"></div>
						      </div>
						      <div class="swiper-pagination"></div>
						    </div>
				        </div> -->
				    </div>
				    <div class="office-elem-content-action">
				        <a href="#contacts-form" class="office-elem-content-message-button">Оставить заявку на просмотр</a>
				    </div>
				</div>
			<? } } ?>
		</div>
	</section>
	<?php get_template_part( 'includes/main-clients' );?>
	<?php get_template_part( 'includes/map' );?>
	<?php get_template_part( 'includes/contacts' );?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
