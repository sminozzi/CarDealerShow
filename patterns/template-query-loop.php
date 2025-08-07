<?php

/**
 * Title: List of posts, 1 column
 * Slug: car-dealer-show/template-query-loop
 * Categories: query
 */
?>
<!-- wp:query {"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"layout":{"type":"default"}} -->
<div class="wp-block-query">
	<!-- wp:post-template {"layout":{"type":"default"}} -->
	<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|60"}}},"layout":{"type":"default"}} -->
	<div class="wp-block-group" style="padding-bottom:var(--wp--preset--spacing--60)">
		<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"3/2","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|20"}}}} /-->
		<!-- wp:post-title {"isLink":true,"fontSize":"x-large"} /-->
		<!-- wp:post-content {"layout":{"type":"constrained"}} /-->
		<!-- wp:post-date {"isLink":true,"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}},"fontSize":"small"} /-->
	</div>
	<!-- /wp:group -->
	<!-- /wp:post-template -->

	<!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"space-between"}} -->
	<!-- wp:query-pagination-previous /-->
	<!-- wp:query-pagination-numbers /-->
	<!-- wp:query-pagination-next /-->
	<!-- /wp:query-pagination -->

	<!-- wp:query-no-results -->
	<!-- wp:paragraph -->
	<p><?php echo esc_html_x('Sorry, but nothing was found.', 'Message explaining that there are no results returned from a search.', 'car-dealer-show'); ?></p>
	<!-- /wp:paragraph -->
	<!-- /wp:query-no-results -->
</div>
<!-- /wp:query -->