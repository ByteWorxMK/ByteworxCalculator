import { Component, OnInit } from '@angular/core';

import { Router, ActivatedRoute } from '@angular/router';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { first } from 'rxjs/operators';


import { AuthenticationService } from '../_services/authentication.service';

import { UserService } from '../user.service';

import {User} from '.././user.model'

@Component({
  selector: 'app-login2',
  templateUrl: './login2.component.html',
  styleUrls: ['./login2.component.css']
})
export class Login2Component implements OnInit {

  email:any;
  password:any;
  user:User;
  login2Form:FormGroup;
  constructor(private router : Router,
  private fb : FormBuilder,
  private userService : UserService,
  ) { this.login2Form = this.fb.group({
    'email' : [""],
    'password' : [""]
  });}
 
  

  ngOnInit() {
    
  }


  gotomain () {
    this.user = new User();
    this.user.email = this.login2Form.controls['email'].value;
    this.user.password = this.login2Form.controls['password'].value;
    //console.log(this.user);
    this.userService.Login(this.user).subscribe(data => {
     // console.log("This is data: " + data);
        if(data != 0)
        {
          //localStorage.setItem('currentUser',"DAREEE");
          sessionStorage.setItem('currentUser',"DAREEE");
          this.router.navigateByUrl('/employees');

         // sessionStorage.setItem("email",this.user.email);
         
        }
        else{
          alert("User does not exist");
        }
    });
};

logout() {
  // remove user from local storage to log user out
  localStorage.removeItem('currentUser');
}

}
