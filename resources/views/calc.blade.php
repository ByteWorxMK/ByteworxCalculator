
@extends('layouts.app')

@section('content')

<div id="container">
  

  <div id="calc">
       <h1> Tax Calculator </h1> 
    <div class="input-group">
       <span class="input-group-addon" id="basic-addon1">Work Hours</span>
       <input type="number" class="form-control" aria-describedby="basic-addon1"  id="Hours">
    </div>
    <div class="input-group">
       <span class="input-group-addon" id="basic-addon1" >Pay Per Hour</span>
       <input type="number" class="form-control"  aria-describedby="basic-addon1" id="pph">
     </div>
   
   <div id="checkBox">
     
     <label> <p> Select your country:</p> </label>
      <input class="check" type="radio" name="country" id="israel"> Israel </input>
     <input class="check" type="radio" name="country" id="USA"> USA </input>
   
     </div>
 <div id="submit"> <button type="submit" class="btn btn-primary" onClick="getSalary()">Submit</button></div>
 <div id="income">
   
  <div> <p id="salary"> Salary: </div>
     <p id="TAX"> TAX: </p>
         <p id="deduction"> Tax Deduction: </p> 
 
     <p id="neto"> Your Neto Salary: </p>
 </div>
   
 </div>
 </div>
 </div>
 
 <script>
 
function getSalary(hours,pph ) {
   // Salary Calculator 
   hours = document.getElementById("Hours").value;
   pph = document.getElementById("pph").value;
   salary = hours * pph;
  // israel Tax calculator
if(document.getElementById("israel").checked) {
    if(salary < 6221) {
    x = 0.10;
    }else if(6221 < salary && salary < 8921 ){
    x = 0.14;
    }else if(8921 < salary && salary < 14321){
    x = 0.20;
    }else if(14321 < salary && salary < 19901){
    x = 0.31;
    }else if(19901 < salary  && salary < 41411){
    x = 0.35;
    }else if( salary > 41411) {
    x = 0.47;
    }
      // Print the neto of israel Tax calculator
       var tax = salary *  x ;
       var taxPersce = (tax / salary) * 100;
       var neto = salary - tax;
       document.getElementById("salary").innerHTML="Salary: " + salary.toFixed() + " ₪";
       document.getElementById("TAX").innerHTML="TAX: " + taxPersce.toFixed() + " %"; 
       document.getElementById("deduction").innerHTML="Tax Deduction: " + tax.toFixed() + "  ₪";
       document.getElementById("neto").innerHTML="Your Neto Salary: " + neto.toFixed() + " ₪"; 
  // USA Tax calculator
}else if(document.getElementById("USA").checked) {
         // Print the neto of USA Tax calculator
        x = 0.15; 
        var Ussalary = salary;
        var Ustax = salary * x;
        var Usneto = Ussalary - Ustax;
        var UtaxPersce = (Ustax / salary) * 100;
        var Uneto = salary - Ustax;
        document.getElementById("salary").innerHTML="Salary: " + Ussalary.toFixed() + " $";
        document.getElementById("TAX").innerHTML="TAX: " + UtaxPersce.toFixed() + " %"; 
        document.getElementById("deduction").innerHTML="Tax Deduction: " + Ustax.toFixed() + " $";
        document.getElementById("neto").innerHTML="Your Neto Salary: " + Uneto.toFixed() + " $"; 

}
  
  return neto;

}

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