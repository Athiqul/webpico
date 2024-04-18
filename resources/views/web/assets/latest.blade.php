<!-- New Article -->
@php
    $latest =App\Models\Blogs::where('status','1')->latest()->first();
@endphp

@if ($latest)
<section id="" class="container mx-auto py-10">
    <div class="pb-14">
        <h3 class="title">NEW ARTICLES</h3>
        <p class="description">Check our latest blog posts</p>
    </div>
    <div class="relative mb-10">
        <img class="max-h-[37rem] hidden md:block w-screen px-5 md:px-0" src="{{ route('public.image',['blogs', $latest->image]) }}" alt="{{ $latest->title }}">
        <div class="bg-white block md:absolute px-10 pt-16 pb-8 top-0 left-5 md:left-20 max-w-[29.38rem] ">
            <p class="font-montserrat text-base md:text-xl text-neutral font-medium">FEATURED ARTICLE</p>
            <p class="font-montserrat font-bold text-xl md:text-2xl text-primary">{{ $latest->title }}:
            </p>
            <div class="flex items-center gap-4 mt-5 mb-3">
                <p class="text-secondary">  @php
                    $tag=explode(',',$latest->tags);
                @endphp {{ ucwords($tag[0]) }}</p>
                <div class="h-2 w-2 rounded-full bg-neutral"></div>
                @php
                $perminuteWords=200;
                $words=str_word_count(strip_tags($latest->desc));
                $minutes=ceil($words/$perminuteWords);

            @endphp
                <p class="text-neutral">{{ date('M d,Y',strtotime($latest->created_at)) }} ({{ $minutes }} {{ $minutes==1?'min':'mins' }} read)</p>
            </div>
            @php
                $words=explode(' ',strip_tags($latest->desc));
                $words=array_slice($words,0,20);
                $words=implode(' ',$words);
                $words.='...';
            @endphp
            {{ $words }}
            <div class="flex items-center justify-between">

                <a href="{{ route('web.blog_details',encrypt($latest->id)) }}" class="bg-primary rounded px-3 py-2 text-white text-sm md:text-base" type="button">
                    Continue Reading
                </a>
            </div>
        </div>
    </div>
</section>
@endif

<!-- New Article End -->
