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
@php
    $about=App\Models\About::latest()->first();

@endphp
@if ($about)
<section
    class="container mx-auto flex md:justify-between justify-center items-center py-10 flex-wrap gap-10 px-5 md:px-0"
    id="">
    <div class="max-w-[31.25rem]">
        <h2 class="font-bold text-2xl text-primary font-montserrat my-5">ABOUT US</h2>
        <p class="text-black font-montserrat text-xl font-medium    ">{{ $about->about_title }}</p>
        {!! $about->about_short_desc !!}
        <a class="btn-primary" href="{{ route('web.services') }}">Services</a>
    </div>
    <div class="relative">
        <div class="absolute top-0 -bottom-[4px] left-0 -right-[4px] z-[-1] rounded-2xl bg-primary"></div>
        <div class="rounded-2xl overflow-hidden">
            <video width="432px" height="311px" controls
                src="{{ $about->video_link }}"></video>
        </div>
    </div>
</section>
@endif

<!-- About Us End -->

<!-- Services -->
@php
    $services = App\Models\Service::with(['category','subcategory'])->where('status','1')->take(6)->get();
@endphp
@if (count($services)>0)
<section class="container mx-auto my-10">
    <div class="pb-14">
        <h3 class="title">OUR SERVICES</h3>
        <p class="description">Service Excellence in Every Detail</p>
    </div>
    <div class="px-5 md:px-0 grid grid-cols-1 md:grid-cols-3 justify-center gap-6">
        @foreach ($services as $service)
        <div class=" p-5 font-sans bg-primary text-white hover:bg-secondary transition-all duration-200">
            <p class="text-sm my-2">{{ strtoupper($service->category->name) }}</p>
            <h6 class="font-montserrat font-medium text-xl ">{{ $service->subCategory?->name??'' }}</h6>
            {!! $service->desc !!}
            <a href="{{ route('web.services') }}" target="_blank" class="mt-4 flex gap-3 items-center hover:flex-row-reverse hover:justify-end transition-all duration-300">
                <p class="font-bold text-2xl">READ MORE</p>
                <img src="{{ asset('src/assets/arrow-right.svg') }}" alt="">
            </a>
        </div>
        @endforeach


    </div>

</section>
<!-- Services End -->
@endif


@php
    $outworks=App\Models\OurWork::where('status','1')->latest()->take(6)->get();
@endphp

@if (count($outworks)>0)
<section id="" class="container mx-auto py-10">
    <div class="pb-14">
        <h3 class="title">FEATURED WORK</h3>
        <p class="description">Crafting Success Through Expertise</p>
    </div>
    <div class=" grid grid-cols-1 md:grid-cols-2 gap-8 px-5 md:px-0">
        @foreach ($outworks as $item)
        <a href="#" class="bg-primary px-8 pt-10 pb-5 hover:bg-secondary duration-200 transition-all group ">
            <img src="{{ route('public.image',['ourwork',$item->image]) }}" style="max-height: 400px; width:100%" alt="Feature image" class="">
            <h3 class="text-white font-montserrat font-bold text-2xl mt-2">{{ ucwords($item->title) }}</h3>
            <p class="text-secondary font-montserrat text-xl font-medium group-hover:text-primary">{{ ucwords($item->by) }}</p>
        </a>
        @endforeach


    </div>
</section>
@endif
<!-- Featured -->

<!-- Featured End -->
@include('web.assets.testimonials')
@include('web.assets.latest')
@endsection


