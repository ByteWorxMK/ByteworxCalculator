import { Injectable } from '@angular/core';
import { Router, CanActivate, ActivatedRouteSnapshot, RouterStateSnapshot } from '@angular/router';

@Injectable({ providedIn: 'root' })
export class AuthGuard implements CanActivate {

    isLogged = false;

    constructor(private router: Router) { }

    canActivate(route: ActivatedRouteSnapshot, state: RouterStateSnapshot) {
        if (sessionStorage.getItem('currentUser')) {
            // logged in so return true
        this.isLogged=true;
            return true;

        }
        else{
            this.router.navigate(['/login'], { queryParams: { returnUrl: state.url }});
            this.isLogged=false;
        }
        // not logged in so redirect to login page with the return url
        //return false;

        
    }

    logout() {
        this.isLogged= false;
        sessionStorage.removeItem('currentUser');
    }
}