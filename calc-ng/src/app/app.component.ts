import { Component, Input } from '@angular/core';


import { Employee } from './employee/employee.model';

import { AuthGuard } from './_guards/auth.guard';


@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'calc-ng';

  loadedFeature = 'employees';
  
  constructor( private authGuard: AuthGuard) {}

  @Input() employeeData: Employee;

  onNavigate(menu: string) {
    this.loadedFeature = menu;
  }

  

}
