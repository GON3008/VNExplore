@extends('clients.layouts.hotels.hotel_layout')

@section('contents')
    <style>
        .payment-option,
        .main-option {
            border: 1px solid #dee2e6;
            border-radius: 0.5rem;
            padding: 12px 15px;
            margin-bottom: 12px;
            cursor: pointer;
            position: relative;
            transition: border-color 0.2s ease, background-color 0.2s ease;
            width: 100%;
            background-color: #f8f9fa;
        }

        .payment-option:hover,
        .main-option:hover {
            border-color: #0d6efd;
            background-color: #f1f3f5;
        }

        .payment-option.selected,
        .main-option.active {
            border-color: #0d6efd;
            box-shadow: 0 0 0 1px #0d6efd;
        }

        .custom-radio {
            display: flex;
            align-items: center;
        }

        .radio-input:checked + .radio-circle .radio-inner {
            display: block;
        }

        .radio-circle {
            min-width: 22px;
            height: 22px;
            border-radius: 50%;
            border: 2px solid #adb5bd;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 10px;
            flex-shrink: 0;
        }

        .radio-inner {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: #0d6efd;
            display: none;
        }

        .payment-logo {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            height: 24px;
        }

        .wallet-options {
            max-width: 600px;
            margin: 0 auto;
            padding: 15px;
        }

        .multiple-logos {
            display: flex;
            gap: 8px;
        }

        .multiple-logos img {
            height: 24px;
        }

        .wallet-suboptions {
            display: none;
            padding-left: 30px;
            margin-top: 12px;
        }

        .wallet-suboptions.show {
            display: block;
        }

        .option-label {
            font-weight: 500;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            cursor: pointer;
        }

        @media (max-width: 576px) {
            .payment-option, .main-option {
                padding: 10px 12px;
            }

            .radio-circle {
                min-width: 18px;
                height: 18px;
                margin-right: 8px;
            }

            .radio-inner {
                width: 8px;
                height: 8px;
            }

            .payment-logo, .multiple-logos img {
                height: 20px;
            }

            .wallet-suboptions {
                padding-left: 15px;
            }
        }
    </style>

    <section class="pt-4 gray-simple position-relative">
        <div class="container">
            @include('clients.layouts.booking_payment.step')
            <div class="row align-items-start">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="row align-items-start">
                        <div class="col-xl-8 col-lg-8 col-md-12">
                            {{--                            @include('clients.layouts.booking_payment.ip_notice')--}}
                            @include('clients.layouts.booking_payment.payment_time')
                            <div class="pt-3">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="div-title d-flex align-items-center mb-3">
                                            <h4>How would you like to pay?</h4>
                                        </div>
                                        <div class="container-fluid">
                                            <div class="wallet-options">
                                                <!-- VietQR Main Option -->
                                                <div class="main-option" data-target="vietqr">
                                                    <div class="custom-radio">
                                                        <input type="radio" name="payment_method" value="vietqr"
                                                               id="vietqr-radio" class="radio-input" hidden>
                                                        <div class="radio-circle">
                                                            <div class="radio-inner"></div>
                                                        </div>
                                                        <label for="vietqr-radio" class="option-label">VietQR</label>
                                                    </div>
                                                    <img src="{{ asset('assets/images/vietqr.png') }}" alt="VietQR"
                                                         class="payment-logo">
                                                </div>

                                                <!-- E-Wallet Main Option -->
                                                <div class="main-option" data-target="ewallet-options">
                                                    <div class="custom-radio">
                                                        <input type="radio" name="payment_method" value="ewallet"
                                                               id="ewallet-radio" class="radio-input" hidden>
                                                        <div class="radio-circle">
                                                            <div class="radio-inner"></div>
                                                        </div>
                                                        <label for="ewallet-radio" class="option-label">E-Wallet</label>
                                                    </div>
                                                    <div class="multiple-logos payment-logo">
                                                        <img src="{{ asset('assets/images/zalopay.png') }}"
                                                             alt="ZaloPay">
                                                        <img src="{{ asset('assets/images/vnpay.png') }}" alt="VNPAY">
                                                    </div>
                                                </div>

                                                <!-- E-Wallet Sub-options -->
                                                <div class="wallet-suboptions" id="ewallet-options">
                                                    <!-- ZaloPay Option -->
                                                    <div class="payment-option" data-value="zalopay">
                                                        <div class="custom-radio">
                                                            <input type="radio" name="ewallet_method" value="zalopay"
                                                                   id="zalopay-radio" class="radio-input" hidden>
                                                            <div class="radio-circle">
                                                                <div class="radio-inner"></div>
                                                            </div>
                                                            <label for="zalopay-radio"
                                                                   class="option-label">ZaloPay</label>
                                                        </div>
                                                        <img
                                                            src="https://cdn.haitrieu.com/wp-content/uploads/2022/10/Logo-ZaloPay-Square.png"
                                                            alt="ZaloPay" class="payment-logo">
                                                    </div>

                                                    <!-- VNPAY Option -->
                                                    <div class="payment-option" data-value="vnpay">
                                                        <div class="custom-radio">
                                                            <input type="radio" name="ewallet_method" value="vnpay"
                                                                   id="vnpay-radio" class="radio-input" hidden>
                                                            <div class="radio-circle">
                                                                <div class="radio-inner"></div>
                                                            </div>
                                                            <label for="vnpay-radio" class="option-label">VNPAY</label>
                                                        </div>
                                                        <img src="{{ asset('assets/images/vnpay.png') }}" alt="VNPAY"
                                                             class="payment-logo">
                                                    </div>

                                                    <!-- Other E-Wallets Option -->
                                                    <div class="payment-option" data-value="other-ewallets">
                                                        <div class="custom-radio">
                                                            <input type="radio" name="ewallet_method"
                                                                   value="other-ewallets" id="other-ewallets-radio"
                                                                   class="radio-input" hidden>
                                                            <div class="radio-circle">
                                                                <div class="radio-inner"></div>
                                                            </div>
                                                            <label for="other-ewallets-radio" class="option-label">Other
                                                                E-Wallets</label>
                                                        </div>
                                                        <div class="multiple-logos payment-logo">
                                                            <img
                                                                src="https://play-lh.googleusercontent.com/NfFBz1Rxk0nQ7RsOk0kXZ-uRVcIDmF2PecXFdj-F044ZuYbHRHHDZGRL82UBKa8X5w"
                                                                alt="MoMo">
                                                            <img src="{{ asset('assets/images/shopeepay.png') }}"
                                                                 alt="ShopeePay">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('clients.layouts.booking_payment.res_summary')
                    </div>
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="text-center d-flex align-items-center justify-content-center mt-4">
                        <a href="booking-page.html" class="btn btn-md btn-dark fw-semibold mx-2"><i
                                class="fa-solid fa-arrow-left me-2"></i>Previous</a>
                        <a href="{{ route('booking.page3') }}" class="btn btn-md btn-primary fw-semibold mx-2">Make Your
                            Payment<i
                                class="fa-solid fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const mainOptions = document.querySelectorAll('.main-option');
            const subOptions = document.querySelectorAll('.payment-option');

            // Xử lý click cho main options
            mainOptions.forEach(option => {
                option.addEventListener('click', () => {
                    const targetId = option.getAttribute('data-target');
                    const subContainer = document.getElementById(targetId);

                    if (subContainer) {
                        const isActive = option.classList.toggle('active');
                        subContainer.classList.toggle('show', isActive);
                    }
                });
            });

            // Xử lý click cho sub-options
            subOptions.forEach(option => {
                option.addEventListener('click', (e) => {
                    e.stopPropagation(); // Ngăn click lan lên main-option
                    subOptions.forEach(opt => opt.classList.remove('selected'));
                    option.classList.add('selected');
                });
            });
        });
    </script>
@endsection
