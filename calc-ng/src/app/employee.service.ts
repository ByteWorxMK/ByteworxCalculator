import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { HttpHeaders } from '@angular/common/http';

import { Http, Headers, RequestOptions } from '@angular/http';
import { throwError ,Observable, from } from 'rxjs';
// import { map } from "rxjs/operators";
import { tap, catchError, map} from 'rxjs/operators';

import { environment } from '../environments/environment'



export interface Employee {
  id: Number,
  position: String,
  role: String,
  first_name: String,
  last_name: String,
  net: String,
  brutto: String,
  yearlynet: String,
  yearlybrut: String,
  socialcostmonth: String,
  socialcostyear: String,
  administrative: String,
  expenses: String,
  hardware: String,
  othercosts: String,
  companycostperyear: String,
  companycostpermonth: String,
  image: String,
  c1: String,
  c2: String,
  c3: String,
  c4: String,
  p1: String,
  p2: String,
  p3: String,
  p4: String,
  isUpdating: boolean,
}

interface Test {
  rezultati: Employee[];
}

const API_URL= environment.a_url;


const httpOptions = {
  headers: new HttpHeaders({
  'Access-Control-Allow-Origin': '*'
})
};

@Injectable({
  providedIn: 'root'
})


export class EmployeeService /* implements Employee*/{

  // id: Number;
  // position: String;
  // role: String;
  // first_name: String;
  // last_name: String;
  // net: String;
  // brutto: String;
  // yearlynet: String;
  // yearlybrut: String;
  // socialcostmonth: String;
  // socialcostyear: String;
  // administrative: String;
  // expenses: String;
  // hardware: String;
  // othercosts: String;
  // companycostperyear: String;
  // companycostpermonth: String;
  // image: String;
  // c1: String;
  // c2: String;
  // c3: String;
  // c4: String;
  // p1: String;
  // p2: String;
  // p3: String;
  // p4: String;
  // isUpdating: boolean;

  private employees: Employee[];

  constructor(private http: HttpClient, /*employeeData:any*/) { 
    //console.log("are they called?2");
      // this.id = employeeData.id,
      // this.position= employeeData.position,
      // this.role= employeeData.role,
      // this.first_name= employeeData.first_name,
      // this.last_name= employeeData.last_name,
      // this.net= employeeData.net,
      // this.brutto= employeeData.brutto,
      // this.yearlynet= employeeData.yearlynet,
      // this.yearlybrut= employeeData.yearlybrut,
      // this.socialcostmonth= employeeData.socialcostmonth,
      // this.socialcostyear= employeeData.socialcostyear,
      // this.administrative= employeeData.administrative,
      // this.expenses= employeeData.expenses,
      // this.hardware= employeeData.hardware,
      // this.othercosts= employeeData.othercosts,
      // this.companycostperyear= employeeData.companycostperyear,
      // this.companycostpermonth= employeeData.companycostpermonth,
      // this.image= employeeData.image,
      // this.c1= employeeData.c1,
      // this.c2= employeeData.c2,
      // this.c3= employeeData.c3,
      // this.c4= employeeData.c4,
      // this.p1= employeeData.p1,
      // this.p2= employeeData.p2,
      // this.p3= employeeData.p3,
      // this.p4= employeeData.p4,
      // this.isUpdating= employeeData.isUpdating
      
    
    this.init();
  }

  async init() {
    
  }

  // getEmployees() {
  //   // now returns an Observable of Config
  //   return this.http.get<Employee[]>(API_URL + '/api/employee');
  // }

  private handleError(error: any) {
    console.error(error);                                       //Created a function to handle and log errors, in case
    return throwError(error);
  }

  getEmployees(): Observable<any>{
   //console.log("testh")
    return this.http.get<any>(API_URL + '/api/employee', httpOptions)
    .pipe(map(result=>result.data));
    //.pipe(map(data=> this.data || []));
   
    
       // new RequestOptions({ headers: this.headers })
    
    // .pipe(map(res => {
    //   let modifiedResult = res.json().data
    //         modifiedResult = modifiedResult.map(function(employee) {
    //           employee.isUpdating = false;
    //     return employee;
    //   });
    //   return modifiedResult;
    // });
    // )
    
    //.map(res => res);

    // .pipe(map(res => {
    //   let modifiedResult
    //         modifiedResult = modifiedResult.map(function(employee) {
    //           employee.isUpdating = false;
    //     return employee;
    //   });
    //   return modifiedResult;
    // })
    // );

  }
  // addPlayer(employee): Observable<Employee> {
  //   return this.http.post(API_URL + '/api/employee', employee,
  //      // new RequestOptions({ headers: this.headers })
  //   )
  // }
  // deletePlayer(id): Observable<any> {
  //   return this.http.delete(API_URL + '/api/employee/' + id,
  //      // new RequestOptions({ headers: this.headers })
  //   );
  // }

   addEmployee( employee: any ) {
    // employee.id=null;
    //console.log("test-add")
    //console.log(employee);
    return this.http.post<any>(API_URL + '/api/employee', employee).pipe(
    tap(data => {
      return console.log(data);
     
    }));
  }
   
    
  //   );
  // }
  // onEmployeeAdded(employee: Employee) {
  //   this.employees.push(employee);
  // }



  // createEmployee(employee): Observable<Employee> {
  //   return this.http.post<Employee>(API_URL + '/api/employees', JSON.stringify(employee))
  //   .pipe(
      
  //     catchError(this.handleError)
  //   )
  // } 

  // addEmployee(): Observable<Employee> {
  //   return this.http.post<Employee>(API_URL + '/api/employees' )
  //   .pipe(
  //     catchError(this.handleError('addEmployee'))
  //     );
  // }

  editEmployee( employee: any ) {
    // employee.id=null;
    //console.log("test-add")
    return this.http.put<any>(API_URL + '/api/employee', employee).pipe(
    tap(data => {
      return console.log(data);
     
    }));
  }

  deleteEmployee(id){
    return this.http.delete<any>(API_URL + '/employees/' + id)
    .pipe(
     
      catchError(this.handleError)
    )
  }

}
