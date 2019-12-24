import { Component, OnInit, Input, Output, EventEmitter, Injectable } from '@angular/core';
import { Employee } from '../employee.model';
import { EmployeeService } from '../../employee.service';



@Component({
  selector: 'app-employee-list',
  templateUrl: './employee-list.component.html',
  styleUrls: ['./employee-list.component.css']
})
export class EmployeeListComponent implements OnInit {

  @Output() employeeWasSelected = new EventEmitter<Employee>();
  employees: Employee[];

  // employees: Employee[] = [
  //   new Employee( 'Darko', 'Z',	'111',	'150',	'200',	'1800',	'2400',	'50',	'600'	,'30',	'40',	'50',	'432.50',	'3032',	'2.38',	'19.08',	'400.68',	'4808.16',	'2',	'15.20',	'278.40',	'2906.50'),
  //   new Employee( 'Darko', 'Zzz',	'222',	'150',	'200',	'1800',	'2400',	'50',	'600'	,'30',	'40',	'50',	'432.50',	'3032',	'2.38',	'19.08',	'400.68',	'4808.16',	'2',	'15.20',	'278.40',	'2906.50')
  // ];

  //@Output() employees: Employee;

  // constructor() { }

  // ngOnInit() {
  //   console.log("test test");
  // }

  onEmployeeSelected(employees: Employee) {
    this.employeeWasSelected.emit(employees);
  }

  onEmployeeAdded(employee: Employee) {
    this.employees.push(employee);
  }
  

 
 
  //employees: any[];
  errorMessage: string;
 // isLoading: boolean = true;

  constructor(private employeeService: EmployeeService) {
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
           // console.log(data);
            
           
            //position: (employees as any).position
            //this.isLoading = false
          },
          error => {
            this.errorMessage = <any>error
           // this.isLoading = false
          }
        );
  }

}
