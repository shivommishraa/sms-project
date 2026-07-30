@extends('frontend.layouts.app')
@section('title','Academics')
@section('content')

<!-- Page Title -->
<div class="page-title" data-aos="fade">
    <div class="heading">
        <div class="container">
            <div class="row d-flex justify-content-center text-center">
                <div class="col-lg-8">
                    <h1>Academics</h1>
                    <p class="mb-0">
                        Our academic curriculum is designed to inspire curiosity,
                        creativity and excellence while preparing students for
                        lifelong learning and future success.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <nav class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="current">Academics</li>
            </ol>
        </div>
    </nav>
</div>
<!-- End Page Title -->


<!-- Academic Overview -->
<section id="about-us" class="section about-us">

    <div class="container">

        <div class="row gy-4">

            <div class="col-lg-6 order-1 order-lg-2"
                 data-aos="fade-up"
                 data-aos-delay="100">

                <img src="{{ asset('frontend/assets/img/academics/acadamics-images.jpg') }}"
                     class="img-fluid rounded"
                     alt="Academic Overview">

            </div>

            <div class="col-lg-6 order-2 order-lg-1 content"
                 data-aos="fade-up"
                 data-aos-delay="200">

                <h3>Excellence in Learning</h3>

                <p class="fst-italic">
                    We believe that every child has unique abilities. Our
                    curriculum combines academic excellence with practical
                    learning, innovation and character development.
                </p>

                <ul>
                    <li>
                        <i class="bi bi-check-circle"></i>
                        <span>Student-Centered Learning Environment</span>
                    </li>

                    <li>
                        <i class="bi bi-check-circle"></i>
                        <span>Digital Smart Classrooms</span>
                    </li>

                    <li>
                        <i class="bi bi-check-circle"></i>
                        <span>Experienced & Qualified Faculty</span>
                    </li>

                    <li>
                        <i class="bi bi-check-circle"></i>
                        <span>Activity Based Learning</span>
                    </li>

                    <li>
                        <i class="bi bi-check-circle"></i>
                        <span>Continuous Assessment & Progress Tracking</span>
                    </li>
                </ul>

            </div>

        </div>

    </div>

</section>
<!-- End Academic Overview -->


<!-- Curriculum Section -->
<section id="courses" class="courses section">

    <div class="container section-title" data-aos="fade-up">
        <h2>Curriculum</h2>
        <p>Academic Programmes</p>
    </div>

    <div class="container">

        <div class="row">

            <!-- Primary -->
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch"
                 data-aos="zoom-in"
                 data-aos-delay="100">

                <div class="course-item">

                    <img src="{{ asset('frontend/assets/img/academics/primary.jpg') }}"
                         class="img-fluid"
                         alt="Primary">

                    <div class="course-content">

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <p class="category">Primary Wing</p>
                            <p class="price">Nursery - V</p>
                        </div>

                        <h3>Primary Education</h3>

                        <p class="description">
                            Building strong foundations through joyful learning,
                            creativity and essential life skills.
                        </p>

                    </div>

                </div>

            </div>

            <!-- Middle -->
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0"
                 data-aos="zoom-in"
                 data-aos-delay="200">

                <div class="course-item">

                    <img src="{{ asset('frontend/assets/img/academics/middle.jpg') }}"
                         class="img-fluid"
                         alt="Middle">

                    <div class="course-content">

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <p class="category">Middle Wing</p>
                            <p class="price">VI - VIII</p>
                        </div>

                        <h3>Middle School</h3>

                        <p class="description">
                            Developing analytical thinking, creativity,
                            teamwork and confidence through modern education.
                        </p>

                    </div>

                </div>

            </div>

            <!-- Secondary -->
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0"
                 data-aos="zoom-in"
                 data-aos-delay="300">

                <div class="course-item">

                    <img src="{{ asset('frontend/assets/img/academics/secondary.jpg') }}"
                         class="img-fluid"
                         alt="Secondary">

                    <div class="course-content">

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <p class="category">Senior Wing</p>
                            <p class="price">IX - XII</p>
                        </div>

                        <h3>Secondary & Senior Secondary</h3>

                        <p class="description">
                            Preparing students for board examinations,
                            competitive exams and future career opportunities.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
<!-- End Curriculum Section -->
<!-- Academic Facilities Section -->
<section id="academic-facilities" class="section">

  <div class="container">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Academics</h2>
      <p>Our Learning Environment</p>
    </div>

    <div class="row gy-4">

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="icon-box">
          <i class="bi bi-book-half"></i>
          <h4>Smart Classrooms</h4>
          <p>
            Interactive digital classrooms with modern teaching methods
            that make learning engaging and effective.
          </p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="icon-box">
          <i class="bi bi-laptop"></i>
          <h4>Computer Lab</h4>
          <p>
            Well-equipped computer laboratory with internet facilities
            for practical learning and digital education.
          </p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="icon-box">
          <i class="bi bi-flask"></i>
          <h4>Science Laboratory</h4>
          <p>
            Modern Physics, Chemistry and Biology laboratories for
            hands-on experiments and innovation.
          </p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
        <div class="icon-box">
          <i class="bi bi-journal-bookmark"></i>
          <h4>Library</h4>
          <p>
            A rich collection of books, journals and reference materials
            to develop reading habits and knowledge.
          </p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
        <div class="icon-box">
          <i class="bi bi-trophy"></i>
          <h4>Sports & Games</h4>
          <p>
            Indoor and outdoor sports activities that promote physical
            fitness, teamwork and leadership.
          </p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
        <div class="icon-box">
          <i class="bi bi-palette"></i>
          <h4>Arts & Activities</h4>
          <p>
            Music, dance, drawing and cultural activities that encourage
            creativity and confidence.
          </p>
        </div>
      </div>

    </div>

  </div>

</section>
@endsection