import { Component, OnInit } from '@angular/core';
import { DaynService } from '../dayn/dayn.service';
import {ActivatedRoute, Params, Router} from '@angular/router';
import { check, cash, creds } from '../amano/amano.interface';


@Component({
  selector: 'app-balance',
  templateUrl: './balance.component.html',
  styleUrls: ['./balance.component.css']
})
export class BalanceComponent implements OnInit {

  constructor(private data:DaynService, private router:Router) { }

  localUser = new creds();

  hubin;
 reset(){
if(this.localUser.confirm_password !== this.localUser.password){
alert("Your password and confirm password don't match, please make sure they match");
return false;
}

this.hubin = prompt('Please enter you pin to make this change');

if(this.hubin !== '4359'){
  alert('Wrong pin');
  return false;
}

    this.data
      .updatepassword(this.localUser)
      .subscribe(()=> this.goBack());
 } 


  initial;
  initial_register(){

    this.hubin = prompt('Please enter you pin to make this change');
    
    if(this.hubin !== '4359'){
      alert('Wrong pin');
      return false;
    }   
    this.data
      .initial_register(this.initial)
      .subscribe(amanolist => {
      },()=> this.goBack());
}


cash: cash[];
cashs(){
  this.data.cashs().subscribe(
    daynlist => this.cash = daynlist
  )
}

pdf(){
  window.open("http://etawakalchi.com/php/pdf.php?id=4359");
}

goBack(){
  this.router.navigate(['Daynrout']);
}

  all = [];
  neg:any;
  da(){
    this.data.da().subscribe(
      amanolist => this.all = amanolist
    )

  }

  balance = [];
  bal(){
    this.data.bal().subscribe(
      amanolist => this.balance = amanolist
    )

  }


  all_am = [];
  am(){
    this.data.am().subscribe(
      amanolist => this.all_am = amanolist
    )

  }
  all_ca = [];
  ca(){
    this.data.ca().subscribe(
      amanolist => this.all_ca = amanolist
    )

  }


  ngOnInit() {
    this.da();
    this.am();
    this.ca();
    this.bal();
    this.cashs();

    this.localUser.id = window.localStorage.getItem('id');
  }

}
