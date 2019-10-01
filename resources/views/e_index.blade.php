<html>
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel 5.8 - DataTables Server Side Processing using Ajax</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 </head>
 <body>
  <div class="container">    
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
                <th width="10%">First name</th>
                <th width="15%">last Name</th>
                <th width="15%">net</th>
                <th width="10%">brutto</th>
                <th width="10%">brutto salary</th>
                <th width="40%">Image</th>
            </tr>
           </thead>
       </table>
   </div>
   <br />
   <br />
  </div>
 </body>
</html>

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
            <label class="control-label col-md-4">Net Salary: </label>
            <div class="col-md-8">
             <input type="text" name="net" id="net" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-4">Brutto Salary: </label>
            <div class="col-md-8">
             <input type="text" name="brutto" id="brutto" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-4">Brutto yearly Salary: </label>
            <div class="col-md-8">
             <input type="text" name="yearlybrut" id="yearlybrut" class="form-control" />
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

<div id="formModal1" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Record</h4>
        </div>
        <div class="modal-body">
         <span id="form_result1"></span>
         <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
          
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
            <label class="control-label col-md-4">Net Salary: </label>
            <div class="col-md-8">
             <input type="text" name="net" id="net" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-4">Brutto Salary: </label>
            <div class="col-md-8">
             <input type="text" name="brutto" id="brutto" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-4"> Yearly Brutto Salary: </label>
            <div class="col-md-8">
             <input type="text" name="yearlybrut" id="yearlybrut" class="form-control" />
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




<div class="container">
  

 <div id="calc">
    <h1> Company settings <h2>
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">Vacation days</span>
      <input type="number" class="form-control" aria-describedby="basic-addon1"  id="vacation_days">
   </div>
   <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">Working days per year</span>
      <input type="number" class="form-control" aria-describedby="basic-addon1"  id="working_days">
   </div>
   <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">Average ilness days per year</span>
      <input type="number" class="form-control" aria-describedby="basic-addon1"  id="sick_days">
   </div>
   <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">Effective working days per year</span>
      <input type="number" class="form-control" aria-describedby="basic-addon1"  id="effective_working_days">
   </div>
   <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">Billability</span>
      <input type="number" class="form-control" aria-describedby="basic-addon1"  id="billability">
   </div>
   <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">Billability per year</span>
      <input type="number" class="form-control" aria-describedby="basic-addon1"  id="billability_per_year">
   </div>
   
    <h1> Employee cost Calculator </h1> 
   <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">Net Salary</span>
      <input type="number" class="form-control" aria-describedby="basic-addon1"  id="net">
   </div>
   <div class="input-group">
      <span class="input-group-addon" id="basic-addon1" >Brutto Salary</span>
      <input type="number" class="form-control"  aria-describedby="basic-addon1" id="brutto">
    </div>
    

    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1" >Yearly Brutto Salary</span>
      <input type="number" class="form-control"  aria-describedby="basic-addon1" id="yearlybrut">
    </div>
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1" >Yearly Net Salary</span>
      <input type="number" class="form-control"  aria-describedby="basic-addon1" id="yearlynet">
    </div>
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1" >Social cost monthyl</span>
      <input type="number" class="form-control"  aria-describedby="basic-addon1" id="socialcostmonth">
    </div>
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1" >Social cost yearly</span>
      <input type="number" class="form-control"  aria-describedby="basic-addon1" id="socialcostyear">
    </div>
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1" >Other costs</span>
      <input type="number" class="form-control"  aria-describedby="basic-addon1" id="othercosts">
    </div>
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1" >Company cost per year</span>
      <input type="number" class="form-control"  aria-describedby="basic-addon1" id="companycostperyear">
    </div>
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1" >Company cost per month</span>
      <input type="number" class="form-control"  aria-describedby="basic-addon1" id="companycostpermonth">
    </div>
    
   



    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1" >Effective cost per day</span>
      <input type="number" class="form-control"  aria-describedby="basic-addon1" id="effective_per_day">
    </div>
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1" >Effective cost per hour</span>
      <input type="number" class="form-control"  aria-describedby="basic-addon1" id="effective_per_hour">
    </div>
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1" >Effective cost per month</span>
      <input type="number" class="form-control"  aria-describedby="basic-addon1" id="effective_per_month">
    </div>
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1" >Effective cost per year</span>
      <input type="number" class="form-control"  aria-describedby="basic-addon1" id="effective_per_year">
    </div>


    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1" >Min Price per hour </span>
      <input type="number" class="form-control"  aria-describedby="basic-addon1" id="min_per_hour">
    </div>
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1" >Min Price per day </span>
      <input type="number" class="form-control"  aria-describedby="basic-addon1" id="min_per_day">
    </div>
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1" >Min Price per month </span>
      <input type="number" class="form-control"  aria-describedby="basic-addon1" id="min_per_month">
    </div>
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1" >Min Price per year </span>
      <input type="number" class="form-control"  aria-describedby="basic-addon1" id="min_per_year">
    </div>
    

  
<div id="submit"> <button type="submit" class="btn btn-primary" onClick="getSalary()">Submit</button></div>
<div id="income">
  
 <div> 
    <p id="yearlybrut" onChange="updatePrice()"> 3.	Yearly Brut Salary : 
    <p id="yearlynet"> 4.	Yearly Net Salary : </p>
    <p id="socialcostmonth"> 5.	Social Cost per month: </p> 
    <p id="socialcostyear"> 6.	Social Cost per Year :  </p>
    <p id="othercosts"> 8.	Company Other Costs  : </p>
    <p id="companycostperyear"> 9.	Company cost per Year : </p>
    <p id="companycostpermonth"> 10.	Company Cost per Month : </p>
   
</div>  
</div>
</div>
</div>



<script>
$(document).ready(function(){

 $('#user_table').DataTable({
  processing: true,
  serverSide: true,
  ajax:{
   url: "{{ route('e_index.index') }}",
  },
  columns:[
   {
    data: 'first_name',
    name: 'first_name'
   },
   {
    data: 'last_name',
    name: 'last_name'
   },
   {
    data: 'net',
    name: 'net'
   },
   {
    data: 'brutto',
    name: 'brutto'
   },
   {
    data: 'yearlybrut',
    name: 'yearlybrut'
   },
   {
    data: 'image',
    name: 'image',
    render: function(data, type, full, meta){
     return "<img src={{ URL::to('/') }}/images/" + data + " width='70' class='img-thumbnail' />";
    },
    orderable: false
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
    url:"{{ route('e_index.store') }}",
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

  
 });

 


 
 

 



 

});

/*
function getSalary(net,brutto ) {
   // Salary Calculator 
   var tmp;
   var return_first = function () {
   
   $.ajax({
        'type': "GET",
        'url': "/ajax-crud/",
        
        data: {
            data: {
                id:"1"
            }
        },
        'success': function (data) {
            tmp = $('#net_salary').val(data.data.net_salary);
        }
        
    });
        return tmp;
       
    }();
    console.log(return_first);
   nsalary=document.getElementById("net").value;
   bsalary=document.getElementById("brutto").value;
  

        var yearlybrut = bsalary*12; 
        var yearlynet = nsalary*12;
        var socialcostmonth = (bsalary-nsalary);
        var socialcostyear = socialcostmonth*12;
        var othercosts;
        var companycostperyear = yearlybrut+ othercosts;
        var companycostpermonth = companycostperyear/12;
        
        document.getElementById("yearlybrut").innerHTML="Yearly Brut Salary : " + yearlybrut.toFixed() + " €";
        document.getElementById("yearlynet").innerHTML="Yearly Net Salary : " + yearlynet.toFixed() + " €";
        document.getElementById("socialcostmonth").innerHTML="Social Cost per month  " + socialcostmonth.toFixed() + " €"; 
        document.getElementById("socialcostyear").innerHTML="Social Cost per year  " + socialcostyear.toFixed() + " €"; 
        document.getElementById("othercosts").innerHTML="Other Costs  " + othercosts.toFixed() + " €"; 
        document.getElementById("companycostperyear").innerHTML="Company Cost per year  " + companycostperyear.toFixed() + " €"; 
        document.getElementById("companycostpermonth").innerHTML="Social Cost per month  " + companycostpermonth.toFixed() + " €"; 


  
  return neto;

}*/
$(document).ready(function(){
    $('#sick_days').keyup(function(){
        $('#effective_working_days').val($('#working_days').val() - $('#vacation_days').val() - $('#sick_days').val());
    });  
    $('#billability').keyup(function(){
        $('#billability_per_year').val($('#effective_working_days').val() * ($('#billability').val()/100));
    });   
    $('#brutto').keyup(function(){
        $('#yearlybrut').val($('#brutto').val() * 12);
    });
    $('#net').keyup(function(){
        $('#yearlynet').val($('#net').val() * 12);
    });
    $('#brutto').keyup(function(){
        $('#socialcostmonth').val($('#brutto').val() - $('#net').val());
    });
    $('#billability').keyup(function(){
        $('#socialcostyear').val(($('#brutto').val() - ($('#net').val()))*12);
    });
    $('#billability').keyup(function(){
        $('#othercosts').val($('#effective_working_days').val() * ($('#billability').val()/100));
    });
    $('#billability').keyup(function(){
        $('#billability_per_year').val($('#effective_working_days').val() * ($('#billability').val()/100));
    });
    $('#billability').keyup(function(){
        $('#billability_per_year').val($('#effective_working_days').val() * ($('#billability').val()/100));
    });
});

 /*
     tax = salary *  x ;
     taxPersce = (tax / salary) * 100;

   document.getElementById("TAX").innerHTML="TAX: " + taxPersce.toFixed() + " %"; 
   document.getElementById("deduction").innerHTML="Tax Deduction: " + tax.toFixed() + "  ₪";
  
   var neto = salary - tax;
  
  document.getElementById("neto").innerHTML="Your Neto Salary: " + neto.toFixed() + " ₪"; 
   */
    
</script>
