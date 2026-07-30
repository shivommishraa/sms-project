@extends('frontend.layouts.app')

@section('title','Home')

@section('content')

    <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <img src="{{ asset('frontend/assets/img/hero-bg.jpg') }}" alt="" data-aos="fade-in">

      <div class="container">
        <h2 data-aos="fade-up" data-aos-delay="100">Welcome to ABC Public School,<br>Shaping Bright Futures</h2>
        <p data-aos="fade-up" data-aos-delay="200">Providing quality education with modern teaching methods, experienced faculty and holistic development for every student.</p>
        <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
          <a href="courses.html" class="btn-get-started">Get Started</a>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
            <img src="{{ asset('frontend/assets/img/about/aboutnew.jpg') }}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-6 order-2 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
            <h3>About Our School</h3>
            <p class="fst-italic">
              ABC Public School is committed to providing quality education in a safe, caring and inspiring environment. We focus on academic excellence, discipline, innovation and personality development to prepare students for a successful future.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> <span>Experienced & Qualified Teachers</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Smart Classrooms, Science & Computer Labs</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Sports, Cultural Activities and Overall Personality Development</span></li>
            </ul>
            <a href="#" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
          </div>

        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Counts Section -->
    <section id="counts" class="section counts light-background">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="1232" data-purecounter-duration="1" class="purecounter"></span>
              <p>Happy Students</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="16" data-purecounter-duration="1" class="purecounter"></span>
              <p>Qualified Teachers</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="22" data-purecounter-duration="1" class="purecounter"></span>
              <p>Classrooms</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="5" data-purecounter-duration="1" class="purecounter"></span>
              <p>Years of Excellence</p>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>

    </section><!-- /Counts Section -->

    <!-- Why Us Section -->
    <section id="why-us" class="section why-us">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="why-box">
              <h3>Why Choose Our School?</h3>
              <p>
                We believe every child deserves quality education, individual attention and opportunities to grow academically, socially and emotionally in a safe learning environment.
              </p>
              <div class="text-center">
                <a href="#" class="more-btn"><span>Learn More</span> <i class="bi bi-chevron-right"></i></a>
              </div>
            </div>
          </div><!-- End Why Box -->

          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="row gy-4" data-aos="fade-up" data-aos-delay="200">

              <div class="col-xl-4">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-clipboard-data"></i>
                  <h4>Quality Education</h4>
                  <p>Modern teaching methods with experienced faculty.</p>
                </div>
              </div><!-- End Icon Box -->

              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-gem"></i>
                  <h4>Smart Learning</h4>
                  <p>Digital classrooms and practical learning experiences.</p>
                </div>
              </div><!-- End Icon Box -->

              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-inboxes"></i>
                  <h4>Safe Campus</h4>
                  <p>Secure campus with CCTV, transport and student-friendly environment.</p>
                </div>
              </div><!-- End Icon Box -->

            </div>
          </div>

        </div>

      </div>

    </section><!-- /Why Us Section -->

    <!-- Features Section -->
    <section id="features" class="features section">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="100">
            <div class="features-item">
              <i class="bi bi-eye" style="color: #ffbb2c;"></i>
              <h3><a href="" class="stretched-link">Smart Classes</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="200">
            <div class="features-item">
              <i class="bi bi-infinity" style="color: #5578ff;"></i>
              <h3><a href="" class="stretched-link">Digital Library</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="300">
            <div class="features-item">
              <i class="bi bi-mortarboard" style="color: #e80368;"></i>
              <h3><a href="" class="stretched-link">Qualified Teachers</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="400">
            <div class="features-item">
              <i class="bi bi-nut" style="color: #e361ff;"></i>
              <h3><a href="" class="stretched-link">Science Lab</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="500">
            <div class="features-item">
              <i class="bi bi-shuffle" style="color: #47aeff;"></i>
              <h3><a href="" class="stretched-link">Computer Lab</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="600">
            <div class="features-item">
              <i class="bi bi-star" style="color: #ffa76e;"></i>
              <h3><a href="" class="stretched-link">Sports Academy</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="700">
            <div class="features-item">
              <i class="bi bi-x-diamond" style="color: #11dbcf;"></i>
              <h3><a href="" class="stretched-link">Music & Dance</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="800">
            <div class="features-item">
              <i class="bi bi-camera-video" style="color: #4233ff;"></i>
              <h3><a href="" class="stretched-link">CCTV Security</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="900">
            <div class="features-item">
              <i class="bi bi-command" style="color: #b2904f;"></i>
              <h3><a href="" class="stretched-link">School Transport</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="1000">
            <div class="features-item">
              <i class="bi bi-dribbble" style="color: #b20969;"></i>
              <h3><a href="" class="stretched-link">Art & Craft</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="1100">
            <div class="features-item">
              <i class="bi bi-activity" style="color: #ff5828;"></i>
              <h3><a href="" class="stretched-link">Medical Facility</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="1200">
            <div class="features-item">
              <i class="bi bi-brightness-high" style="color: #29cc61;"></i>
              <h3><a href="" class="stretched-link">Overall Development</a></h3>
            </div>
          </div><!-- End Feature Item -->

        </div>

      </div>

    </section><!-- /Features Section -->

<!-- Principal Message Section -->
<section id="principal-message" class="courses section">

  <div class="container section-title" data-aos="fade-up">
    <h2>Message</h2>
    <p>Principal's Message</p>
  </div>

  <div class="container">

    <div class="row align-items-center">

      <div class="col-lg-4 text-center" data-aos="fade-right">
        <img src="{{ asset('frontend/assets/img/principal.jpg') }}"
             class="img-fluid rounded shadow"
             alt="Principal">
      </div>

      <div class="col-lg-8" data-aos="fade-left">

        <h3>Welcome to ABC Public School</h3>

        <p>
          Dear Parents and Students,
        </p>

        <p>
          At ABC Public School, we believe education is more than academics.
          Our mission is to nurture confident, responsible and compassionate
          individuals through quality education, innovation and strong values.
        </p>

        <p>
          We are committed to providing every child with opportunities to
          discover their talents, develop leadership qualities and achieve
          excellence in every aspect of life.
        </p>

        <h5 class="mt-4 mb-0">Dr. Rajesh Sharma</h5>
        <small>Principal</small>

      </div>

    </div>

  </div>

</section>
<!-- End Principal Message -->


<!-- Facilities Section -->
<section id="facilities" class="courses section">

  <div class="container section-title" data-aos="fade-up">
    <h2>Facilities</h2>
    <p>World Class Campus Facilities</p>
  </div>

  <div class="container">

    <div class="row">

      <!-- Card 1 -->
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in">

        <div class="course-item">

          <img src="{{ asset('frontend/assets/img/course/course-1.webp') }}"
               class="img-fluid"
               alt="Smart Classroom">

          <div class="course-content">

            <h3>Smart Classrooms</h3>

            <p class="description">
              Interactive digital classrooms with projectors and modern
              teaching techniques that make learning enjoyable and effective.
            </p>

          </div>

        </div>

      </div>

      <!-- Card 2 -->
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in">

        <div class="course-item">

          <img src="{{ asset('frontend/assets/img/course/course-2.webp') }}"
               class="img-fluid"
               alt="Science Lab">

          <div class="course-content">

            <h3>Science & Computer Labs</h3>

            <p class="description">
              Fully equipped laboratories providing practical learning
              experiences in Science and Computer Education.
            </p>

          </div>

        </div>

      </div>

      <!-- Card 3 -->
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in">

        <div class="course-item">

          <img src="{{ asset('frontend/assets/img/course/course-3.webp') }}"
               class="img-fluid"
               alt="Library">

          <div class="course-content">

            <h3>Library & Sports</h3>

            <p class="description">
              A rich library and excellent sports facilities encourage overall
              personality development and lifelong learning.
            </p>

          </div>

        </div>

      </div>

    </div>

  </div>

</section>
<!-- End Facilities Section -->

  </main>

@endsection