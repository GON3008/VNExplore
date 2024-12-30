<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="signupmodal1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
        <div class="modal-content" id="signupmodal">
            <div class="modal-header">
                <h4 class="modal-title fs-6">Sign Up</h4>
                <a href="#" class="text-muted fs-4" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-square-xmark"></i></a>
            </div>
            <div class="modal-body">
                <div class="modal-login-form py-4 px-md-3 px-0">
                    <form id="loginForm" action="{{route('registerPost')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" name="name" id="name"
                                   placeholder="name" required>
                            <label>Name</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="email" class="form-control" name="email" id="email"
                                   placeholder="name@example.com" required>
                            <label>Email</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" name="password" id="password"
                                   placeholder="Password" required>
                            <label>Password</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" name="phone" id="phone"
                                   placeholder="Phone" maxlength="10">
                            <label>Phone</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="file" class="form-control" name="avatar" id="avatar">
                            <label>Avatar</label>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary full-width font--bold btn-lg">Sign Up</button>
                        </div>
                        <div class="modal-flex-item d-flex align-items-center justify-content-between mb-3">
                            <div class="modal-flex-first">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="savepassword" value="option1">
                                    <label class="form-check-label" for="savepassword">Save Password</label>
                                </div>
                            </div>
                            <div class="modal-flex-last">
                                <a href="JavaScript:Void(0);" class="text-primary fw-medium">Forget Password?</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="prixer px-3">
                    <div class="devider-wraps position-relative">
                        <div class="devider-text text-muted-2 text-md">Sign In with More Methods</div>
                    </div>
                </div>
                <div class="social-login py-4 px-2">
                    <ul class="row align-items-center justify-content-between g-3 p-0 m-0">
                        <li class="col"><a href="#" class="square--60 border br-dashed rounded-2 full-width"><i
                                    class="fa-brands fa-facebook color--facebook fs-2"></i></a></li>
                        <li class="col"><a href="#" class="square--60 border br-dashed rounded-2"><i
                                    class="fa-brands fa-google color--google fs-2"></i></a></li>
                        <li class="col"><a href="#" class="square--60 border br-dashed rounded-2"><i
                                    class="fa-brands fa-linkedin color--linkedin fs-2"></i></a></li>
                        <li class="col"><a href="#" class="square--60 border br-dashed rounded-2"><i
                                    class="fa-brands fa-dribbble color--dribbble fs-2"></i></a></li>
                        <li class="col"><a href="#" class="square--60 border br-dashed rounded-2"><i
                                    class="fa-brands fa-twitter color--twitter fs-2"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer align-items-center justify-content-center">
                <p>Log in to your account? <a href="#" data-bs-toggle="modal" data-bs-target="#login"
                                              class="text-primary fw-medium ms-1">Login</a></p>
            </div>
        </div>
    </div>
</div>

