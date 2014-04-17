<?php
/*
Template Name: Home Page
*/
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<div class="hero-wrapper">
	<div class="home-hero">
		<div class="big-background">
			<video autoplay="1" loop="1">
				<!-- <source src="<?= get_template_directory_uri().'/images/video.mp4' ?>">
				<source src="<?= get_template_directory_uri().'/images/video.webm' ?>"> -->
			</video>
		</div>
		<h1><img src="<?= get_template_directory_uri().'/images/logo-caoc-white.svg' ?>" alt="City As Our Campus"></h1>
	</div>
	<div class="home-intro">
		<div class="container-fluid">
			<p>City as Our Campus is an immersive learning experience that engages students at <a href="http://www.winchesterthurston.org/">The Winchester Thurston School</a> as researchers, advocates, and artists in and around the city of&nbsp;Pittsburgh.</p>
			<p>The program emphasizes collaboration, understanding diverse sources, systems thinking, applied empathy, communication, and&nbsp;reflection.</p>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="home-section">
		<div class="symbol">
			<img src="<?= get_template_directory_uri().'/images/symbol-network.svg' ?>">
		</div>
		<div class="text">
			<h2 class="subheading"><a href="/action">CAOC in Action</a></h2>
			<hr />
			<p>What does <strong>community-based learning</strong> look like at Winchester Thurston School? How do teachers integrate field visits partnerships into their courses? Watch videos that answer these questions. Be inspired to take learning into your community and share ways in which you implemented these or similar projects at your schools.</p>
		</div>
		<div class="image">
			<img src="<?= get_template_directory_uri().'/images/photo-home-1.jpg' ?>" alt="" />
		</div>
	</div>
	<div class="home-section">
		<div class="symbol">
			<img src="<?= get_template_directory_uri().'/images/symbol-volunteer.svg' ?>">
		</div>
		<div class="text">
			<h2 class="subheading"><a href="/impact">Impact</a></h2>
			<hr />
			<p>Discover the impact of City as Our Campus on student learning and the city of Pittsburgh. Consider different ways to assess student learning. Listen to students describe their growth and community partners discuss the positive impact the students have on the ground. Imagine the ways your school can contribute to the vitality of your city.</p>
		</div>
		<div class="image">
			<img src="<?= get_template_directory_uri().'/images/photo-home-2.jpg' ?>" alt="" />
		</div>
	</div>
	<div class="home-section">
		<div class="symbol">
			<img src="<?= get_template_directory_uri().'/images/symbol-book.svg' ?>" alt="">
		</div>
		<div class="text">
			<h2 class="subheading"><a href="/portfolio">Portfolio</a></h2>
			<hr />
			<p>Explore student work and reflections from the Lower, Middle and Upper School, including student designed windmills that produce clean energy in urban environments, development plans for Pittsburgh's largest remaining brownfield, urban systems thinking with second graders, animation with local filmmakers, and much more.</p>
		</div>
		<div class="image">
			<img src="<?= get_template_directory_uri().'/images/photo-home-3.jpg' ?>" alt="" />
		</div>
	</div>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>