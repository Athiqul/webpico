<nav class="bg-white border-b border-primary fixed w-full z-30">
    <div class="container mx-auto flex justify-between py-5 md:py-8 px-5 md:px-0">
        <div class="w-40">
            <img class="h-full w-full" src="{{ asset('src/assets/logo.svg') }}" alt="Webpico Digital" srcset="">
        </div>
        <div class="hidden md:block">
            <ul class="block md:flex gap-3">
                <li class="nav-link active">
                    <a href="#" class="">Home</a>
                </li>
                <div class="group relative">
                    <li class="nav-link after:content-arrow-min">
                        <a href="" class="">Services</a>
                    </li>
                    <div class="hidden group-hover:block absolute">
                        <li onclick="seoToggle()"
                            class="dropdown-link flex gap-6 justify-between items-center relative group">
                            <p class="">SEO</p>
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_200_1415)">
                                    <path
                                        d="M3.04872 0.133138L7.59417 4.67871C7.67942 4.76392 7.72729 4.87956 7.72729 5.00011C7.72729 5.12068 7.67939 5.23629 7.59414 5.32153L3.04869 9.86686C2.87117 10.0444 2.58339 10.0444 2.40587 9.86686C2.22839 9.68938 2.22836 9.40156 2.40587 9.22405L6.6299 5.00011L2.40587 0.775955C2.31711 0.687198 2.27275 0.570865 2.27275 0.454532C2.27275 0.338199 2.31711 0.221865 2.4059 0.133107C2.58342 -0.0443774 2.8712 -0.0443774 3.04872 0.133138Z"
                                        fill="white" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_200_1415">
                                        <rect width="10" height="10" fill="white"
                                            transform="matrix(1.19249e-08 -1 -1 -1.19249e-08 10 10)" />
                                    </clipPath>
                                </defs>
                            </svg>
                            <ul id="seoMenu" class="hidden dropdown-list absolute -right-[8.2rem] top-0">
                                <li class="dropdown-link flex gap-6 justify-between items-center">
                                    <a href="" class="">Local SEO</a>
                                </li>
                                <li class="dropdown-link flex gap-6 justify-between items-center">
                                    <a href="" class="">E-Commerce</a>
                                </li>
                                <li class="dropdown-link flex gap-6 justify-between items-center">
                                    <a href="" class="">Multi Location</a>
                                </li>
                            </ul>
                        </li>
                        <li onclick="marketingToggle()"
                            class="dropdown-link flex gap-6 justify-between items-center relative group">
                            <p class="whitespace-nowrap">Digital Marketing</p>
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_200_1415)">
                                    <path
                                        d="M3.04872 0.133138L7.59417 4.67871C7.67942 4.76392 7.72729 4.87956 7.72729 5.00011C7.72729 5.12068 7.67939 5.23629 7.59414 5.32153L3.04869 9.86686C2.87117 10.0444 2.58339 10.0444 2.40587 9.86686C2.22839 9.68938 2.22836 9.40156 2.40587 9.22405L6.6299 5.00011L2.40587 0.775955C2.31711 0.687198 2.27275 0.570865 2.27275 0.454532C2.27275 0.338199 2.31711 0.221865 2.4059 0.133107C2.58342 -0.0443774 2.8712 -0.0443774 3.04872 0.133138Z"
                                        fill="white" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_200_1415">
                                        <rect width="10" height="10" fill="white"
                                            transform="matrix(1.19249e-08 -1 -1 -1.19249e-08 10 10)" />
                                    </clipPath>
                                </defs>
                            </svg>
                            <ul id="marketingMenu" class="hidden dropdown-list absolute -right-[10.4rem] top-0">
                                <li class="dropdown-link flex gap-6 justify-between items-center">
                                    <a href="" class="">SMM</a>
                                </li>
                                <li class="dropdown-link flex gap-6 justify-between items-center">
                                    <a href="" class="">Google Ads</a>
                                </li>
                                <li class="dropdown-link flex gap-6 justify-between items-center">
                                    <a href="" class="">Content Marketing</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown-link ">
                            <a href="" class="whitespace-nowrap">Video Editing</a>
                        </li>
                    </div>
                </div>
                <li class="nav-link">
                    <a href="/work.html" class="">Our Work</a>
                </li>
                <li class="nav-link">
                    <a href="/blog.html" class="">Blogs</a>
                </li>
                <li class="nav-link">
                    <a href="/about-us.html" class="">About Us</a>
                </li>
            </ul>
        </div>
        <a href="#" class="contact md:flex hidden group ">
            <span class="">Contact Us</span>
            <img class="group-hover:block hidden transition-all duration-500" src="./assets/call.svg" alt="">
        </a>
        <button onclick="menuHandler()" class="w-10 block md:hidden">
            <img class="w-full h-auto" src="./assets/menu.svg" alt="">
        </button>
    </div>
</nav>
<!-- Mobile Menu -->
<nav id="mobileMenu" class="hidden">
    <div id="menuOutSide" class="fixed bg-black top-0 bottom-0 left-0 right-0 opacity-50 z-[24] "></div>
    <ul class="bg-white top-0 w-[70vw] h-screen fixed flex flex-col justify-start pt-32 pl-10 shadow-lg z-[25]">
        <li class="nav-link-mobile">
            <a href="" class="">Home</a>
        </li>
        <li class="nav-link-mobile">
            <button onclick="handleService()" type="button" class="after:content-arrow-min">Services</button>
            <ul id="mobileService" class="hidden">
                <li class="nav-link-mobile">
                    <button onclick="handleMobileSeo()" class=" after:content-arrow-min">
                        SEO
                    </button>
                    <ul id="mobileSeo" class="hidden">
                        <li class="nav-link-mobile">
                            <a href="" class="">Local SEO</a>
                        </li>
                        <li class="nav-link-mobile">
                            <a href="" class="">E-Commerce</a>
                        </li>
                        <li class="nav-link-mobile">
                            <a href="" class="">Multi Location</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-link-mobile">
                    <button onclick="handleMobileMarketing()" class=" whitespace-nowrap after:content-arrow-min ">
                        Digital Marketing
                    </button>
                    <ul id="mobileMarketing" class="hidden">
                        <li class="nav-link-mobile">
                            <a href="" class="">SMM</a>
                        </li>
                        <li class="nav-link-mobile">
                            <a href="" class="">Google Ads</a>
                        </li>
                        <li class="nav-link-mobile">
                            <a href="" class="">Content Marketing</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-link-mobile">
                    <a href="">Video Editing</a>
                </li>
            </ul>
        </li>
        <li class="nav-link-mobile">
            <a href="" class="">Our Work</a>
        </li>
        <li class="nav-link-mobile">
            <a href="" class="">Blogs</a>
        </li>
        <li class="nav-link-mobile">
            <a href="" class="">About Us</a>
        </li>
    </ul>
</nav>
<!-- Navbar End -->
