<div class="tab-pane" id="hotel_category">
    <div class="py-3">
        <a href="javascript:void(0)" class="btn btn-success" id="createNewHotelCategory">Add Hotel Category</a>
    </div>
    <table class="table table-bordered data-table" id="hotelCategoryData"></table>
    <div class="modal_form">
        @include('admin.categories.hotels.modal_form')
    </div>
</div>

@push('scripts')
    <script type="text/javascript"></script>
@endpush
