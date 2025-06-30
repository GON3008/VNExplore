<style>
    .countdown-container {
        background-color: #0074cc;
        color: white;
        padding: 15px 20px;
        border-radius: 6px;
        text-align: center;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
    }

    .countdown-text {
        font-size: 18px;
        margin: 0;
    }

    .countdown-timer {
        color: #2bff00;
        font-weight: bold;
        font-size: 20px;
    }

    .timer-icon {
        display: inline-block;
        width: 24px;
        height: 24px;
        background-color: #2bff00;
        border-radius: 50%;
        position: relative;
        margin-left: 8px;
        vertical-align: middle;
    }

    .timer-icon::before,
    .timer-icon::after {
        content: '';
        position: absolute;
        background-color: #0074cc;
    }

    .timer-icon::before {
        width: 2px;
        height: 10px;
        top: 5px;
        left: 12px;
    }

    .timer-icon::after {
        width: 8px;
        height: 2px;
        top: 12px;
        left: 12px;
    }

    @media (max-width: 576px) {
        .countdown-text {
            font-size: 16px;
        }

        .countdown-timer {
            font-size: 18px;
        }

        .timer-icon {
            width: 20px;
            height: 20px;
        }

        .timer-icon::before {
            height: 8px;
            top: 4px;
            left: 10px;
        }

        .timer-icon::after {
            width: 6px;
            top: 10px;
            left: 10px;
        }
    }
</style>
<div class="container mt-1">
    <div class="countdown-container">
        <p class="countdown-text">
            <span class="text-white">We're holding this price for you! Let's complete your payment in</span>
            <span class="countdown-timer" id="countdown">00:55:00</span>
            <span class="timer-icon"></span>
        </p>
    </div>
</div>
<script>
    // Lấy phần tử countdown
    const countdownElement = document.getElementById('countdown');

    // Hàm để lấy thời gian còn lại từ localStorage hoặc đặt giá trị ban đầu
    function getTimeLeft() {
        const savedEndTime = localStorage.getItem('countdownEndTime');
        const initialTime = 55 * 60; // 55 phút ban đầu (trong giây)

        if (savedEndTime) {
            // Tính thời gian còn lại dựa trên thời điểm kết thúc đã lưu
            const currentTime = Math.floor(Date.now() / 1000); // Thời gian hiện tại (giây)
            const timeLeft = Math.max(0, savedEndTime - currentTime); // Đảm bảo không âm
            return timeLeft;
        } else {
            // Nếu chưa có, đặt thời gian kết thúc mới và lưu lại
            const endTime = Math.floor(Date.now() / 1000) + initialTime;
            localStorage.setItem('countdownEndTime', endTime);
            return initialTime;
        }
    }

    // Khởi tạo thời gian còn lại
    let timeLeft = getTimeLeft();

    // Hàm định dạng thời gian
    function formatTime(seconds) {
        const minutes = Math.floor(seconds / 60);
        const secs = seconds % 60;
        return `00:${minutes.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`;
    }

    // Cập nhật hiển thị ban đầu
    countdownElement.textContent = formatTime(timeLeft);

    // Cập nhật bộ đếm mỗi giây
    const countdownTimer = setInterval(function () {
        // Lấy thời gian kết thúc từ localStorage
        const endTime = parseInt(localStorage.getItem('countdownEndTime'), 10);
        const currentTime = Math.floor(Date.now() / 1000);
        timeLeft = Math.max(0, endTime - currentTime);

        // Cập nhật giao diện
        countdownElement.textContent = formatTime(timeLeft);

        // Dừng bộ đếm khi hết thời gian
        if (timeLeft <= 0) {
            clearInterval(countdownTimer);
            countdownElement.textContent = "00:00:00";
            localStorage.removeItem('countdownEndTime'); // Xóa dữ liệu khi hết thời gian
        }
    }, 1000);
</script>
