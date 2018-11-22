import { Component, OnInit } from '@angular/core';
import { AmanoService } from '../../amano/amano.service'
import { checks } from '../../amano/register';
import { RouterLink } from '@angular/router';
import {ActivatedRoute, Params, Router} from '@angular/router';

@Component({
  selector: 'app-upcheck',
  templateUrl: './upcheck.component.html',
  styleUrls: ['./upcheck.component.css']
})
export class UpcheckComponent implements OnInit {

  constructor(private data:AmanoService, private router:Router, private route:ActivatedRoute) { }

  model = new checks();
  updatecheck(){
    this.data
      .updatecheck(this.model)
      .subscribe(()=> this.goBack());
}

goBack(){
  this.router.navigate(['/home']);
}

single_check(){
  this.data
  .singlecheck(this.id)
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
   this.single_check();
  }

}
