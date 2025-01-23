<template>
    <div>
        <!-- Nút mở modal -->
        <button @click="openModal" class="btn btn-primary">{{ buttonLabel }}</button>

        <!-- Modal -->
        <div v-if="isModalOpen" class="modal fade show d-block" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ title }}</h5>
                        <button type="button" class="btn-close" @click="closeModal"></button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="submitForm">
                            <div v-for="(field, index) in fields" :key="index" class="mb-3">
                                <label :for="field.name" class="form-label">{{ field.label }}</label>
                                <input
                                    v-if="field.type !== 'textarea'"
                                    :type="field.type"
                                    v-model="formData[field.name]"
                                    class="form-control"
                                    :id="field.name"
                                    :placeholder="field.placeholder"
                                    :required="field.required"
                                >
                                <textarea
                                    v-else
                                    v-model="formData[field.name]"
                                    class="form-control"
                                    :id="field.name"
                                    :placeholder="field.placeholder"
                                    :required="field.required">
                                </textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Lưu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        title: { type: String, default: 'Thêm mới' },
        buttonLabel: { type: String, default: 'Thêm mới' },
        fields: { type: Array, required: true },
        apiUrl: { type: String, required: true },
    },
    data() {
        return {
            isModalOpen: false,
            formData: {},
        };
    },
    watch: {
        fields: {
            immediate: true,
            handler(newFields) {
                newFields.forEach(field => {
                    this.$set(this.formData, field.name, '');
                });
            },
        },
    },
    methods: {
        openModal() {
            this.isModalOpen = true;
        },
        closeModal() {
            this.isModalOpen = false;
        },
        submitForm() {
            axios.post(this.apiUrl, this.formData)
                .then(response => {
                    alert('Thành công!');
                    this.closeModal();
                    window.LaravelDataTable.ajax.reload(); // Reload DataTable
                })
                .catch(error => {
                    console.error('Lỗi:', error);
                });
        },
    },
};
</script>

<style>
.modal.fade.show {
    display: block;
    background: rgba(0, 0, 0, 0.5);
}
</style>
