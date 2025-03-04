<!doctype html>

<html lang="en">

  <head>

    <!-- Required meta tags -->

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">



    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <link href="{{asset('assets/css/slider.css')}}" rel="stylesheet">

    <title>Carousel with Overlay and Animations</title>



    <style>

        .carousel-item {

            position: relative;

        }



        /* Overlay style */

        .carousel-caption-overlay {

            position: absolute;

            top: 0;

            left: 0;

            width: 100%;

            height: 100%;

            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black */

            display: flex;

            justify-content: center;

            align-items: center;

        }



        /* Text styling */

        .slide-text {

            color: #fff;

            text-align: center;

        }



        .slide-text h1, .slide-text p {

            margin: 0;

            padding: 10px;

        }

    </style>

  </head>

  <body>

    <div class="container-fluid">

        <div class="row ">

            <div class="col-md-12 m-0 p-0">

                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">

                    <div class="carousel-inner">

                    @foreach ($Slide as $index => $item)

                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">

                          <img src="{{ asset('storage/' . $item->image) }}" class="d-block w-100 slide-image" style="height: 100vh" alt="...">

                          <div class="carousel-caption-overlay">

                              <div class="slide-text">

                                  <h1 >

                                      {{ $item->title }}

                                  </h1>

                                  <p>

                                      {{ $item->sub_title }}

                                  </p>

                              </div>

                          </div>

                        </div>

                    @endforeach

                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">

                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>

                      <span class="visually-hidden">Previous</span>

                    </button>

                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">

                      <span class="carousel-control-next-icon" aria-hidden="true"></span>

                      <span class="visually-hidden">Next</span>

                    </button>

                </div>

            </div>

        </div>

    </div>



    <!-- Bootstrap JS with Popper -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>



    <script>

        const carouselElement = document.querySelector('#carouselExampleFade');

        const carousel = new bootstrap.Carousel(carouselElement);



        // Add event listener to the carousel

        carouselElement.addEventListener('slide.bs.carousel', function (e) {

            const activeSlide = e.relatedTarget; // The slide that is coming into view

            const slideText = activeSlide.querySelector('.slide-text h1');

            const slideSubtitle = activeSlide.querySelector('.slide-text p');



            // Remove animation classes from the previous slide

            const prevSlideText = document.querySelector('.carousel-item.active .slide-text h1');

            const prevSlideSubtitle = document.querySelector('.carousel-item.active .slide-text p');



            if (prevSlideText && prevSlideSubtitle) {

                prevSlideText.classList.remove('animate__zoomIn');

                prevSlideSubtitle.classList.remove('animate__slideInLeft');

            }



            // Apply animation classes to the new slide

            setTimeout(() => {

                slideText.classList.add('animate__animated', 'animate__zoomIn');

                slideSubtitle.classList.add('animate__animated', 'animate__slideInLeft');

            }, 200); // Delay to ensure the animation starts after slide transition

        });

    </script>

  </body>

</html>

