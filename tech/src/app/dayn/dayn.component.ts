import { Component, OnInit } from '@angular/core';
import { dayn } from './dayn.interface';
import { dayn_add } from '../amano/register';
import { DaynService } from './dayn.service';
import { RouterLink } from '@angular/router';
import { RouterModule } from '@angular/router';
import {ActivatedRoute, Params, Router} from '@angular/router';

@Component({
  selector: 'app-dayn',
  templateUrl: './dayn.component.html',
  styleUrls: ['./dayn.component.css']
})
export class DaynComponent implements OnInit {

  constructor(private data: DaynService, private router: Router) { }

  reset(){
    this.model.name = '';
    this.model.phone_number = null;
    this.model.amount = null;
    this.model.days = null;
  }

  dayn: dayn[];
  getDayn(){
    this.data.getDayn().subscribe(
      daynlist => this.dayn = daynlist
    )
  }

  model = new dayn_add();
  addDayn(){
    this.data
      .addDayn(this.model)
      .subscribe(amanolist => {
        if(amanolist == 'no'){
          alert('This phone number already exists!');
          return false;
        }
        
      },()=> this.ngOnInit());
}
  goBack(){
    this.router.navigate(['Daynrout']);
  }

  value;

  all = [];
  neg:any;
  positive(){
    this.data.dayn_all().subscribe(
      amanolist => this.all = amanolist
    )

  }
  

  negative(){
    this.data.dayn_negative().subscribe(
      amanolist => this.neg = amanolist
    )

  }
  jawab:any;
  delete(a){
    this.jawab = confirm("Are you sure you want to delete this account? All his transactions history will be permenantly deleted");
    if(this.jawab == false){
      return false;
    } else {
    this.data
    .deleteEmployee(a)
    .subscribe(()=> this.ngOnInit());
  }
  }

  delete_all(a){
    this.jawab = confirm("Are you sure you want to delete this account? All his transactions history will be permenantly deleted");
    if(this.jawab == false){
      return false;
    } else {
    this.data
    .deleteEmployee_all(a)
    .subscribe(()=> this.ngOnInit());
  }
  }

  updateEmployee(){
    this.data
      .updateEmployee(this.model)
      .subscribe(()=> this.ngOnInit());
  }

  val = 0
  overall:any;
  over(){
      this.data.overall(this.val).subscribe(
        amanolist => this.overall = amanolist
      )

    }
    
  ngOnInit() {
    this.value;
    this.getDayn()
    this.positive();
    this.negative();
    this.over(); 
  }

}