import { Component, OnInit } from '@angular/core';
import { DaynService } from '../dayn/dayn.service';
import { directory, notes } from '../dayn/dayn.interface';
import {ActivatedRoute, Params, Router} from '@angular/router';
import { note, com } from '../amano/register';

@Component({
  selector: 'app-com',
  templateUrl: './com.component.html',
  styleUrls: ['./com.component.css']
})
export class ComComponent implements OnInit {

  constructor( private data:DaynService, private router:Router) { }

  reset(){
    this.com.name = '';
    this.com.phone = '';
  }

  directory: directory[];
  getDir(){
    this.data.getDir().subscribe(
      dirctory => this.directory = dirctory
    )
  }

  notes: notes[];
  getnotes(){
    this.data.getnotes().subscribe(
      dirctory => this.notes = dirctory
    )
  }

  model = new note();
  addnote(){
    this.data
      .addnote(this.model)
      .subscribe(amanolist => {
      },()=> this.ngOnInit());
  }

  com = new com();
  register_com(){
    this.data
      .register_com(this.com)
      .subscribe(amanolist => {
        if(amanolist == 'failed'){
          alert('This person exists');
        } else {
          this.ngOnInit();
        }
      },()=> this.goBack());
  }

goBack(){
  this.router.navigate(['reer']);
}
b;
delete_director(a){
  this.b = confirm('Ar you sure you want to delete this');
  if(this.b == true){
  this.data
  .deletedirector(a)
  .subscribe(()=> this.ngOnInit());
  }
}

delete_message(a){
  this.b = confirm('Ar you sure you want to delete this note');
  if(this.b == true){
  this.data
  .deletemessage(a)
  .subscribe(()=> this.ngOnInit());
  }
}



  ngOnInit() {
    this.getDir();
    this.getnotes();
  }

}
