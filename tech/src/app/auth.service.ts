import { Injectable } from '@angular/core';
import { Http, Headers, Response } from '@angular/http';
import 'rxjs/add/operator/map';
import { Observable } from 'rxjs/Observable';

@Injectable()
export class AuthService {
  isAuthenticated: boolean = false;
  constructor(private http: Http) { }
  name = 'Abshir';
  // authenticatenow(usercreds) {
  //   var headers = new Headers();
  //   var creds = 'name=' + usercreds.username + '&password=' + usercreds.password;

  //   headers.append('Content-Type', 'application/X-www-form-urlencoded');

  //   this.http.post('http://etawakalchi.com/php/auth.php', usercreds).subscribe((data)=> {
  //     if(data.json()) {
  //       window.localStorage.setItem('auth_key', data.json().token);
  //       this.isAuthenticated = true;
  //     }
  //   })
  // }

  getEmployee(info): Observable<any>{
    return this.http.post("http://etawakalchi.com/php/auth.php",info)
      .map((response: Response)=> response.json());
  }
}
