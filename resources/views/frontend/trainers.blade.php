@extends('frontend.layouts.app')
@section('title','Admission')
@section('content')

<!-- Page Title -->
<div class="page-title" data-aos="fade">

    <div class="heading">
        <div class="container">
            <div class="row d-flex justify-content-center text-center">
                <div class="col-lg-8">

                    <h1>Admissions</h1>

                    <p class="mb-0">
                        Admissions are now open for the Academic Session 2026–27.
                        Join our vibrant learning community where every child is
                        encouraged to dream, learn and succeed.
                    </p>

                </div>
            </div>
        </div>
    </div>

    <nav class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="current">Admissions</li>
            </ol>
        </div>
    </nav>

</div>
<!-- End Page Title -->


<!-- Admission Overview -->

<section id="about-us" class="section about-us">

<div class="container">

<div class="row gy-4">

<div class="col-lg-6 order-1 order-lg-2"
     data-aos="fade-up"
     data-aos-delay="100">

<img src="{{ asset('frontend/assets/img/academics/admission-open.png') }}"
class="img-fluid rounded"
alt="Admission">

</div>


<div class="col-lg-6 order-2 order-lg-1 content"
data-aos="fade-up"
data-aos-delay="200">

<h3>Begin Your Child's Journey With Us</h3>

<p class="fst-italic">

Our admission process is simple, transparent and designed
to help parents choose the best educational environment
for their children.

</p>

<ul>

<li>
<i class="bi bi-check-circle"></i>
<span>Admission Open from Nursery to Class XII</span>
</li>

<li>
<i class="bi bi-check-circle"></i>
<span>Friendly & Transparent Admission Process</span>
</li>

<li>
<i class="bi bi-check-circle"></i>
<span>Experienced Teaching Faculty</span>
</li>

<li>
<i class="bi bi-check-circle"></i>
<span>Safe & Student Friendly Campus</span>
</li>

<li>
<i class="bi bi-check-circle"></i>
<span>Affordable Fee Structure</span>
</li>

</ul>

</div>

</div>

</div>

</section>



<!-- Admission Process -->

<section id="trainers" class="section trainers">

<div class="container">

<div class="container section-title"
data-aos="fade-up">

<h2>Admission</h2>

<p>Admission Process</p>

</div>

<div class="row gy-5">

<!-- Step 1 -->

<div class="col-lg-4 col-md-6 member"
data-aos="fade-up"
data-aos-delay="100">

<div class="member-img">

<img src="{{ asset('frontend/assets/img/admission/step1.jpg') }}"
class="img-fluid"
alt="">

</div>

<div class="member-info text-center">

<h4>Step 1</h4>

<span>Application Form</span>

<p>

Collect or download the admission form and submit
the completed application with basic student details.

</p>

</div>

</div>

<!-- Step 2 -->

<div class="col-lg-4 col-md-6 member"
data-aos="fade-up"
data-aos-delay="200">

<div class="member-img">

<img src="{{ asset('frontend/assets/img/admission/step2.jpg') }}"
class="img-fluid"
alt="">

</div>

<div class="member-info text-center">

<h4>Step 2</h4>

<span>Interaction / Assessment</span>

<p>

Students may attend an interaction or assessment
based on the class for which admission is sought.

</p>

</div>

</div>

<!-- Step 3 -->

<div class="col-lg-4 col-md-6 member"
data-aos="fade-up"
data-aos-delay="300">

<div class="member-img">

<img src="{{ asset('frontend/assets/img/admission/step3.jpg') }}"
class="img-fluid"
alt="">

</div>

<div class="member-info text-center">

<h4>Step 3</h4>

<span>Admission Confirmation</span>

<p>

After document verification and fee submission,
admission will be confirmed officially.

</p>

</div>

</div>

</div>

</div>

</section>
<!-- Admission Process -->
<section id="admission-process" class="section">

  <div class="container section-title" data-aos="fade-up">
    <h2>Admission Process</h2>
    <p>Simple Steps to Join ABC Public School</p>
  </div>

  <div class="container">

    <div class="row gy-4">

      <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
        <div class="features-item text-center">
          <i class="bi bi-file-earmark-text" style="font-size:40px;color:#5fcf80;"></i>
          <h3 class="mt-3">Step 1</h3>
          <p>Collect the Admission Form from the school office or download it online.</p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
        <div class="features-item text-center">
          <i class="bi bi-pencil-square" style="font-size:40px;color:#5fcf80;"></i>
          <h3 class="mt-3">Step 2</h3>
          <p>Fill the application form carefully and attach all required documents.</p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
        <div class="features-item text-center">
          <i class="bi bi-person-check" style="font-size:40px;color:#5fcf80;"></i>
          <h3 class="mt-3">Step 3</h3>
          <p>Student interaction/assessment and parent counselling (if applicable).</p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="400">
        <div class="features-item text-center">
          <i class="bi bi-check-circle" style="font-size:40px;color:#5fcf80;"></i>
          <h3 class="mt-3">Step 4</h3>
          <p>Complete fee payment and receive confirmation of admission.</p>
        </div>
      </div>

    </div>

  </div>

</section>

<!-- Required Documents -->
<section id="documents" class="section light-background">

  <div class="container section-title" data-aos="fade-up">
    <h2>Required Documents</h2>
    <p>Documents to be Submitted</p>
  </div>

  <div class="container">

    <div class="row gy-4">

      <div class="col-lg-6" data-aos="fade-right">
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><i class="bi bi-check-circle-fill text-success me-2"></i>Birth Certificate</li>
          <li class="list-group-item"><i class="bi bi-check-circle-fill text-success me-2"></i>Transfer Certificate (TC)</li>
          <li class="list-group-item"><i class="bi bi-check-circle-fill text-success me-2"></i>Previous Class Report Card</li>
          <li class="list-group-item"><i class="bi bi-check-circle-fill text-success me-2"></i>Aadhaar Card (Student)</li>
        </ul>
      </div>

      <div class="col-lg-6" data-aos="fade-left">
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><i class="bi bi-check-circle-fill text-success me-2"></i>Passport Size Photographs</li>
          <li class="list-group-item"><i class="bi bi-check-circle-fill text-success me-2"></i>Parent Aadhaar Copy</li>
          <li class="list-group-item"><i class="bi bi-check-circle-fill text-success me-2"></i>Address Proof</li>
          <li class="list-group-item"><i class="bi bi-check-circle-fill text-success me-2"></i>Caste Certificate (If Applicable)</li>
        </ul>
      </div>

    </div>

  </div>

</section>

<!-- Call To Action -->
<section id="cta" class="section">

  <div class="container" data-aos="zoom-in">

    <div class="text-center">
      <h2>Admissions Open for Session 2026-27</h2>
      <p>
        Give your child the opportunity to learn, grow and excel in a nurturing,
        disciplined and modern learning environment.
      </p>

      <a href="{{ route('contact') }}" class="btn btn-success btn-lg mt-3">
        Apply Now
      </a>
    </div>

  </div>

</section>


@endsection
