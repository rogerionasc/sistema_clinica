<script>
import { Link, Head } from '@inertiajs/vue3';
export default {
  data() {
    return {
      togglePassword: false
    }
  },
  components: {
    Link, Head
  }
};
</script>

<template>
  <Head title="Login" />

  <div class="auth-page-wrapper pt-5">
    <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
      <div class="bg-overlay"></div>
      <div class="shape">
        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
          <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
        </svg>
      </div>
    </div>

    <div class="auth-page-content">
      <BContainer>
        <BRow>
          <BCol lg="12">
            <div class="text-center mt-sm-5 mb-4 text-white-50">
              <div>
                <Link href="/" class="d-inline-block auth-logo">
                  <img src="@assets/images/logo-light.png" alt="" height="20">
                </Link>
              </div>
              <p class="mt-3 fs-15 fw-medium">Premium Admin & Dashboard Template</p>
            </div>
          </BCol>
        </BRow>

        <BRow class="justify-content-center">
          <BCol md="8" lg="6" xl="5">
            <BCard no-body class="mt-4">

              <BCardBody class="p-4">
                <div class="text-center mt-2">
                  <h5 class="text-primary">Welcome Back !</h5>
                  <p class="text-muted">Sign in to continue to Velzon.</p>
                </div>
                <div class="p-2 mt-4">
                  <form>

                    <div class="mb-3">
                      <label for="username" class="form-label">Username</label>
                      <input type="text" class="form-control" id="username" placeholder="Enter username">
                    </div>

                    <div class="mb-3">
                      <div class="float-end">
                        <Link href="/auth/reset-pwd-basic" class="text-muted">Forgot
                          password?</Link>
                      </div>
                      <label class="form-label" for="password-input">Password</label>
                      <div class="position-relative auth-pass-inputgroup mb-3">
                        <input :type="togglePassword ? 'text' : 'password'" class="form-control pe-5" placeholder="Enter password" id="password-input">
                        <BButton variant="link" class="position-absolute end-0 top-0 text-decoration-none text-muted" type="button" id="password-addon" @click="togglePassword = !togglePassword">
                          <i class="ri-eye-fill align-middle"></i>
                        </BButton>
                      </div>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
                      <label class="form-check-label" for="auth-remember-check">Remember
                        me</label>
                    </div>

                    <div class="mt-4">
                      <BButton variant="success" class="w-100" type="submit">Sign In</BButton>
                    </div>

                    <div class="mt-4 text-center">
                      <div class="signin-other-title">
                        <h5 class="fs-13 mb-4 title">Sign In with</h5>
                      </div>
                      <div>
                        <BButton type="button" variant="primary" class="btn-icon"><i class="ri-facebook-fill fs-16"></i></BButton>
                        <BButton type="button" variant="danger" class="btn-icon ms-1"><i class="ri-google-fill fs-16"></i></BButton>
                        <BButton type="button" variant="dark" class="btn-icon ms-1"><i class="ri-github-fill fs-16"></i></BButton>
                        <BButton type="button" variant="info" class="btn-icon ms-1"><i class="ri-twitter-fill fs-16"></i></BButton>
                      </div>
                    </div>
                  </form>
                </div>
              </BCardBody>
            </BCard>

            <div class="mt-4 text-center">
              <p class="mb-0">Don't have an account ? <Link href="/auth/signup-basic" class="fw-semibold text-primary text-decoration-underline"> Signup </Link>
              </p>
            </div>

          </BCol>
        </BRow>
      </BContainer>
    </div>

    <footer class="footer">
      <BContainer>
        <BRow>
          <BCol lg="12">
            <div class="text-center">
              <p class="mb-0 text-muted">&copy; {{ new Date().getFullYear() }} Velzon. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
            </div>
          </BCol>
        </BRow>
      </BContainer>
    </footer>
  </div>
</template>