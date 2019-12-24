import { Component, OnInit, Injectable } from '@angular/core';
import { Employee } from './employee.model';
import { EmployeeService } from '../employee.service';

import { UserService } from '../user.service';
import { User } from '../user.model';
import { FormGroup, FormBuilder } from '@angular/forms';
// import { TestBed } from '@angular/core/testing';

@Injectable()

@Component({
  selector: 'app-employee',
  templateUrl: './employee.component.html',
  styleUrls: ['./employee.component.css']
})
export class EmployeeComponent implements OnInit {

  selectedEmployee: Employee;

  employees: Employee[];

  employee: Employee;

  users: User[];

  
 
  //employees: any[];
  errorMessage: string;
 // isLoading: boolean = true;

  constructor(private employeeService: EmployeeService, private userService: UserService) {
   // console.log("are they called?");
    
    //this.init();
   }

  //employeesObservable: Observable<Employee[]>;
  async ngOnInit() {
    // this.getEmployees().subscribe( employees => {
    //   this.employees = employees;
    // });
    //this.employeesObservable = this.employeeService.getEmployees();
   this.getEmployees();
   //this.getUsers();
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
            //console.log("test test TestBed2222", data)
            //console.log(data);
            
           
            //position: (employees as any).position
            //this.isLoading = false
          },
          error => {
            this.errorMessage = <any>error
           // this.isLoading = false
          }
        );
  }

  // getUsers() {
  //   this.userService
  //       .getUsers()
  //       .subscribe(
  //         data => {
            
  //           this.users = data;
  //          // data = this.employees;
  //           // this.employees = data;
  //           console.log(data);
            
           
  //           //position: (employees as any).position
  //           //this.isLoading = false
  //         },
  //         error => {
  //           console.log("a?")
  //           this.errorMessage = <any>error
  //          // this.isLoading = false
  //         }
  //       );
  // }

  // public addEmployee() {
  //   //console.log("test-employeeadd")
  //   this.employeeService.addEmployee(this.employees).subscribe(data => {
  //     this.employees = data;
  //     console.log(data);
  //   });
  //   this.getEmployees();
  // }

  // addEmployees() {
  //   this.employeeService
  //   .addEmployee(this.addingEmployee)
  //   .subscribe(employee => this.employees.push(employee));
  // }


  // add() {
  //   this.employee=new Employee();
  //     this.employee.first_name= this.addingEmployee.controls['first_name'].value;
  //     this.employee.last_name= this.addingEmployee.controls['last_name'].value;
  //     this.employee.net= this.addingEmployee.controls['net'].value;
  //     this.employee.brutto= this.addingEmployee.controls['brutto'].value;
  //     this.employee.yearlynet= this.addingEmployee.controls['yearlynet'].value;
  //     this.employee.yearlybrut= this.addingEmployee.controls['yearlybrut'].value;
  //     this.employee.socialcostmonth= this.addingEmployee.controls['socialcostmonth'].value;
  //     this.employee.socialcostyear= this.addingEmployee.controls['socialcostyear'].value;
  //     this.employee.administrative= this.addingEmployee.controls['administrative'].value;
  //     this.employee.expenses= this.addingEmployee.controls['expenses'].value;
  //     this.employee.hardware= this.addingEmployee.controls['hardware'].value;
  //     this.employee.othercosts= this.addingEmployee.controls['othercosts'].value;
  //     this.employee.companycostperyear= this.addingEmployee.controls['companycostperyear'].value;
  //     this.employee.companycostpermonth= this.addingEmployee.controls['companycostpermonth'].value;
  //     // this.employeeimage= this.addingEmployee.controlsimage;
  //     this.employee.c1= this.addingEmployee.controls['c1'].value;
  //     this.employee.c2= this.addingEmployee.controls['c2'].value;
  //     this.employee.c3= this.addingEmployee.controls['c3'].value;
  //     this.employee.c4= this.addingEmployee.controls['c4'].value;
  //     this.employee.p1= this.addingEmployee.controls['p1'].value;
  //     this.employee.p2= this.addingEmployee.controls['p2'].value;
  //     this.employee.p3= this.addingEmployee.controls['p3'].value;
  //     this.employee.p4= this.addingEmployee.controls['p4'].value;
  //     console.log(this.employee);
  //     this.employeeService.Add(this.employee).subscribe(data => {
  //       console.log(data);
        
  
  //     })
  // }


}
