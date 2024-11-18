<div class="modal fade" id="forgot_password" tabindex="-1" role="dialog" aria-labelledby="forgot_password_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
        <div class="modal-content" id="forgot_password_modal">
            <div class="modal-header">
                <h4 class="modal-title fs-6">Forgot Password</h4>
                <a href="#" class="text-muted fs-4" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-square-xmark"></i></a>
            </div>
            <div class="modal-body">
                <div class="modal-forgotPassword-form py-4 px-md-3 px-0">
                    <form id="forgot_passwordForm" action="{{ route('forgot.password') }}" method="POST">
                        @csrf
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <div class="form-floating mb-4">
                            <input type="email" class="form-control" name="email" id="email"
                                   placeholder="name@example.com" required>
                            <label>Email</label>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary full-width font--bold btn-lg">Search</button>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    function onSignIn(googleUser) {
        var id_token = googleUser.getAuthResponse().id_token;

        $.ajax({
            url: '/auth/google/callback',
            type: 'POST',
            data: {
                id_token: id_token,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    window.location.href = '/';
                } else {
                    console.error('Login failed:', response.message);
                }
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    }
</script>

