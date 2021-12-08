<x-app-layout>
   <!-- Form step -->
    <link href="{{ asset('AppealLab/vendor/jquery-smartwizard/dist/css/smart_wizard.min.css') }}" rel="stylesheet">
	<link href="{{ asset('AppealLab/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
        <div class="container" style="margin-top: 100px;">
            <div class="page-titles">
                <!-- <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Wizard</a></li>
                </ol> -->
            </div>
            <div class="card-header justify-content-center">
                <div class="card-title">
                    <div class="text-center">
                        <img class="mg5" src="{{ asset('AppealLab/images/amazon-logo.png') }}" width="60px" alt="">
                        <h3>Connect to your Selected Marketplace</h3>
                        <p style="font-size: 16px; color: gray;">we help you to connect securely with multiple plateform</p>
                    </div>
                </div>
            </div>
            <!-- row -->
            <div class="row">
      
                <div class="col-xl-12 col-xxl-12">
                    <div class="card">
                      
                        <div class="card-body">
                            <div id="smartwizard" class="form-wizard order-create">
                                <ul class="nav nav-wizard">
                                    <li><a class="nav-link" href="#wizard_Service"> 
                                        <span>1</span> 
                                    </a></li>
                                    <li><a class="nav-link" href="#wizard_Time">
                                        <span>2</span>
                                    </a></li>
                                    <!-- <li><a class="nav-link" href="#wizard_Details">
                                        <span>3</span>
                                    </a></li>
                                    <li><a class="nav-link" href="#wizard_Payment">
                                        <span>4</span>
                                    </a></li> -->
                                </ul>
                                <div class="tab-content" style="margin-top: 30px;">
                                    <div id="wizard_Service" class="tab-pane" role="tabpanel">
                                        <div class="row">
                                            <div class="col-lg-12 mb-3">
                                                <div class="form-group">
                                                    <p>Step 1: Navigate to walmart Seller Centrol</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mb-3">
                                                <div class="form-group">
                                                    <p>a) Login to Walmart Developer Portal</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mb-3">
                                                <div class="form-group">
                                                    <a href="{{ url('dashboard') }}" class="btn btn-primary shadow btn-xs">Go to Dashboard</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mb-3">
                                                <div class="form-group">
                                                    <p>b Get the Production keys (My API Key) in keys section</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mb-3">
                                                <div class="form-group">
                                                    <p>Step 2: Copy and Paste the Credentials</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mb-3">
                                                <div class="form-group">
                                                    <p>Copy and paste the Client ID and Client Secret from the Walmart developerr centerr to the corresponding fields:</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="wizard_Time" class="tab-pane" role="tabpanel">
                                        <div class="row">
                                        <div class="col-lg-12 mb-3">
                                                <div class="form-group">
                                                    <label class="text-label">WelCome StoreFront Name</label>
                                                    <input type="text" name="place" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mb-3">
                                                <div class="form-group">
                                                    <label class="text-label">Client ID</label>
                                                    <input type="text" name="place" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mb-3">
                                                <div class="form-group">
                                                    <label class="text-label">Slient Secret</label>
                                                    <input type="text" name="place" class="form-control" required>
                                                </div>
                                            </div>>
                                            <div class="col-lg-12 mb-3">
                                                <div class="form-group">
                                                    <button class="btn btn-primary shadow btn-lg">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div id="wizard_Details" class="tab-pane" role="tabpanel">
                                        <div class="row">
                                            <div class="col-sm-4 mb-2">
                                                <h4>Monday *</h4>
                                            </div>
                                            <div class="col-6 col-sm-4 mb-2">
                                                <div class="form-group">
                                                    <input class="form-control" value="9.00" type="number" name="input1" id="input1">
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-4 mb-2">
                                                <div class="form-group">
                                                    <input class="form-control" value="6.00" type="number" name="input2" id="input2">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 mb-2">
                                                <h4>Tuesday *</h4>
                                            </div>
                                            <div class="col-6 col-sm-4 mb-2">
                                                <div class="form-group">
                                                    <input class="form-control" value="9.00" type="number" name="input3" id="input3">
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-4 mb-2">
                                                <div class="form-group">
                                                    <input class="form-control" value="6.00" type="number" name="input4" id="input4">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 mb-2">
                                                <h4>Wednesday *</h4>
                                            </div>
                                            <div class="col-6 col-sm-4 mb-2">
                                                <div class="form-group">
                                                    <input class="form-control" value="9.00" type="number" name="input5" id="input5">
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-4 mb-2">
                                                <div class="form-group">
                                                    <input class="form-control" value="6.00" type="number" name="input6" id="input6">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 mb-2">
                                                <h4>Thrusday *</h4>
                                            </div>
                                            <div class="col-6 col-sm-4 mb-2">
                                                <div class="form-group">
                                                    <input class="form-control" value="9.00" type="number" name="input7" id="input7">
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-4 mb-2">
                                                <div class="form-group">
                                                    <input class="form-control" value="6.00" type="number" name="input8" id="input8">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 mb-2">
                                                <h4>Friday *</h4>
                                            </div>
                                            <div class="col-6 col-sm-4 mb-2">
                                                <div class="form-group">
                                                    <input class="form-control" value="9.00" type="number" name="input9" id="input9">
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-4 mb-2">
                                                <div class="form-group">
                                                    <input class="form-control" value="6.00" type="number" name="input10" id="input10">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="wizard_Payment" class="tab-pane" role="tabpanel">
                                        <div class="row emial-setup">
                                            <div class="col-lg-3 col-sm-6 col-6">
                                                <div class="form-group">
                                                    <label for="mailclient11" class="mailclinet mailclinet-gmail">
                                                        <input type="radio" name="emailclient" id="mailclient11">
                                                        <span class="mail-icon">
                                                            <i class="mdi mdi-google-plus" aria-hidden="true"></i>
                                                        </span>
                                                        <span class="mail-text">I'm using Gmail</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-6">
                                                <div class="form-group">
                                                    <label for="mailclient12" class="mailclinet mailclinet-office">
                                                        <input type="radio" name="emailclient" id="mailclient12">
                                                        <span class="mail-icon">
                                                            <i class="mdi mdi-office" aria-hidden="true"></i>
                                                        </span>
                                                        <span class="mail-text">I'm using Office</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-6">
                                                <div class="form-group">
                                                    <label for="mailclient13" class="mailclinet mailclinet-drive">
                                                        <input type="radio" name="emailclient" id="mailclient13">
                                                        <span class="mail-icon">
                                                            <i class="mdi mdi-google-drive" aria-hidden="true"></i>
                                                        </span>
                                                        <span class="mail-text">I'm using Drive</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-6">
                                                <div class="form-group">
                                                    <label for="mailclient14" class="mailclinet mailclinet-another">
                                                        <input type="radio" name="emailclient" id="mailclient14">
                                                        <span class="mail-icon">
                                                            <i class="fa fa-question-circle-o"
                                                                aria-hidden="true"></i>
                                                        </span>
                                                        <span class="mail-text">Another Service</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="skip-email text-center">
                                                    <p>Or if want skip this step entirely and setup it later</p>
                                                    <a href="javascript:void(0)">Skip step</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>

<style>
    .sw-theme-default {
    border: 1px solid white;
}
</style>
 <!-- Form Steps -->
    <script src="{{ asset('AppealLab/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('AppealLab/vendor/jquery-smartwizard/dist/js/jquery.smartWizard.js') }}"></script>
	
	<script>
		$(document).ready(function(){
			// SmartWizard initialize
			$('#smartwizard').smartWizard(); 
		});
	</script>
