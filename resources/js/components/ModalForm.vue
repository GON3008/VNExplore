<template>
    <div>
        <!-- Hiển thị modal khi prop "show" là true -->
        <div v-if="show">
            <!-- Modal: sử dụng các lớp Bootstrap để hiển thị modal -->
            <div class="modal fade show d-block" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Header của modal -->
                        <div class="modal-header">
                            <h5 class="modal-title">{{ isEdit ? "Edit Room" : "Create New Room" }}</h5>
                            <button type="button" class="btn-close" @click="closeModal"></button>
                        </div>
                        <!-- Body của modal -->
                        <div class="modal-body">
                            <form @submit.prevent="submitForm">
                                <div class="mb-3">
                                    <label class="form-label">Room Name</label>
                                    <input v-model="form.room_name" type="text" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Price</label>
                                    <input v-model="form.room_price" type="number" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Guest</label>
                                    <input v-model="form.guests" type="number" class="form-control" required>
                                </div>
                                <!-- Footer của modal -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" @click="closeModal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Backdrop của modal -->
            <div class="modal-backdrop fade show"></div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        show: {
            type: Boolean,
            default: false
        },
        isEdit: {
            type: Boolean,
            default: false
        },
        roomData: {
            type: Object,
            default: () => ({})
        }
    },
    data() {
        return {
            form: {
                room_name: "",
                room_price: "",
                guests: ""
            }
        };
    },
    watch: {
        roomData: {
            handler(newVal) {
                if (Object.keys(newVal).length) {
                    this.form = { ...newVal };
                }
            },
            deep: true,
            immediate: true
        }
    },
    methods: {
        submitForm() {
            // Gửi dữ liệu từ form ra ngoài thông qua event "save-room"
            this.$emit("save-room", this.form);
            this.closeModal();
        },
        closeModal() {
            // Thông báo cho component cha rằng modal cần đóng
            this.$emit("close-modal");
        }
    }
};
</script>

<style scoped>
/* Nếu cần, có thể thêm một số CSS bổ sung cho modal */
</style>
