import { Component, OnInit, Input } from '@angular/core';


import { Company } from './company.model'
import { CompanyService } from '../company.service';
import { FormBuilder, FormGroup } from '@angular/forms';


@Component({
  selector: 'app-company',
  templateUrl: './company.component.html',
  //template: '<p> company works!</p><ul class="list-group" *ngFor="let employeeEL of employees" [employee]="employeeEL"><a class="list-group-item"> {{ employee.first_name }} </a></ul>',
  styleUrls: ['./company.component.css']
})
export class CompanyComponent implements OnInit {

  // employeesData: Employee[] = [
  //   new Employee( 22, 'operative', 'Android Developer',	'Darko', 'Z',	'111',	'150',	'200',	'1800',	'2400',	'50',	'600'	,'30',	'40',	'50',	'432.50',	'3032',	'252.67',	'2.38',	'19.08',	'400.68',	'4808.16',	'2',	'15.20',	'278.40',	'2906.50', true)
  // ];

  addingCompany: FormGroup;


  companies: Company[];
 
  //employees: any[];
  errorMessage: string;
 // isLoading: boolean = true;
 public breakpoint: number; // Breakpoint observer code

  constructor(private companyService: CompanyService, public fb: FormBuilder) {
    this.addingCompany= fb.group({  
    "company_name": [''],
    "vacation_days": [''],
    "sick_days": [''],
    "working_days": [''],
    "billability": [''],
    "billability_year": [''],
    "effective_days": [''],
    "expected_profit": [''],
   })
    //console.log("are they called (companies)?");
    //this.init();
   }

  //employeesObservable: Observable<Employee[]>;
  async ngOnInit() {
    this.breakpoint = window.innerWidth <= 600 ? 1 : 2;
    // this.getEmployees().subscribe( employees => {
    //   this.employees = employees;
    // });
    //this.employeesObservable = this.employeeService.getEmployees();
   this.getCompanies();
   //console.log(this.getEmployees());

  //  this.employeeService.getEmployees().subscribe(
     
  //   employees=>  {
  //     this.employees = employees;
  //     console.log(employees);
  //   }
  // )

  }

  getCompanies() {
    
    this.companyService
        .getCompanies()
        
        .subscribe(
          data2 => {
            //console.log(data2)
            this.companies = data2;
           // data = this.employees;
            // this.employees = data;
            //console.log(data2[0].company_name);
            
           
            //position: (employees as any).position
            //this.isLoading = false
          },
          error => {
           // console.log("ok")
            this.errorMessage = <any>error
           // this.isLoading = false
          }
        );
  }


  addCompany() {
    //(this.addingCompany.value);
    this.companyService
    .addCompany(this.addingCompany.value)
    .subscribe(company => 
      //console.log("THIS" + company)
      this.getCompanies() + company
      )
      this.addingCompany.reset()
      //this.employees.push(employee)
      
  }

  calcCompany() {
    this.addingCompany.value["effective_days"] = this.addingCompany.value["working_days"] - this.addingCompany.value["vacation_days"] - this.addingCompany.value["sick_days"] ;
    this.addingCompany.controls["effective_days"].setValue(this.addingCompany.value["effective_days"]);
  
    this.addingCompany.value["billability_year"] = this.addingCompany.value["effective_days"] - (this.addingCompany.value["billability"]/100) ;
    this.addingCompany.controls["billability_year"].setValue(this.addingCompany.value["billability_year"]);
  
  
   
  }


 
}
