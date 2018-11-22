import { Component, OnInit } from '@angular/core';
import { AmanoService } from '../amano/amano.service';
import { check, cash } from '../amano/amano.interface';
import {ActivatedRoute, Params, Router} from '@angular/router';
import { cashs, checks } from '../amano/register';
import { RouterLink } from '@angular/router';
import { RouterModule } from '@angular/router';


@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {

  constructor(private route: ActivatedRoute, private data:AmanoService, private router:Router) { }
  id:number;
  val = 0
  overall:any;
  over(){
      this.data.overall(this.val).subscribe(
        amanolist => this.overall = amanolist
      )

    }

    check: check[];
    checks(){
      this.data.checks().subscribe(
        daynlist => this.check = daynlist
      )
    }

    cash: cash[];
    cashs(){
      this.data.cashs().subscribe(
        daynlist => this.cash = daynlist
      )
    }
  
  check_model = new checks();
  register_check(){
    this.data
    .addcheck(this.check_model)
    .subscribe(amanolist => {
      if(amanolist == 'noo'){
        alert('This phone number already exists!');
        return false;
      }
    },()=> this.goBack());
  }

  drop_model;
  drop(){
    this.data
    .drop(this.drop_model)
    .subscribe(amanolist => {
    },()=> this.goBack());
  }

  goBack(){
    this.router.navigate(['/rer']);
  }

  update_check(){
    alert("success update");
  }

  
  register_cash(){
    this.data
    .addcash(this.cash_model)
    .subscribe(amanolist => {
      if(amanolist == 'noo'){
        alert('This phone number already exists!');
        return false;
      }
    },()=> this.goBack());

      }


  inform(){
  this.hubin = confirm('Ar you sure you want to inform check owners for deposit');
  if(this.hubin == true){
  this.hubin = prompt('Enter your password for this');
  if(this.hubin == '4359'){
    this.data.inform().subscribe(()=>this.goBack());
  } else {
    alert('Wrong password');
    return false;
  }
  }
  }    
hubin;
    

sigad='Pending for Approval';
register_deposit(){
      
this.hubin = prompt('Please enter your password');
if(this.hubin !== '4359'){
  alert('wrong or no password given');
return false;
}
        this.data
        .addeposit(this.sigad)
        .subscribe(amanolist => {
          if(amanolist == 'noo'){
            alert('This phone number already exists!');
            return false;
          }
        },()=> this.goBack());
    
          }
    
update_cash(){
  alert("success update");  
      }


single_check(){
  this.data
  .singlecheck(this.id)
  .subscribe(employee =>{
      this.check_model = employee[0];
      })
}
cash_model = new cashs();
single_cash(){
  this.data
  .singlecash(this.id)
  .subscribe(employee =>{
      this.cash_model = employee[0];
      })
}

jawab;

delete_ca(a){
  this.jawab = confirm("are you sure you want to delete this cash?");
  if(this.jawab == false){
    return false;
  }

  this.data
  .delete_ca(a)
  .subscribe(()=> this.goBack());

}

ja;

delete_ch(a){
  this.ja = confirm("are you sure you want to delete this check?");
  if(this.ja == false){
    return false;
  }

  this.data
  .delete_ch(a)
  .subscribe(()=> this.goBack());

}

value_check;
check_all = [];
check_total(){
    this.data.check_total(this.value_check).subscribe(
      amanolist => this.check_all = amanolist
    )

  }

value;
cash_all = [];
cash_total(){
    this.data.cash_total(this.value).subscribe(
      amanolist => this.cash_all = amanolist
    )

  }

authenticated:boolean = false;


sub:any;
  ngOnInit() {
    this.over(); 
    this.checks();
    this.cashs();
    this.check_total();
    this.cash_total();
    this.authenticated;

    this.sub = this.route.params.subscribe(params => {
      this.id = +params['id']; // (+) converts string 'id' to a number

      // In a real app: dispatch action to load the details here.
   });
   if(this.id){
    this.single_cash();
   }
   
  }

}
