<!-- resources/views/modal_form.blade.php -->
<div id="app">
    <reusable-modal-form
        title="Thêm Hotel"
        button-label="Thêm Hotel"
        :fields="[
            { name: 'name', label: 'Tên Hotel', type: 'text', placeholder: 'Nhập tên Hotel', required: true },
            { name: 'location', label: 'Vị trí', type: 'text', placeholder: 'Nhập vị trí', required: true },
            { name: 'description', label: 'Mô tả', type: 'textarea', placeholder: 'Nhập mô tả', required: false }
        ]"
        api-url="/api/hotels"
    ></reusable-modal-form>
</div>
