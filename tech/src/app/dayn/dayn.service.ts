import { Injectable } from '@angular/core';
import { Http, Response } from '@angular/http';
import { dayn, directory, notes } from './dayn.interface';
import { history, auths } from '../amano/register';
import { Observable } from 'rxjs/Observable';
import 'rxjs/add/operator/map';
import { check, cash } from '../amano/amano.interface';


@Injectable()
export class DaynService {

  constructor(private http: Http) { }

  getDayn(): Observable<dayn[]> {
    return this.http.get('http://etawakalchi.com/php/dayn.php').map((response: Response)=><dayn[]>response.json());
  }

  dayn_all(): Observable<any> {
    return this.http.get('http://etawakalchi.com/php/dayn_all.php').map((response: Response)=><dayn[]>response.json());
  }

  dayn_negative(): Observable<any> {
    return this.http.get('http://etawakalchi.com/php/dayn_all.php?id=1').map((response: Response)=><dayn[]>response.json());
  }

  addDayn(info): Observable<any>{
    return this.http.post("http://etawakalchi.com/php/dayn_update.php",info)
      .map((response: Response)=> response.json());
  }

  updateEmployee(info){
    return this.http.post("http://etawakalchi.com/php/dayn_up_update.php?",info)
      .map(()=>"");
  }

  pay(info){
    return this.http.post("http://etawakalchi.com/php/dayn_pay.php?",info)
      .map(()=>"");
  }

  open(info){
    return this.http.post("http://etawakalchi.com/php/open.php",info)
      .map(()=>"");
  }

  deleteEmployee(info){
    return this.http.post("http://etawakalchi.com/php/dayn_delete_once.php",info)
      .map(()=>"");
  }

  deletedirector(info){
    return this.http.post("http://etawakalchi.com/php/directory_delete.php",info)
      .map(()=>"");
  }

  deletemessage(info){
    return this.http.post("http://etawakalchi.com/php/note_delete.php",info)
      .map(()=>"");
  }

  deleteEmployee_all(info){
    return this.http.post("http://etawakalchi.com/php/dayn_delete.php",info)
      .map(()=>"");
  }

  getEmployee(id){
    return this.http.post("http://etawakalchi.com/php/dayn_up.php",id)
      .map(res=>res.json());
  }
  overall(info): Observable<any>{
    return this.http.post("http://etawakalchi.com/php/overall.php",info)
      .map((response: Response)=> response.json());
  }

  da(): Observable<any> {
    return this.http.get('http://etawakalchi.com/php/da.php').map((response: Response)=><dayn[]>response.json());
  }

  am(): Observable<any> {
    return this.http.get('http://etawakalchi.com/php/am.php').map((response: Response)=><dayn[]>response.json());
  }

  ca(): Observable<any> {
    return this.http.get('http://etawakalchi.com/php/am.php').map((response: Response)=><dayn[]>response.json());
  }

  gethistory(): Observable<history[]> {
    return this.http.get('http://etawakalchi.com/php/history.php').map((response: Response)=><history[]>response.json());
  }

  getDir(): Observable<directory[]> {
    return this.http.get('http://etawakalchi.com/php/directory.php').map((response: Response)=><directory[]>response.json());
  }

  getnotes(): Observable<notes[]> {
    return this.http.get('http://etawakalchi.com/php/notes.php').map((response: Response)=><notes[]>response.json());
  }

  addnote(info): Observable<any>{
    return this.http.post("http://etawakalchi.com/php/note.php",info)
      .map((response: Response)=> response.json());
  }

  initial_register(info): Observable<any>{
    return this.http.post("http://etawakalchi.com/php/initial.php",info)
      .map((response: Response)=> response.json());
  }

  bal(): Observable<any> {
    return this.http.get('http://etawakalchi.com/php/balance_overall.php').map((response: Response)=><any>response.json());
  }

  register_com(info): Observable<any>{
    return this.http.post("http://etawakalchi.com/php/com.php",info)
      .map((response: Response)=> response.json());
  }

  authenticatenow(info): Observable<any> {
    return this.http.get('http://etawakalchi.com/php/balance_overall.php', info).map((response: Response)=><any>response.json());
  }

  cashs(): Observable<cash[]> {
    return this.http.get('http://etawakalchi.com/php/cash_depo.php').map((response: Response)=><cash[]>response.json());
  }

  updatepassword(info){
    return this.http.post("http://etawakalchi.com/php/reset.php?",info)
      .map(()=>"");
  }

  getauth(): Observable<auths> {
    return this.http.get('http://etawakalchi.com/php/get_auth.php').map((response: Response)=><auths>response.json());
  }
}
