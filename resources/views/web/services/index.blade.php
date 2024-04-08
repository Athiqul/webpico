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



<!-- Services -->
<section class="container mx-auto my-10">
    <div class="pb-14">
        <h3 class="title">OUR SERVICES</h3>
        <p class="description">Service Excellence in Every Detail</p>
    </div>
    <div class="px-5 md:px-0 grid grid-cols-1 md:grid-cols-3 justify-center gap-6">
        @foreach ($items as $item)
        <div class=" p-5 font-sans bg-primary text-white hover:bg-secondary transition-all duration-200">
            <p class="text-sm my-2">{{ $item->category->name }}</p>
            <h6 class="font-montserrat font-medium text-xl ">{{ $item->subcategory?->name??'' }}</h6>
            <p class="my-2">{!! $item->desc !!}</p>
            <a href="#" class="mt-4 flex gap-3 items-center hover:flex-row-reverse hover:justify-end transition-all duration-300">
                <p class="font-bold text-2xl">READ MORE</p>
                <img src="{{ asset('src/assets/arrow-right.svg') }}" alt="">
            </a>
        </div>
        @endforeach


    </div>

</section>
<!-- Services End -->


<!-- Featured End -->
@include('web.assets.testimonials')
@include('web.assets.latest')
@endsection


