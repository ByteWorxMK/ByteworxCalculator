import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

import { User } from '../user.model';
import { environment } from '../../environments/environment'

//@Injectable({ providedIn: 'root' })

//const API_URL = "http://localhost:8000";

const API_URL= environment.a_url;

export class UserService {
    constructor(private http: HttpClient) { }



    getAll() {
        return this.http.get<User[]>(API_URL + '/users');
    }
}