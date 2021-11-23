<link href="{{ asset('AppealLab/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
  <x-app-layout>
    <div class="container-fluid">
        <div class="page-titles justify-content-between">
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
                        

                          <!-- Large modal -->
                        <button type="button" class="btn btn-primary btn-rounded mb-2" data-toggle="modal" data-target=".bd-example-modal-lg">Large modals</button>
                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Modal title</h5>
                                        <!-- <p id="test"></p> -->
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="alert alert-primary alert-dismissible fade show">
                                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line></svg>
                                            <strong id="test">!</strong>
                                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                            </button>
                                        </div>
                                       <form id="cform">
                                            <input type="hidden" id="token" value="{{ csrf_token() }}">
                                            
                                            <div class="form-group">
                                                <input type="text" name="name" id="name" class="form-control input-default " placeholder="Plan">
                                                @error('plan')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input type="email" name="cost" id="cost" class="form-control input-default " placeholder="Cost">
                                                @error('cost')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="description" id="description" class="form-control input-default " placeholder="Description">
                                                @error('description')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn mr-2 btn-primary btn-lg btn-block btn-createPlan">Create Plan</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                    </div>
                                </div>
                            </div>
                        </div>
            
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
                            <table id="example" class="display min-w850">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Stripe Plan</th>
                                        <th>Cost</th>
                                        <th>Discription Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($plans as $CreatePlan)
                                        <tr>
                                            <td>{{ $CreatePlan->id }}</td>
                                            <td>{{ $CreatePlan->name }}</td>
                                            <td>{{ $CreatePlan->cost }}</td>
                                            <td>{{ $CreatePlan->stripe_plan }}</td>
                                            <td>{{ $CreatePlan->description }}</td>
                                            <td>
                                                <div class="dropdown ml-auto text-right">
                                                    <div class="btn-link" data-toggle="dropdown">
                                                        <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="#">Edit</a>
                                                            <a class="dropdown-item" href="#">Delete</a>
                                                            <a class="dropdown-item" href="#">View</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </x-app-layout>

<!-- Datatable -->
<script src="{{ asset('AppealLab/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('AppealLab/js/plugins-init/datatables.init.js') }}"></script>

<script>
 $(document).ready(function(){
    $('.btn-createPlan').click(function(e){
        e.preventDefault();


        var _token = $('#token').val();
        var name = $('#name').val();
        var cost = $('#cost').val();
        var description = $('#description').val();

        // ajax start
        $.ajax({
            url: "plan/store",
            type: "post",
            data:{
                "_token": _token,
                "name": name,
                "cost": cost,
                "description": description
            },
            success:function(response){

             if(response.success){
                  alert(response.message) //Message come from controller
                  document.getElementById("cform").reset();
              }else{
                  document.getElementById("cform").reset();
                  $('#test').html(response.message); //Message come from controller
              }
            },
            error:function(error){

                alert('Pleas! fill these fields');
                // $('#classSelect').html(error);
             }
        });
        /**  End of ajax code **/    



    });

});
</script>
