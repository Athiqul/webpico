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
    <div class="h-fit col-span-3 md:col-span-2">
        <div class="h-56 md:h-96">
            <img class="h-full w-full" src="{{ route('public.image',['blogs',$item->image]) }}" alt="" srcset="">
        </div>
        <div class="mt-3 flex justify-between flex-wrap items-start md:items-center">
            <div class="flex items-center flex-wrap gap-2 md:gap-5 font-sans ">
                <p class="text-secondary">@php
                    $tag=explode(',',$item->tags);
                @endphp {{ ucwords($tag[0]) }}</p>
                <div class="h-2 w-2 rounded-full bg-neutral"></div>
                @php
                $perminuteWords=200;
                $words=str_word_count(strip_tags($item->desc));
                $minutes=ceil($words/$perminuteWords);

            @endphp
                <p class="text-neutral">{{ date('M d,Y',strtotime($item->created_at)) }} ({{ $minutes }} {{ $minutes==1?'min':'mins' }} read)</p>
            </div>
            <div class="font-sans flex items-center gap-3">
                <p class="">Share:</p>
                <div class="flex gap-2">
                    <a href="" class="">
                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.00033 3.38847C4.5583 3.38847 4.13438 3.56406 3.82182 3.87663C3.50925 4.18919 3.33366 4.61311 3.33366 5.05514V15.0551C3.33366 15.4971 3.50925 15.9211 3.82182 16.2336C4.13438 16.5462 4.5583 16.7218 5.00033 16.7218H15.0003C15.4423 16.7218 15.8662 16.5462 16.1788 16.2336C16.4914 15.9211 16.667 15.4971 16.667 15.0551V5.05514C16.667 4.61311 16.4914 4.18919 16.1788 3.87663C15.8662 3.56406 15.4423 3.38847 15.0003 3.38847H5.00033ZM5.00033 1.7218H15.0003C15.8844 1.7218 16.7322 2.07299 17.3573 2.69811C17.9825 3.32324 18.3337 4.17108 18.3337 5.05514V15.0551C18.3337 15.9392 17.9825 16.7871 17.3573 17.4121C16.7322 18.0373 15.8844 18.3885 15.0003 18.3885H5.00033C4.11627 18.3885 3.26843 18.0373 2.6433 17.4121C2.01818 16.7871 1.66699 15.9392 1.66699 15.0551V5.05514C1.66699 4.17108 2.01818 3.32324 2.6433 2.69811C3.26843 2.07299 4.11627 1.7218 5.00033 1.7218Z" fill="#FF6B00"></path>
                            <path d="M9.16667 12.9618V17.1285H10.8333V12.9618H12.5L12.9167 11.2951H10.8333V9.91596C10.8333 9.15096 10.87 8.9643 10.97 8.77596C11.0278 8.66363 11.1192 8.57213 11.2317 8.5143C11.42 8.41346 11.7358 8.37764 12.5 8.37764H12.9175V6.79431C12.4817 6.73181 12.1267 6.71015 11.8525 6.72765C11.1608 6.77181 10.765 6.87431 10.4467 7.04515C10.0433 7.25821 9.71342 7.5878 9.5 7.99097C9.28333 8.39846 9.16667 8.80263 9.16667 9.9168V11.2951H7.5V12.9618H9.16667Z" fill="#FF6B00"></path>
                            </svg>

                    </a>
                    <a href="" class="">
                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.0003 7.55513C9.33733 7.55513 8.70141 7.81853 8.23256 8.28737C7.76372 8.75622 7.50033 9.39214 7.50033 10.0551C7.50033 10.7181 7.76372 11.3541 8.23256 11.8229C8.70141 12.2917 9.33733 12.5551 10.0003 12.5551C10.6633 12.5551 11.2992 12.2917 11.7681 11.8229C12.2369 11.3541 12.5003 10.7181 12.5003 10.0551C12.5003 9.39214 12.2369 8.75622 11.7681 8.28737C11.2992 7.81853 10.6633 7.55513 10.0003 7.55513ZM10.0003 5.88847C11.1054 5.88847 12.1652 6.32745 12.9466 7.10886C13.728 7.89026 14.167 8.95005 14.167 10.0551C14.167 11.1602 13.728 12.2201 12.9466 13.0014C12.1652 13.7828 11.1054 14.2218 10.0003 14.2218C8.89524 14.2218 7.83545 13.7828 7.05405 13.0014C6.27264 12.2201 5.83366 11.1602 5.83366 10.0551C5.83366 8.95005 6.27264 7.89026 7.05405 7.10886C7.83545 6.32745 8.89524 5.88847 10.0003 5.88847ZM15.417 5.68014C15.417 5.9564 15.3072 6.22135 15.1119 6.4167C14.9166 6.61205 14.6516 6.7218 14.3753 6.7218C14.0991 6.7218 13.8341 6.61205 13.6387 6.4167C13.4434 6.22135 13.3337 5.9564 13.3337 5.68014C13.3337 5.40387 13.4434 5.13892 13.6387 4.94357C13.8341 4.74822 14.0991 4.63847 14.3753 4.63847C14.6516 4.63847 14.9166 4.74822 15.1119 4.94357C15.3072 5.13892 15.417 5.40387 15.417 5.68014ZM10.0003 3.38847C7.93866 3.38847 7.60199 3.3943 6.64283 3.4368C5.98949 3.46764 5.55116 3.55513 5.14449 3.71347C4.80418 3.83842 4.4965 4.03869 4.24449 4.2993C3.98367 4.5513 3.78312 4.85895 3.65783 5.1993C3.49949 5.60763 3.41199 6.04514 3.38199 6.69764C3.33866 7.61764 3.33366 7.9393 3.33366 10.0551C3.33366 12.1168 3.33949 12.4535 3.38199 13.4126C3.41283 14.0651 3.50033 14.5043 3.65783 14.9101C3.79949 15.2726 3.96616 15.5335 4.24283 15.8101C4.52366 16.0901 4.78449 16.2576 5.14283 16.396C5.55449 16.5551 5.99283 16.6435 6.64283 16.6735C7.56283 16.7168 7.88449 16.7218 10.0003 16.7218C12.062 16.7218 12.3987 16.716 13.3578 16.6735C14.0095 16.6426 14.4487 16.5551 14.8553 16.3976C15.1952 16.2721 15.5026 16.0722 15.7553 15.8126C16.0362 15.5318 16.2037 15.271 16.342 14.9126C16.5003 14.5018 16.5887 14.0626 16.6187 13.4126C16.662 12.4926 16.667 12.171 16.667 10.0551C16.667 7.99347 16.6612 7.6568 16.6187 6.69764C16.5878 6.04597 16.5003 5.60597 16.342 5.1993C16.2164 4.8593 16.0162 4.55177 15.7562 4.2993C15.5042 4.03834 15.1966 3.83778 14.8562 3.71264C14.4478 3.5543 14.0095 3.4668 13.3578 3.4368C12.4378 3.39347 12.1162 3.38847 10.0003 3.38847ZM10.0003 1.7218C12.2645 1.7218 12.547 1.73014 13.4353 1.7718C14.3228 1.81347 14.927 1.95264 15.4587 2.1593C16.0087 2.37097 16.472 2.65764 16.9353 3.12014C17.3591 3.53672 17.687 4.04063 17.8962 4.5968C18.102 5.12763 18.242 5.73263 18.2837 6.62013C18.3228 7.50847 18.3337 7.79097 18.3337 10.0551C18.3337 12.3193 18.3253 12.6018 18.2837 13.4901C18.242 14.3776 18.102 14.9818 17.8962 15.5135C17.6876 16.07 17.3596 16.574 16.9353 16.9901C16.5187 17.4137 16.0147 17.7416 15.4587 17.951C14.9278 18.1568 14.3228 18.2968 13.4353 18.3385C12.547 18.3776 12.2645 18.3885 10.0003 18.3885C7.73616 18.3885 7.45366 18.3801 6.56533 18.3385C5.67783 18.2968 5.07366 18.1568 4.54199 17.951C3.9856 17.7422 3.4816 17.4142 3.06533 16.9901C2.6415 16.5736 2.3136 16.0697 2.10449 15.5135C1.89783 14.9826 1.75866 14.3776 1.71699 13.4901C1.67783 12.6018 1.66699 12.3193 1.66699 10.0551C1.66699 7.79097 1.67533 7.50847 1.71699 6.62013C1.75866 5.7318 1.89783 5.12847 2.10449 4.5968C2.31303 4.04028 2.64099 3.53623 3.06533 3.12014C3.48172 2.69616 3.98568 2.36824 4.54199 2.1593C5.07366 1.95264 5.67699 1.81347 6.56533 1.7718C7.45366 1.73264 7.73616 1.7218 10.0003 1.7218Z" fill="#FF6B00"></path>
                            </svg>

                    </a>
                    <a href="" class="">
                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.00033 3.38847C4.5583 3.38847 4.13438 3.56406 3.82182 3.87663C3.50925 4.18919 3.33366 4.61311 3.33366 5.05514V15.0551C3.33366 15.4971 3.50925 15.9211 3.82182 16.2336C4.13438 16.5462 4.5583 16.7218 5.00033 16.7218H15.0003C15.4423 16.7218 15.8662 16.5462 16.1788 16.2336C16.4914 15.9211 16.667 15.4971 16.667 15.0551V5.05514C16.667 4.61311 16.4914 4.18919 16.1788 3.87663C15.8662 3.56406 15.4423 3.38847 15.0003 3.38847H5.00033ZM5.00033 1.7218H15.0003C15.8844 1.7218 16.7322 2.07299 17.3573 2.69811C17.9825 3.32324 18.3337 4.17108 18.3337 5.05514V15.0551C18.3337 15.9392 17.9825 16.7871 17.3573 17.4121C16.7322 18.0373 15.8844 18.3885 15.0003 18.3885H5.00033C4.11627 18.3885 3.26843 18.0373 2.6433 17.4121C2.01818 16.7871 1.66699 15.9392 1.66699 15.0551V5.05514C1.66699 4.17108 2.01818 3.32324 2.6433 2.69811C3.26843 2.07299 4.11627 1.7218 5.00033 1.7218Z" fill="#FF6B00"></path>
                            <path d="M13.3497 7.62971C13.7426 7.3886 14.0027 7.0595 14.13 6.64096C13.7712 6.83497 13.3863 6.97595 12.9872 7.0595C12.6454 6.692 12.2127 6.50533 11.6941 6.50533C11.1871 6.50533 10.7588 6.68325 10.4093 7.02937C10.2405 7.19372 10.1071 7.39081 10.0171 7.60856C9.92717 7.8263 9.88267 8.06012 9.88625 8.29568C9.88625 8.44589 9.90517 8.58006 9.94308 8.69381C8.44783 8.64281 7.21021 8.02249 6.23507 6.8286C6.06979 7.12075 5.98715 7.41825 5.98715 7.72596C5.98715 8.35839 6.25402 8.85956 6.78681 9.22756C6.48298 9.20181 6.21514 9.12498 5.98715 8.99906C5.98715 9.45073 6.11986 9.82789 6.38577 10.1599C6.64406 10.4835 7.00808 10.7056 7.41389 10.7875C7.26223 10.8264 7.10229 10.8449 6.93798 10.8449C6.78632 10.8449 6.67889 10.8322 6.61521 10.8045C6.72702 11.1725 6.93798 11.471 7.24277 11.6995C7.54409 11.9282 7.91061 12.0547 8.28889 12.0606C7.64139 12.5686 6.90104 12.8199 6.06347 12.8199C5.85833 12.8199 5.71298 12.817 5.625 12.8015C6.44993 13.3371 7.36819 13.6031 8.38417 13.6031C9.42392 13.6031 10.3428 13.3396 11.1423 12.8126C11.942 12.2886 12.5322 11.6421 12.9113 10.8808C13.2862 10.1442 13.4815 9.32931 13.481 8.50281V8.27527C13.8305 8.01759 14.1331 7.70171 14.3755 7.34145C14.0482 7.48332 13.7031 7.58029 13.3497 7.62971Z" fill="#FF6B00"></path>
                            </svg>

                    </a>
                    <a href="" class="">
                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.1663 10.9972V14.0781H12.3805V11.2031C12.3805 10.4814 12.1222 9.98889 11.4755 9.98889C10.9822 9.98889 10.688 10.3206 10.5588 10.6422C10.5122 10.7572 10.4997 10.9172 10.4997 11.0772V14.0781H8.71301C8.71301 14.0781 8.73717 9.20972 8.71301 8.70556H10.4997V9.46639L10.488 9.48389H10.4997V9.46723C10.7372 9.10056 11.1605 8.57889 12.1097 8.57889C13.2847 8.57889 14.1663 9.34722 14.1663 10.9972ZM6.84384 6.11471C6.23301 6.11471 5.83301 6.51637 5.83301 7.04304C5.83301 7.55971 6.22134 7.97221 6.82051 7.97221H6.83217C7.45551 7.97221 7.84301 7.55887 7.84301 7.04304C7.83134 6.51637 7.45551 6.11471 6.84384 6.11471ZM5.93884 14.0781H7.72551V8.70556H5.93884V14.0781Z" fill="#FF6B00"></path>
                            <path d="M5.00033 3.38847C4.5583 3.38847 4.13438 3.56406 3.82182 3.87663C3.50925 4.18919 3.33366 4.61311 3.33366 5.05514V15.0551C3.33366 15.4971 3.50925 15.9211 3.82182 16.2336C4.13438 16.5462 4.5583 16.7218 5.00033 16.7218H15.0003C15.4423 16.7218 15.8662 16.5462 16.1788 16.2336C16.4914 15.9211 16.667 15.4971 16.667 15.0551V5.05514C16.667 4.61311 16.4914 4.18919 16.1788 3.87663C15.8662 3.56406 15.4423 3.38847 15.0003 3.38847H5.00033ZM5.00033 1.7218H15.0003C15.8844 1.7218 16.7322 2.07299 17.3573 2.69811C17.9825 3.32324 18.3337 4.17108 18.3337 5.05514V15.0551C18.3337 15.9392 17.9825 16.7871 17.3573 17.4121C16.7322 18.0373 15.8844 18.3885 15.0003 18.3885H5.00033C4.11627 18.3885 3.26843 18.0373 2.6433 17.4121C2.01818 16.7871 1.66699 15.9392 1.66699 15.0551V5.05514C1.66699 4.17108 2.01818 3.32324 2.6433 2.69811C3.26843 2.07299 4.11627 1.7218 5.00033 1.7218Z" fill="#FF6B00"></path>
                            </svg>

                    </a>
                </div>
            </div>
        </div>
        <div class="mt-5">
            {!! $item->desc !!}
        </div>

    </div>
    <!-- Cards End -->
    <div class="col-span-3 md:col-span-1">

        <!-- Categories -->
        <div class="my-10">
            <div class="divide-y shadow-md">
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