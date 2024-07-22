<div class="image-cover hero-header bg-white" style="background:url({{asset('geotrip/assets/img/17125.jpg')}})no-repeat;" data-overlay="5">
    <div class="container">

        <!-- Search Form -->
        <div class="row justify-content-center align-items-center">
            <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12">
                <div class="position-relative text-center mb-5">
                    <h1>Book Your Perfect Escape</h1>
                    <p class="fs-5 fw-light">Take a little break from the work strss of everyday. Discover plan trip and
                        explore beautiful destinations.</p>
                </div>
            </div>

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="navTabbs d-flex align-items-center justify-content-center w-100 mb-2">
                    <ul class="nav nav-pills lights medium justify-content-center mb-3" id="tour-pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#hotels"><i class="fa-solid fa-hotel me-2"></i>Hotels</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#flights"><i class="fa-solid fa-jet-fighter me-2"></i>Flights</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tours"><i class="fa-solid fa-globe me-2"></i>Tour</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#cabs"><i class="fa-solid fa-car me-2"></i>Cab</a>
                        </li>
                    </ul>
                </div>
                <div class="search-wrap bg-transparents rounded-3 p-3">
                    <div class="tab-content">
                        <div class="tab-pane show active" id="hotels">
                            <div class="row gy-2 gx-md-2 gx-sm-2">

                                <div class="col-xl-8 col-lg-7 col-md-12">
                                    <div class="row gy-3 gx-md-2 gx-sm-2">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 position-relative">
                                            <div class="form-group hdd-arrow mb-0">
                                                <select class="goingto form-control fw-bold hdd-arrow">
                                                    <option value="">Select</option>
                                                    <option value="ny">New York</option>
                                                    <option value="sd">San Diego</option>
                                                    <option value="sj">San Jose</option>
                                                    <option value="ph">Philadelphia</option>
                                                    <option value="nl">Nashville</option>
                                                    <option value="sf">San Francisco</option>
                                                    <option value="hu">Houston</option>
                                                    <option value="sa">San Antonio</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group mb-0">
                                                <input type="text" class="form-control fw-bold" placeholder="Check-In & Check-Out"
                                                       id="checkinout" readonly="readonly">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-5 col-md-12">
                                    <div class="row gy-3 gx-md-2 gx-sm-2">
                                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                                            <div class="form-group mb-0">
                                                <div class="booking-form__input guests-input mixer-auto">
                                                    <button name="guests-btn" id="guests-input-btn">1 Guest</button>
                                                    <div class="guests-input__options" id="guests-input-options">
                                                        <div>
																	<span class="guests-input__ctrl minus" id="adults-subs-btn"><i
                                                                            class="fa-solid fa-minus"></i></span>
                                                            <span class="guests-input__value"><span id="guests-count-adults">1</span>Adults</span>
                                                            <span class="guests-input__ctrl plus" id="adults-add-btn"><i
                                                                    class="fa-solid fa-plus"></i></span>
                                                        </div>
                                                        <div>
																	<span class="guests-input__ctrl minus" id="children-subs-btn"><i
                                                                            class="fa-solid fa-minus"></i></span>
                                                            <span class="guests-input__value"><span id="guests-count-children">0</span>Children</span>
                                                            <span class="guests-input__ctrl plus" id="children-add-btn"><i
                                                                    class="fa-solid fa-plus"></i></span>
                                                        </div>
                                                        <div>
																	<span class="guests-input__ctrl minus" id="room-subs-btn"><i
                                                                            class="fa-solid fa-minus"></i></span>
                                                            <span class="guests-input__value"><span id="guests-count-room">0</span>Rooms</span>
                                                            <span class="guests-input__ctrl plus" id="room-add-btn"><i
                                                                    class="fa-solid fa-plus"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                            <div class="form-group mb-0">
                                                <button type="button" class="btn btn-primary full-width fw-medium"><i
                                                        class="fa-solid fa-magnifying-glass me-2"></i>Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="flights">
                            <div class="row gx-lg-2 g-3">

                                <div class="col-xl-5 col-lg-5 col-md-12">
                                    <div class="row gy-3 gx-lg-2 gx-3">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 position-relative">
                                            <div class="form-group hdd-arrow mb-0">
                                                <select class="leaving form-control fw-bold">
                                                    <option value="">Select</option>
                                                    <option value="ny">New York</option>
                                                    <option value="sd">San Diego</option>
                                                    <option value="sj">San Jose</option>
                                                    <option value="ph">Philadelphia</option>
                                                    <option value="nl">Nashville</option>
                                                    <option value="sf">San Francisco</option>
                                                    <option value="hu">Houston</option>
                                                    <option value="sa">San Antonio</option>
                                                </select>
                                            </div>
                                            <div class="btn-flip-icon mt-md-0">
                                                <button class="p-0 m-0 text-primary"><i class="fa-solid fa-right-left"></i></button>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-groupp hdd-arrow mb-0">
                                                <select class="goingto form-control fw-bold">
                                                    <option value="">Select</option>
                                                    <option value="lv">Las Vegas</option>
                                                    <option value="la">Los Angeles</option>
                                                    <option value="kc">Kansas City</option>
                                                    <option value="no">New Orleans</option>
                                                    <option value="kc">Jacksonville</option>
                                                    <option value="lb">Long Beach</option>
                                                    <option value="cl">Columbus</option>
                                                    <option value="cn">Canada</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12">
                                    <div class="row gy-3 gx-lg-2 gx-3">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group mb-0">
                                                <input class="form-control fw-bold choosedate" type="text" placeholder="Departure.." readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group mb-0">
                                                <input class="form-control fw-bold choosedate" type="text" placeholder="Return.." readonly="readonly">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-12">
                                    <div class="form-groupp hdd-arrow mb-0">
                                        <select class="occupant form-control fw-bold">
                                            <option value="">Select</option>
                                            <option value="lv">01 Adult</option>
                                            <option value="la">02 Adult</option>
                                            <option value="kc">03 Adult</option>
                                            <option value="no">04 Adult</option>
                                            <option value="kc">05 Adult</option>
                                            <option value="lb">06 Adult</option>
                                            <option value="cl">07 Adult</option>
                                            <option value="cn">08 Adult</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-1 col-lg-1 col-md-12">
                                    <div class="form-group mb-0">
                                        <button type="button" class="btn btn-primary full-width fw-medium"><i
                                                class="fa-solid fa-magnifying-glass fs-5"></i></button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="tours">
                            <div class="row gy-3 gx-md-2 gx-sm-2">

                                <div class="col-xl-8 col-lg-7 col-md-12">
                                    <div class="row gy-3 gx-md-2 gx-sm-2">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 position-relative">
                                            <div class="form-group hdd-arrow mb-0">
                                                <select class="goingto form-control fw-bold">
                                                    <option value="">Select</option>
                                                    <option value="ny">New York</option>
                                                    <option value="sd">San Diego</option>
                                                    <option value="sj">San Jose</option>
                                                    <option value="ph">Philadelphia</option>
                                                    <option value="nl">Nashville</option>
                                                    <option value="sf">San Francisco</option>
                                                    <option value="hu">Houston</option>
                                                    <option value="sa">San Antonio</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group mb-0">
                                                <input type="text" class="form-control choosedate fw-bold" placeholder="Choose Date" readonly="readonly">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-5 col-md-12">
                                    <div class="row gy-3 gx-md-2 gx-sm-2">
                                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                                            <div class="form-group hdd-arrow mb-0">
                                                <select class="tour form-control fw-bold">
                                                    <option value="">Select</option>
                                                    <option value="ny">Family Package</option>
                                                    <option value="sd">Honymoon Package</option>
                                                    <option value="sj">Group Package</option>
                                                    <option value="ph">Desert</option>
                                                    <option value="nl">History</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                            <div class="form-group mb-0">
                                                <button type="button" class="btn btn-primary full-width fw-medium"><i
                                                        class="fa-solid fa-magnifying-glass me-2"></i>Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="cabs">
                            <div class="row gy-3 gx-md-2 gx-sm-2">

                                <div class="col-xl-8 col-lg-7 col-md-12">
                                    <div class="row gy-3 gx-md-2 gx-sm-2">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 position-relative">
                                            <div class="form-group hdd-arrow mb-0">
                                                <select class="pickup form-control fw-bold">
                                                    <option value="">Select</option>
                                                    <option value="ny">New York</option>
                                                    <option value="sd">San Diego</option>
                                                    <option value="sj">San Jose</option>
                                                    <option value="ph">Philadelphia</option>
                                                    <option value="nl">Nashville</option>
                                                    <option value="sf">San Francisco</option>
                                                    <option value="hu">Houston</option>
                                                    <option value="sa">San Antonio</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group hdd-arrow mb-0">
                                                <select class="drop form-control fw-bold">
                                                    <option value="">Select</option>
                                                    <option value="ny">New York</option>
                                                    <option value="sd">San Diego</option>
                                                    <option value="sj">San Jose</option>
                                                    <option value="ph">Philadelphia</option>
                                                    <option value="nl">Nashville</option>
                                                    <option value="sf">San Francisco</option>
                                                    <option value="hu">Houston</option>
                                                    <option value="sa">San Antonio</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-5 col-md-12">
                                    <div class="row gy-3 gx-md-2 gx-sm-2">
                                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                                            <div class="form-group mb-0">
                                                <input type="text" class="form-control choosedate fw-bold" placeholder="Choose Pickup Date" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                            <div class="form-group mb-0">
                                                <button type="button" class="btn btn-primary full-width fw-medium"><i
                                                        class="fa-solid fa-magnifying-glass me-2"></i>Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- </row> -->

    </div>
</div>
