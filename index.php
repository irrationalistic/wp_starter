<?
/*
 Base Content Fallback. View files will end up here if
 they aren't stopped by another template file.
*/
?>

<? get_header(); ?>
			<div id="content">
				<div id="inner-content" class="wrap clearfix">
					<? if(have_posts()) : while(have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <? post_class('clearfix'); ?> role="article">
						<header>
							<h1><? the_title(); ?>
						</header>
						<section class="clearfix">
							<? the_content(); ?>
						</section>
						<footer>

						</footer>
					</article>

					<? endwhile; ?>
					<? else: ?>

					

					<? endif; ?>
				</div>
			</div>
<? get_footer(); ?>