import { Component, OnInit, Input } from '@angular/core';
// import { amanoBalance } from './amano.interface';
import { bal } from '../amano/register';
// import { RouterLink } from '@angular/router';
// import { RouterModule } from '@angular/router';
import {ActivatedRoute, Params, Router} from '@angular/router';
import { AmanoService } from '../amano/amano.service';
import { amano } from '../amano/amano.interface';
import { FilterPipe } from './filter.pipe';

@Component({
  selector: 'app-amano-tran',
  templateUrl: './amano-tran.component.html',
  styleUrls: ['./amano-tran.component.css'],
  providers: [AmanoService],
})
export class AmanoTranComponent implements OnInit {
  magac:string = ""
  constructor(private route: ActivatedRoute, private data: AmanoService, private router: Router) { }

  
  des:string;
  amount:number;
  model = new bal();

  // withdraw(){
  // if(this.model.id){
  // this.data
  //   .withbal(this.model)
  //   .subscribe(()=> this.goBack());
  // } else {
  //   this.stay();
  // }
  // }

  withdraw_amano(){
    if(this.model.id){
    this.data
      .withbal(this.model)
      .subscribe(()=> this.goBack_amano());
    } else {
      this.stay();
    }
    }

    withdraw_office(){
      if(this.model.id){
      this.data
        .withbal(this.model)
        .subscribe(()=> this.goBack_office());
      } else {
        this.stay();
      }
      }

      withdraw_dayn(){
        if(this.model.id){
        this.data
          .withbal(this.model)
          .subscribe(()=> this.goBack_dayn());
        } else {
          this.stay();
        }
        }

  add_amano(){
    if(this.model.id){
    this.data
    .addbal(this.model)
    .subscribe(()=> this.goBack_amano());
    } else {
      this.stay();
    }
  }

  add_office(){
    if(this.model.id){
    this.data
    .addbal(this.model)
    .subscribe(()=> this.goBack_office());
    } else {
      this.stay();
    }
  }

  add_dayn(){
    if(this.model.id){
    this.data
    .addbal(this.model)
    .subscribe(()=> this.goBack_dayn());
    } else {
      this.stay();
    }
  }

  stay(){
    this.router.navigate(['transaction/id']);
  }

  
  goBack_amano(){
    this.router.navigate(['amano']);
  }

  goBack_office(){
    this.router.navigate(['office']);
  }

  goBack_dayn(){
    this.router.navigate(['dayn']);
  }


  amano: amano[];
  getAmano(){
    this.data.getAmanoB(this.id).subscribe(
      amanolist => this.amano = amanolist
    )
  }

 

  go(a){
   return a;
  }

  
  id: number;
  private sub: any;

  all: amano[];

  ngOnInit() {
    this.sub = this.route.params.subscribe(params => {
      this.id = +params['id']; // (+) converts string 'id' to a number
      this.model.id = this.id;

      // In a real app: dispatch action to load the details here.
   });
   this.getAmano();

   this.data.getAmanoC(this.id).subscribe(
    amanolist => this.all = amanolist
  )
 

  }

}
