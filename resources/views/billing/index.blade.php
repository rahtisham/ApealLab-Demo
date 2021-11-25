<link href="{{ asset('AppealLab/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
  <x-app-layout>
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Datatable</a></li>
            </ol>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Basic Datatable</h4>
                        @if(\Session::has('success'))
                        <div class="alert alert-primary alert-dismissible fade show">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line></svg>
                            <strong>Welcome!</strong> {{ \Session::get('success') }}
                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                            </button>
                        </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th>Card</th> 
                                        <th>Card Number</th>  
                                        <th>Default</th>                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                             
                                @if($default != $paymentMethods)
                                    <tr>
                                        <td> <span class="UppCase">{{$default->card->brand}}</span></td>
                                        <td>**** **** **** <span class="text-danger">{{ $default->card->last4 }}</span></td>

                                        <td><button class="badge badge-primary">Default</button></td>
                                        <td>
                                        <a href="{{ url('user/billing/destroy' , ['id' => $default->id]) }}"><button><i class="fa fa-trash bg-readdir" aria-hidden="true"></i></button></a>
                                            <button><i class="fa fa-eye" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                @foreach($paymentMethods as $paymentMethod)
                                    <tr>
                                        <td><span class="UppCase">{{$paymentMethod->card->brand}}</span></td>
                                        <td>**** **** **** <span class="text-primary">{{ $paymentMethod->card->last4 }}</span></td>

                                        <td><button class="btn-xxs">-----</button></td>
                                        <td>
                                            <a href="{{ url('user/billing/destroy' , ['id' => $paymentMethod->id]) }}"><button><i class="fa fa-trash bg-readdir" aria-hidden="true"></i></button></a>
                                            <button><i class="fa fa-eye" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                                @endif
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </x-app-layout>
<style> .UppCase{text-transform: capitalize;} </style>
<!-- Datatable -->
<script src="{{ asset('AppealLab/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('AppealLab/js/plugins-init/datatables.init.js') }}"></script>
