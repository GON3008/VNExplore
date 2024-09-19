<!-- ============================================================== -->
<!-- Top header  -->
<!-- ============================================================== -->
<!-- Start Navigation -->
<div class="header header-light">
    <div class="container">
        <nav id="navigation" class="navigation navigation-landscape">
            <div class="nav-header">
                <a class="nav-brand mob-show" style="display: block" href="#"><img src="{{asset('geotrip/assets/img/logo.png')}}" class="logo" alt=""></a>
                <div class="nav-toggle"></div>
                <div class="mobile_nav">
                    <ul>
                        <li class="currencyDropdown me-2">
                            <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#currencyModal"><span
                                    class="fw-medium">INR</span></a>
                        </li>
                        <li class="languageDropdown me-2">
                            <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#countryModal"><img
                                    src="{{asset('geotrip/assets/img/flag/flag.png')}}" class="img-fluid" width="17" alt="Country"></a>
                        </li>
                        <li>
                            <a href="#" class="bg-light-primary text-primary rounded" data-bs-toggle="modal"
                               data-bs-target="#login"><i class="fa-regular fa-circle-user fs-6"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="nav-menus-wrapper" style="transition-property: none;">
                <ul class="nav-menu">

                    <li class="active"><a href="home-stay.html"><i class="fa-solid fa-umbrella-beach me-2"></i>Stays</a></li>
                    <li><a href="home-flight.html"><i class="fa-solid fa-jet-fighter me-2"></i>Flights</a></li>
                    <li><a href="home-hotel.html"><i class="fa-solid fa-spa me-2"></i>Hotels</a></li>
                    <li><a href="home-rental.html"><i class="fa-solid fa-house-circle-check me-2"></i>Rental</a></li>
                    <li><a href="home-car.html"><i class="fa-solid fa-car me-2"></i>Cars</a></li>

                </ul>

                <ul class="nav-menu nav-menu-social align-to-right">
                    <li class="currencyDropdown me-2">
                        <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#currencyModal"><span
                                class="fw-medium">INR</span></a>
                    </li>
                    <li class="languageDropdown me-2">
                        <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#countryModal"><img
                                src="{{asset('geotrip/assets/img/flag/flag.png')}}" class="img-fluid" width="17" alt="Country"></a>
                    </li>
                    @if(Auth::check())
                        <li class="list-buttons light">
                            <a href="#" id="user-info" style="background-color: #3FA2F6">
                                <span class="text-white">
                                    <i class="fa-solid fa-user fs-6 me-2"></i>
                                    {{ Auth::user()->name }}
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                @if(Auth::user()->isAdmin())
                                    <li>
                                        <a href="{{route('admin.dashboard')}}">
                                            <i class="fa-solid fa-user fs-6 me-2" style="color: #0a53be"></i>
                                            <span>Administration</span>
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <a href="#">
                                            <i class="fa-solid fa-user fs-6 me-2" style="color: #0a53be"></i>
                                            <span>Edit profile</span>
                                        </a>
                                    </li>
                                @endif

                                <li style="width: 230px">
                                    <a href="#">
                                        <i class="fa-solid fa-bell fs-6 me-2" style="color: #0a53be"></i>
                                        <span>Airline ticket notification</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa-solid fa-tag fs-6 me-2" style="color: #0a53be"></i>
                                        <span>Promotion</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fa-solid fa-right-from-bracket fs-6 me-2" style="color: #0a53be"></i>
                                        <span>Logout</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="list-buttons light">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#login">
                                <i class="fa-regular fa-circle-user fs-6 me-2"></i>Sign In / Register
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</div>
<!-- End Navigation -->
<div class="clearfix"></div>
<!-- ============================================================== -->
<!-- Top header  -->
<!-- ============================================================== -->
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        const userInfo = document.getElementById('user-info');
        if (userInfo) {
            userInfo.addEventListener('click', function (event) {
                event.preventDefault();
                const dropdownMenu = this.nextElementSibling;
                dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
            });
        }
    });
</script>
