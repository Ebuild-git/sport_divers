@extends('front.fixe')
@section('titre', 'Paramètres ')
@section('body')





<main>

  
       
    <!doctype html>

    <html
      lang="en"
      class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
      dir="ltr"
      data-theme="theme-default"
      data-assets-path="../../assets/"
      data-template="vertical-menu-template"
      data-style="light">
      <head>
        <meta charset="utf-8" />
        <meta
          name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    
        <title>Account settings - Security | Vuexy - Bootstrap Admin Template</title>
    
        <meta name="description" content="" />
    
        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />
    
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
          href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
          rel="stylesheet" />
    
        <!-- Icons -->
        <link rel="stylesheet" href="../../assets/vendor/fonts/fontawesome.css" />
        <link rel="stylesheet" href="../../assets/vendor/fonts/tabler-icons.css" />
        <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" />
    
        <!-- Core CSS -->
    
        <link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
        <link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    
        <link rel="stylesheet" href="../../assets/css/demo.css" />
    
        <!-- Vendors CSS -->
        <link rel="stylesheet" href="../../assets/vendor/libs/node-waves/node-waves.css" />
    
        <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
        <link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" />
        <link rel="stylesheet" href="../../assets/vendor/libs/select2/select2.css" />
        <link rel="stylesheet" href="../../assets/vendor/libs/@form-validation/form-validation.css" />
    
        <!-- Page CSS -->
        <link rel="stylesheet" href="../../assets/vendor/css/pages/page-account-settings.css" />
    
        <!-- Helpers -->
        <script src="../../assets/vendor/js/helpers.js"></script>
        <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    
        <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
        <script src="../../assets/vendor/js/template-customizer.js"></script>
    
        <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
        <script src="../../assets/js/config.js"></script>
      </head>
    
      <body>
        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-content-navbar">
          <div class="layout-container">
            <!-- Menu -->
    
          
            <!-- Layout container -->
            <div class="layout-page">
              <!-- Navbar -->
    
              <!-- / Navbar -->
    
              <!-- Content wrapper -->
              <div class="content-wrapper">
                <!-- Content -->
    
                <div class="container-xxl flex-grow-1 container-p-y">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="nav-align-top">
                        <ul class="nav nav-pills flex-column flex-md-row mb-6 gap-2 gap-lg-0">
                          <li class="nav-item">
                            <a class="nav-link" href="pages-account-settings-account.html"
                              ><i class="ti-sm ti ti-users me-1_5"></i> Account</a
                            >
                          </li>
                          <li class="nav-item">
                            <a class="nav-link active" href="javascript:void(0);"
                              ><i class="ti-sm ti ti-lock me-1_5"></i> Security</a
                            >
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="pages-account-settings-billing.html"
                              ><i class="ti-sm ti ti-bookmark me-1_5"></i> Billing & Plans</a
                            >
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="pages-account-settings-notifications.html"
                              ><i class="ti-sm ti ti-bell me-1_5"></i> Notifications</a
                            >
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="pages-account-settings-connections.html"
                              ><i class="ti-sm ti ti-link me-1_5"></i> Connections</a
                            >
                          </li>
                        </ul>
                      </div>
                      <!-- Change Password -->
                      <div class="card mb-6">
                        <h5 class="card-header">Change Password</h5>
                        <div class="card-body pt-1">
                          <form id="formAccountSettings" method="GET" onsubmit="return false">
                            <div class="row">
                              <div class="mb-6 col-md-6 form-password-toggle">
                                <label class="form-label" for="currentPassword">Current Password</label>
                                <div class="input-group input-group-merge">
                                  <input
                                    class="form-control"
                                    type="password"
                                    name="currentPassword"
                                    id="currentPassword"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                  <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="mb-6 col-md-6 form-password-toggle">
                                <label class="form-label" for="newPassword">New Password</label>
                                <div class="input-group input-group-merge">
                                  <input
                                    class="form-control"
                                    type="password"
                                    id="newPassword"
                                    name="newPassword"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                  <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                </div>
                              </div>
    
                              <div class="mb-6 col-md-6 form-password-toggle">
                                <label class="form-label" for="confirmPassword">Confirm New Password</label>
                                <div class="input-group input-group-merge">
                                  <input
                                    class="form-control"
                                    type="password"
                                    name="confirmPassword"
                                    id="confirmPassword"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                  <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                </div>
                              </div>
                            </div>
                            <h6 class="text-body">Password Requirements:</h6>
                            <ul class="ps-4 mb-0">
                              <li class="mb-4">Minimum 8 characters long - the more, the better</li>
                              <li class="mb-4">At least one lowercase character</li>
                              <li>At least one number, symbol, or whitespace character</li>
                            </ul>
                            <div class="mt-6">
                              <button type="submit" class="btn btn-primary me-3">Save changes</button>
                              <button type="reset" class="btn btn-label-secondary">Reset</button>
                            </div>
                          </form>
                        </div>
                      </div>
                      <!--/ Change Password -->
    
                      <!-- Two-steps verification -->
                
                      <!-- Modal -->
                      <!-- Enable OTP Modal -->
                      <div class="modal fade" id="enableOTP" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-body">
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              <div class="text-center mb-6">
                                <h4 class="mb-2">Enable One Time Password</h4>
                                <p>Verify Your Mobile Number for SMS</p>
                              </div>
                              <p>
                                Enter your mobile phone number with country code and we will send you a verification code.
                              </p>
                              <form id="enableOTPForm" class="row g-5" onsubmit="return false">
                                <div class="col-12">
                                  <label class="form-label" for="modalEnableOTPPhone">Phone Number</label>
                                  <div class="input-group">
                                    <span class="input-group-text">US (+1)</span>
                                    <input
                                      type="text"
                                      id="modalEnableOTPPhone"
                                      name="modalEnableOTPPhone"
                                      class="form-control phone-number-otp-mask"
                                      placeholder="202 555 0111" />
                                  </div>
                                </div>
                                <div class="col-12">
                                  <button type="submit" class="btn btn-primary me-3">Submit</button>
                                  <button
                                    type="reset"
                                    class="btn btn-label-secondary"
                                    data-bs-dismiss="modal"
                                    aria-label="Close">
                                    Cancel
                                  </button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--/ Enable OTP Modal -->
    
                      <!-- /Modal -->
    
                      <!--/ Two-steps verification -->
    
                      <!--/ Recent Devices -->
                    </div>
                  </div>
                </div>
                <!-- / Content -->
    
          
                <div class="content-backdrop fade"></div>
              </div>
              <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
          </div>
    
          <!-- Overlay -->
          <div class="layout-overlay layout-menu-toggle"></div>
    
          <!-- Drag Target Area To SlideIn Menu On Small Screens -->
          <div class="drag-target"></div>
        </div>
        <!-- / Layout wrapper -->
    
        <!-- Core JS -->
        <!-- build:js assets/vendor/js/core.js -->
    
        <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
        <script src="../../assets/vendor/libs/popper/popper.js"></script>
        <script src="../../assets/vendor/js/bootstrap.js"></script>
        <script src="../../assets/vendor/libs/node-waves/node-waves.js"></script>
        <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="../../assets/vendor/libs/hammer/hammer.js"></script>
        <script src="../../assets/vendor/libs/i18n/i18n.js"></script>
        <script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
        <script src="../../assets/vendor/js/menu.js"></script>
    
        <!-- endbuild -->
    
        <!-- Vendors JS -->
        <script src="../../assets/vendor/libs/select2/select2.js"></script>
        <script src="../../assets/vendor/libs/@form-validation/popular.js"></script>
        <script src="../../assets/vendor/libs/@form-validation/bootstrap5.js"></script>
        <script src="../../assets/vendor/libs/@form-validation/auto-focus.js"></script>
        <script src="../../assets/vendor/libs/cleavejs/cleave.js"></script>
        <script src="../../assets/vendor/libs/cleavejs/cleave-phone.js"></script>
    
        <!-- Main JS -->
        <script src="../../assets/js/main.js"></script>
    
        <!-- Page JS -->
        <script src="../../assets/js/pages-account-settings-security.js"></script>
        <script src="../../assets/js/modal-enable-otp.js"></script>
      </body>
    </html>
    
</main>


@endsection

<!-- error area end -->