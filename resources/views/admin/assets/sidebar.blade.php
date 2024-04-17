<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('src/assets/logo.svg') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">WebPico</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>

            <a  class="has-arrow" href="{{ route('dashboard') }}">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>

        </li>
        <li>
            <a href="{{ route('admin.blogs.index') }}" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Blogs</div>
            </a>
            <ul>




            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Services</div>
            </a>
            <ul>

                <li>
                    <a href="{{ route('admin.service.category') }}" ><i class="bx bx-right-arrow-alt"></i>Services Category
                    </a>

                </li>


                <li> <a  href="{{ route('admin.service.subcategory') }}" title="" ><i class="bx bx-right-arrow-alt"></i>Services SubCategory</a>
                </li>

                <li> <a  href="{{ route('admin.service.index') }}" title="" ><i class="bx bx-right-arrow-alt"></i>Services List</a>
                </li>



            </ul>
        </li>
        <li>
            <a href="{{ route('admin.contact') }}" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Contact</div>
            </a>
            <ul>



            </ul>
        </li>

        <li>
            <a href="{{ route('admin.social.list') }}" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Social Media</div>
            </a>
            <ul>



            </ul>
        </li>

        <li>
            <a href="{{ route('admin.ourwork.index') }}" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Our Work</div>
            </a>
            <ul>



            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">About Page</div>
            </a>
            <ul>


            </ul>
        </li>

        <li>
            <a href="{{ route('admin.testimonial.list') }}" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Testimional</div>
            </a>
            <ul>


            </ul>
        </li>





    </ul>
    <!--end navigation-->
</div>
