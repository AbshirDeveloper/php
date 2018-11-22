import { Injectable } from '@angular/core';
import { Http, Headers} from '@angular/http';

@Injectable()
export class AuthService {
  isAuthenticated: boolean = false;
  constructor(private http:Http) { }
  authenticatenow(usercreds){
    var headers = new headers();
    var creds = 'name=' + usercreds.username + '&password=' + usercreds.password;

    headers.append('Content-Type', 'application/X-www.form-urlencoded');
  }
}
