import { Component, OnInit } from '@angular/core';
import { Employee, EmployeeService } from '../employee.service';
import { Employee2 } from '../employees2/employees2.model';
import { Http, Headers, RequestOptions } from '@angular/http';
//import 'rxjs/Rx';
import { Observable } from 'rxjs';


@Component({
  selector: 'app-employees2',
  templateUrl: './employees2.component.html',
  styleUrls: ['./employees2.component.css']
})
export class Employees2Component implements OnInit {

  employees: Employee[];
 
  //employees: any[];
  errorMessage: string;
 // isLoading: boolean = true;

  constructor(private employeeService: EmployeeService) {
    console.log("are they called ok?");
    //this.init();
   }

  //employeesObservable: Observable<Employee[]>;
  async ngOnInit() {
    // this.getEmployees().subscribe( employees => {
    //   this.employees = employees;
    // });
    //this.employeesObservable = this.employeeService.getEmployees();
   this.getEmployees();
   //console.log(this.getEmployees());

  //  this.employeeService.getEmployees().subscribe(
     
  //   employees=>  {
  //     this.employees = employees;
  //     console.log(employees);
  //   }
  // )

  }

  getEmployees() {
    this.employeeService
        .getEmployees()
        .subscribe(
          data => {
            
            this.employees = data;
           // data = this.employees;
            // this.employees = data;
            console.log(data);
            
           
            //position: (employees as any).position
            //this.isLoading = false
          },
          error => {
            this.errorMessage = <any>error
           // this.isLoading = false
          }
        );
  }


  // findEmployee(id): Employee {
  //   return this.employees.find(employee => employee.id === id);
  // }

  // isUpdating(id): boolean {
  //   return this.findEmployee(id).isUpdating;
  // }
  

}
