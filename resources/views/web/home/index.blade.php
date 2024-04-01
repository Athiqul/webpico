@extends('web.layout.master')
@section('title')
Webpico | Data Driven SEO & Digital marketing agency.
@endsection
@section('content')
<section class="relative block h-[80vh] overflow-x-hidden z-[0] " id="">
    <div
        class="absolute  mx-auto h-[80vh] bg-red-500   bg-cover bg-no-repeat w-screen" style="background-image: url('{{ asset('src/assets/bg-home.jpg') }}')">
        <div class="container mx-auto flex items-end h-full pb-14 px-5 md:px-0">
            <div class="font-sans max-w-[27.5rem] space-y-5 ">
                <p class="text-white text-sm pt-20 md:pt-0">Unlocking Digital Success </br> with Expert Marketing
                    Strategies</p>
                <h3 class="font-bold text-white text-4xl">Digital marketing agency</h3>
                <p class="text-primary">We specialize in driving online growth and brand recognition. Our team of
                    digital experts is
                    dedicated to boosting your online presence, increasing ROI, and ensuring your business stands
                    out in
                    the digital landscape. Explore our services and let's start your journey to digital success
                    today
                </p>
                <div class="flex gap-10">
                    <button class="btn-primary">Services</button>
                    <button class="contact">Contact Us</button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Section End -->

<!-- Clients -->
<section class="bg-primary mb-10" id="">
    <div class="container mx-auto grid grid-cols-2 md:grid-cols-5 divide-x-0 md:divide-x">
        <div class="py-11 px-6 w-full group  duration-300 transition-all flex justify-center">
            <img class="opacity-50 group-hover:opacity-100 duration-300 transition-all " src="./assets/company.svg"
                alt="">
        </div>
        <div class="py-11 px-6 w-full group  duration-300 transition-all flex justify-center">
            <img class="opacity-50 group-hover:opacity-100 duration-300 transition-all " src="./assets/company.svg"
                alt="">
        </div>
        <div class="py-11 px-6 w-full group  duration-300 transition-all flex justify-center">
            <img class="opacity-50 group-hover:opacity-100 duration-300 transition-all " src="./assets/company.svg"
                alt="">
        </div>
        <div class="py-11 px-6 w-full group duration-300 transition-all flex justify-center">
            <img class="opacity-50 group-hover:opacity-100 duration-300 transition-all " src="./assets/company.svg"
                alt="">
        </div>
        <div class="py-11 px-6 w-full group col-span-2 md:col-span-1 duration-300 transition-all flex justify-center">
            <img class="opacity-50 group-hover:opacity-100 duration-300 transition-all " src="./assets/company.svg"
                alt="">
        </div>
    </div>
</section>
<!-- Clients End -->

<!-- About Us -->
<section
    class="container mx-auto flex md:justify-between justify-center items-center py-10 flex-wrap gap-10 px-5 md:px-0"
    id="">
    <div class="max-w-[31.25rem]">
        <h2 class="font-bold text-2xl text-primary font-montserrat my-5">ABOUT US</h2>
        <p class="text-black font-montserrat text-xl font-medium    ">At Digital Life, we are more than </br>
            just a digital marketing agency</p>
        <p class="font-sans my-5">we are your strategic partner in achieving digital excellence. With a rich
            tapestry of
            services, including web development, SEO, IT support, email marketing, and comprehensive digital
            marketing solutions, we empower businesses to thrive in the digital age.
        </p>
        <a class="btn-primary" href="">Services</a>
    </div>
    <div class="relative">
        <div class="absolute top-0 -bottom-[4px] left-0 -right-[4px] z-[-1] rounded-2xl bg-primary"></div>
        <div class="rounded-2xl overflow-hidden">
            <video width="432px" height="311px" controls
                src="http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4"></video>
        </div>
    </div>
</section>
<!-- About Us End -->

<!-- Services -->
<section class="container mx-auto my-10">
    <div class="pb-14">
        <h3 class="title">OUR SERVICES</h3>
        <p class="description">Service Excellence in Every Detail</p>
    </div>
    <div class="px-5 md:px-0 grid grid-cols-1 md:grid-cols-3 justify-center gap-6">
        <div class=" p-5 font-sans bg-primary text-white hover:bg-secondary transition-all duration-200">
            <p class="text-sm my-2">SEO</p>
            <h6 class="font-montserrat font-medium text-xl ">Local SEO</h6>
            <p class="my-2">Our Search Engine Optimization (SEO) service is designed to boost your online visibility
                and
                organic search rankings. We employ a comprehensive approach to SEO, focusing on both on-page and
                off-page optimization techniques.</p>
            <a href="#" class="mt-4 flex gap-3 items-center hover:flex-row-reverse hover:justify-end transition-all duration-300">
                <p class="font-bold text-2xl">READ MORE</p>
                <img src="./assets/arrow-right.svg" alt="">
            </a>
        </div>
        <div class=" p-5 font-sans bg-primary text-white hover:bg-secondary transition-all duration-200">
            <p class="text-sm my-2">SEO</p>
            <h6 class="font-montserrat font-medium text-xl ">E-Commerce</h6>
            <p class="my-2">Our Search Engine Optimization (SEO) service is designed to boost your online visibility
                and
                organic search rankings. We employ a comprehensive approach to SEO, focusing on both on-page and
                off-page optimization techniques.</p>
            <a href="#" class="mt-4 flex gap-3 items-center hover:flex-row-reverse hover:justify-end transition-all duration-300 ">
                <p class="font-bold text-2xl">READ MORE</p>
                <img src="./assets/arrow-right.svg" alt="">
            </a>
        </div>
        <div class=" p-5 font-sans bg-primary text-white hover:bg-secondary transition-all duration-200">
            <p class="text-sm my-2">SEO</p>
            <h6 class="font-montserrat font-medium text-xl ">Multi-Location</h6>
            <p class="my-2">Our Search Engine Optimization (SEO) service is designed to boost your online visibility
                and
                organic search rankings. We employ a comprehensive approach to SEO, focusing on both on-page and
                off-page optimization techniques.</p>
            <a href="#" class="mt-4 flex gap-3 items-center hover:flex-row-reverse hover:justify-end transition-all duration-300 ">
                <p class="font-bold text-2xl">READ MORE</p>
                <img src="./assets/arrow-right.svg" alt="">
            </a>
        </div>
        <div class=" p-5 font-sans bg-primary text-white hover:bg-secondary transition-all duration-200">
            <p class="text-sm my-2">Digital Marketing</p>
            <h6 class="font-montserrat font-medium text-xl ">SMM</h6>
            <p class="my-2">Our Search Engine Optimization (SEO) service is designed to boost your online visibility
                and
                organic search rankings. We employ a comprehensive approach to SEO, focusing on both on-page and
                off-page optimization techniques.</p>
            <a href="#" class="mt-4 flex gap-3 items-center hover:flex-row-reverse hover:justify-end transition-all duration-300 ">
                <p class="font-bold text-2xl">READ MORE</p>
                <img src="./assets/arrow-right.svg" alt="">
            </a>
        </div>
        <div class=" p-5 font-sans bg-primary text-white hover:bg-secondary transition-all duration-200">
            <p class="text-sm my-2">Digital Marketing</p>
            <h6 class="font-montserrat font-medium text-xl ">Google Ads</h6>
            <p class="my-2">Our Search Engine Optimization (SEO) service is designed to boost your online visibility
                and
                organic search rankings. We employ a comprehensive approach to SEO, focusing on both on-page and
                off-page optimization techniques.</p>
            <a href="#" class="mt-4 flex gap-3 items-center hover:flex-row-reverse hover:justify-end transition-all duration-300 ">
                <p class="font-bold text-2xl">READ MORE</p>
                <img src="./assets/arrow-right.svg" alt="">
            </a>
        </div>
        <div class=" p-5 font-sans bg-primary text-white hover:bg-secondary transition-all duration-200">
            <p class="text-sm my-2">Digital Marketing</p>
            <h6 class="font-montserrat font-medium text-xl ">Content Marketing</h6>
            <p class="my-2">Our Search Engine Optimization (SEO) service is designed to boost your online visibility
                and
                organic search rankings. We employ a comprehensive approach to SEO, focusing on both on-page and
                off-page optimization techniques.</p>
            <a href="#" class="mt-4 flex gap-3 items-center hover:flex-row-reverse hover:justify-end transition-all duration-300 ">
                <p class="font-bold text-2xl">READ MORE</p>
                <img src="./assets/arrow-right.svg" alt="">
            </a>
        </div>
        <div
            class="col-span-1 md:col-span-3 bg-primary grid grid-cols-1 md:grid-cols-3 group hover:bg-secondary transition-all duration-200">
            <div class=""></div>
            <div class="  p-5 font-sans bg-primary text-white group-hover:bg-secondary transition-all duration-200">
                <p class="text-sm my-2">Video</p>
                <h6 class="font-montserrat font-medium text-xl ">Video Editing</h6>
                <p class="my-2">Our Search Engine Optimization (SEO) service is designed to boost your online
                    visibility and
                    organic search rankings. We employ a comprehensive approach to SEO, focusing on both on-page and
                    off-page optimization techniques.</p>
                <a href="#" class="mt-4 flex gap-3 items-center hover:flex-row-reverse hover:justify-end transition-all duration-300 ">
                    <p class="font-bold text-2xl">READ MORE</p>
                    <img src="./assets/arrow-right.svg" alt="">
                </a>
            </div>
            <div class=""></div>
        </div>
    </div>

</section>
<!-- Services End -->

<!-- Featured -->
<section id="" class="container mx-auto py-10">
    <div class="pb-14">
        <h3 class="title">FEATURED WORK</h3>
        <p class="description">Crafting Success Through Expertise</p>
    </div>
    <div class=" grid grid-cols-1 md:grid-cols-2 gap-8 px-5 md:px-0">
        <a href="#" class="bg-primary px-8 pt-10 pb-5 hover:bg-secondary duration-200 transition-all group ">
            <img src="./assets/feature-img.jpeg" alt="Feature image" class="">
            <h3 class="text-white font-montserrat font-bold text-2xl mt-2">SOCIAL MEDIA MARKETING</h3>
            <p class="text-secondary font-montserrat text-xl font-medium group-hover:text-primary">Above IT</p>
        </a>
        <a href="#" class="bg-primary px-8 pt-10 pb-5 hover:bg-secondary duration-200 transition-all group ">
            <img src="./assets/feature-img.jpeg" alt="Feature image" class="">
            <h3 class="text-white font-montserrat font-bold text-2xl mt-2">SOCIAL MEDIA MARKETING</h3>
            <p class="text-secondary font-montserrat text-xl font-medium group-hover:text-primary">Above IT</p>
        </a>
        <a href="#" class="bg-primary px-8 pt-10 pb-5 hover:bg-secondary duration-200 transition-all group ">
            <img src="./assets/feature-img.jpeg" alt="Feature image" class="">
            <h3 class="text-white font-montserrat font-bold text-2xl mt-2">SOCIAL MEDIA MARKETING</h3>
            <p class="text-secondary font-montserrat text-xl font-medium group-hover:text-primary">Above IT</p>
        </a>
        <a href="#" class="bg-primary px-8 pt-10 pb-5 hover:bg-secondary duration-200 transition-all group ">
            <img src="./assets/feature-img.jpeg" alt="Feature image" class="">
            <h3 class="text-white font-montserrat font-bold text-2xl mt-2">SOCIAL MEDIA MARKETING</h3>
            <p class="text-secondary font-montserrat text-xl font-medium group-hover:text-primary">Above IT</p>
        </a>
    </div>
</section>
<!-- Featured End -->

@endsection


