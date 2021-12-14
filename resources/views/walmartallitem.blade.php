<x-app-layout>
<div class="container" style="margin-top: 100px;">
        <div class="page-titles mr-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Wizard</a></li>
            </ol>
        </div>
        <div class="row card p-6">
            <form id="resetForm" method="post" action="{{ url('dashboard/check') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-12 mb-3">
                        <div class="form-group">
                            <label class="text-label">WelCome StoreFront Name</label>
                            <input type="text" name="clientName" id="clientName" class="form-control">
                            <span style="color: red;" class="testing" id="name"></span>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <div class="form-group">
                            <label class="text-label">Client ID</label>
                            <input type="text" name="clientID" id="clientID" class="form-control">
                            <span style="color: red;" id="id"></span>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <div class="form-group">
                            <label class="text-label">Client Secret</label>
                            <input type="text" name="clientSecretID" id="clientSecretID" class="form-control">
                            <span style="color: red;" id="secret"></span>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary shadow btn-lg btn-submit">Connect</button>
                        </div>
                    </div>
                </div>
            </form>
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
