import { Injectable } from '@angular/core';
import { HttpClientModule, HttpClient  } from '@angular/common/http';
import { HttpHeaders } from '@angular/common/http';
import { map } from 'rxjs/operators';
import { environment } from '../../environments/environment';
import { Observable } from 'rxjs';

//const API_URL="http://localhost:8000"

const API_URL= environment.a_url;

const httpOptions = {
    headers: new HttpHeaders({
    'Access-Control-Allow-Origin': '*',
    'Accept': 'application/json',
    'Authorization': 'my-auth-token'
  })
  };
  
  httpOptions.headers =
    httpOptions.headers.set('Authorization', 'my-new-auth-token');
  

@Injectable({ 
    providedIn: 'root'
})

export class AuthenticationService {
    constructor(private http: HttpClient ) { }

    // login(username: string, password: string) :Observable<any>{
    //     return this.http.post<any>(API_URL +'api/details' ,   httpOptions ) //`${config.apiUrl}/users/authenticate  

    //     // {
    //     //     "email": "darko.zmejkovski@byteworx.eu",
    //     //     "password": "12345678",
    //     //     },

    //         .pipe(map(user => {
    //             // login successful if there's a jwt token in the response
    //             if (user && user.token) {
    //                 // store user details and jwt token in local storage to keep user logged in between page refreshes
    //                 sessionStorage.setItem('currentUser', JSON.stringify(user));
    //             }

    //             return user;
    //         }));
    // }

    logout() {
        // remove user from local storage to log user out
        sessionStorage.removeItem('currentUser');
    }
}