@extends('frontend.layouts.app')
@section('title','Gallery')

@section('content')

<!-- Page Heading -->
<div class="heading">
    <div class="container">
        <div class="row d-flex justify-content-center text-center">

            <div class="col-lg-8">

                <h1>School Gallery</h1>

                <p class="mb-0">
                    Explore the beautiful moments of our school life.
                    From classroom activities to cultural events, every picture
                    reflects learning, creativity and achievements.
                </p>

            </div>

        </div>
    </div>
</div>


<!-- Breadcrumb -->
<nav class="breadcrumbs">

    <div class="container">

        <ol>
            <li>
                <a href="{{ route('home') }}">Home</a>
            </li>

            <li class="current">
                Gallery
            </li>
        </ol>

    </div>

</nav>



<!-- Gallery Intro Section -->

<section class="section">

<div class="container">


<div class="row align-items-center gy-4">


<div class="col-lg-6" data-aos="fade-right">

<h2>
Memorable Moments of Our Campus
</h2>


<p>
Our gallery showcases the vibrant environment of our school.
Students participate in academic activities, sports, cultural programs
and various events that build confidence and creativity.
</p>


<p>
Every photograph tells a story of teamwork, dedication and joyful
learning experiences.
</p>


</div>



<div class="col-lg-6 text-center" data-aos="fade-left">

<img src="{{ asset('frontend/assets/img/gallery/gallery-main.jpg') }}"
class="img-fluid rounded shadow"
alt="School Gallery">


</div>


</div>


</div>

</section>





<!-- Gallery Category Section -->

<section class="section">

<div class="container">


<div class="row gy-4">


<div class="col-lg-3 col-md-6" data-aos="zoom-in">

<div class="features-item text-center">

<i class="bi bi-book"
style="font-size:40px;color:#5fcf80;"></i>


<h3 class="mt-3">
Academic Activities
</h3>


<p>
Classroom learning, projects and innovative activities.
</p>


</div>

</div>




<div class="col-lg-3 col-md-6" data-aos="zoom-in"
data-aos-delay="100">

<div class="features-item text-center">


<i class="bi bi-trophy"
style="font-size:40px;color:#5fcf80;"></i>


<h3 class="mt-3">
Sports Events
</h3>


<p>
Sports competitions and physical activities.
</p>


</div>

</div>





<div class="col-lg-3 col-md-6" data-aos="zoom-in"
data-aos-delay="200">


<div class="features-item text-center">


<i class="bi bi-music-note-beamed"
style="font-size:40px;color:#5fcf80;"></i>


<h3 class="mt-3">
Cultural Programs
</h3>


<p>
Celebrations, performances and special events.
</p>


</div>

</div>





<div class="col-lg-3 col-md-6" data-aos="zoom-in"
data-aos-delay="300">


<div class="features-item text-center">


<i class="bi bi-people"
style="font-size:40px;color:#5fcf80;"></i>


<h3 class="mt-3">
Student Life
</h3>


<p>
Beautiful memories created by our students.
</p>


</div>

</div>



</div>


</div>


</section>





<!-- Image Gallery -->

<section class="section">

<div class="container">


<div class="row gy-4">


<div class="col-lg-4 col-md-6"
data-aos="fade-up">


<div class="gallery-item">

<img src="{{ asset('frontend/assets/img/gallery/gallery-1.jpg') }}"
class="img-fluid rounded shadow"
alt="Gallery Image">


</div>


</div>



<div class="col-lg-4 col-md-6"
data-aos="fade-up"
data-aos-delay="100">


<div class="gallery-item">


<img src="{{ asset('frontend/assets/img/gallery/gallery-2.jpg') }}"
class="img-fluid rounded shadow"
alt="Gallery Image">


</div>


</div>



<div class="col-lg-4 col-md-6"
data-aos="fade-up"
data-aos-delay="200">


<div class="gallery-item">


<img src="{{ asset('frontend/assets/img/gallery/gallery-3.jpg') }}"
class="img-fluid rounded shadow"
alt="Gallery Image">


</div>


</div>


<!-- Continue Gallery Images -->


<div class="col-lg-4 col-md-6"
data-aos="fade-up"
data-aos-delay="300">


<div class="gallery-item">


<img src="{{ asset('frontend/assets/img/gallery/gallery-4.jpg') }}"
class="img-fluid rounded shadow"
alt="Gallery Image">


</div>


</div>





<div class="col-lg-4 col-md-6"
data-aos="fade-up"
data-aos-delay="400">


<div class="gallery-item">


<img src="{{ asset('frontend/assets/img/gallery/gallery-5.jpg') }}"
class="img-fluid rounded shadow"
alt="Gallery Image">


</div>


</div>





<div class="col-lg-4 col-md-6"
data-aos="fade-up"
data-aos-delay="500">


<div class="gallery-item">


<img src="{{ asset('frontend/assets/img/gallery/gallery-6.jpg') }}"
class="img-fluid rounded shadow"
alt="Gallery Image">


</div>


</div>


</div>


</div>

</section>





<!-- Events Highlight Section -->


<section class="section">


<div class="container">


<div class="row gy-4 align-items-center">


<div class="col-lg-6" data-aos="fade-right">


<h2>
Celebrations & Events
</h2>


<p>
Our school regularly organizes various educational,
cultural and social activities where students get opportunities
to showcase their talents and skills.
</p>



<ul class="list-group list-group-flush">


<li class="list-group-item">

<i class="bi bi-check-circle-fill text-success me-2"></i>

Annual Function Celebration

</li>



<li class="list-group-item">

<i class="bi bi-check-circle-fill text-success me-2"></i>

Sports Day Activities

</li>




<li class="list-group-item">

<i class="bi bi-check-circle-fill text-success me-2"></i>

Science Exhibition

</li>




<li class="list-group-item">

<i class="bi bi-check-circle-fill text-success me-2"></i>

Festival & Cultural Programs

</li>


</ul>


</div>





<div class="col-lg-6" data-aos="fade-left">


<img src="{{ asset('frontend/assets/img/gallery/event-gallery.jpg') }}"
class="img-fluid rounded shadow"
alt="School Events">


</div>


</div>


</div>


</section>






<!-- Admission CTA -->


<section class="section">


<div class="container">


<div class="text-center">


<h2>
Admissions Open for Session 2026-27
</h2>


<p>
Become a part of our learning community where students
are inspired to learn, grow and achieve excellence.
</p>



<a href="{{ route('contact') }}"
class="btn btn-success btn-lg mt-3">

Visit Our School

</a>



</div>


</div>


</section>





<!-- Gallery CSS -->


<style>


.gallery-item{

overflow:hidden;
border-radius:10px;

}


.gallery-item img{

transition:0.4s ease;
width:100%;

}



.gallery-item:hover img{

transform:scale(1.08);

}




.features-item{

padding:30px 20px;
border-radius:10px;
background:#fff;
box-shadow:0 0 20px rgba(0,0,0,0.08);
transition:0.3s;

}



.features-item:hover{

transform:translateY(-8px);

}



.list-group-item{

padding:15px;
font-size:16px;

}



</style>



@endsection