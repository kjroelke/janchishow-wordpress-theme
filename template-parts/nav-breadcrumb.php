<?php
/**
 * Breadcrumbs
 *
 * @package JanchiShow
 * @since 1.0
 */

$content_post_type = 'post' === $post->post_type ? 'blog' : $post->post_type;
?>
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="/">Home</a></li>
		<li class="breadcrumb-item"><a href='<?php echo "/{$content_post_type}"; ?>'><?php echo ucfirst( $content_post_type ); ?></a></li>
		<li class="breadcrumb-item active" aria-current="page"><?php echo $post->post_title; ?></li>
	</ol>
</nav>