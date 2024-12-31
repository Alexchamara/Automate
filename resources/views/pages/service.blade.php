@extends('layouts.app')
@section('pages')
<main class="main-serivce-container">
    <section class="service-titel-img relative w-full h-[600px] bg-[#eaeaeac5] z-[-1] overflow-hidden diagonal-stripe shadow-3xl">
        <div class="service-titel-info">
            <h1 class="s-titel1 top-t">Get our services</h1>
            <h3 class="s-titel2 top-t">Find out how much a car is worth</h3>
            <span class="s-phara top-t">See what you could get if you sold your car yourself, <br>or get a guide price of you’re looking to buy.</span>
        </div>
        <div class="img-wrapper">
            <div class="l-img">
                <div class="m-img"></div>
            </div>
        </div>
    </section>

    <!-- section 01 -->
    <section class="s-wrap1">
        <h2 class="s-w-titel">Motor Insurance Sri Lanka</h2>
        <div class="s-w-body">
            <div class="sw-body-info">
                <p class="sw-body-para1">Our vehicle insurance policy is customised to suit the vehicle you drive; whether it’s a car, a bike or even a tuk-tuk. Each of our motor insurance covers can be personalised to suit your vehicle’s brand, model and other key details, so you only pay for what you need. Switch to a more convenient and reliable insurance policy for your vehicles with Fairfirst Insurance at the click of a button. Getting your insurance has never been easier!</p>
                <div class="s-w-link">
                    <div>
                        <a href="#" class="sw-link1">Car Insurance<i class="fa-solid fa-arrow-right" style="color: #7B7B7B; margin-left: 5px;"></i></a>
                    </div>
                    <div>
                        <a href="#" class="sw-link2">Motorcycle Insurance<i class="fa-solid fa-arrow-right" style="color: #7B7B7B; margin-left: 5px;"></i></a>
                    </div>
                    <div>
                        <a href="#" class="sw-link3">Three-Wheeler Insurance<i class="fa-solid fa-arrow-right" style="color: #7B7B7B; margin-left: 5px;"></i></a>
                    </div>
                    <div>
                        <a href="#" class="sw-link4">Commercial Vehicle Insurance<i class="fa-solid fa-arrow-right" style="color: #7B7B7B; margin-left: 5px;"></i></a>
                    </div>
                </div>
            </div>
            <div class="sw-imgs1">
                <img src="{{ asset('assets/insurence.png') }}" alt="insurence">
            </div>
        </div>
    </section>

    <!-- section 02 -->
    <section class="s-wrap2">
        <h2 class="s-w-titel">Motor Auto Loan</h2>
        <div class="s-w-body1">
            <div class="sw-body-info">
                <p class="sw-body-para2">Get your dream vehicle with the least hassle and stay stress-free with this easy solution, applicable to cars, vans, dual cabs and SUVs.</p>
                <div class="w-link">
                    <h3 class="text-[20px] text-black tracking-[3px] font-semibold mt-[40px]">Benifits</h3>
                    <div class="sw-loan-list">
                        <ul>
                            <li>Negotiable repayment period.</li>
                            <li>Attractive interest rates and minimum monthly
                                instalment set only up to the interest applicable for
                                the particular month.</li>
                            <li>Apply as individual/joint or corporates.</li>
                            <li>Loan repayment period extended up to 72 months
                                for greater affordability and enabling a low monthly rental.</li>
                            <li> Replacement of the vehicle purchased using the loan
                                with a newer or different model possible during the repayment period.</li>

                        </ul>
                    </div>
                </div>
                <div class="mt-[30px]">
                    <a href="#" class="loan-btn" id="">Apply your finance</a>
                </div>
            </div>
            <div class="w-imgs2">
                <img src="{{ asset('assets/Finance.png') }}" alt="finance">
            </div>
        </div>
    </section>

    <!-- section 03 -->
    <section class="s-wrap3">
        <h2 class="s-w-titel">Auto Repair</h2>
        <div class="s-w-body">
            <div class="sw-body-info">
                <p class="sw-body-para1">Auto Repair being Sri Lanka’s largest and the best auto service network; also has the most diverse service portfolio. Auto Repair is your one stop station for all of your maintenance work, repairs, and services.</p><br>
                <p class="sw-body-para1">Auto Repair ’s updated state-of-the-art equipment present at all our sites, powered by our skilled personnel, has a proven track-record of delivering the finest preventive maintenance and care to all our clients—this includes expertise in servicing the very latest vehicle types as well. Leveraging our commitment to excellence, we have entered into strategic partnerships with many leading global brands of car products, like Toyota, Kia, 3M, and the Kobe Motor Company, contributing more to our goal of providing our clients with the very best services.</p>
                <div class="mt-[30px]">
                    <a href="#" class="loan-btn" id="">Learn more</a>
                </div>
            </div>
            <div class="sw-imgs3">
                <img src="{{ asset('assets/service.png') }}" alt="service">
            </div>
        </div>
    </section>
</main>
@endsection