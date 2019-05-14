@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged as

                   
                </div>
            </div>
        </div>
    </div>
       
     <br />
     <h3 align="center">Laravel 5.8 Ajax Crud Tutorial - Delete or Remove Data</h3>
     <br />
     <div align="right">
      <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Create Record</button>
     </div>
     <br />
   <div class="table-responsive">
    <table class="table table-bordered table-striped" id="user_table">
           <thead>
            <tr>
                <th width="10%">Image</th>
                <th width="35%">First Name</th>
                <th width="35%">Last Name</th>
                <th width="30%">Action</th>
            </tr>
           </thead>
       </table>
   </div>
   <br />
   <br />
  </div>


<div id="formModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Record</h4>
        </div>
        <div class="modal-body">
         <span id="form_result"></span>
         <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label class="control-label col-md-4" >First Name : </label>
            <div class="col-md-8">
             <input type="text" name="first_name" id="first_name" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-4">Last Name : </label>
            <div class="col-md-8">
             <input type="text" name="last_name" id="last_name" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-4">Select Profile Image : </label>
            <div class="col-md-8">
             <input type="file" name="image" id="image" />
             <span id="store_image"></span>
            </div>
           </div>
           <br />
           <div class="form-group" align="center">
            <input type="hidden" name="action" id="action" />
            <input type="hidden" name="hidden_id" id="hidden_id" />
            <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
           </div>
         </form>
        </div>
     </div>
    </div>
</div>

<div id="confirmModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Confirmation</h2>
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
            </div>
            <div class="modal-footer">
             <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>


</div>
<script>
   

   $('#user_table').DataTable({
   processing: true,
   serverSide: true,
   ajax:{
   url: "{{ route('home.index') }}",
   },
   columns:[
   {
       data: 'image',
       name: 'image',
       render: function(data, type, full, meta){
       return "<img src={{ URL::to('/') }}/images/" + data + " width='70' class='img-thumbnail' />";
       },
       orderable: false
   },
   {
       data: 'first_name',
       name: 'first_name'
   },
   {
       data: 'last_name',
       name: 'last_name'
   },
   {
       data: 'action',
       name: 'action',
       orderable: false
   }
   ]
   });

   jQuery('#create_record').click(function(){
   jQuery('.modal-title').text("Add New Record");
       jQuery('#action_button').val("Add");
       jQuery('#action').val("Add");
       jQuery('#formModal').modal('show');
   });

   jQuery('#sample_form').on('submit', function(event){
   event.preventDefault();
   if(jQuery('#action').val() == 'Add')
   {
   jQuery.ajax({
       url:"{{ route('home.store') }}",
       method:"POST",
       data:  new FormData(this),
       contentType: false,
       cache:false,
       processData: false,
       dataType:"json",
       success:function(data)
       {
       var html = '';
       if(data.errors)
       {
       html = '<div class="alert alert-danger">';
       for(var count = 0; count < data.errors.length; count++)
       {
       html += '<p>' + data.errors[count] + '</p>';
       }
       html += '</div>';
       }
       if(data.success)
       {
       html = '<div class="alert alert-success">' + data.success + '</div>';
       jQuery('#sample_form')[0].reset();
       jQuery('#user_table').DataTable().ajax.reload();
       }
       jQuery('#form_result').html(html);
       }
   })
   }

   if(jQuery('#action').val() == "Edit")
   {
   jQuery.ajax({
       url:"{{ route('home.update') }}",
       method:"POST",
       data:new FormData(this),
       contentType: false,
       cache: false,
       processData: false,
       dataType:"json",
       success:function(data)
       {
       var html = '';
       if(data.errors)
       {
       html = '<div class="alert alert-danger">';
       for(var count = 0; count < data.errors.length; count++)
       {
       html += '<p>' + data.errors[count] + '</p>';
       }
       html += '</div>';
       }
       if(data.success)
       {
       html = '<div class="alert alert-success">' + data.success + '</div>';
       jQuery('#sample_form')[0].reset();
       jQuery('#store_image').html('');
       jQuery('#user_table').DataTable().ajax.reload();
       }
       jQuery('#form_result').html(html);
       }
   });
   }
   });

   jQuery(document).on('click', '.edit', function(){
   var id = jQuery(this).attr('id');
   jQuery('#form_result').html('');
   jQuery.ajax({
   url:"/home/"+id+"/edit",
   dataType:"json",
   success:function(html){
       jQuery('#first_name').val(html.data.first_name);
       jQuery('#last_name').val(html.data.last_name);
       jQuery('#store_image').html("<img src={{ URL::to('/') }}/images/" + html.data.image + " width='70' class='img-thumbnail' />");
       jQuery('#store_image').append("<input type='hidden' name='hidden_image' value='"+html.data.image+"' />");
       jQuery('#hidden_id').val(html.data.id);
       jQuery('.modal-title').text("Edit New Record");
       jQuery('#action_button').val("Edit");
       jQuery('#action').val("Edit");
       jQuery('#formModal').modal('show');
   }
   })
   });

   var user_id;

   jQuery(document).on('click', '.delete', function(){
   user_id = jQuery(this).attr('id');
   jQuery('#confirmModal').modal('show');
   });

   jQuery('#ok_button').click(function(){
   jQuery.ajax({
   url:"home/destroy/"+user_id,
   beforeSend:function(){
       jQuery('#ok_button').text('Deleting...');
   },
   success:function(data)
   {
       setTimeout(function(){
       jQuery('#confirmModal').modal('hide');
       jQuery('#user_table').DataTable().ajax.reload();
       }, 2000);
   }
   })
   });



</script>
@endsection
