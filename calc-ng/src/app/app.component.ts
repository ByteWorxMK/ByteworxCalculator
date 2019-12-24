import { Component, Input, Injectable } from '@angular/core';


import { Employee } from './employee/employee.model';

import { AuthGuard } from './_guards/auth.guard';

@Injectable()

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'calc-ng';

  loadedFeature = 'employees';
  
  constructor( public authGuard: AuthGuard) {}

  @Input() employeeData: Employee;

  onNavigate(menu: string) {
    this.loadedFeature = menu;
  }

  

}
