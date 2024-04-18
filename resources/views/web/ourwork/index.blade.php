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



<!-- Ourwork -->

<section id="" class="container mx-auto pb-10 pt-36">
    <div class=" grid grid-cols-1 md:grid-cols-2 gap-8 px-5 md:px-0">
        @foreach ($items as $item)
        <a href="#" class="bg-primary px-8 pt-10 pb-5 hover:bg-secondary duration-200 transition-all group ">
            <img src="{{ route('public.image',['ourwork',$item->image]) }}" style="width: 100%;max-height:360px;" alt="Feature image" class="">
            <h3 class="text-white font-montserrat font-bold text-2xl mt-2">{{ ucwords($item->title) }}</h3>
            <p class="text-secondary font-montserrat text-xl font-medium group-hover:text-primary">{{ strtoupper($item->by) }}</p>
        </a>
        @endforeach


    </div>

</section>

<!-- Services End -->


<!-- Featured End -->
@include('web.assets.testimonials')
@include('web.assets.latest')
@endsection


