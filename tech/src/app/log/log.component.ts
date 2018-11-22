import { Component, OnInit } from '@angular/core';
import { AuthService } from '../auth.service';
import { DaynService} from '../dayn/dayn.service'
import { RouterLink } from '@angular/router';
import { RouterModule } from '@angular/router';
import {ActivatedRoute, Params, Router} from '@angular/router';
import { HomeComponent } from '../home/home.component';
import { cred, auths } from '../amano/register';



@Component({
  selector: 'app-firstpage',
  templateUrl: './log.component.html',
  styleUrls: ['./log.component.css']
})
export class LogComponent implements OnInit {

  localUser = new cred();
  fullImagePath:string;
  constructor(private auth: AuthService, private router:Router, private route:ActivatedRoute, private data:DaynService) {
    this.fullImagePath = '/assets/images/cash.png';
   }

  name='';
  result;
  login(){
   this.auth
     .getEmployee(this.localUser)
     .subscribe(employee =>{
    if(employee[1] == 'success'){
      window.localStorage.setItem('auth_key', 'success');
      window.localStorage.setItem('id', employee[0]);
      this.router.navigate(['/login']);
    }; 

    if(employee[1] == 'failed'){
      window.localStorage.setItem('auth_key', 'failed');
      window.alert('Wrong credentials');
    }
         })
 };

 i:any;
 auths = new auths();
 notify:any;

 get(){
    this.data.getauth().subscribe(
      daynlist => this.auths = daynlist
    )
    for(this.i = 0; this.i < 10; this.i++){
      if(this.auths.email[this.i] == this.localUser.username){
        alert('correct');
      } else {
        alert('wrong');
      }
    }
 }


 authenticated:boolean = false;
 try(){
 if(window.localStorage.getItem('auth_key') == 'success'){
 this.authenticated = true;
 }
 
 }
sub;
id;
  ngOnInit() {
    console.log(window.localStorage.getItem('auth_key'))
    this.sub = this.route.params.subscribe(params => {
      this.id = +params['id']; // (+) converts string 'id' to a number

      // In a real app: dispatch action to load the details here.
   })

   document.getElementById('id01').style.display='block';

  //  this.get();
  }

  // login(){
  // this.auth.authenticatenow(this.localUser);
 
  // }



  goBack(){
    
  }

}
