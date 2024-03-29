import { Component, OnInit, Input, EventEmitter, Output, ViewChild, ElementRef } from '@angular/core';
import { Employee } from '../../employee.model';
import { EmployeeService } from '../../..//employee.service';
import { EmployeeEditComponent } from '../employee-edit/employee-edit.component';

import { FormGroup, FormBuilder, NgSelectOption } from '@angular/forms';
import { EmployeeListComponent } from '../employee-list.component';

import { DomSanitizer } from '@angular/platform-browser';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-employee-item',
  templateUrl: './employee-item.component.html',
  styleUrls: ['./employee-item.component.css']
})
export class EmployeeItemComponent implements OnInit {

  @Input() employeesItem: Employee;
  @Output() employeeSelected = new EventEmitter<void>();

  @Output() employeeAdded = new EventEmitter<void>();


  editingEmployee: FormGroup;

  fileData:File =null;
  previewUrl:any = null;
  fileUploadProgress: string = null;
  uploadedFilePath: string = null;

  imgsrc : any;

  // @ViewChild('positionInput') positionInputRef: ElementRef;  //{ static: false }
  // @ViewChild('roleInput') roleInputRef: ElementRef;
  // @ViewChild('companyInput') companyInputRef: ElementRef;
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
  // // no photo added here 
  // @Output() employeeAdded = new EventEmitter<Employee>();


  constructor(private emoloyeeService: EmployeeService, private edit: EmployeeEditComponent, private fb:FormBuilder, private list: EmployeeListComponent, private _sanitizer: DomSanitizer, private http: HttpClient) {
    this.editingEmployee= fb.group({
      "position": [''],
      "role": [''],
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
    
    "c1": [''],
    "c2": [''],
    "c3": [''],
    "c4": [''],
    "p1": [''],
    "p2": [''],
    "p3": [''],
    "p4": [''],
    "image": [''],
   })
   
   }

  ngOnInit() {
    //console.log(Image);
    //console.log("Ovde e slikata demek" , this.employeesItem);
    //this.http.get("assets/slika.txt", { responseType: 'text' })
    //.subscribe(data => {
      //console.log("WHAT THE SHIT E OVA? ",this.employeesItem.image);
    // this.imgsrc = this._sanitizer.bypassSecurityTrustResourceUrl(this.employeesItem.image);
    //})
  }

  // readUrl(event:any) {
  //   if (event.target.files && event.target.files[0]) {
  //     var reader = new FileReader();
  
  //     reader.onload = (event: ProgressEvent) => {
  //       this.employeesItem.image = (<FileReader>event.target).result;
  //     }
  
  //     reader.readAsDataURL(event.target.files[0]);
  //   }
  // }

  public fileProgress(fileInput: any) {
    this.fileData = <File>fileInput.target.files[0];
    this.preview();
  }

  public preview() {
    // Show preview 
    var mimeType = this.fileData.type;
    if (mimeType.match(/image\/*/) == null) {
      return;
    }
 
    var reader = new FileReader();      
    reader.readAsDataURL(this.fileData); 
    reader.onload = (_event) => { 
      this.previewUrl = reader.result; 
    }
  }

  onSelected() {
    this.employeeSelected.emit();
    //console.log(this.employeesItem)
    return false;
    //console.log(this.employeesItem);
    
  }


  editEmployee() {
    //console.log(this.addingEmployee.value);
    this.emoloyeeService
    .editEmployee(this.editingEmployee.value)
    .subscribe(employee => 
      //console.log("THIS" + employee)
      this.list.getEmployees() + employee,
      
      )
      //this.editingEmployee.reset()
      //this.employees.push(employee)
      
  }



  /**
   * addEmployee
   */
  
  //  public addEmployee() {
  //    this.employeeAdded.push(employee);
  //  }

  // onAddEmployee() {
  //   const empositionInput = this.positionInputRef.nativeElement.value;
  //   const emroleInput = this.roleInputRef.nativeElement.value;
  //   const emcompanyInput = this.companyInputRef.nativeElement.value;
  //   const emfirstNameInput = this.firstNameInputRef.nativeElement.value;
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
    
    
  //   const newEmployee = new Employee(empositionInput, emroleInput,emcompanyInput, emfirstNameInput,emlastNameInput, emnetInput, embruttoInput, emyearlyNetInput, emyearlyBruttoInput,emsocialCostMonthInput, emsocialCostYearInput, emadministrativeInput, emexpensesInput,emhardwareInput,emotherCostsInput,emcompanyCostYearInput,emcompanyCostMonthInput,emeffectiveCostHourInput, emeffectiveCostDayInput,emeffectiveCostMonthInput, emeffectiveCostYearInput, emminPriceHourInput, emminPriceDayInput, emminPriceMonthInput, emminPriceYearInput);
  //   this.employeeAdded.emit(newEmployee);
  // }

}
