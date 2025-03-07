<!-- Search Form -->
<div class="row justify-content-center align-items-center">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="search-wrap position-relative my-2 bg-white rounded-2 shadow-wrap p-2">
            <div class="row align-items-center g-2">

                <div class="col-xl-8 col-lg-7 col-md-12">
                    <div class="row g-2">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 position-relative">
                            <div class="form-group mb-0">
                                <select class="goingto form-control fw-bold" name="leaving[]" multiple="multiple">
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
                    <div class="row align-items-end g-2">
                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-4">
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
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-8">
                            <div class="form-group mb-0">
                                <button type="button" class="btn btn-primary full-width fw-medium" id="search-room-btn">
                                    <i class="fa-solid fa-magnifying-glass me-2"></i>Search
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- </row> -->
