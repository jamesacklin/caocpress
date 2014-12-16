<div class="share">
	<p><span class="smallcaps">Share:</span>
		<a class="text-btn" href="http://www.facebook.com/sharer.php?u=<? echo urlencode(get_permalink($post->ID)); ?>" rel="nofollow" target="_blank"><i class="fa fa-facebook"></i></a>
		<a class="text-btn" href="http://twitter.com/share?text=<? echo urlencode(get_the_title()); ?>&url=<? echo urlencode(get_permalink($post->ID)); ?>" rel="nofollow" target="_blank"><i class="fa fa-twitter"></i></a>
		<a class="text-btn" href="http://plus.google.com/share?url=<? echo urlencode(get_permalink($post->ID)); ?>" rel="nofollow" target="_blank"><i class="fa fa-google-plus"></i></a>
		<a class="text-btn" href="http://www.linkedin.com/shareArticle?mini=true&url=<? echo urlencode(get_permalink($post->ID)); ?>&title=<? echo urlencode(get_the_title()); ?>&source=<? echo urlencode('Winchester Thurston School'); ?>" rel="nofollow" target="_blank"><i class="fa fa-linkedin"></i></a>
	</p>
</div>
