<x-app-layout>
    <div class="container" style="margin-top: 121px;">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Integration</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Walmart & Amazone</a></li>
            </ol>
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-xl-4 col-lg-6">
                <div class="card">
                    <div class="card-header pb-0 border-0">
								<span class="p-3 mr-3 rounded bg-secondary text-white">
                                    {{ $CountActive }}
								</span>
                        <div class="mr-auto pr-3">
                            <h4 class="text-black fs-20">ACTIVE</h4>
                            <p class="fs-13 mb-0 text-black">Total Products Active</p>
                        </div>
                    </div>
                    <div class="card-body pb-0">
                        <div id="chartBar"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6">
                <div class="card">
                    <div class="card-header pb-0 border-0">
								<span class="p-3 mr-3 rounded bg-danger text-white">
                                    {{ $CountPublished }}
								</span>
                        <div class="mr-auto pr-3">
                            <h4 class="text-black fs-20">PUBLISHED</h4>
                            <p class="fs-13 mb-0 text-black">Total Products Published</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-header pb-0 border-0">
								<span class="p-3 mr-3 rounded bg-warning text-white">
                                    {{ $CountUnpublished }}
								</span>
                        <div class="mr-auto pr-3">
                            <h4 class="text-black fs-20">UNPUBLISHED</h4>
                            <p class="fs-13 mb-0 text-black">Total Products Unpublished</p>
                        </div>
                    </div>
                    <div class="card-body pb-0">
                        <div id="chartBar3"></div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-xl-8 col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ $integrations->platform  }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form class="form-valide-with-icon" action="#" method="post">
                                        <div class="form-group">
                                            <label class="text-label">Name</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                                </div>
                                                <input type="text" disabled class="form-control" value="{{ $integrations->name  }}" id="name" name="val-username" placeholder="Enter a username..">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-label">Client ID</label>
                                            <div class="input-group transparent-append">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                                </div>
                                                <input type="text" disabled class="form-control" id="clientID" value="{{ $integrations->client_id  }}" name="val-password" placeholder="Choose a safe one..">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-label">Client Secret</label>
                                            <div class="input-group transparent-append">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                                </div>
                                                <input type="text" disabled class="form-control" id="clientSecret" value="{{ $integrations->client_secret  }}" name="val-password" placeholder="Choose a safe one..">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="card">
                            @if($integrations->platform == "Walmart")
                            <div class="card-header bg-blue-light">
                                <span class="text-white"><i class="fa fa-wikipedia-w" aria-hidden="true"></i> {{ $integrations->platform  }}</span>
                            </div>
                            <div class="card-body justify-content-center align-items-center flex border-info">
                                <img class="" src="{{ asset('AppealLab/images/walmartLogo.png') }}" alt="">
                            </div>
                            @elseif($integrations->platform == "Amazone")
                                <div class="card-header bg-blue-light">
                                    <span class="text-white"><i class="fa fa-amazon" aria-hidden="true"></i> {{ $integrations->platform  }}</span>
                                </div>
                                <div class="card-body justify-content-center align-items-center flex border-info">
                                    <img class="" src="{{ asset('AppealLab/images/amazon-logo.png') }}" alt="">
                                </div>
                            @else
                                    {{ data_not_found  }}
                            @endif
                            <div class="card-header align-content-center">
                               <a onclick="return confirm('Are you sure You wont to delete?')" href="{{ url('dashboard/integration-listening-destroy' , ['id' => $integrations->id]) }}" class="btn btn-primary">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<!-- Chart Morris plugin files -->
<script src="{{ asset('AppealLab/vendor/morris/raphael-min.js') }}"></script>
<script src="{{ asset('AppealLab/vendor/morris/morris.min.js') }}"></script>
<script src="{{ asset('AppealLab/js/plugins-init/morris-init.js') }}"></script>

<script>
    $(document).read(function(){
        document.getElementById("clientSecret").disabled = true;
    })
</script>
