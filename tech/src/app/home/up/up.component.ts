import { Component, OnInit } from '@angular/core';
import { AmanoService } from '../../amano/amano.service'
import { cashs } from '../../amano/register';
import { RouterLink } from '@angular/router';
import {ActivatedRoute, Params, Router} from '@angular/router';

@Component({
  selector: 'app-up',
  templateUrl: './up.component.html',
  styleUrls: ['./up.component.css']
})
export class UpComponent implements OnInit {

  constructor(private data:AmanoService, private router:Router, private route:ActivatedRoute) { }

  model = new cashs();
  updatecash(){
    this.data
      .updatecash(this.model)
      .subscribe(()=> this.goBack());
}

goBack(){
  this.router.navigate(['/home']);
}
single_cash(){
  this.data
  .singlecash(this.id)
  .subscribe(employee =>{
      this.model = employee[0];
      })
}

sub;
id;
  ngOnInit() {
    this.sub = this.route.params.subscribe(params => {
      this.id = +params['id']; // (+) converts string 'id' to a number

      // In a real app: dispatch action to load the details here.
   });

   this.single_cash();
  }

}
