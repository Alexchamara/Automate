@extends('layouts.app')
@section('pages')
<main class="main-about-container">
    <section class="about-main-container">
        <div class="about-main-wrapper">
            <img src="{{ asset('assets/about_main.jpg') }}" alt="about_img">
            <div class="about-main-info">
                <h1 class="about-main-titel">Hi, we’re Automate</h1>
                <p class="about-main-sub-titel">We are the fastest growing largest digital automotive
                    marketplace in Sri Lanka.</p>
            </div>
            <div class="sci-icons">
                <a href="https://www.instagram.com/alex.chamara?igsh=MTF4MmdqeHA5MDNtOA%3D%3D&utm_source=qr" target="_blank"><i class="ri-instagram-line"></i></a>
                <a href="https://www.facebook.com/profile.php?id=100070128788033&mibextid=LQQJ4d" target="_blank"><i class="ri-facebook-circle-line"></i></a>
                <a href="#" target="_blank"><i class="ri-tiktok-line"></i></a>
            </div>
        </div>
    </section>

    <!-- section 01 -->
    <section class="about-wrap1">
        <div class="about-w-body">
            <h2 class="about-w-titel">Our mission simple</h2>
            <p class="aw-body-para1">Our purpose is to lead the future of the digital automotive marketplace. We aim to improve the process of buying and selling vehicles, by
                continuously evolving the ecosystem to provide a better experience for consumers, retailers, and manufacturers alike.</p>
        </div>
        <div class="aw-intro">
            <div class="aw-intro-information">
                <div class="aw-intro-info-1">
                    <p class="aw-intro-para">We are the fastest growing largest digital automotive marketplace in Sri Lanka.</p>
                </div>
                <div class="aw-intro-info-2">
                    <p class="aw-intro-para">Here at Automate, we believe that car buying and selling should be straight-forward and enjoyable, not time-consuming, complicated, or stressful.</p><br>
                    <p class="aw-intro-para">We help people find the right car - from the right seller, at the right price - with the latest tools and technology, creating a website that makes buying and selling vehicles clearer and easier for everyone.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- section 02 -->
    <section class="about-wrap2">
        <div class="about-w-body1">
            <h2 class="about-w-titel">Our services for everyone</h2>
            <p class="aw-body-para1">We believe in giving back to the community. So, we made our services are free for everyone.</p>
        </div>
        <div class="aw-intro-wrapper-1">
            <div class="aw-intro-information-1">
                <div class="aw-intro-info-3">
                    <i class="fa fa-3x fa-check-circle text-success"></i>
                    <h2 class="aw-intro-titel">Consumers</h2>
                </div>
                <div class="aw-intro-info-4">
                    <p class="aw-intro-para-1">From desire, to research, to decision - Automate makes the consumer journey easier.</p><br>
                </div>
                <div class="aw-intro-btn">
                    <a href="#" class="aw-intro-btn-1">Find my car<i class="fa-solid fa-arrow-right text-[#A82E23] ml-[5px]"></i></a>
                </div>
            </div>

            <div class="aw-intro-information-1">
                <div class="aw-intro-info-3">
                    <i class="fa fa-3x fa-check-circle text-success"></i>
                    <h2 class="aw-intro-titel">Private sellers</h2>
                </div>
                <div class="aw-intro-info-4">
                    <p class="aw-intro-para-1">We offer a range of products and services to help win the today’s digital automotive marketplace.</p><br>
                </div>
                <div class="aw-intro-btn">
                    <a href="#" class="aw-intro-btn-1">Sell my car<i class="fa-solid fa-arrow-right text-[#A82E23] ml-[5px]"></i></a>
                </div>
            </div>

            <div class="aw-intro-information-1">
                <div class="aw-intro-info-3">
                    <i class="fa fa-3x fa-check-circle text-success"></i>
                    <h2 class="aw-intro-titel">Trade sellers</h2>
                </div>
                <div class="aw-intro-info-4">
                    <p class="aw-intro-para-1">Our platform enables trade sellers to advertise to the largest car buying audience.</p><br>
                </div>
                <div class="aw-intro-btn">
                    <a href="#" class="aw-intro-btn-1">Start selling<i class="fa-solid fa-arrow-right hover:text-white text-[#A82E23] ml-[5px]"></i></a>
                </div>
            </div>


        </div>
    </section>
</main>
@endsection