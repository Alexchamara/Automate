@extends('layouts.app')
@section('pages')
<section class="home-main-container">
    <div class="main-text">
        <h1>Find your <br> dream car</h1>
        <span>Search for your dream car from our <br> wide range of cars</span>
        <div class="car-finder">
            <select name="brand" id="brand">
                <option value="DEF">Select</option>
                <option value="ACURA">Acura</option>
                <option value="ASTON MARTIN">Aston Martin</option>
                <option value="AUDI">Audi</option>
                <option value="BENTLEY">Bentley</option>
                <option value="BMW">BMW</option>
                <option value="BUICK">Buick</option>
                <option value="CADILLAC">Cadillac</option>
                <option value="CHEVROLET">Chevrolet</option>
                <option value="CHRYSLER">Chrysler</option>
                <option value="DODGE">Dodge</option>
                <option value="FERRARI">Ferrari</option>
                <option value="FORD">Ford</option>
                <option value="GMC">GMC</option>
                <option value="HONDA">Honda</option>
                <option value="HUMMER">Hummer</option>
                <option value="HYUNDAI">Hyundai</option>
                <option value="INFINITI">Infiniti</option>
                <option value="ISUZU">Isuzu</option>
                <option value="JAGUAR">Jaguar</option>
                <option value="JEEP">Jeep</option>
                <option value="KIA">Kia</option>
                <option value="LAMBORGHINI">Lamborghini</option>
                <option value="LAND ROVER">Land Rover</option>
                <option value="LEXUS">Lexus</option>
                <option value="LINCOLN">Lincoln</option>
                <option value="LOTUS">Lotus</option>
                <option value="MASERATI">Maserati</option>
                <option value="MAYBACH">Maybach</option>
                <option value="MAZDA">Mazda</option>
                <option value="MERCEDES-BENZ">Mercedes-Benz</option>
                <option value="MERCURY">Mercury</option>
                <option value="MINI">Mini</option>
                <option value="MITSUBISHI">Mitsubishi</option>
                <option value="NISSAN">Nissan</option>
                <option value="PONTIAC">Pontiac</option>
                <option value="PORSCHE">Porsche</option>
                <option value="ROLLS-ROYCE">Rolls-Royce</option>
                <option value="SAAB">Saab</option>
                <option value="SATURN">Saturn</option>
                <option value="SUBARU">Subaru</option>
                <option value="SUZUKI">Suzuki</option>
                <option value="TOYOTA">Toyota</option>
                <option value="VOLKSWAGEN">Volkswagen</option>
                <option value="VOLVO">Volvo</option>
            </select>
            <select id="model" name="model">
                <option value="DEF">Model</option>
                <option value="COMMANDER">Commander</option>
                <option value="COMPASS">Compass</option>
                <option value="GRAND CHEROKEE">Grand Cherokee</option>
                <option value="LIBERTY">Liberty</option>
                <option value="PATRIOT">Patriot</option>
                <option value="WRANGLER">Wrangler</option>
            </select>
        </div>
        <button type="submit">Search cars</button>
        <div class="sci-icons">
            <a href="https://www.instagram.com/alex.chamara?igsh=MTF4MmdqeHA5MDNtOA%3D%3D&utm_source=qr" target="_blank"><i class="ri-instagram-line"></i></a>
            <a href="https://www.facebook.com/profile.php?id=100070128788033&mibextid=LQQJ4d" target="_blank"><i class="ri-facebook-circle-line"></i></a>
            <a href="https://www.tiktok.com/@_chathushi_mallawa_?_t=8nucWcohfUO&_r=1" target="_blank"><i class="ri-tiktok-line"></i></a>
        </div>
    </div>
</section>

<main class="home-main">
    <div class="home-main-text">
        <h1>Popular Brands</h1>
        <span>Straight to the best cars. We feature great used and new cars that tick every box.</span>
    </div>
    <div class="home-main-cards">
        <div1>
            <a href="#"><img src="{{ asset('assets/suzuki.png') }}" alt="suzuki">
                <span>Suzuki</span></a>
        </div1>
        <div2>
            <a href="#"><img src="{{ asset('assets/bmw.png') }}" alt="bmw">
                <span>BMW</span></a>
        </div2>
        <div3>
            <a href="#"><img src="{{ asset('assets/honda.png') }}" alt="honda">
                <span>Honda</span></a>
        </div3>
        <div4>
            <a href="#"><img src="{{ asset('assets/mercedes-benz.png') }}" alt="mercedes-benz">
                <span>Mercedes Benz</span></a>
        </div4>
        <div5>
            <a href="#"><img src="{{ asset('assets/nissan.png') }}" alt="nissan">
                <span>Nissan</span></a>
        </div5>
        <div6>
            <a href="#"><img src="{{ asset('assets/toyota.png') }}" alt="toyota">
                <span>Toyota</span></a>
        </div6>
        <div7>
            <a href="#" class="search-car-btn">View all cars<i class="fa-solid fa-arrow-right" style="color: #ffffff; margin-left: 5px;"></i></a>
        </div7>
    </div>

    <div class="sell" id="sell">
        <div class="sell-form">
            <div class="form1">
                <h1>Sell your car</h1>
                <span>Create your advert now. 3 easy steps and it's completely free forever</span>
                <div class="car-selector">
                    <select name="brand" id="brand">
                        <option value="DEF">Select</option>
                        <option value="volvo">Volvo</option>
                        <option value="saab">Saab</option>
                        <option value="mercedes">Mercedes</option>
                        <option value="audi">Audi</option>
                    </select>
                    <select name="model" id="model">
                        <option value="DEF">Model</option>
                        <option value="volvo">Volvo</option>
                        <option value="saab">Saab</option>
                        <option value="mercedes">Mercedes</option>
                        <option value="audi">Audi</option>
                    </select>
                </div>
                <button type="submit">Create your advert</button>
            </div>
            <div class="sell-img">
                <img src="{{ asset('assets/green-car-side.png') }}" alt="sell-car">
            </div>
        </div>
        <div class="sell-infor">
            <h1>Make more money by <br> selling your car with us</h1>
            <div class="sell-infor-list">
                <ul>
                    <li><i class="fa-solid fa-check fa-2lg" style="color: #ffffff;"></i>First time free adverts
                    </li>
                    <li><i class="fa-solid fa-check fa-2lg" style="color: #ffffff;"></i>First time free online
                        valuations</li>
                    <li><i class="fa-solid fa-check fa-2lg" style="color: #ffffff;"></i>Up to 20 photos for an
                        advert</li>
                    <li><i class="fa-solid fa-check fa-2lg" style="color: #ffffff;"></i>Advert reports and analytics
                    </li>
                    <li><i class="fa-solid fa-check fa-2lg" style="color: #ffffff;"></i>Unlimited re-listings</li>
                    <li><i class="fa-solid fa-check fa-2lg" style="color: #ffffff;"></i>Instant messaging with
                        buyers</li>
                    <li><i class="fa-solid fa-check fa-2lg" style="color: #ffffff;"></i>Social media marketing</li>
                    <li><i class="fa-solid fa-check fa-2lg" style="color: #ffffff;"></i>Trade and business accounts
                    </li>
                    <li><i class="fa-solid fa-check fa-2lg" style="color: #ffffff;"></i>AutoMe mobile apps</li>
                </ul>
            </div>
        </div>
    </div>
</main>
@endsection