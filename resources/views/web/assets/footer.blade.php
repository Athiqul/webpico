 <!-- Footer -->
 @php
     $item=App\Models\Contact::latest()->first();

 @endphp
 <footer class="bg-black">
    <div class="container mx-auto font-montserrat py-16 px-5 md:px-0 md:mt-0">
        <div class="flex flex-col justify-center items-center mx-auto max-w-[39rem] ">
            <h3 class="font-bold text-2xl text-primary text-center">LET'S TALK</h3>
            <p class="text-secondary text-xl font-medium text-center">We Work With You, Collaboratively. Let's Do Something
                Amazing.</p>
            <button class="contact w-fit mt-5" type="button">Contact Us</button>
        </div>
        <div class="max-w-[55rem] gap-5 relative  flex flex-col md:flex-row justify-between mx-auto mt-16 pb-20 border-b border-neutral mb-12">
            <div class="max-w-[14.63rem] ">
                <h2 class="font-montserrat font-medium text-xl text-primary">Office</h2>
                <div class="pt-5 font-sans text-neutral space-y-3">
                    <p class="">{{ $item?->address??'House: 62, Dour Main Road, Block: D, Uttara Rajabari, Turag, Dhaka' }}</p>
                    <p class="">{{ $item?->email??'hello[@]webpicodigital.com' }}</p>
                    <p class="">{{ $item->mobile??'+88 01752 598101' }}</p>
                </div>
            </div>
            <div class="max-w-[14.63rem]">
                <h2 class="font-montserrat font-medium text-xl text-primary">Links</h2>
                <ul class="pt-5 font-sans text-neutral space-y-3">
                    <li class=""><a href="" class="">About</a></li>
                    <li class=""><a href="" class="">Blog</a></li>
                    <li class=""><a href="" class="">Contact Us</a></li>
                    <li class=""><a href="" class="">Service</a></li>
                </ul>
            </div>
            <div class="max-w-[14.63rem]">
                <h2 class="font-montserrat font-medium text-xl text-primary">Socials</h2>
                <ul class="pt-5 font-sans text-neutral space-y-3">
                    <li class=""><a href="" class="">Facebook</a></li>
                    <li class=""><a href="" class="">Twitter</a></li>
                    <li class=""><a href="" class="">Linkedin</a></li>
                    <li class=""><a href="" class="">Dribble</a></li>
                </ul>
            </div>
            <img onclick="scrollToTop()" class="h-9 w-9 absolute right-3 -bottom-3 cursor-pointer" src="{{ asset('src/assets/scroll-top.svg') }}" alt="">
        </div>
        <p class="text-neutral font-montserrat max-w-[55rem] mx-auto">Webpico Digital © {{ date('Y') }} All Rights Reserved. | Developved By <a href="https://abovebd.com/">Above IT</a></p> This website is under development
    </div>
</footer>
<!-- Footer End-->
