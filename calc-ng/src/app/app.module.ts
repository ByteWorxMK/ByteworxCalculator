import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { Routes, RouterModule } from '@angular/router';
import { FormsModule,ReactiveFormsModule } from '@angular/forms';
import {HttpModule} from "@angular/http";

import { HttpClientModule ,HttpClient } from '@angular/common/http';
import { AppComponent } from './app.component';
import { HomeComponent } from './home/home.component';
import { CompaniesComponent } from './companies/companies.component';
import { Employees2Component } from './employees2/employees2.component';


import { EmployeeListComponent } from './employee/employee-list/employee-list.component';
import { EmployeeDetailComponent } from './employee/employee-detail/employee-detail.component';
import { CompanyComponent } from './company/company.component';
import { HeaderComponent } from './header/header.component';
import { EmployeeComponent } from './employee/employee.component';
import { EmployeeItemComponent } from './employee/employee-list/employee-item/employee-item.component';

import { EmployeeEditComponent } from './employee/employee-list/employee-edit/employee-edit.component';
import { RegisterComponent } from './register/register.component';
import { AuthenticationService } from './_services/authentication.service';
import { Login2Component } from './login2/login2.component';
import { AuthGuard } from './_guards/auth.guard';
//import { LoginComponent } from './login/login.component';
import { NgxCurrencyModule } from "ngx-currency";


const routes: Routes = [
  { path: '', component: HomeComponent, pathMatch: 'full', canActivate: [AuthGuard] },
  { path: 'companies', component: CompanyComponent },
  { path: 'employees', component: EmployeeComponent },
  { path: 'login', component: Login2Component},
  { path: 'register', component: RegisterComponent },
  //{ path: '**', redirectTo: '', pathMatch: 'full' }
];

@NgModule({
  declarations: [
    AppComponent,
    HomeComponent,
    CompaniesComponent,
    Employees2Component,
    CompanyComponent,
    HeaderComponent,
    EmployeeComponent,
    EmployeeItemComponent,
    EmployeeEditComponent,
    EmployeeListComponent,
    EmployeeDetailComponent,
    RegisterComponent,
    Login2Component,
   
  ],
  imports: [
    BrowserModule,
    HttpModule,
    HttpClientModule,
    FormsModule,
    ReactiveFormsModule,
    RouterModule.forRoot(routes),
    NgxCurrencyModule,
    
  ],
  providers: [AuthGuard],
  bootstrap: [AppComponent]
})
export class AppModule { }
