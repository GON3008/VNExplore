// Import Vue
import { createApp } from 'vue';

// Import component Vue (nếu có)
import ReusableModalForm from './components/ReusableModalForm.vue';

// Tạo ứng dụng Vue
const app = createApp({});

// Đăng ký component toàn cục (nếu cần)
app.component('reusable-modal-form', ReusableModalForm);

// Mount Vue app vào ID gốc (thường là #app)
app.mount('#app');
