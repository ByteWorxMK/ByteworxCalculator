import { Component, OnInit, Output, Input } from '@angular/core';

import { Employee } from '../employee.model';

@Component({
  selector: 'app-employee-detail',
  templateUrl: './employee-detail.component.html',
  styleUrls: ['./employee-detail.component.css']
})
export class EmployeeDetailComponent implements OnInit {

  @Input() employees: Employee;

  

  constructor() { }

  ngOnInit() {
  }

  isShow = false;

  onToggle() {
    this.isShow = !this.isShow;
    //console.log("nesto");
  }

  //employeeEl

  //id=this.employees.id;

  editEmployee() {

    

    // console.log(this.addingEmployee.value);
    // this.employeeService
    // .editEmployee(this.addingEmployee.value)
    // .subscribe(employee => 
    //   //console.log("THIS" + employee)
    //   this.g.getEmployees() + employee,
      
    //   )
    //   this.addingEmployee.reset()
    //   //this.employees.push(employee)
      
  }


}
