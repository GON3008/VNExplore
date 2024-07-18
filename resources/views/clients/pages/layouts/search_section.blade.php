<style>
    .login100-form {
        width: 560px;
        display: block;
        background-color: #f7f7f7;
        padding: 173px 55px 55px 55px;
    }
</style>
<div class="search-engine" style="background: url('{{ asset('roundtours/assets/images/section/banner-image.png') }}');">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12 mb-5 text-center position-relative">
                <h1 class="display-3 fw-bold mb-4 theme-text-white theme-text-shadow">
                    A Journey to Adventurous
                </h1>
                <p class="mb-0 theme-text-white">Discover amzaing places at exclusive deals</p>
            </div>
        </div>
        <!-- search engine tabs -->
        <div class="row mt-0 mt-lg-5">
            <div class="col-12 col-lg-10 offset-lg-1 mb-5 text-center position-relative">
                <!-- product main tab list -->
                <ul class="nav nav-tabs d-flex justify-content-center border-0 cust-tab" id="myTab"
                    role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="flight-tab" data-bs-toggle="tab"
                                data-bs-target="#flight-tab-pane" type="button" role="tab"
                                aria-controls="flight-tab-pane" aria-selected="true">Flights
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="hotel-tab" data-bs-toggle="tab"
                                data-bs-target="#hotel-tab-pane" type="button" role="tab"
                                aria-controls="hotel-tab-pane" aria-selected="false">Hotel
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="holiday-tab" data-bs-toggle="tab"
                                data-bs-target="#holiday-tab-pane" type="button" role="tab"
                                aria-controls="holiday-tab-pane" aria-selected="false">Holidays
                        </button>
                    </li>
                </ul>
                <!-- product main tab content -->
                <div class="tab-content mt-3" id="myTabContent">
                    <!-- flight search tab -->
                    <div class="tab-pane fade show active" id="flight-tab-pane" role="tabpanel"
                         aria-labelledby="flight-tab" tabindex="0">
                        <!-- flight multiple search tab -->
                        <ul class="nav nav-pills cust-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-oneway-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-oneway" type="button" role="tab"
                                        aria-controls="pills-oneway" aria-selected="true">
                                                <span
                                                    class="d-inline-block p-2 rounded-circle bg-white align-middle me-2"></span>
                                    One Way
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-Round-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-Round" type="button" role="tab"
                                        aria-controls="pills-Round" aria-selected="false">
                                                <span
                                                    class="d-inline-block p-2 rounded-circle bg-white align-middle me-2"></span>
                                    Round Trip
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-multiCity-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-multiCity" type="button" role="tab"
                                        aria-controls="pills-multiCity" aria-selected="false">
                                                <span
                                                    class="d-inline-block p-2 rounded-circle bg-white align-middle me-2"></span>
                                    Multi City
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-oneway" role="tabpanel"
                                 aria-labelledby="pills-oneway-tab" tabindex="0">
                                <!-- one way search -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="search-pan row mx-0 theme-border-radius">
                                            <div
                                                class="col-12 col-lg-4 col-xl-2 ps-0 mb-2 mb-xl-0 pe-0 pe-lg-2">
                                                <div class="form-group">
                                                    <label for="exampleDataList" class="form-label">Depart
                                                        From</label>
                                                    <input class="form-control" list="datalistOptions1"
                                                           id="exampleDataList" placeholder="New Delhi">
                                                    <datalist id="datalistOptions1">
                                                        <option value="San Francisco">
                                                        <option value="New York">
                                                        <option value="Seattle">
                                                        <option value="Los Angeles">
                                                        <option value="Chicago">
                                                    </datalist>
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-lg-4 col-xl-2 ps-0 mb-2 mb-xl-0 pe-0 pe-lg-2">
                                                <div class="form-group">
                                                    <label for="exampleDataList2" class="form-label">Arrival
                                                        To</label>
                                                    <input class="form-control" list="datalistOptions2"
                                                           id="exampleDataList2" placeholder="London">
                                                    <datalist id="datalistOptions2">
                                                        <option value="San Francisco">
                                                        <option value="New York">
                                                        <option value="Seattle">
                                                        <option value="Los Angeles">
                                                        <option value="Chicago">
                                                    </datalist>
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-lg-4 col-xl-3 ps-0 mb-2 mb-xl-0 pe-0 pe-lg-0 pe-xl-2">
                                                <div class="form-group">
                                                    <label class="form-label">Departure Date</label>
                                                    <input type="text" class="form-control"
                                                           placeholder="Wed 2 Mar">
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-lg-6 col-xl-3 ps-0 mb-2 mb-lg-0 mb-xl-0 pe-0 pe-lg-2">
                                                <div class="form-group border-0">
                                                    <label class="form-label">Traveller's
                                                    </label>
                                                    <div class="dropdown" id="myDD1">
                                                        <button class="dropdown-toggle form-control"
                                                                type="button" id="travellerInfoOneway11"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <span class="text-truncate">2 adults - 1
                                                                            childeren - 1 Infants
                                                                        </span>
                                                        </button>
                                                        <div class="dropdown-menu"
                                                             aria-labelledby="travellerInfoOneway11">
                                                            <ul class="drop-rest">
                                                                <li>
                                                                    <div class="d-flex small">Adults
                                                                    </div>
                                                                    <div
                                                                        class="ms-auto input-group plus-minus-input">
                                                                        <div class="input-group-button">
                                                                            <button type="button"
                                                                                    class="circle"
                                                                                    data-quantity="minus"
                                                                                    data-field="onewayAdult">
                                                                                <i class="bi bi-dash"></i>
                                                                            </button>
                                                                        </div>
                                                                        <input class="input-group-field"
                                                                               type="number" name="onewayAdult"
                                                                               value="0">
                                                                        <div class="input-group-button">
                                                                            <button type="button"
                                                                                    class="circle"
                                                                                    data-quantity="plus"
                                                                                    data-field="onewayAdult">
                                                                                <i class="bi bi-plus"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="d-flex small">Child
                                                                    </div>
                                                                    <div
                                                                        class="ms-auto input-group plus-minus-input">
                                                                        <div class="input-group-button">
                                                                            <button type="button"
                                                                                    class="circle"
                                                                                    data-quantity="minus"
                                                                                    data-field="onewayChild">
                                                                                <i class="bi bi-dash"></i>
                                                                            </button>
                                                                        </div>
                                                                        <input class="input-group-field"
                                                                               type="number" name="onewayChild"
                                                                               value="0">
                                                                        <div class="input-group-button">
                                                                            <button type="button"
                                                                                    class="circle"
                                                                                    data-quantity="plus"
                                                                                    data-field="onewayChild">
                                                                                <i class="bi bi-plus"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="d-flex small">Infants
                                                                    </div>
                                                                    <div
                                                                        class="ms-auto input-group plus-minus-input">
                                                                        <div class="input-group-button">
                                                                            <button type="button"
                                                                                    class="circle"
                                                                                    data-quantity="minus"
                                                                                    data-field="onewayInfant">
                                                                                <i class="bi bi-dash"></i>
                                                                            </button>
                                                                        </div>
                                                                        <input class="input-group-field"
                                                                               type="number"
                                                                               name="onewayInfant" value="0">
                                                                        <div class="input-group-button">
                                                                            <button type="button"
                                                                                    class="circle"
                                                                                    data-quantity="plus"
                                                                                    data-field="onewayInfant">
                                                                                <i class="bi bi-plus"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6 col-xl-2 px-0">
                                                <button type="submit" class="btn btn-search"
                                                        onclick="window.location.href='#';">
                                                                <span class="fw-bold"><i
                                                                        class="bi bi-search me-2"></i>Search</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- flight class section -->
                                    <div class="col-12 mt-2">
                                        <div class="d-flex flex-sm-row flex-column">
                                            <div class="me-2 mb-2 mb-lg-0">
                                                <div class="switch mode-switch">
                                                    <input type="checkbox" name="stop_mode" id="stop_mode"
                                                           value="1">
                                                    <label for="stop_mode" data-on="NonStop" data-off="Stop"
                                                           class="mode-switch-inner"></label>
                                                </div>
                                            </div>
                                            <div class="me-2">
                                                <div class="switch mode-switch">
                                                    <input type="checkbox" name="class_mode" id="class_mode"
                                                           value="1">
                                                    <label for="class_mode" data-on="Premium"
                                                           data-off="Economy"
                                                           class="mode-switch-inner"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /oneway search -->
                            </div>
                            <div class="tab-pane fade" id="pills-Round" role="tabpanel"
                                 aria-labelledby="pills-Round-tab" tabindex="0">
                                <!-- round trip  search -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="search-pan row mx-0 theme-border-radius">
                                            <div
                                                class="col-12 col-lg-4 col-xl-2 ps-0 mb-2 mb-xl-0 pe-0 pe-lg-2">
                                                <div class="form-group">
                                                    <label for="exampleDataList1" class="form-label">Depart
                                                        From</label>
                                                    <input class="form-control" list="datalistOptions3"
                                                           id="exampleDataList1" placeholder="New Delhi">
                                                    <datalist id="datalistOptions3">
                                                        <option value="San Francisco">
                                                        <option value="New York">
                                                        <option value="Seattle">
                                                        <option value="Los Angeles">
                                                        <option value="Chicago">
                                                    </datalist>
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-lg-4 col-xl-2 ps-0 mb-2 mb-xl-0 pe-0 pe-lg-2">
                                                <div class="form-group">
                                                    <label for="exampleDataList3" class="form-label">Arrival
                                                        To</label>
                                                    <input class="form-control" list="datalistOptions4"
                                                           id="exampleDataList3" placeholder="London">
                                                    <datalist id="datalistOptions4">
                                                        <option value="San Francisco">
                                                        <option value="New York">
                                                        <option value="Seattle">
                                                        <option value="Los Angeles">
                                                        <option value="Chicago">
                                                    </datalist>
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-lg-4 col-xl-3 ps-0 mb-2 mb-xl-0 pe-0 pe-lg-0 pe-xl-2">
                                                <div class="form-group">
                                                    <label class="form-label">Departure Date - Arrival
                                                        Date</label>
                                                    <input type="text" class="form-control"
                                                           placeholder="Wed 2 Mar  -  Fri 11 Apr">
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-lg-6 col-xl-3 ps-0 mb-2 mb-lg-0 mb-xl-0 pe-0 pe-lg-2">
                                                <div class="form-group border-0">
                                                    <label class="form-label">Traveller's
                                                    </label>
                                                    <div class="dropdown" id="myDD2">
                                                        <button class="dropdown-toggle form-control"
                                                                type="button" id="travellerInfoOneway51"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <span class="text-truncate">2 adults - 1
                                                                            childeren - 1 Infants
                                                                        </span>
                                                        </button>
                                                        <div class="dropdown-menu"
                                                             aria-labelledby="travellerInfoOneway51">
                                                            <ul class="drop-rest">
                                                                <li>
                                                                    <div class="d-flex small">Adults
                                                                    </div>
                                                                    <div
                                                                        class="ms-auto input-group plus-minus-input">
                                                                        <div class="input-group-button">
                                                                            <button type="button"
                                                                                    class="circle"
                                                                                    data-quantity="minus"
                                                                                    data-field="onewayAdult">
                                                                                <i class="bi bi-dash"></i>
                                                                            </button>
                                                                        </div>
                                                                        <input class="input-group-field"
                                                                               type="number" name="onewayAdult"
                                                                               value="0">
                                                                        <div class="input-group-button">
                                                                            <button type="button"
                                                                                    class="circle"
                                                                                    data-quantity="plus"
                                                                                    data-field="onewayAdult">
                                                                                <i class="bi bi-plus"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="d-flex small">Child
                                                                    </div>
                                                                    <div
                                                                        class="ms-auto input-group plus-minus-input">
                                                                        <div class="input-group-button">
                                                                            <button type="button"
                                                                                    class="circle"
                                                                                    data-quantity="minus"
                                                                                    data-field="onewayChild">
                                                                                <i class="bi bi-dash"></i>
                                                                            </button>
                                                                        </div>
                                                                        <input class="input-group-field"
                                                                               type="number" name="onewayChild"
                                                                               value="0">
                                                                        <div class="input-group-button">
                                                                            <button type="button"
                                                                                    class="circle"
                                                                                    data-quantity="plus"
                                                                                    data-field="onewayChild">
                                                                                <i class="bi bi-plus"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="d-flex small">Infants
                                                                    </div>
                                                                    <div
                                                                        class="ms-auto input-group plus-minus-input">
                                                                        <div class="input-group-button">
                                                                            <button type="button"
                                                                                    class="circle"
                                                                                    data-quantity="minus"
                                                                                    data-field="onewayInfant">
                                                                                <i class="bi bi-dash"></i>
                                                                            </button>
                                                                        </div>
                                                                        <input class="input-group-field"
                                                                               type="number"
                                                                               name="onewayInfant" value="0">
                                                                        <div class="input-group-button">
                                                                            <button type="button"
                                                                                    class="circle"
                                                                                    data-quantity="plus"
                                                                                    data-field="onewayInfant">
                                                                                <i class="bi bi-plus"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6 col-xl-2 px-0">
                                                <button type="submit" class="btn btn-search"
                                                        onclick="window.location.href='#';">
                                                                <span class="fw-bold"><i
                                                                        class="bi bi-search me-2"></i>Search</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /round trip search -->
                            </div>
                            <div class="tab-pane fade" id="pills-multiCity" role="tabpanel"
                                 aria-labelledby="pills-multiCity-tab" tabindex="0">
                                <!-- multicity search -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="search-pan row mx-0 theme-border-radius">
                                            <div
                                                class="col-12 col-lg-4 col-xl-2 ps-0 mb-2 mb-xl-0 pe-0 pe-lg-2">
                                                <div class="form-group">
                                                    <label for="exampleDataList13" class="form-label">Depart
                                                        From</label>
                                                    <input class="form-control" list="datalistOptions14"
                                                           id="exampleDataList13" placeholder="New Delhi">
                                                    <datalist id="datalistOptions14">
                                                        <option value="San Francisco">
                                                        <option value="New York">
                                                        <option value="Seattle">
                                                        <option value="Los Angeles">
                                                        <option value="Chicago">
                                                    </datalist>
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-lg-4 col-xl-2 ps-0 mb-2 mb-xl-0 pe-0 pe-lg-2">
                                                <div class="form-group">
                                                    <label for="exampleDataList4" class="form-label">Arrival
                                                        To</label>
                                                    <input class="form-control" list="datalistOptions5"
                                                           id="exampleDataList4" placeholder="London">
                                                    <datalist id="datalistOptions5">
                                                        <option value="San Francisco">
                                                        <option value="New York">
                                                        <option value="Seattle">
                                                        <option value="Los Angeles">
                                                        <option value="Chicago">
                                                    </datalist>
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-lg-4 col-xl-2 ps-0 mb-2 mb-xl-0 pe-0 pe-lg-0 pe-xl-2">
                                                <div class="form-group">
                                                    <label class="form-label">Departure Date</label>
                                                    <input type="text" class="form-control"
                                                           placeholder="Wed 2 Mar">
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-lg-6 col-xl-3 ps-0 mb-2 mb-lg-0 mb-xl-0 pe-0 pe-lg-2">
                                                <div class="form-group border-0">
                                                    <label class="form-label">Traveller's
                                                    </label>
                                                    <div class="dropdown" id="myDD3">
                                                        <button class="dropdown-toggle form-control"
                                                                type="button" id="travellerInfoOneway21"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <span class="text-truncate">2 adults - 1
                                                                            childeren - 1 Infants
                                                                        </span>
                                                        </button>
                                                        <div class="dropdown-menu"
                                                             aria-labelledby="travellerInfoOneway21">
                                                            <ul class="drop-rest">
                                                                <li>
                                                                    <div class="d-flex small">Adults
                                                                    </div>
                                                                    <div
                                                                        class="ms-auto input-group plus-minus-input">
                                                                        <div class="input-group-button">
                                                                            <button type="button"
                                                                                    class="circle"
                                                                                    data-quantity="minus"
                                                                                    data-field="onewayAdult">
                                                                                <i class="bi bi-dash"></i>
                                                                            </button>
                                                                        </div>
                                                                        <input class="input-group-field"
                                                                               type="number" name="onewayAdult"
                                                                               value="0">
                                                                        <div class="input-group-button">
                                                                            <button type="button"
                                                                                    class="circle"
                                                                                    data-quantity="plus"
                                                                                    data-field="onewayAdult">
                                                                                <i class="bi bi-plus"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="d-flex small">Child
                                                                    </div>
                                                                    <div
                                                                        class="ms-auto input-group plus-minus-input">
                                                                        <div class="input-group-button">
                                                                            <button type="button"
                                                                                    class="circle"
                                                                                    data-quantity="minus"
                                                                                    data-field="onewayChild">
                                                                                <i class="bi bi-dash"></i>
                                                                            </button>
                                                                        </div>
                                                                        <input class="input-group-field"
                                                                               type="number" name="onewayChild"
                                                                               value="0">
                                                                        <div class="input-group-button">
                                                                            <button type="button"
                                                                                    class="circle"
                                                                                    data-quantity="plus"
                                                                                    data-field="onewayChild">
                                                                                <i class="bi bi-plus"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="d-flex small">Infants
                                                                    </div>
                                                                    <div
                                                                        class="ms-auto input-group plus-minus-input">
                                                                        <div class="input-group-button">
                                                                            <button type="button"
                                                                                    class="circle"
                                                                                    data-quantity="minus"
                                                                                    data-field="onewayInfant">
                                                                                <i class="bi bi-dash"></i>
                                                                            </button>
                                                                        </div>
                                                                        <input class="input-group-field"
                                                                               type="number"
                                                                               name="onewayInfant" value="0">
                                                                        <div class="input-group-button">
                                                                            <button type="button"
                                                                                    class="circle"
                                                                                    data-quantity="plus"
                                                                                    data-field="onewayInfant">
                                                                                <i class="bi bi-plus"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6 col-xl-3 px-0">
                                                <div class="d-flex">
                                                    <button type="button" class="btn sector-add me-1">+ Add
                                                        Sector
                                                    </button>
                                                    <button type="submit" class="btn btn-search"
                                                            onclick="window.location.href='#';">
                                                                    <span class="fw-bold"><i
                                                                            class="bi bi-search me-2"></i>Search</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- add sector form -->
                                        <div class="row mt-2">
                                            <div class="col-12 col-lg-6">
                                                <div class="search-pan row mx-0 theme-border-radius">
                                                    <div
                                                        class="col-12 col-lg-4 col-xl-4 ps-0 mb-2 mb-xl-0 pe-0 pe-lg-2">
                                                        <div class="form-group">
                                                            <label for="exampleDataList5"
                                                                   class="form-label">Depart
                                                                From</label>
                                                            <input class="form-control"
                                                                   list="datalistOptions24"
                                                                   id="exampleDataList5"
                                                                   placeholder="New Delhi">
                                                            <datalist id="datalistOptions24">
                                                                <option value="San Francisco">
                                                                <option value="New York">
                                                                <option value="Seattle">
                                                                <option value="Los Angeles">
                                                                <option value="Chicago">
                                                            </datalist>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-12 col-lg-4 col-xl-4 ps-0 mb-2 mb-xl-0 pe-0 pe-lg-2">
                                                        <div class="form-group">
                                                            <label for="exampleDataList6"
                                                                   class="form-label">Arrival
                                                                To</label>
                                                            <input class="form-control"
                                                                   list="datalistOptions16"
                                                                   id="exampleDataList6" placeholder="London">
                                                            <datalist id="datalistOptions16">
                                                                <option value="San Francisco">
                                                                <option value="New York">
                                                                <option value="Seattle">
                                                                <option value="Los Angeles">
                                                                <option value="Chicago">
                                                            </datalist>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-12 col-lg-4 col-xl-4 ps-0 mb-2 mb-xl-0 pe-0 pe-lg-0 pe-xl-2">
                                                        <div class="form-group border-0">
                                                            <label class="form-label">Departure Date</label>
                                                            <input type="text" class="form-control"
                                                                   placeholder="Wed 2 Mar">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /multicity search -->
                            </div>
                        </div>

                    </div>
                    <!-- /flight tab end -->

                    <!-- hotel search tab -->
                    <div class="tab-pane fade" id="hotel-tab-pane" role="tabpanel"
                         aria-labelledby="hotel-tab" tabindex="0">
                        <!-- hotel search -->
                        <div class="row">
                            <div class="col-12">
                                <div class="search-pan row mx-0 theme-border-radius">
                                    <div class="col-12 col-lg-4 col-xl-2 ps-0 mb-2 mb-xl-0 pe-0 pe-lg-2">
                                        <div class="form-group">
                                            <label for="exampleDataList7" class="form-label">Country
                                                <i class="bi bi-caret-down-fill small"></i>
                                            </label>
                                            <input class="form-control" list="datalistOptions15"
                                                   id="exampleDataList7" placeholder="India">
                                            <datalist id="datalistOptions15">
                                                <option value="San Francisco">
                                                <option value="New York">
                                                <option value="Seattle">
                                                <option value="Los Angeles">
                                                <option value="Chicago">
                                            </datalist>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4 col-xl-2 ps-0 mb-2 mb-xl-0 pe-0 pe-lg-2">
                                        <div class="form-group">
                                            <label for="exampleDataList8" class="form-label">Location
                                                <i class="bi bi-caret-down-fill small"></i>
                                            </label>
                                            <input class="form-control" list="datalistOptions7"
                                                   id="exampleDataList8" placeholder="New Delhi">
                                            <datalist id="datalistOptions7">
                                                <option value="San Francisco">
                                                <option value="New York">
                                                <option value="Seattle">
                                                <option value="Los Angeles">
                                                <option value="Chicago">
                                            </datalist>
                                        </div>
                                    </div>
                                    <div
                                        class="col-12 col-lg-4 col-xl-3 ps-0 mb-2 mb-xl-0 pe-0 pe-lg-0 pe-xl-2">
                                        <div class="form-group">
                                            <label class="form-label">Check in Date - Check out Date</label>
                                            <input type="text" class="form-control"
                                                   placeholder="Wed 2 Mar  -  Fri 11 Apr">
                                        </div>
                                    </div>
                                    <div
                                        class="col-12 col-lg-6 col-xl-3 ps-0 mb-2 mb-lg-0 mb-xl-0 pe-0 pe-lg-2">
                                        <div class="form-group border-0">
                                            <label class="form-label">Guest
                                            </label>
                                            <div class="dropdown" id="myDD4">
                                                <button class="dropdown-toggle form-control" type="button"
                                                        id="travellerInfoOneway" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                                <span class="text-truncate">2 adults - 1 childeren - 1
                                                                    room
                                                                </span>
                                                </button>
                                                <div class="dropdown-menu"
                                                     aria-labelledby="travellerInfoOneway">
                                                    <ul class="drop-rest">
                                                        <li>
                                                            <div class="d-flex small">Adults
                                                            </div>
                                                            <div
                                                                class="ms-auto input-group plus-minus-input">
                                                                <div class="input-group-button">
                                                                    <button type="button" class="circle"
                                                                            data-quantity="minus"
                                                                            data-field="onewayAdult">
                                                                        <i class="bi bi-dash"></i>
                                                                    </button>
                                                                </div>
                                                                <input class="input-group-field"
                                                                       type="number" name="onewayAdult"
                                                                       value="0">
                                                                <div class="input-group-button">
                                                                    <button type="button" class="circle"
                                                                            data-quantity="plus"
                                                                            data-field="onewayAdult">
                                                                        <i class="bi bi-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex small">Child
                                                            </div>
                                                            <div
                                                                class="ms-auto input-group plus-minus-input">
                                                                <div class="input-group-button">
                                                                    <button type="button" class="circle"
                                                                            data-quantity="minus"
                                                                            data-field="onewayChild">
                                                                        <i class="bi bi-dash"></i>
                                                                    </button>
                                                                </div>
                                                                <input class="input-group-field"
                                                                       type="number" name="onewayChild"
                                                                       value="0">
                                                                <div class="input-group-button">
                                                                    <button type="button" class="circle"
                                                                            data-quantity="plus"
                                                                            data-field="onewayChild">
                                                                        <i class="bi bi-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex small">Rooms
                                                            </div>
                                                            <div
                                                                class="ms-auto input-group plus-minus-input">
                                                                <div class="input-group-button">
                                                                    <button type="button" class="circle"
                                                                            data-quantity="minus"
                                                                            data-field="onewayInfant">
                                                                        <i class="bi bi-dash"></i>
                                                                    </button>
                                                                </div>
                                                                <input class="input-group-field"
                                                                       type="number" name="onewayInfant"
                                                                       value="0">
                                                                <div class="input-group-button">
                                                                    <button type="button" class="circle"
                                                                            data-quantity="plus"
                                                                            data-field="onewayInfant">
                                                                        <i class="bi bi-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 col-xl-2 px-0">
                                        <button type="submit" class="btn btn-search"
                                                onclick="window.location.href='flight-listing-oneway.html';">
                                                        <span class="fw-bold"><i
                                                                class="bi bi-search me-2"></i>Search</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /hotel search -->
                    </div>

                    <!-- holiday search tab -->
                    <div class="tab-pane fade" id="holiday-tab-pane" role="tabpanel"
                         aria-labelledby="holiday-tab" tabindex="0">
                        <!-- holidays search -->
                        <div class="row">
                            <div class="col-12">
                                <div class="search-pan row mx-0 theme-border-radius">
                                    <div class="col-12 col-lg-4 col-xl-2 ps-0 mb-2 mb-xl-0 pe-0 pe-lg-2">
                                        <div class="form-group">
                                            <label for="exampleDataList9" class="form-label">Country
                                                <i class="bi bi-caret-down-fill small"></i>
                                            </label>
                                            <input class="form-control" list="datalistOptions6"
                                                   id="exampleDataList9" placeholder="India">
                                            <datalist id="datalistOptions6">
                                                <option value="San Francisco">
                                                <option value="New York">
                                                <option value="Seattle">
                                                <option value="Los Angeles">
                                                <option value="Chicago">
                                            </datalist>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4 col-xl-2 ps-0 mb-2 mb-xl-0 pe-0 pe-lg-2">
                                        <div class="form-group">
                                            <label for="exampleDataList10" class="form-label">Location
                                                <i class="bi bi-caret-down-fill small"></i>
                                            </label>
                                            <input class="form-control" list="datalistOptions8"
                                                   id="exampleDataList10" placeholder="New Delhi">
                                            <datalist id="datalistOptions8">
                                                <option value="San Francisco">
                                                <option value="New York">
                                                <option value="Seattle">
                                                <option value="Los Angeles">
                                                <option value="Chicago">
                                            </datalist>
                                        </div>
                                    </div>
                                    <div
                                        class="col-12 col-lg-4 col-xl-3 ps-0 mb-2 mb-xl-0 pe-0 pe-lg-0 pe-xl-2">
                                        <div class="form-group">
                                            <label class="form-label">Check in Date - Check out Date</label>
                                            <input type="text" class="form-control"
                                                   placeholder="Wed 2 Mar  -  Fri 11 Apr">
                                        </div>
                                    </div>
                                    <div
                                        class="col-12 col-lg-6 col-xl-3 ps-0 mb-2 mb-lg-0 mb-xl-0 pe-0 pe-lg-2">
                                        <div class="form-group border-0">
                                            <label class="form-label">Guest
                                            </label>
                                            <div class="dropdown" id="myDD5">
                                                <button class="dropdown-toggle form-control" type="button"
                                                        id="travellerInfoOneway31" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                                <span class="text-truncate">2 adults - 1 childeren - 1
                                                                    room
                                                                </span>
                                                </button>
                                                <div class="dropdown-menu"
                                                     aria-labelledby="travellerInfoOneway31">
                                                    <ul class="drop-rest">
                                                        <li>
                                                            <div class="d-flex small">Adults
                                                            </div>
                                                            <div
                                                                class="ms-auto input-group plus-minus-input">
                                                                <div class="input-group-button">
                                                                    <button type="button" class="circle"
                                                                            data-quantity="minus"
                                                                            data-field="onewayAdult">
                                                                        <i class="bi bi-dash"></i>
                                                                    </button>
                                                                </div>
                                                                <input class="input-group-field"
                                                                       type="number" name="onewayAdult"
                                                                       value="0">
                                                                <div class="input-group-button">
                                                                    <button type="button" class="circle"
                                                                            data-quantity="plus"
                                                                            data-field="onewayAdult">
                                                                        <i class="bi bi-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex small">Child
                                                            </div>
                                                            <div
                                                                class="ms-auto input-group plus-minus-input">
                                                                <div class="input-group-button">
                                                                    <button type="button" class="circle"
                                                                            data-quantity="minus"
                                                                            data-field="onewayChild">
                                                                        <i class="bi bi-dash"></i>
                                                                    </button>
                                                                </div>
                                                                <input class="input-group-field"
                                                                       type="number" name="onewayChild"
                                                                       value="0">
                                                                <div class="input-group-button">
                                                                    <button type="button" class="circle"
                                                                            data-quantity="plus"
                                                                            data-field="onewayChild">
                                                                        <i class="bi bi-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex small">Rooms
                                                            </div>
                                                            <div
                                                                class="ms-auto input-group plus-minus-input">
                                                                <div class="input-group-button">
                                                                    <button type="button" class="circle"
                                                                            data-quantity="minus"
                                                                            data-field="onewayInfant">
                                                                        <i class="bi bi-dash"></i>
                                                                    </button>
                                                                </div>
                                                                <input class="input-group-field"
                                                                       type="number" name="onewayInfant"
                                                                       value="0">
                                                                <div class="input-group-button">
                                                                    <button type="button" class="circle"
                                                                            data-quantity="plus"
                                                                            data-field="onewayInfant">
                                                                        <i class="bi bi-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 col-xl-2 px-0">
                                        <button type="submit" class="btn btn-search"
                                                onclick="window.location.href='flight-listing-oneway.html';">
                                                        <span class="fw-bold"><i
                                                                class="bi bi-search me-2"></i>Search</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /holidays search -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
