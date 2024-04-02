<!-- Testimonial -->

@php
    $items=App\Models\Testimonial::where('status','1')->get();
@endphp
@if ($items->count()>0)
<section id="" class="py-10">
    <div class="container mx-auto">
        <div class="pb-14">
            <h3 class="title">TESTIMONIALS</h3>
            <p class="description">What Clients Say</p>
        </div>
    </div>
    <div class="bg-primary py-5">
        <div class="container mx-auto slider center">

            @foreach ($items as $item)
            <div class="slide">
                <div class="flex gap-2 md:gap-8 items-end mx-auto justify-center flex-wrap ">
                    <img class="h-32 w-32 md:h-52 md:w-52 rounded-full overflow-hidden"
                        src="{{ route('public.image',['folder'=>'testimonials','image'=>$item->image]) }}" alt="">
                    <div class="flex flex-col items-end gap-6">
                        <img class="h-6 w-6" src="{{ asset('src/assets/quote.svg') }}" alt="">
                        <div class="bg-white p-6 space-y-4 rounded-lg max-w-[24.37rem]">
                            <p class="font-sans text-neutral text-start">{{ ucwords($item->quote) }}</p>
                            <p class="font-montserrat text-secondary text-start font-medium">{{ ucwords($item->client_name) }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach




        </div>
    </div>
</section>
@endif

<!-- Testimonial End -->
