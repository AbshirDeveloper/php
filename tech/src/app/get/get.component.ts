import { Component, OnInit, Output, OnChanges } from '@angular/core';

import { amano, mid } from '../amano/amano.interface';
// import { amanoBalance } from './amano.interface';
import { AmanoService } from '../amano/amano.service';
import { RouterLink } from '@angular/router';
import { RouterModule } from '@angular/router';
import { Employee } from '../amano/register';
import {ActivatedRoute, Params, Router} from '@angular/router';
import { AmanoTranComponent } from '../amano-tran/amano-tran.component';
@Component({
  selector: 'app-get',
  templateUrl: './get.component.html',
  styleUrls: ['./get.component.css']
})
export class GetComponent implements OnInit {

  constructor(private data:AmanoService, private router: Router ) { }

  // total:number;
  // balance(a){
  //   this.data.getAmanoBal(a).subscribe(
  //     amanolist => this.total = amanolist
  //   )
  //   return this.total;
  // }

  // tot: amano[];

  // totale(a){
  //   this.data.gettotal(a).subscribe(
  //     total => this.tot = total
  //   )
  // }
  jawab:any;
  delete(a){
    this.jawab = confirm("Are you sure you want to delete this account? All his transactions history will be permenantly deleted");
    if(this.jawab == false){
      return false;
    } else {
    this.data
    .deleteEmployee(a)
    .subscribe(()=> this.goBack());
  }
  }
  model = new Employee();
  addEmployee(){
      this.data
        .addEmployee_office(this.model)
        .subscribe(amanolist => {
          if(amanolist === 'no'){
            alert('This phone number already exists!');
            return false;
          }
        },()=> this.goBack());
  }

  goBack(){
    this.router.navigate(['home']);
  }

  amano: amano[];
  getAmano(){
    this.data.getAmano_history().subscribe(
      amanolist => this.amano = amanolist
    )
  }



  all = [];
  neg;


  // id = 26;
  // balance:any;

  // getAmanoBalance(){
  //   this.data.getAmanoBalance(this.id).subscribe((amanobalance => this.balance = amanobalance))

  // }

  value:string;

  show:boolean = true;

  negative(){

      this.data.t_negative(this.value).subscribe(
        amanolist => this.neg = amanolist
      )
    }
  positive(){
      this.data.t_all_office(this.value).subscribe(
        amanolist => this.all = amanolist
      )

    }
  

check(){
  if(this.value === 'All' || this.value === ''){
    this.show = true;
  } else{
   this.show = false; 
  }
}

  ngOnInit() {
    this.getAmano();
    // this.getAmanoBalance();
    this.check();
    this.negative();
    this.positive();
    this.over(); 
  }

  val = 0
  overall:any;
  over(){
      this.data.overall(this.val).subscribe(
        amanolist => this.overall = amanolist
      )

    }

  ngOnChanges(){
  
  }

}
