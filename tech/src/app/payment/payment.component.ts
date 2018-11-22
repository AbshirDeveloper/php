import { Component, OnInit } from '@angular/core';
import { DaynService } from '../dayn/dayn.service';
import {ActivatedRoute, Params, Router} from '@angular/router';
import { Employee, paid } from '../amano/register';

@Component({
  selector: 'app-payment',
  templateUrl: './payment.component.html',
  styleUrls: ['./payment.component.css']
})
export class PaymentComponent implements OnInit {

  constructor(private data: DaynService, private router:Router, private route: ActivatedRoute,) { }

  id: number;
  
  
   model = new Employee;
   getSingleEmployee(){
    
    this.data
      .getEmployee(this.id)
      .subscribe(employee =>{
          this.model = employee[0];
          })
  };
  
  updateEmployee(){
      this.data
        .updateEmployee(this.model)
        .subscribe(()=> this.goBack());
  }

  goBack(){
    this.router.navigate(['dayn']);
  }

  paid = new paid;

  check(){
  }
  pay(){
    if(this.paid.paid < this.model.balance){

    this.data
    .pay(this.paid)
    .subscribe(()=> this.goBack());
  } else { 
  alert("You can't pay more than you owe!");
  return false;
  }
}
  transfer(){
    if(this.model.type == 'NULL'){
      this.open();
    }
  }

  open(){
    this.data
    .open(this.id)
    .subscribe(()=> this.goBack());
  }
  private sub: any;
  ngOnInit() {
    this.sub = this.route.params.subscribe(params => {
      this.id = +params['id']; // (+) converts string 'id' to a number

      this.paid.id = this.id;

      // In a real app: dispatch action to load the details here.
   })
   this.getSingleEmployee();
   this.check();
   this.transfer();
  }

}
