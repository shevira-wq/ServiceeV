<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <form class="row g-3 needs-validation" novalidate action="<?=base_url('home/aksi_login')?>" method="POST" id="loginForm" onsubmit="return validateForm();">
                        <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <?php if (!empty($darren2->logo_login)): ?>
                                    <img src="<?= base_url('img/' . $darren2->logo_login) ?>" alt="Login Icon" class="img-fluid mb-3" style="max-width: 100px;">
                                <?php endif; ?>
                                <h3>Log In</h3>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username" required>
                                <label for="floatingInput">Username</label>
                            </div>
                            <div class="form-floating mb-4 position-relative">
                                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                                <label for="floatingPassword">Password</label>
                                <!-- Eye Icon for toggling password visibility -->
                                <span class="position-absolute top-50 end-0 translate-middle-y me-3" style="cursor: pointer;" onclick="togglePasswordVisibility()">
                                    <i id="passwordToggleIcon" class="fas fa-eye"></i>
                                </span>
                            </div>

                            <!-- Google reCAPTCHA -->
                            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                            <div class="g-recaptcha" data-sitekey="6LdFhCAqAAAAALvjUzF22OEJLDFAIsg-k7e-aBeH"></div>

                            <script>
                                function validateForm() {
                                    var response = grecaptcha.getResponse();
                                    if (response.length === 0) {
                                        alert('Please complete the CAPTCHA.');
                                        return false;
                                    }
                                    return true;
                                }

                                function togglePasswordVisibility() {
                                    var passwordInput = document.getElementById('floatingPassword');
                                    var passwordToggleIcon = document.getElementById('passwordToggleIcon');
                                    if (passwordInput.type === 'password') {
                                        passwordInput.type = 'text';
                                        passwordToggleIcon.classList.remove('fa-eye');
                                        passwordToggleIcon.classList.add('fa-eye-slash');
                                    } else {
                                        passwordInput.type = 'password';
                                        passwordToggleIcon.classList.remove('fa-eye-slash');
                                        passwordToggleIcon.classList.add('fa-eye');
                                    }
                                }
                            </script>

                            <br>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <a href="#">Forgot Password</a>
                            </div>
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>

    <!-- Include Font Awesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
