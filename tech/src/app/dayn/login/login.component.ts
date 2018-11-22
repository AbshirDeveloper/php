import { Component, OnInit } from '@angular/core';
import { DaynService } from '../dayn.service';
import {ActivatedRoute, Params, Router} from '@angular/router';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
  localUser = {
    username: '',
    password: ''
  }

  isAuthenticated: boolean = false;
  constructor(private data:DaynService, private router:Router) { }

  ngOnInit() {
  }

  login(){
  }

  goBack(){
    this.router.navigate(['home']);
  }
}
