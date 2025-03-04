<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
	.bs-slider-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Black with 50% opacity */
}

</style>

	<div id="carouselExample" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner" role="listbox">
			<!-- Slide 1 -->
			@foreach ($Slide as $index => $item)
			<div class="item {{ $index === 0 ? 'active' : '' }}">
				<div class="se-pre-con"></div>
	
				<!-- Slide Background -->
				<div class="slide-image" style="background-image: url('{{ asset('storage/' . $item->image) }}'); background-size: cover; background-position: center; height: 100vh; width: 100%;">
					<div class="bs-slider-overlay"></div>
	
					<!-- Slide Text Overlay -->
					<div class="container h-100 d-flex align-items-center justify-content-center">
						<div class="row">
							<div class="slide-text text-center text-white">
								<h1 class="{{ $index === 0 ? 'animate__animated animate__zoomIn' : '' }}">
									{{$item->title}}
								</h1>
								<p class="{{ $index === 0 ? 'animate__animated animate__slideInLeft' : '' }}">
									{{$item->sub_title}}
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
	
	<script>
		$('#carouselExample').on('slid.bs.carousel', function (e) {
			// Get the next active slide
			var $activeSlide = $(e.relatedTarget);
	
			// Find the h1 and p tags inside the active slide
			var $slideTitle = $activeSlide.find('h1');
			var $slideSubtitle = $activeSlide.find('p');
	
			// Remove animation classes from all h1 and p elements
			$('h1').removeClass('animate__animated animate__zoomIn');
			$('p').removeClass('animate__animated animate__slideInLeft');
	
			// Add animation classes to the active slide's h1 and p elements
			$slideTitle.addClass('animate__animated animate__zoomIn');
			$slideSubtitle.addClass('animate__animated animate__slideInLeft');
		});
	</script>