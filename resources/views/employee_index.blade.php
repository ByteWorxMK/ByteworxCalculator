@extends('layouts.app')

@section('content')

  

  <div class="container">    
     <br />
     <h3 align="center">Employee Data</h3>
     <br />
     <div align="right">
      <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Create Record</button>
     </div>
     <br />
   <div class="table-responsive">
    <table class="table table-bordered table-striped" id="user_table">
           <thead>
            <tr>
                <th width="30%">Image</th>
                <th width="10%">Position</th>
                <th width="10%">Role</th>
                <th width="10%">First name</th>
                <th width="15%">Last Name</th>
                <th width="15%">Net</th>
                <th width="10%">Brutto</th>
                <th width="5%">Yearly net salary</th>
                <th width="5%">Yearly brutto salary</th>
                <th width="5%">Social cost month</th>
                <th width="5%">Social cost myear</th>
                <th width="5%">Administrative</th>
                <th width="5%">Expenses</th>
                <th width="5%">Hardware</th>
                <th width="5%">other costs</th>
                <th width="5%">Company cost per year</th>
                <th width="5%">Company cost per month</th>
                <th width="10%">Effective cost per hour</th>
                <th width="10%">Effective cost per day</th>
                <th width="10%">Effective cost per month</th>
                <th width="10%">Effective cost per year</th>
                <th width="10%">Min price per hour</th>
                <th width="10%">Min price per day</th>
                <th width="10%">Min price per month</th>
                <th width="10%">Min price per year</th>
                <th width="10%">Action</th>
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
          <label class="control-label col-md-8" >Position : </label>
          <div class="col-md-8">
          <input type="radio" name="position" value="operative" checked> Operative<br>
          <input type="radio" name="position" value="administrative"> Administrative<br>
        </div>
        </div>
        <div class="form-group">
          <label> Choose role: </label>
          <select name="role" class="custom-select" id="operative-roles" style="width:200px;">
              <option name="role" value="anroid-developer">Anroid developer</option>
              <option name="role" value="iOS-developer">iOS developer</option>
              <option name="role" value="java-developer">Java developer</option>
              <option name="role" value="wordpress-developer">Wordpress developer</option>
              <option name="role" value="graphic-designer">Graphic designer</option>
              <option name="role" value="tester">Tester</option>
              <option name="role" value="php-developer">pHp developer</option>
              <option name="role" value="software-architect">Software architect</option>
              <option name="role" value="project-manager">Project manager</option>
              <option name="role" value="system-admin">System admin</option>
              <option name="role" value="ui-developer">UI developer</option>
              <option name="role" value="intern">Intern</option>
              <option name="role" value="coo-ceo">COO/CEO</option>
              <option name="role" value="hr">HR/Office manager</option>
              <option name="role" value="support">Support</option>
              <option name="role" value="cmb">Communication business partner</option>
              <option name="role" value="sales">Sales</option>
            </select>

            <select name="role" class="custom-select" id="administrative-roles" style="width:200px;">
              <option name="role" value="coo-ceo">COO/CEO</option>
              <option name="role" value="hr">HR/Office manager</option>
              <option name="role" value="support">Support</option>
              <option name="role" value="cmb">Communication business partner</option>
              <option name="role" value="sales">Sales</option>
            </select>
          </div>

          <div class="form-group">
          <label> Choose company: </label>
          <select name="role" class="custom-select" id="companies-select" style="width:200px;">
             
            </select>
          </div> 
        </div>
        
        
          <div class="form-group">
            <label class="control-label col-md-8" >First Name : </label>
            <div class="col-md-8">
             <input type="text" name="first_name" id="first_name" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-8">Last Name : </label>
            <div class="col-md-8">
             <input type="text" name="last_name" id="last_name" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-8">Net Salary: </label>
            <div class="col-md-8">
             <input type="text" name="net" id="net" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-8">Brutto Salary: </label>
            <div class="col-md-8">
             <input type="text" name="brutto" id="brutto" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-8">Neto yearly Salary: </label>
            <div class="col-md-8">
             <input type="text" name="yearlynet" id="yearlynet" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-8">Brutto yearly Salary: </label>
            <div class="col-md-8">
             <input type="text" name="yearlybrut" id="yearlybrut" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-8">Social cost per month: </label>
            <div class="col-md-8">
             <input type="text" name="socialcostmonth" id="socialcostmonth" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-8">Social cost per year: </label>
            <div class="col-md-8">
             <input type="text" name="socialcostyear" id="socialcostyear" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-8">Administrative: </label>
            <div class="col-md-8">
             <input type="text" name="administrative" id="administrative" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-8">Expenses: </label>
            <div class="col-md-8">
             <input type="text" name="expenses" id="expenses" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-8">Hardware: </label>
            <div class="col-md-8">
             <input type="text" name="hardware" id="hardware" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-8">Other costs: </label>
            <div class="col-md-8">
             <input type="text" name="othercosts" id="othercosts" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-8">Company cost per year </label>
            <div class="col-md-8">
             <input type="text" name="companycostperyear" id="companycostperyear" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-8">Company cost per month </label>
            <div class="col-md-8">
             <input type="text" name="companycostpermonth" id="companycostpermonth" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-8">Select Profile Image : </label>
            <div class="col-md-8">
             <input type="file" name="image" id="image" />
             <span id="store_image"></span>
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-8">Effective cost per hour: </label>
            <div class="col-md-8">
             <input type="text" name="c1" id="c1" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-8">Effective cost per day: </label>
            <div class="col-md-8">
             <input type="text" name="c2" id="c2" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-8">Effective cost per month: </label>
            <div class="col-md-8">
             <input type="text" name="c3" id="c3" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-8">Effective cost per year: </label>
            <div class="col-md-8">
             <input type="text" name="c4" id="c4" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-8">Min price per hour: </label>
            <div class="col-md-8">
             <input type="text" name="p1" id="p1" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-8">Min price per day: </label>
            <div class="col-md-8">
             <input type="text" name="p2" id="p2" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-8">Min price per month: </label>
            <div class="col-md-8">
             <input type="text" name="p3" id="p3" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-8">Min price per year: </label>
            <div class="col-md-8">
             <input type="text" name="p4" id="p4" class="form-control" />
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
          <<label class="control-label col-md-8" >Position : </label>
          <div class="col-md-8">
          <input type="radio" name="position" value="operative" checked> Operative<br>
          <input type="radio" name="position" value="administrative"> Administrative<br>
        </div>
        </div>
        <div class="form-group">
          <label> Choose role: </label>
          <select name="role" class="custom-select" style="width:200px;">
              <option name="role" value="anroid-developer">Anroid developer</option>
              <option name="role" value="iOS-developer">iOS developer</option>
              <option name="role" value="java-developer">Java developer</option>
              <option name="role" value="wordpress-developer">Wordpress developer</option>
              <option name="role" value="sales">Sales</option>
              <option name="role" value="graphic-designer">Graphic designer</option>
              <option name="role" value="tester">Tester</option>
              <option name="role" value="php-developer">pHp developer</option>
              <option name="role" value="software-architect">Software architect</option>
              <option name="role" value="project-manager">Project manager</option>
              <option name="role" value="system-admin">System admin</option>
              <option name="role" value="ui-developer">UI developer</option>
              <option name="role" value="coo-ceo">COO/CEO</option>
              <option name="role" value="hr">HR/Office manager</option>
              <option name="role" value="support">Support</option>
              <option name="role" value="cmb">Communication business partner</option>
              <option name="role" value="intern">Intern</option>
            </select>
          </div>
        </div>
          <div class="form-group">
            <label class="control-label col-md-8" >First Name : </label>
            <div class="col-md-8">
             <input type="text" name="first_name" id="first_name" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-8">Last Name : </label>
            <div class="col-md-8">
             <input type="text" name="last_name" id="last_name" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-8">Net Salary: </label>
            <div class="col-md-8">
             <input type="text" name="net" id="net" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-8">Brutto Salary: </label>
            <div class="col-md-8">
             <input type="text" name="brutto" id="brutto" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-8">Neto yearly Salary: </label>
            <div class="col-md-8">
             <input type="text" name="yearlynet" id="yearlynet" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-8">Brutto yearly Salary: </label>
            <div class="col-md-8">
             <input type="text" name="yearlybrut" id="yearlybrut" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-8">socialcostmonth: </label>
            <div class="col-md-8">
             <input type="text" name="socialcostmonth" id="socialcostmonth" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-8">socialcostyear: </label>
            <div class="col-md-8">
             <input type="text" name="socialcostyear" id="socialcostyear" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-8">Administrative: </label>
            <div class="col-md-8">
             <input type="text" name="administrative" id="administrative" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-8">Expenses: </label>
            <div class="col-md-8">
             <input type="text" name="expenses" id="expenses" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-8">Hardware: </label>
            <div class="col-md-8">
             <input type="text" name="hardware" id="hardware" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-8">othercosts: </label>
            <div class="col-md-8">
             <input type="text" name="othercosts" id="othercosts" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-8">companycostperyear </label>
            <div class="col-md-8">
             <input type="text" name="companycostperyear" id="companycostperyear" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-8">companycostpermonth </label>
            <div class="col-md-8">
             <input type="text" name="companycostpermonth" id="companycostpermonth" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-8">Select Profile Image : </label>
            <div class="col-md-8">
             <input type="file" name="image" id="image" />
             <span id="store_image"></span>
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-8">C1: </label>
            <div class="col-md-8">
             <input type="text" name="c1" id="c1" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-8">C2: </label>
            <div class="col-md-8">
             <input type="text" name="c2" id="c2" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-8">C3: </label>
            <div class="col-md-8">
             <input type="text" name="c3" id="c3" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-8">C4: </label>
            <div class="col-md-8">
             <input type="text" name="c4" id="c4" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-8">P1: </label>
            <div class="col-md-8">
             <input type="text" name="p1" id="p1" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-8">P2: </label>
            <div class="col-md-8">
             <input type="text" name="p2" id="p2" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-8">P3: </label>
            <div class="col-md-8">
             <input type="text" name="p3" id="p3" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-8">P4: </label>
            <div class="col-md-8">
             <input type="text" name="p4" id="p4" class="form-control" />
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




<!-- <div class="container">
  

 <div id="calc">
    <h2> Company settings </h2>
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
</div> -->



<script>
$(document).ready(function(){

 $('#user_table').DataTable({

  processing: true,
  serverSide: true,
  ajax:{
   url: "{{ route('employee.index') }}",
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
    data: 'position',
    name: 'position'
   },
   {
    data: 'role',
    name: 'role'
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
    data: 'net',
    name: 'net'
   },
   {
    data: 'brutto',
    name: 'brutto'
   },
   {
    data: 'yearlynet',
    name: 'yearlynet'
   },
   {
    data: 'yearlybrut',
    name: 'yearlybrut'
   },
   {
    data: 'socialcostmonth',
    name: 'socialcostmonth'
   },
   {
    data: 'socialcostyear',
    name: 'socialcostyear'
   },
   {
    data: 'administrative',
    name: 'administrative'
   },
   {
    data: 'expenses',
    name: 'expenses'
   },
   {
    data: 'hardware',
    name: 'hardware'
   },
   {
    data: 'othercosts',
    name: 'othercosts'
   },
   {
    data: 'companycostperyear',
    name: 'companycostperyear'
   },
   {
    data: 'companycostpermonth',
    name: 'companycostpermonth'
   },
  //  {
  //   data: 'effective_per_day',
  //   name: 'effective_per_day'
  //  },
   {
    data: 'c1',
    name: 'c1'
   },
   {
    data: 'c2',
    name: 'c2'
   },
   {
    data: 'c3',
    name: 'c3'
   },
   {
    data: 'c4',
    name: 'c4'
   },
   {
    data: 'p1',
    name: 'p1'
   },
   {
    data: 'p2',
    name: 'p2'
   },
   {
    data: 'p3',
    name: 'p3'
   },
   {
    data: 'p4',
    name: 'p4'
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
    url:"{{ route('employee.store') }}",
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
    url:"{{ route('employee.update') }}",
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
     console.log(url);
    }
   });
  }
  
 });

 $(document).on('click', '.edit', function(){
  var id = $(this).attr('id');
  $('#form_result').html('');
  $.ajax({
   url:"/employee/"+id+"/edit",
   dataType:"json",
   success:function(html){
    $('#position').val(html.data.position);
    $('#role').val(html.data.role);
    $('#first_name').val(html.data.first_name);
    $('#last_name').val(html.data.last_name);
    $('#net').val(html.data.net);
    $('#brutto').val(html.data.brutto);
    $('#yearlynet').val(html.data.yearlynet);
    $('#yearlybrut').val(html.data.yearlybrut);
    $('#socialcostmonth').val(html.data.socialcostmonth);
    $('#socialcostyear').val(html.data.socialcostyear);
    $('#administrative').val(html.data.administrative);
    $('#expenses').val(html.data.expenses);
    $('#hardware').val(html.data.hardware);
    $('#othercosts').val(html.data.othercosts);
    $('#companycostperyear').val(html.data.companycostperyear);
    $('#companycostpermonth').val(html.data.companycostpermonth);
    $('#image').html("<img src={{ URL::to('/') }}/images/" + html.data.image + " width='70' class='img-thumbnail' />");
    $('#image').append("<input type='hidden' name='hidden_image' value='"+html.data.image+"' />");
    $('#store_image').html("<img src={{ URL::to('/') }}/images/" + html.data.image + " width='70' class='img-thumbnail' />");
    $('#store_image').append("<input type='hidden' name='hidden_image' value='"+html.data.image+"' />");
    $('#companycostperyear').val(html.data.companycostperyear);
    $('#c1').val(html.data.c1);
    $('#c2').val(html.data.c2);
    $('#c3').val(html.data.c3);
    $('#c4').val(html.data.c4);
    $('#p1').val(html.data.p1);
    $('#p2').val(html.data.p2);
    $('#p3').val(html.data.p3);
    $('#p4').val(html.data.p4);
    $('#hidden_id').val(html.data.id);
    $('.modal-title').text("Edit New Record");
    $('#action_button').val("Edit");
    $('#action').val("Edit");
    $('#formModal').modal('show');
   }
  })
 });


 
 
console.log("rows = " + $('#user_table').DataTable().rows().count());
 

var user_id;

 $(document).on('click', '.delete', function(){
  user_id = $(this).attr('id');
  $('#confirmModal').modal('show');
 });

 $('#ok_button').click(function(){
  $.ajax({
   url:"employee/destroy/"+user_id,
   beforeSend:function(){
    $('#ok_button').text('Deleting...');
   },
   success:function(data)
   {
    setTimeout(function(){
     $('#confirmModal').modal('hide');
     $('#user_table').DataTable().ajax.reload();
    }, 2000);
   }
  })
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

  var firmi = [];
    jQuery.ajax({
            type: "GET",
            url: "{{ route('company_index.index') }}",
			datatype:'JSON',
           // data: {"company_name":company_name},
            success: function (data) {
             jQuery.each(data.data, function(k, v) {
				console.log(data.data[k].company_name);
    $('#companies-select').append($('<option>', { 
        value: data.data[k].company_name,
        text : data.data[k].company_name 
    }));
			firmi[k]=data.data[k].company_name;	});
			console.log("1" + firmi);
            }
            
    });
  
    $('#sick_days').keyup(function(){
        $('#effective_working_days').val($('#working_days').val() - $('#vacation_days').val() - $('#sick_days').val());
    });  
    $('#billability').keyup(function(){
        $('#billability_per_year').val($('#effective_working_days').val() * ($('#billability').val()/100));
    });   
    $('#net').keyup(function(){
        $('#yearlynet').val($('#net').val() * 12);
    });
    $('#brutto').keyup(function(){
        $('#yearlybrut').val($('#brutto').val() * 12);
    });
    $('#brutto').keyup(function(){
        $('#socialcostmonth').val($('#brutto').val() - $('#net').val());
    });
    $('#brutto').keyup(function(){
        $('#socialcostyear').val(($('#brutto').val() - $('#net').val()) * 12);
    });
    $('#hardware').keyup(function(){
        $('#othercosts').val( ( ( ( parseInt($('#administrative').val()) + parseInt($('#expenses').val()) + (parseInt($('#hardware').val()) / 24 ) ) / parseInt($("#user_table>tbody>tr").length) ) * 12 ).toFixed(2)) ;
    });
    $('#hardware').keyup(function(){
        $('#companycostperyear').val( (parseInt($('#othercosts').val())) + (parseInt($('#yearlybrut').val())) + (parseInt($('#brutto').val())) );
    });
     $('#hardware').keyup(function(){
         $('#companycostpermonth').val(($('#companycostperyear').val() / 12).toFixed(2));
     });
     var billable_year;
     jQuery('#companies-select').change(function(){ 
     $.ajax({
            type: "GET",
            url: "{{ route('company_index.index') }}",
            data: 'billability_year',
            success: function (data) {
             
              //console.log(data.data[0].billability_year);
              //billable_year = data.data[k].billability_year;
              jQuery.each(data.data, function(k, v) {
              console.log(data.data[k].company_name);
              firmi[k]=data.data[k].company_name;
              if($('#companies-select').val()!=firmi[k] 	){
                billable_year = data.data[k].billability_year;
                console.log("RABOTI!!!!");
                console.log(billable_year);
                }
              });
              console.log("1" + firmi);
              

            
            }
        });
      });
        
     $('#hardware').keyup(function(){
      $('#c2').val(((($('#companycostperyear').val() / (billable_year)/100)) *100).toFixed(2));
     });
     $('#hardware').on('change keyup', function(){
         $('#c1').val((($('#c2').val() / 8).toFixed(2)));
     });
     $('#hardware').on('change keyup', function(){
         $('#c3').val((($('#c2').val() * 21) ).toFixed(2));
     });
     $('#hardware').on('change keyup', function(){
         $('#c4').val((($('#c3').val() * 12) ).toFixed(2));
     });
     var profit;
     $.ajax({
            type: "GET",
            url: "{{ route('company_index.index') }}",
            data: 'expected_profit',
            success: function (data) {
               console.log("sega" + data);
               console.log( data.data[0].expected_profit);
              profit=data.data[0].expected_profit;
            }
        });
     $('#hardware').on('change keyup',function(){
      $('#p1').val( parseInt(($('#c1').val() * (profit)/100).toFixed(2)) + parseInt($('#c1').val()));
     });
     
     $('#hardware').keyup(function(){
         $('#p2').val(((($('#p1').val() * 8) * 0.95)).toFixed(2));
         
     });
      $('#hardware').keyup(function(){
         $('#p3').val((($('#p1').val() * 160) * 0.87).toFixed(2));
        
        });
      $('#hardware').keyup(function(){
         $('#p4').val((($('#p3').val() * 12) * 0.87).toFixed(2));
         
        });
    //  $('#companycostperyear').keyup(function(){
    //      $('#effective_per_day').val(($('#companycostperyear').val() / $('#billability').val()));
    //  });
    // var broj=$('#brutto').val();

    jQuery('[name="position"]').on('change', function() {
    
    var state = this.value == 'operative';
    
    jQuery('[id="operative-roles"]').toggle(state);
    jQuery('[id="administrative-roles"]').toggle(!state);
    });
    
});

// $.ajax({
//   type: 'GET',
//   url: "{{ route('company_index.index') }}",
//   dataType: "JSON",

//   cache: false
// })
//   .done(function( data ) {
//     var broj=$('#brutto').val();
//     if (data.data[0].billability == $('#brutto').val()){
//       console.log("ok");
//     }
//     else {
//       console.log( "not ok" );
//       console.log (data.data[0].billability);
//       console.log(broj);
//     }
//     console.log(data)
    
//   });

 /*
     tax = salary *  x ;
     taxPersce = (tax / salary) * 100;

   document.getElementById("TAX").innerHTML="TAX: " + taxPersce.toFixed() + " %"; 
   document.getElementById("deduction").innerHTML="Tax Deduction: " + tax.toFixed() + "  ₪";
  
   var neto = salary - tax;
  
  document.getElementById("neto").innerHTML="Your Neto Salary: " + neto.toFixed() + " ₪"; 
   */
    
</script>
@endsection