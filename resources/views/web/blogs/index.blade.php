@extends('web.layout.master')
@section('title')
Webpico | Data Driven SEO & Digital marketing agency.
@endsection
@section('content')

<!-- Banner Section End -->

<!-- Clients -->

<!-- Clients End -->


<section id="" class="container pb-10 mx-auto pt-36 px-5 md:px-0 grid grid-cols-3 gap-14">
    <!-- Cards -->
    <div class="h-fit col-span-3 md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-5">
        @foreach ($items as $item)
        <a href="{{ route('web.blog_details',encrypt($item->id)) }}">
        <div style="background-image: url({{ route('public.image',['blogs',$item->image]) }})" class="w-full bg-primary  bg-cover h-60 md:h-72 group">
            <div class="h-full w-full bg-[#0077B5DB] py-8 px-5 hidden group-hover:block">
                <div class="border border-white text-white p-5 h-full flex flex-col justify-around">
                    <p class="font-montserrat font-medium text-center text-lg">
                        {{ ucwords($item->title) }}
                    </p>
                    <div class="">
                        <p class="text-sm font-sans text-center">@php
                            $tag=explode(',',$item->tags);
                        @endphp {{ ucwords($tag[0]) }}</p>

                        @php
                            $perminuteWords=200;
                            $words=str_word_count(strip_tags($item->desc));
                            $minutes=ceil($words/$perminuteWords);

                        @endphp
                        <p class="text-sm font-sans text-center">{{ date('M d,Y',strtotime($item->created_at)) }} ({{ $minutes }} {{ $minutes==1?'min':'mins' }} read)</p>
                    </div>
                </div>
            </div>
        </div>
    </a>
        @endforeach

{{-- {{ $items->links() }} --}}

    </div>
    <!-- Cards End -->
    <div class="col-span-3 md:col-span-1">

        <!-- Categories -->
        <div class="my-10">
            <div class="divide-y shadow-md">
                @foreach ($tagList as $tag)
                <a href="{{ route('web.blog_tags') }}?tag={{ $tag }}" class="flex items-center justify-between py-4 px-5 group fill-neutral text-neutral hover:bg-secondary hover:text-white hover:fill-white ">
                    <p class="font-sans">{{ $tag }}</p>
                    <svg class="fill-inherit" width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.5303 6.53033C14.8232 6.23744 14.8232 5.76256 14.5303 5.46967L9.75736 0.6967C9.46447 0.403807 8.98959 0.403807 8.6967 0.6967C8.40381 0.989593 8.40381 1.46447 8.6967 1.75736L12.9393 6L8.6967 10.2426C8.40381 10.5355 8.40381 11.0104 8.6967 11.3033C8.98959 11.5962 9.46447 11.5962 9.75736 11.3033L14.5303 6.53033ZM-6.55671e-08 6.75L14 6.75L14 5.25L6.55671e-08 5.25L-6.55671e-08 6.75Z"></path>
                    </svg>
                </a>
                @endforeach


            </div>
        </div>
        <!-- Recent Blogs -->
        <div class="my-10 space-y-5">
            <div class="flex items-center gap-10">
                <p class="font-montserrat text-xl whitespace-nowrap font-medium">Recent Blogs</p>
                <div class="h-1 bg-secondary w-full"></div>
            </div>
            @foreach ($recentBlogs as $item)
            <a href="{{ route('web.blog_details',encrypt($item->id)) }}" class="flex gap-3 h-28 group hover:bg-neutral">
                <div class="w-32 h-full">
                    <img class="h-full w-full" src="{{ route('public.image',['blogs',$item->image]) }}" alt="{{ $item->title }}">
                </div>
                <div class="font-sans flex flex-col justify-between py-3">
                    <p class="line-clamp-2">{{ ucwords($item->title) }}</p>
                    <div class="">
                        <p class="text-sm text-secondary">
                           @php
                                $tag=explode(',',$item->tags);
                            @endphp {{ ucwords($tag[0]) }}
                        </p>

                        @php
                        $perminuteWords=200;
                        $words=str_word_count(strip_tags($item->desc));
                        $minutes=ceil($words/$perminuteWords);

                    @endphp
                        <p class="text-neutral text-[10px] group-hover:text-black">{{ date('M d,Y',strtotime($item->created_at)) }} ({{ $minutes }} {{ $minutes==1?'min':'mins' }} read)</p>
                    </div>
                </div>
            </a>
            @endforeach


        </div>
        <div class="my-10">
            <div class="flex items-center gap-10">
                <p class="font-montserrat text-xl whitespace-nowrap font-medium">Tags</p>
                <div class="h-1 bg-secondary w-full"></div>
            </div>
            <div class="my-5 divide-y shadow-lg">
                @foreach ($tagList as $tag)
                <a href="#" class="flex items-center justify-between py-4 px-5 group fill-neutral text-neutral hover:bg-secondary hover:text-white hover:fill-white ">
                    <p class="font-sans">{{ $tag }}</p>
                    <svg class="fill-inherit" width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.5303 6.53033C14.8232 6.23744 14.8232 5.76256 14.5303 5.46967L9.75736 0.6967C9.46447 0.403807 8.98959 0.403807 8.6967 0.6967C8.40381 0.989593 8.40381 1.46447 8.6967 1.75736L12.9393 6L8.6967 10.2426C8.40381 10.5355 8.40381 11.0104 8.6967 11.3033C8.98959 11.5962 9.46447 11.5962 9.75736 11.3033L14.5303 6.53033ZM-6.55671e-08 6.75L14 6.75L14 5.25L6.55671e-08 5.25L-6.55671e-08 6.75Z"></path>
                    </svg>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</section>



<!-- Featured End -->
@include('web.assets.testimonials')
@include('web.assets.latest')
@endsection
