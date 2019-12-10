import { Injectable } from '@angular/core';
import { HttpResponse, HttpRequest, HttpClient } from '@angular/common/http';
import { HttpHeaders } from '@angular/common/http';
import { throwError ,Observable, from } from 'rxjs';
// import { map } from "rxjs/operators";
import { tap, catchError, map} from 'rxjs/operators';


export interface User {
  name: String,
  username: String, 
  password: String, 
}


const API_URL: string = 'http://localhost:8000';



const httpOptions = {
  headers: new HttpHeaders({
  'Accept': 'application/json',
  'Authorization': 'Bearer my-auth-token'
})
};

httpOptions.headers =
  httpOptions.headers.set('Authorization', 'my-new-auth-token');

@Injectable({
  providedIn: 'root'
})

export class UserService {

  private users: User[];

  constructor(private http: HttpClient) { 
    this.init();
  }

  async init() {
    
  }

  private handleError(error: any) {
    console.error(error);                                       //Created a function to handle and log errors, in case
    return throwError(error);
  }

  getUsers(): Observable<any>{
    console.log("test-users")
     return this.http.post<any>(API_URL + '/api/details',
     httpOptions)
     .pipe(map(result=>result.data));
    //.pipe(catchError(this.handleError()))
  }


  addUser( user: any ) {
    // employee.id=null;
    //console.log("test-add")
    return this.http.post<any>(API_URL + '/api/register', user).pipe(
    tap(data => {
      return console.log(data);
     
    }));
  }

  Login( user: User ) {
    return this.http.post<any>(API_URL + "/api/login", user, httpOptions).pipe();
  }


}
