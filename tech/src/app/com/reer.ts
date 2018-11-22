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
export class CoComponent implements OnInit {

  constructor( private data:DaynService, private router:Router) { }

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
      },()=> this.goBack());
  }

  com = new com();
  register_com(){
    this.data
      .register_com(this.com)
      .subscribe(amanolist => {
      },()=> this.goBack());
  }

goBack(){
  this.router.navigate(['/comm']);
}

  ngOnInit() {
    this.goBack();
    this.getDir();
    this.getnotes();
  }

}
