<style>
    .coupon-container {
        display: flex;
        gap: 30px;
        /*justify-content: center;*/
        align-items: flex-start;
    }

    .coupon-card {
        width: 300px;
        background-color: #fff;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        /*padding: 16px;*/
        text-align: center;
        box-shadow: 0px 4px 10px rgba(3, 18, 26, 0.15);
    }

    .coupon-icon img {
        width: 50px;
        height: 50px;
        margin-bottom: 12px;
    }

    .coupon-content h4 {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 8px;
        color: #333;
    }

    .coupon-content p {
        font-size: 14px;
        color: #666;
        margin: 0;
    }

    .coupon-code {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 12px;
        padding-top: 12px;
        border-top: 1px dashed #e0e0e0;
    }

    .coupon-code span {
        font-size: 14px;
        font-weight: bold;
        color: #333;
        background-color: #f5f5f5;
        padding: 4px 8px;
        border-radius: 4px;
    }

    .coupon-code button {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 6px 12px;
        border-radius: 4px;
        cursor: pointer;
    }

    .coupon-code button:hover {
        background-color: #0056b3;
    }
</style>

<div class="justify-content-center align-items-center">
    <div class="upside-heading">
        <h2 style="color: rgba(7, 62, 104, 1.00);">Đăng ký để sử dụng coupon</h2>
    </div>
    <div class="coupon-container swiper-container py-3">
        <div class="coupon-card py-2">
            <div class="d-flex gap-2 justify-content-between">
                <div class="coupon-icon pt-2">
                    <img src="flight-icon.png" alt="Flight Icon"/>
                </div>
                <div class="coupon-content">
                    <h6>Giảm ngay 50K</h6>
                    <p>Áp dụng cho lần đặt đầu tiên trên VNExplore.</p>
                </div>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                     accentcolor="#687176" fillcolor="#0194F3">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715
                            17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                          stroke="#687176" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round"></path>
                    <path d="M12 11.5V16M11.75 7.75H12.25V8.25H11.75V7.75Z" stroke="#0194F3" stroke-width="2"
                          stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </div>
            <div style="background:radial-gradient(10px at right, #0000 97%, #FFFFFF) right / 51% 100% no-repeat,
            radial-gradient(10px at left, #0000 97%, #FFFFFF) left / 51% 100% no-repeat;
            background-color:rgba(3,18,26,0.07);
            height:20px;"></div>
            <div class="coupon-code">
                <span>TRAVELOKALANNGOC</span>
                <button onclick="copyToClipboard('TRAVELOKALANNGOC')">Copy</button>
            </div>
        </div>

        <div class="coupon-card py-2">
            <div class="d-flex gap-2">
                <div class="coupon-icon pt-2">
                    <img src="flight-icon.png" alt="Flight Icon"/>
                </div>
                <div class="coupon-content">
                    <h6>Giảm ngay 50K</h6>
                    <p>Áp dụng cho lần đặt đầu tiên trên VNExplore.</p>
                </div>
            </div>
            <div style="background:radial-gradient(10px at right, #0000 97%, #FFFFFF) right / 51% 100% no-repeat,
            radial-gradient(10px at left, #0000 97%, #FFFFFF) left / 51% 100% no-repeat;
            background-color:rgba(3,18,26,0.07);
            height:20px;"></div>
            <div class="coupon-code">
                <span>TRAVELOKALANNGOC</span>
                <button onclick="copyToClipboard('TRAVELOKALANNGOC')">Copy</button>
            </div>
        </div>

        <div class="coupon-card py-2">
            <div class="d-flex gap-2">
                <div class="coupon-icon pt-2">
                    <img src="flight-icon.png" alt="Flight Icon"/>
                </div>
                <div class="coupon-content">
                    <h6>Giảm ngay 50K</h6>
                    <p>Áp dụng cho lần đặt đầu tiên trên VNExplore.</p>
                </div>
            </div>
            <div style="background:radial-gradient(10px at right, #0000 97%, #FFFFFF) right / 51% 100% no-repeat,
            radial-gradient(10px at left, #0000 97%, #FFFFFF) left / 51% 100% no-repeat;
            background-color:rgba(3,18,26,0.07);
            height:20px;"></div>
            <div class="coupon-code">
                <span>TRAVELOKALANNGOC</span>
                <button onclick="copyToClipboard('TRAVELOKALANNGOC')">Copy</button>
            </div>
        </div>
    </div>
</div>

<div class="justify-content-center align-items-center py-2">
    <div class="banner">
        <a href="#">
            <img src="{{asset('images/banner.png')}}" style="width: 100%; height: 100%">
        </a>
    </div>
</div>
