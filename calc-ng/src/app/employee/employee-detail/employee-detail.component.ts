import { Component, OnInit, Output, Input } from '@angular/core';

import { Employee } from '../employee.model';
import { EmployeeService} from '../../employee.service';
import { FormGroup, FormBuilder, NgSelectOption } from '@angular/forms';

import { EmployeeListComponent } from '../employee-list/employee-list.component';

import { DomSanitizer } from '@angular/platform-browser';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-employee-detail',
  templateUrl: './employee-detail.component.html',
  styleUrls: ['./employee-detail.component.css']
})
export class EmployeeDetailComponent implements OnInit {

  @Input() employees: Employee;

  errorMessage: string;
  editingEmployee : FormGroup

  constructor(private employeeService : EmployeeService, private fb: FormBuilder) {
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
  }

  isShow = false;

  onToggle() {
    this.isShow = !this.isShow;
    
    //console.log("nesto");
  }


  
  //employeeEl

  //id=this.employees.id;

  // editEmployee() {

  //   this.employeeService
  //   .editEmployee(this.editingEmployee.value)
  //   .subscribe(employee => 
  //     //console.log("THIS" + employee)
  //     this.getEmployees() + employee,
      
  //     )
  //     //this.editingEmployee.reset()
  //     //this.employees.push(employee)

  //   // console.log(this.addingEmployee.value);
  //   // this.employeeService
  //   // .editEmployee(this.addingEmployee.value)
  //   // .subscribe(employee => 
  //   //   //console.log("THIS" + employee)
  //   //   this.g.getEmployees() + employee,
      
  //   //   )
  //   //   this.addingEmployee.reset()
  //   //   //this.employees.push(employee)
      
  // }

  
    deleteEmployee(employee: Employee): void {
      this.employeeService.deleteEmployee(employee.first_name)
        .subscribe( data => {
          this.employees = this.employees;
        })
    };
  


}
