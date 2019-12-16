import { Component, OnInit, Input, Output, ViewChild,  EventEmitter, ElementRef} from '@angular/core';
import { Router } from '@angular/router';
import { Employee } from '../../employee.model';
import { EmployeeService } from '../../../employee.service';
import { FormGroup, FormBuilder, NgSelectOption } from '@angular/forms';
import { EmployeeComponent } from '../../employee.component';
import { EmployeeListComponent } from '../employee-list.component';
import { CompanyService } from 'src/app/company.service';
//import { calcBindingFlags } from '@angular/core/src/view/util';




@Component({
  selector: 'app-employee-edit',
  templateUrl: './employee-edit.component.html',
  styleUrls: ['./employee-edit.component.css']
})
export class EmployeeEditComponent implements OnInit {

  // @ViewChild('positionInput') positionInputRef: ElementRef;  //{ static: false }
  // @ViewChild('roleInput') roleInputRef: ElementRef;
  // @ViewChild('companyInput') companyInputRef: ElementRef;
  addingEmployee: FormGroup;

  employee: Employee;
  filtero: any;
  employees: Employee[];
  companies:any;


  //id = this.actRoute.snapshot.params['id'];


  
  



  // @ViewChild('firstNameInput') firstNameInputRef: ElementRef;
  // @ViewChild('lastNameInput') lastNameInputRef: ElementRef;
  // @ViewChild('netInput') netInputRef: ElementRef;
  // @ViewChild('bruttoInput') bruttoInputRef: ElementRef;
  // @ViewChild('yearlyNetInput') yearlyNetInputRef: ElementRef;
  // @ViewChild('yearlyBruttoInput') yearlyBruttoInputRef: ElementRef;
  // @ViewChild('socialCostMonthInput') socialCostMonthInputRef: ElementRef;
  // @ViewChild('socialCostYearInput') socialCostYearInputRef: ElementRef;
  // @ViewChild('administrativeInput') administrativeInputRef: ElementRef;
  // @ViewChild('expensesInput') expensesInputRef: ElementRef;
  // @ViewChild('hardwareInput') hardwareInputRef: ElementRef;
  // @ViewChild('otherCostsInput') otherCostsInputRef: ElementRef;
  // @ViewChild('companyCostYearInput') companyCostYearInputRef: ElementRef;
  // @ViewChild('companyCostMonthInput') companyCostMonthInputRef: ElementRef;
  // @ViewChild('effectiveCostHourInput') effectiveCostHourInputRef: ElementRef;
  // @ViewChild('effectiveCostDayInput') effectiveCostDayInputRef: ElementRef;
  // @ViewChild('effectiveCostMonthInput') effectiveCostMonthInputRef: ElementRef;
  // @ViewChild('effectiveCostYearInput') effectiveCostYearInputRef: ElementRef;
  // @ViewChild('minPriceHourInput') minPriceHourInputRef: ElementRef;
  // @ViewChild('minPriceDayInput') minPriceDayInputRef: ElementRef;
  // @ViewChild('minPriceMonthInput') minPriceMonthInputRef: ElementRef;
  // @ViewChild('minPriceYearInput') minPriceYearInputRef: ElementRef;
  // no photo added here 
  //@Output() employeeAdded = new EventEmitter<Employee>();

  // @Input() employee = {firstNameInput: ""}

  constructor(private employeeService: EmployeeService, public fb: FormBuilder, private g : EmployeeListComponent, private emp: EmployeeListComponent, private companyList: CompanyService) {
    console.log("are they called?");
    this.addingEmployee= fb.group({
       "first_name": [''],
     "last_name": [''],
     "net": [''],
     "brutto": [''],
     "yearlynet": [''],
     "yearlybrut": [''],
     "socialcostmonth": [''],
     "socialcostyear": [''],
     "administrative": [''],
     "expenses": [''],
     "hardware": [''],
     "othercosts": [''],
     "companycostperyear": [''],
     "companycostpermonth": [''],
    // image": [''],
     "c1": [''],
     "c2": [''],
     "c3": [''],
     "c4": [''],
     "p1": [''],
     "p2": [''],
     "p3": [''],
     "p4": [''],
    })
    //this.init();
   }


   companieinfoplus:any;
   nesto: any;
   

  ngOnInit() {
    this.companyList.getCompanies()
      .subscribe(data =>{ this.companies = data;
      this.companieinfoplus = data; 
       // console.log(this.companieinfoplus.filter(word => this.companieinfoplus == '6' ))
      
    })

  }

  
 

  // onAddEmployee() {
  //   // console.log("test-inside");
  //   // const empositionInput = this.positionInputRef.nativeElement;
  //   // console.log("2");
  //   // const emroleInput = this.roleInputRef.nativeElement;
  //   // const emcompanyInput = this.companyInputRef.nativeElement;
  //   // console.log("4");
  //   const emfirstNameInput = this.firstNameInputRef.nativeElement.value;
  //   //console.log("5");
  //   const emlastNameInput = this.lastNameInputRef.nativeElement.value;
  //   const emnetInput = this.netInputRef.nativeElement.value;
  //   const embruttoInput = this.bruttoInputRef.nativeElement.value;
  //   const emyearlyNetInput = this.yearlyNetInputRef.nativeElement.value;
  //   const emyearlyBruttoInput = this.yearlyBruttoInputRef.nativeElement.value;
  //   const emsocialCostMonthInput = this.socialCostMonthInputRef.nativeElement.value;
  //   const emsocialCostYearInput = this.socialCostYearInputRef.nativeElement.value;
  //   const emadministrativeInput = this.administrativeInputRef.nativeElement.value;
  //   const emexpensesInput = this.expensesInputRef.nativeElement.value;
  //   const emhardwareInput = this.hardwareInputRef.nativeElement.value;
  //   const emotherCostsInput = this.otherCostsInputRef.nativeElement.value;
  //   const emcompanyCostYearInput = this.companyCostYearInputRef.nativeElement.value;
  //   const emcompanyCostMonthInput = this.companyCostMonthInputRef.nativeElement.value;
  //   const emeffectiveCostHourInput = this.effectiveCostHourInputRef.nativeElement.value;
  //   const emeffectiveCostDayInput = this.effectiveCostDayInputRef.nativeElement.value;
  //   const emeffectiveCostMonthInput = this.effectiveCostMonthInputRef.nativeElement.value;
  //   const emeffectiveCostYearInput = this.effectiveCostYearInputRef.nativeElement.value;
  //   const emminPriceHourInput = this.minPriceHourInputRef.nativeElement.value;
  //   const emminPriceDayInput = this.minPriceDayInputRef.nativeElement.value;
  //   const emminPriceMonthInput = this.minPriceMonthInputRef.nativeElement.value;
  //   const emminPriceYearInput = this.minPriceYearInputRef.nativeElement.value;
    
    
  //   const newEmployee = new Employee(emfirstNameInput,emlastNameInput, emnetInput, embruttoInput, emyearlyNetInput, emyearlyBruttoInput,emsocialCostMonthInput, emsocialCostYearInput, emadministrativeInput, emexpensesInput,emhardwareInput,emotherCostsInput,emcompanyCostYearInput,emcompanyCostMonthInput,emeffectiveCostHourInput, emeffectiveCostDayInput,emeffectiveCostMonthInput, emeffectiveCostYearInput, emminPriceHourInput, emminPriceDayInput, emminPriceMonthInput, emminPriceYearInput);
  //   this.employeeAdded.emit(newEmployee);
  // }

  // addEmployee(dataEmployee) {
  //   this.restApi.createEmployee(this.dataEmployee)..subscribe((data: {}) => {
  //     this.routes.navigate(['/employees-list'])
  //   })
  // }



  

  addEmployees() {
    console.log(this.addingEmployee.value);
    this.employeeService
    .addEmployee(this.addingEmployee.value)
    .subscribe(employee => 
      //console.log("THIS" + employee)
      this.g.getEmployees() + employee,
      
      )
      this.addingEmployee.reset()
      //this.employees.push(employee)
      
  }


  selected(dare){
   
    console.log(dare);
    var nesto2;
    nesto2 = this.nesto ;

//     const words = ['spray', 'limit', 'elite', 'exuberant', 'destruction', 'present'];

// const result = words.filter(word => word.length > 6){

// }

    var kk = this.companieinfoplus.filter(function (aaa) {
      if(aaa.company_name == dare){
       // nesto2= aaa;
        console.log(aaa);
       // this.nesto= nesto2;
        return aaa;
      }
    })
    console.log(kk);
    this.nesto=kk;

    //this.calc2(kk)
  //  console.log(kk);

  }


  calc() {


    this.addingEmployee.value["yearlynet"] = this.addingEmployee.value["net"]* 12;
    this.addingEmployee.controls["yearlynet"].setValue(this.addingEmployee.value["yearlynet"]);
   // console.log(this.addingEmployee.value["yearlynet"]);

  //  console.log(this.net);

    this.addingEmployee.value["yearlybrut"] = this.addingEmployee.value["brutto"]* 12;
    this.addingEmployee.controls["yearlybrut"].setValue(this.addingEmployee.value["yearlybrut"]);
   
    this.addingEmployee.value["socialcostmonth"] = this.addingEmployee.value["brutto"] - this.addingEmployee.value["net"] ;
    this.addingEmployee.controls["socialcostmonth"].setValue(this.addingEmployee.value["socialcostmonth"]);
   
    this.addingEmployee.value["socialcostyear"] = this.addingEmployee.value["socialcostmonth"] * 12 ;
    this.addingEmployee.controls["socialcostyear"].setValue(this.addingEmployee.value["socialcostyear"]);
   
    
  }


  calc2(nesto) {

    this.addingEmployee.value["othercosts"] =  ( this.addingEmployee.value["administrative"] + this.addingEmployee.value["expenses"] + ((this.addingEmployee.value["hardware"])/24) + this.emp.employees.length ) * 12 ;
   //console.log(Number(this.addingEmployee.value["administrative"]) + Number(this.addingEmployee.value["expenses"]));
   
    this.addingEmployee.controls["othercosts"].setValue(this.addingEmployee.value["othercosts"]);
   
    this.addingEmployee.value["companycostperyear"] = this.addingEmployee.value["othercosts"] + this.addingEmployee.value["yearlybrut"] + this.addingEmployee.value["brutto"];
    this.addingEmployee.controls["companycostperyear"].setValue(this.addingEmployee.value["companycostperyear"]);
   
    this.addingEmployee.value["companycostpermonth"] = this.addingEmployee.value["companycostperyear"] / 12;
    this.addingEmployee.controls["companycostpermonth"].setValue(this.addingEmployee.value["companycostpermonth"]);
   
    this.addingEmployee.value["c2"] = (this.addingEmployee.value["companycostperyear"] / (parseInt(this.nesto[0].billability_year))/100) * 100;
    this.addingEmployee.controls["c2"].setValue(this.addingEmployee.value["c2"]);
   
    this.addingEmployee.value["c1"] = this.addingEmployee.value["c2"] / 8;
    this.addingEmployee.controls["c1"].setValue(this.addingEmployee.value["c1"]);
   
    this.addingEmployee.value["c3"] = this.addingEmployee.value["c2"] * 21;
    this.addingEmployee.controls["c3"].setValue(this.addingEmployee.value["c3"]);
   

    this.addingEmployee.value["c4"] = this.addingEmployee.value["c3"].toFixed(2) * 12;
    this.addingEmployee.controls["c4"].setValue(this.addingEmployee.value["c4"]);
   

    this.addingEmployee.value["p1"] = parseInt(this.addingEmployee.value["c1"]) * (this.nesto[0].expected_profit / 100) + parseInt(this.addingEmployee.value["c1"]) ;
    this.addingEmployee.controls["p1"].setValue(this.addingEmployee.value["p1"]);
   
    this.addingEmployee.value["p2"] = (this.addingEmployee.value["p1"] * 8) * 0.95;
    this.addingEmployee.controls["p2"].setValue(this.addingEmployee.value["p2"]);
   

    this.addingEmployee.value["p3"] = (this.addingEmployee.value["p1"] * 160) * 0.87;
    this.addingEmployee.controls["p3"].setValue(this.addingEmployee.value["p3"]);
   

    this.addingEmployee.value["p4"] = (this.addingEmployee.value["p3"] * 12) * 0.87;
    this.addingEmployee.controls["p4"].setValue(this.addingEmployee.value["p4"]);
   

    //console.log((this.nesto[0].billability_year));
  }

  editEmployee() {
    console.log(this.addingEmployee.value);
    this.employeeService
    .editEmployee(this.addingEmployee.value)
    .subscribe(employee => 
      //console.log("THIS" + employee)
      this.g.getEmployees() + employee,
      
      )
      this.addingEmployee.reset()
      //this.employees.push(employee)
      
  }
}
