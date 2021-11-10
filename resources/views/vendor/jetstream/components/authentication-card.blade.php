<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div>
        <!-- {{ $logo }} -->
    </div>

    <div class="w-full mt-6 overflow-hidden sm:rounded-lg">
        <div class="authincation h-100">
            <div class="container h-100">
                <div class="row justify-content-center h-100 align-items-center">
                    <div class="col-md-6">
                        <div class="authincation-content">
                            <div class="row no-gutters">
                                <div class="col-xl-12">
                                    <div class="auth-form">
                                        <div class="text-center mb-3 justify-content-center">
                                            <a href="#"><img style="text-align: center;" src="{{ asset('AppealLab/images/logo-full.png') }}" alt=""></a>
                                        </div>
                                        <h4 class="text-center mb-4 text-white">Sign in your account</h4>
                                            {{ $slot }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
