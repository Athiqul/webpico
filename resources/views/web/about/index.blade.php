@extends('web.layout.master')
@section('title')
Webpico | Data Driven SEO & Digital marketing agency.
@endsection
@section('content')

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
@if ($about)
<section id="" class="container mx-auto  pt-36 px-5 md:px-0 grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-14 ">
    <div class="">
        <p class="text-secondary font-montserrat text-xl font-medium">About Us</p>
        <h2 class="text-primary font-bold text-2xl uppercase">{{ $about->about_title }}</h2>
        <div class="w-full max-w-[10rem] my-2 h-1 bg-secondary"></div>
        {!! $about->about_short_desc !!}
        <img src="{{ route('public.image',['about',$about->left_image]) }}" alt="" class="my-10 w-full">
        {!! $about->about_left_desc !!}
    </div>
    <div class="">
        <div class="relative">
            <div class="absolute h-full w-full bg-secondary z-10 rounded-2xl overflow-hidden -bottom-2 -right-2">
            </div>
            <div class="relative z-20 rounded-2xl overflow-hidden">
                <video controls="" src="{{ $about->video_link }}" style="width: 100%"></video>
            </div>
        </div>
        {!! $about->about_right_desc !!}
        <img src="{{ route('public.image',['about',$about->right_image]) }}" alt="" class="my-10 shadow-md">
    </div>
</section>
@endif





<!-- Featured End -->
@include('web.assets.testimonials')
@include('web.assets.latest')
@endsection


