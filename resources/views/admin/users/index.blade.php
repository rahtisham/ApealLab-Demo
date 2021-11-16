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
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display min-w850">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>LastName</th>
                                        <th>email</th>
                                        <th>Business Name</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach($userListing as $userGetData)
                                    <tr>
                                        <td>{{ $userGetData->name }}</td>
                                        <td>{{ $userGetData->l_name }}</td>
                                        <td>{{ $userGetData->email }}</td>
                                        <td>{{ $userGetData->businessName }}</td>
                                        <td>{{ $userGetData->category }}</td>
                                        <td><span class="badge light badge-success">{{ $userGetData->status }}</span></td>
                                        <td>
                                            <div class="dropdown ml-auto text-right">
                                                <div class="btn-link" data-toggle="dropdown">
                                                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                    </div>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="{{ url('admin/user/edit' , ['id' => $userGetData->id ]) }}">Edit</a>
                                                        <a class="dropdown-item" href="#">
                                                            <form action="" method="post">
                                                            <button class="delete" type="button" value="{{ $userGetData->id }}">Delete</button>
                                                        </a>
                                                        <a class="dropdown-item" href="{{ url('admin/user/profile') }}">View</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>LastName</th>
                                        <th>Email</th>
                                        <th>Business Name</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
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
    jQuery(document).ready(function(){
     jQuery('button').click(function(){

        var del = $(this).val();
        if(confirm('Are you sure you wont to delete this user'))
        {
            jQuery.ajax({
            url:"admin/user/destroy",
            type:'post',
            data: {
                "_token": _token,
                "del": del
                },
            success:function(result) {
                //console.log(data);
                jQuery('#subject').html(result);
            }
        });
        /**Ajax code ends**/
        }
        else
        {
            alert('not working');
        }
      
 });
});
</script>
