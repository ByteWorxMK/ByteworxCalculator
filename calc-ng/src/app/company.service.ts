import { Injectable } from '@angular/core';
import { HttpClient, HttpClientModule  } from '@angular/common/http';

import { Http, Headers, RequestOptions } from '@angular/http';
import { Observable } from 'rxjs';

import { tap, catchError, map} from 'rxjs/operators';


export interface Company {
    company_name: String,
    vacation_days: String, 
    sick_days: String, 
    working_days: String,
    billability: String, 
    billability_year: String,
    effective_days: String,
    expected_profit: String
}



const API_URL: string = 'http://localhost:8000';

@Injectable({
  providedIn: 'root'
})
export class CompanyService /* implements Employee*/{



    
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

  constructor(private http: HttpClient, /*employeeData:any*/) { 
    // console.log("are they called?2");
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

  

  getCompanies(): Observable<any>{
   //console.log("company test");
    return this.http.get<any>(API_URL + '/api/company_index')
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
  addCompany( company: any ) {
    // employee.id=null;
    //console.log("test-add")
    return this.http.post<any>(API_URL + '/api/company_index', company).pipe(
    tap(data => {
      return data;//console.log(data);
     
    }));
  }

  

}
