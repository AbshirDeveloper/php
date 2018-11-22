import { Component, OnInit } from '@angular/core';
import {ActivatedRoute, Params, Router} from '@angular/router';
import { AmanoService } from '../amano.service';
import { amano } from '../amano.interface';
import { Employee } from '../register';

@Component({
  selector: 'app-update',
  templateUrl: './update.component.html',
  styleUrls: ['./update.component.css']
})
export class UpdateComponent implements OnInit {

  constructor(private route: ActivatedRoute, private data: AmanoService, private router: Router) { }
  abshir:any;
  update(a){
  this.abshir = a;
  };
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

updateEmployee_office(){
  this.data
    .updateEmployee_office(this.model)
    .subscribe(()=> this.goBack());
}

goBack(){
  this.router.navigate(['amano']);
}

  
  amano:any;
  private sub: any;
  ngOnInit() {
    this.sub = this.route.params.subscribe(params => {
      this.id = +params['id']; // (+) converts string 'id' to a number

      // In a real app: dispatch action to load the details here.
   });
   this.getSingleEmployee();
  }
}

