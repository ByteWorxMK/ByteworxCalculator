import { Component, OnInit } from '@angular/core';

import { Router, ActivatedRoute } from '@angular/router';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { first } from 'rxjs/operators';


import { AuthenticationService } from '../_services/authentication.service';

import { UserService } from '../user.service';

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.css'],
})
export class RegisterComponent implements OnInit {

  registerForm: FormGroup;
  loading = false;
  submitted = false;
  returnUrl: string;
  error = '';

  constructor(
      private formBuilder: FormBuilder,
      private route: ActivatedRoute,
      private router: Router,
      private authenticationService: AuthenticationService, 
      private userService: UserService) {
        this.registerForm = this.formBuilder.group({
          'email' : [""],
          'password' : [""],
          'name' : [""],
          'c_password' : [""]

      } 
      )};

  ngOnInit() {
      

      // reset login status
      this.authenticationService.logout();

      // get return url from route parameters or default to '/'
      this.returnUrl = this.route.snapshot.queryParams['returnUrl'] || '/';
  }

  // convenience getter for easy access to form fields
  get f() { return this.registerForm.controls; }

//   onSubmit() {
//       this.submitted = true;
//       console.log(this.loginForm.controls["username"].value);
//       // stop here if form is invalid
//       if (this.loginForm.invalid) {
//           return;
//       }

//       this.loading = true;
//       this.authenticationService.login(this.loginForm.controls['username'].value, this.loginForm.controls['password'].value)
          
//           .subscribe(
//               data => {
//                   this.router.navigate([this.returnUrl]);
//               },
//               error => {
//                   this.error = error;
//                   this.loading = false;
//               });
//   }

    addUser() {
   // console.log(this.loginForm.value);
    this.userService
    .addUser(this.registerForm.value)
    .subscribe(user => 
      console.log("THIS" + user))
      //this.employees.push(employee)
      
  }

}
