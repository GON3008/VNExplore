<div class="col-xl-4 col-lg-4 col-md-12">
    <div class="side-block card rounded-2 p-3">
        <h5 class="fw-semibold fs-6">Reservation Summary</h5>
        <div class="mid-block rounded-2 border br-dashed p-2 mb-3">
            <div class="row align-items-center justify-content-between g-2 mb-4">
                <div class="col-6">
                    <div class="gray rounded-2 p-2">
                                                <span
                                                    class="d-block text-muted-3 text-sm fw-medium text-uppercase mb-2">Check-In</span>
                        <p class="text-dark fw-semibold lh-base text-md mb-0">{{ $roomOption->formattedCheckin['date'] }}</p>
                        <span
                            class="text-dark text-md">From {{ $roomOption->formattedCheckin['time'] }}</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="gray rounded-2 p-2">
                                                <span
                                                    class="d-block text-muted-3 text-sm fw-medium text-uppercase mb-2">Check-Out</span>
                        <p class="text-dark fw-semibold lh-base text-md mb-0">{{ $roomOption->formattedCheckout['date'] }}</p>
                        <span
                            class="text-dark text-md">By {{ $roomOption->formattedCheckout['time'] }}</span>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between mb-4">
                <div class="col-12">
                    <p class="text-muted-2 text-sm text-uppercase fw-medium mb-1">Total
                        Length
                        of Stay:</p>
                    <div class="d-flex align-items-center">
                        <div class="square--30 circle text-seegreen bg-light-seegreen"><i
                                class="fa-regular fa-calendar"></i></div>
                        <span class="text-dark fw-semibold ms-2">  {{ $roomOption->stayDuration['days'] }} Days \
														{{ $roomOption->stayDuration['nights'] }} Night</span>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col-12">
                    <p class="text-muted-2 text-sm text-uppercase fw-medium mb-1">You
                        Selected</p>
                    <div class="d-flex align-items-center flex-column">
                        <p class="mb-0">King Bed Appolo Resort with 3 Rooms. <a href="#"
                                                                                class="fw-medum text-primary">Change
                                your Selection</a></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bott-block d-block mb-3">
            <h5 class="fw-semibold fs-6">Your Price Summary</h5>
            <ul class="list-group list-group-borderless">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-medium mb-0">Rooms & Offers</span>
                    <span class="fw-semibold"
                          style="text-decoration: line-through">{{ $roomOption->formatted_price }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
												<span class="fw-medium mb-0">Total Discount<span
                                                        class="badge rounded-1 text-bg-danger smaller mb-0 ms-2">{{ round($roomOption->discountPercent, 2) }}% off</span></span>
                    <span class="fw-semibold">{{ $roomOption->formatted_discount }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-medium mb-0">Taxes % Fees</span>
                    <span class="fw-semibold">{{ $roomOption->price_after_tax }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-medium text-success mb-0">Total Price</span>
                    <span
                        class="fw-semibold text-success">{{ $roomOption->total_price }}</span>
                </li>
            </ul>
        </div>
        <div class="bott-block">
            <button class="btn fw-medium btn-primary full-width" type="button">Request To
                Book
            </button>
        </div>
    </div>
</div>
