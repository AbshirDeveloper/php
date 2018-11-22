import { Component, OnInit } from '@angular/core';
import { DaynService } from '../dayn/dayn.service';
import { history } from '../amano/register';

@Component({
  selector: 'app-history',
  templateUrl: './history.component.html',
  styleUrls: ['./history.component.css']
})
export class HistoryComponent implements OnInit {

  constructor( private data:DaynService) { }

  history: history[];
  gethistory(){
    this.data.gethistory().subscribe(
      daynlist => this.history = daynlist
    )
  }


  ngOnInit() {
    this.gethistory();
  }

}
