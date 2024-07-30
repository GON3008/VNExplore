@extends('admin.layouts.master')

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Apps</a></li>
                            <li class="breadcrumb-item active">Chat</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Chat</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <!-- start chat users-->
            <div class="col-xxl-3 col-xl-6 order-xl-1">
                <div class="card">
                    <div class="card-body p-0">
                        <ul class="nav nav-tabs nav-bordered">
                            <li class="nav-item">
                                <a href="#allUsers" data-bs-toggle="tab" aria-expanded="false" class="nav-link active py-2">
                                    All
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#favUsers" data-bs-toggle="tab" aria-expanded="true" class="nav-link py-2">
                                    Favourties
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#friendUsers" data-bs-toggle="tab" aria-expanded="true" class="nav-link py-2">
                                    Friends
                                </a>
                            </li>
                        </ul> <!-- end nav-->
                        <div class="tab-content">
                            <div class="tab-pane show active card-body pb-0" id="newpost">

                                <!-- start search box -->
                                <div class="app-search">
                                    <form>
                                        <div class="mb-2 position-relative">
                                            <input type="text" class="form-control"
                                                   placeholder="People, groups & messages..." />
                                            <span class="mdi mdi-magnify search-icon"></span>
                                        </div>
                                    </form>
                                </div>
                                <!-- end search box -->
                            </div>

                            <!-- users -->
                            <div class="row">
                                <div class="col">
                                    <div class="card-body py-0" data-simplebar style="max-height: 562px">
                                        @include('admin.Messages.list_chat')
                                    </div> <!-- end slimscroll-->
                                </div> <!-- End col -->
                            </div> <!-- end users -->
                        </div> <!-- end tab content-->
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div>
            <!-- end chat users-->

            <!-- chat area -->
            <div class="col-xxl-9 col-xl-12 order-xl-2">
                <div class="card">
                    <div class="card-body px-0 pb-0">

                        @include('admin.Messages.chat')

                        <div class="row px-3 pb-3">
                            <div class="col">
                                <div class="mt-2 bg-light p-3 rounded">
                                    <form class="needs-validation" novalidate="" name="chat-form"
                                          id="chat-form">
                                        <div class="row">
                                            <div class="col mb-2 mb-sm-0">
                                                <input type="text" class="form-control border-0" placeholder="Enter your text" required="">
                                                <div class="invalid-feedback">
                                                    Please enter your messsage
                                                </div>
                                            </div>
                                            <div class="col-sm-auto">
                                                <div class="btn-group">
                                                    <a href="#" class="btn btn-light"><i class="uil uil-paperclip"></i></a>
                                                    <a href="#" class="btn btn-light"> <i class='uil uil-smile'></i> </a>
                                                    <div class="d-grid">
                                                        <button type="submit" class="btn btn-success chat-send"><i class='uil uil-message'></i></button>
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row-->
                                    </form>
                                </div>
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div>

        </div> <!-- end row-->

    </div> <!-- container -->


    <script type="text/javascript">
            $(document).ready(function () {
            $('#chat-form').on('submit', function (e) {
                e.preventDefault();

                var receiverId = $('#receiver_id').val();
                var message = $('#message').val();
                var token = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: "{{ route('admin.messages.store') }}",
                    method: 'POST',
                    data: {
                        _token: token,
                        receiver_id: receiverId,
                        message: message
                    },
                    success: function (response) {
                        $('#messages-list').append(
                            '<li class="list-group-item d-flex align-items-center"><img src="' + response.sender.avatar + '" alt="avatar" class="rounded-circle" width="40" height="40"><div class="ms-2"><strong>' + response.sender.name + ':</strong> ' + response.message + '<span class="text-muted float-end">' + response.created_at + '</span></div></li>'
                        );
                        $('#message').val('');
                    }
                });
            });
        });
    </script>

@endsection
