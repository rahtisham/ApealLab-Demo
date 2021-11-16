<x-app-layout>
    <div class="container-fluid">
        <!-- <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Form</a></li>
            </ol>
        </div> -->
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Select List</h4>
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
                        <div class="basic-form">
                            <form  action="{{ url('admin/user/update' , ['id' => $userEdit->id ]) }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="fname" value="{{ $userEdit->name }}" class="form-control input-default " placeholder="First Name...">
                                    @error('fname')
                                      <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" name="lname" value="{{ $userEdit->l_name }}" class="form-control input-default " placeholder="Last Name...">
                                    @error('lname')
                                      <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" value="{{ $userEdit->email }}" class="form-control input-default " placeholder="Email...">
                                    @error('email')
                                      <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" name="business" value="{{ $userEdit->businessName }}" class="form-control input-default " placeholder="Business Name...">
                                    @error('business')
                                      <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" name="status" value="{{ $userEdit->status }}" class="form-control input-default " placeholder="Business Name...">
                                    @error('status')
                                      <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <select name="role" class="form-control default-select" id="sel1">
                                        <option value="{{ $userEdit->role_id }}">{{ $userEdit->role_id }}</option>
                                        <option value="1">Admin</option>
                                        <option value="2">User</option>
                                    </select>
                                    @error('role')
                                      <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn mr-2 btn-primary">Update User</button>
                            </form>
                        </div>
                    </div>
                </div>
		    </div>
        </div>
    </div>
</x-app-layout>