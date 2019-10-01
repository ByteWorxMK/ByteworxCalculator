@extends('layouts.app')

@section('content')

<div class="container">    
<br />
     <h3 align="center">Company Data</h3>
     <br />
    <div align="right">
      <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Create Record</button>
    </div>
    <br />
    <div class="table-responsive">
        <table class="table table-bordered table-striped" id="user_table">
           <thead>
            <tr>
                <th width="15%">Company name</th>
                <th width="10%">Vacation days </th>
                <th width="10%">Sick days</th>
                <th width="10%">Working days</th>
                <th width="10%">Billability</th>
                <th width="10%">Billability per year</th>
                <th width="20%">Effective working days per year</th>
                <th width="10%">Expected profit </th>
                <th width="15%">Action</th>
            </tr>
           </thead>
        </table>
   </div>

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
          <label class="control-label col-md-4" >Company Name : </label>
          <div class="col-md-8">
          <input type="text" name="company_name" id="company_name" class="form-control" />
        </div>
        </div>
          <div class="form-group">
            <label class="control-label col-md-4" >Vacation days: </label>
            <div class="col-md-8">
             <input type="text" name="vacation_days" id="vacation_days" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-4">Sick days: </label>
            <div class="col-md-8">
             <input type="text" name="sick_days" id="sick_days" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-4">Working days: </label>
            <div class="col-md-8">
             <input type="text" name="working_days" id="working_days" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-4">Billability: </label>
            <div class="col-md-8">
             <input type="text" name="billability" id="billability" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-4">Billability per year: </label>
            <div class="col-md-8">
             <input type="text" name="billability_year" id="billability_year" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-4">Effective work days: </label>
            <div class="col-md-8">
             <input type="text" name="effective_days" id="effective_days" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-4">Expected profit:  </label>
            <div class="col-md-8">
             <input type="text" name="expected_profit" id="expected_profit" class="form-control" />
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


<script>

$(document).ready(function(){

var number_employees;
$.ajax({
  type: 'GET',
  url: "{{ route('employee.index') }}",
  dataType: "json",

  cache: false
})
  .done(function( data ) {
    console.log( data.data.length );
    number_employees=data.data.length;
  });

$('#user_table').DataTable({
 processing: true,
 serverSide: true,
 ajax:{
  url: "{{ route('company_index.index') }}",
 },
 columns:[
  {
   data: 'company_name',
   name: 'company_name'
  },
  {
   data: 'vacation_days',
   name: 'vacation_days'
  },
  {
   data: 'sick_days',
   name: 'sick_days'
  },
  {
   data: 'working_days',
   name: 'working_days'
  },
  {
   data: 'billability',
   name: 'billability'
  },
  {
   data: 'billability_year',
   name: 'billability_year'
  },
  {
   data: 'effective_days',
   name: 'effective_days'
  },
  {
   data: 'expected_profit',
   name: 'expected_profit'
  },
  {
   data: 'action',
   name: 'action'
  }
 ]
});

$('#create_record').click(function(){
 $('.modal-title').text("Add New Record");
    $('#action_button').val("Add");
    $('#action').val("Add");
    $('#formModal').modal('show');
});

$('#sample_form').on('submit', function(event){
 event.preventDefault();
 if($('#action').val() == 'Add')
 {
  $.ajax({
   url:"{{ route('company_index.store') }}",
   method:"POST",
   data: new FormData(this),
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
     $('#sample_form')[0].reset();
     $('#user_table').DataTable().ajax.reload();
    }
    $('#form_result').html(html);
   }
  })
 }

 if($('#action').val() == "Edit")
 {
  $.ajax({
   url:"{{ route('company_index.update') }}",
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
     $('#sample_form')[0].reset();
     $('#store_image').html('');
     $('#user_table').DataTable().ajax.reload();
    }
    $('#form_result').html(html);
   }
  });
 }
 
});

$(document).on('click', '.edit', function(){
 var id = $(this).attr('id');
 $('#form_result').html('');
 $.ajax({
  url:"/company_index/"+id+"/edit",
  dataType:"json",
  success:function(html){
   $('#company_name').val(html.data.company_name);
   $('#vacation_days').val(html.data.vacation_days);
   $('#sick_days').val(html.data.sick_days);
   $('#working_days').val(html.data.working_days);
   $('#billability').val(html.data.billability);
   $('#billability_year').val(html.data.billability_year);
   $('#effective_days').val(html.data.effective_days);
   $('#expected_profit').val(html.data.expected_profit);
   $('#hidden_id').val(html.data.id);
   $('.modal-title').text("Edit New Record");
   $('#action_button').val("Edit");
   $('#action').val("Edit");
   $('#formModal').modal('show');
  }
 })
});

});





  $(document).ready(function(){
 
 $('#working_days').keyup(function(){
     $('#effective_days').val($('#working_days').val() - $('#vacation_days').val() - $('#sick_days').val());
 });  
 $('#billability').keyup(function(){
     $('#billability_year').val($('#effective_days').val() * ($('#billability').val()/100));
 });   

 $('#billability').keyup(function(){
     $('#administrative_costs').val(number_employees * 100);     
 }); 
});

</script>

@endsection