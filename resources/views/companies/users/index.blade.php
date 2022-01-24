@extends('companies.master')
@section('pageTitle','User Management')

@section('content')

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
                <h4 class="card-title">All Assets Listing</h4>
				<h6 class="card-subtitle">Here you can manage Assets</h6>
                <div class="table-responsive m-t-40">
                    @if(Session::has('status'))
						<div class="alert alert-{{ Session::get('status') }}">
							<i class="ti-user"></i> {{ Session::get('message') }}
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
						</div>
					@endif
                	<table id="dataTable" class=" table table-striped table-bordered dataTable  ">
                        <thead>
                            <tr>
                                <!-- <th>First Name</th> -->
                                <th>License Plate Number</th>
                                <!--<th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Account Status</th>
                                <th>Created Date</th> -->
                                <th>Action</th>
                            </tr>
                        </thead>

						<tbody>
                        </tbody>
                    </table>
				</div>
			</div>
		</div>

	</div>
</div>

<!-- Modal Code -->
<div class="modal fade" id="permissionModal" tabindex="-1" role="dialog" aria-labelledby="permissionModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="permissionModalLabel1">Permission List</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ url('/company/user-management/accessRequest') }}" >
                {{ csrf_field() }}
                    <div class="form-group">
                        <div class="form-group">
                            <label>Please select Permission</label>
                                <div class="input-group">
                                <input type="hidden" name="requestUserId" value=""/>
                                    <ul class="icheck-list">
                                     @foreach($permissionPolicy as $policy)
                                        <li>
                                            <input type="checkbox" name="permission[]" value="{{$policy->id}}" class="check" id="minimal-checkbox-{{$policy->id}}">
                                            <label for="minimal-checkbox-{{$policy->id}}"> &nbsp; &nbsp; {{$policy->permissions_name}}</label>
                                        </li>
                                    @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" name="" class="btn btn-primary">Send message</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->
@stop

@section('pagejs')
<script type="text/javascript">
$(function() {
    $('#dataTable').DataTable({
        processing : true,
        serverSide: true,
        lengthMenu: [10,20,50,100],
        order: [[1,'desc']],
        ajax: '{!! url("/company/user-management/user-data") !!}',
        columns: [

			//{ data: 'firstName',		name: 'firstName', orderable: true },
            //{ data: 'driver_license_id',		name: 'driver_license_id', orderable: true },
            { data: 'reg_number',		name: 'reg_number', orderable: true },
            // { data: 'name',		name: 'name', orderable: true },
			// { data: 'email',	name: 'email', orderable: true },
            // { data: 'phone',	name: 'phone',	orderable: true, "visible":true },
            // { data: 'created_at',	name: 'created_at',	orderable: true, "visible":true },
            { data: 'action', name: 'action', orderable: false,  },
        ],
        dom: 'Blfrptip',
        buttons: [
                {
                     extend: 'colvis',text: "Show / Hide Columns"
                }
        ],
        oLanguage: {
                sProcessing: "<img height='80' width='80' src='{{ url('public/assets/admin/images/loading.gif') }}' alt='loader'/>",
				"oPaginate": {
					"sPrevious": "Previous", // This is the link to the previous page
					"sNext": "Next",
				},
				"sSearch": "Search",
				"sLengthMenu": "Show _MENU_ entries",
				"sInfo": "Showing _START_ to _END_ of _TOTAL_ enteris",
				"sInfoEmpty" : "Showing 0 to 0 of 0 entries",
				 "sInfoFiltered": "search filtered entries",
				"sZeroRecords": "No matching records found",
				"sEmptyTable": "No data available in table",
        },
        initComplete: function () {
            this.api().columns().every(function () {
                var column = this;
                var input = document.createElement("input");
                $(input).appendTo($(column.footer()).empty())
                .on('change', function () {
                    column.search($(this).val(), false, false, true).draw();
                });
            });
        }
	});

});

$(document).on("click", ".request_access", function(){
    var id = $(this).attr("data-id");
    $("input[name=requestUserId]").val(id);
});

$(document).on('click','.delete',function(){
    var id = $(this).data('id');

    swal({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'No, cancel!',
          confirmButtonClass: 'btn btn-success',
          cancelButtonClass: 'btn btn-danger',
          buttonsStyling: false
          }).then(function (isConfirm) {
              if (isConfirm.value === true) {
                  $('#dataTable_processing').show();
                  $.ajax({
                      url:'{{ url("/company/user-management/delete") }}'+'/'+id,
                      type: 'GET',
                      success:function(){
                          $('#dataTable_processing').hide();
                          swal(
                              'Deleted!',
                              'Your agent has been deleted successfully.',
                              'success'
                              ).then(function(){
                                  window.location.href = '{{ url("/company/user-management") }}';
                            });
                    }
                });
            }
        })
});
</script>
@stop
