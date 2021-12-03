<?php get_header(); ?>

				<?php
				$args = array('cat' => $cat);
				query_posts( $args );
				if( have_posts() ){ while( have_posts() ){ the_post();
				?>
	<section>
		<div><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2></div>
		<div>
			<?php
			if ( has_post_thumbnail() ) {?>
			<figure itemtype="https://schema.org/ImageObject"><a href="<?php the_permalink(); ?>"><img src="<?php echo the_post_thumbnail_url( $size );?>" alt="<?php the_title(); ?>"/></a></figure>
				<?
			}
			else { }
			?>
			<?php the_excerpt(); ?>

		</div>
	</section>
				<? } } ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
