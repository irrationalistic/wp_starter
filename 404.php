<?
/*
 Errors come here!
*/
?>

<? get_header(); ?>
			<div id="content">
				<div id="inner-content" class="wrap clearfix">
					<article id="post-not-found" class="clearfix">
						<header>
							<h1><? _e("Post not found!", THEME_DOMAIN); ?></h1>
						</header>
						<section class="clearfix">
							<p><? _e("Something is missing, please try again!", THEME_DOMAIN); ?></p>
						</section>
						<footer>
							<p><? _e("Error message: 404.php", THEME_DOMAIN); ?></p>
						</footer>
					</article>
				</div>
			</div>
<? get_footer(); ?>