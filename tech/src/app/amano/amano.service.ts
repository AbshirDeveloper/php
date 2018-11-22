import { Injectable } from '@angular/core';
import { Http, Response } from '@angular/http';
// import { amanoBalance } from './amano.interface';
import { amano,check,cash } from './amano.interface';
import { Observable } from 'rxjs/Observable';
import 'rxjs/add/operator/map';

@Injectable()
export class AmanoService {

  constructor(private http:Http) { }

  getAmano(): Observable<amano[]> {
    return this.http.get('http://etawakalchi.com/php/amano.php').map((response: Response)=><amano[]>response.json());
  }

  getAmano_history(): Observable<amano[]> {
    return this.http.get('http://etawakalchi.com/php/get_office.php').map((response: Response)=><amano[]>response.json());
  }

  getAmanoBalance(): Observable<amano[]> {
    return this.http.get('http://etawakalchi.com/php/amano_balance.php').map((response: Response)=><amano[]>response.json());
  }
  

  // addEmployee(info){
  //   return this.http.post("http://etawakalchi.com/php/amano_update.php",info)
  //     .map(()=>"");
  // }
  addEmployee(info): Observable<any>{
    return this.http.post("http://etawakalchi.com/php/amano_update.php",info)
      .map((response: Response)=> response.json());
  }

  addEmployee_office(info): Observable<any>{
    return this.http.post("http://etawakalchi.com/php/office.php",info)
      .map((response: Response)=> response.json());
  }

  addbal(info){
    return this.http.post("http://etawakalchi.com/php/amano_update_balance.php",info)
      .map(()=>"");
  }

  withbal(info){
    return this.http.post("http://etawakalchi.com/php/amano_update_balance_with.php",info)
      .map(()=>"");
  }

  deleteEmployee(info){
    return this.http.post("http://etawakalchi.com/php/amano_delete.php",info)
      .map(()=>"");
  }


  getAmanoB(info): Observable<amano[]>{
    return this.http.post("http://etawakalchi.com/php/amano_balance.php",info)
      .map((response: Response)=><amano[]>response.json());
  }

  getEmployee(id){
    return this.http.post("http://etawakalchi.com/php/amano_up.php",id)
      .map(res=>res.json());
  }
  updateEmployee(info){
    return this.http.post("http://etawakalchi.com/php/amano_up_update.php?",info)
      .map(()=>"");
  }

  updateEmployee_office(info){
    return this.http.post("http://etawakalchi.com/php/amano_up_office.php?",info)
      .map(()=>"");
  }

  getAmanoC(info): Observable<amano[]>{
    return this.http.post("http://etawakalchi.com/php/amano_name.php",info)
      .map((response: Response)=><amano[]>response.json());
  }

  t_negative(info): Observable<any>{
    return this.http.post("http://etawakalchi.com/php/amano_t_negative.php",info)
      .map((response: Response)=> response.json());
  }


  t_all(info): Observable<any>{
    return this.http.post("http://etawakalchi.com/php/amano_t_all.php",info)
      .map((response: Response)=> response.json());
  }

  t_all_office(info): Observable<any>{
    return this.http.post("http://etawakalchi.com/php/amano_t_all_office.php",info)
      .map((response: Response)=> response.json());
  }

  overall(info): Observable<any>{
    return this.http.post("http://etawakalchi.com/php/overall.php",info)
      .map((response: Response)=> response.json());
  }

  checks(): Observable<check[]> {
    return this.http.get('http://etawakalchi.com/php/check.php').map((response: Response)=><check[]>response.json());
  }

  inform(): Observable<check[]> {
    return this.http.get('http://etawakalchi.com/php/inform.php').map((response: Response)=><check[]>response.json());
  }

  cashs(): Observable<cash[]> {
    return this.http.get('http://etawakalchi.com/php/cash.php').map((response: Response)=><cash[]>response.json());
  }
  addcheck(info): Observable<any>{
    return this.http.post("http://etawakalchi.com/php/check_add.php",info)
      .map((response: Response)=> response.json());
  }

  addcash(info): Observable<any>{
    return this.http.post("http://etawakalchi.com/php/cash_add.php",info)
      .map((response: Response)=> response.json());
  }

  addeposit(info): Observable<any>{
    return this.http.post("http://etawakalchi.com/php/cash_deposit.php",info)
      .map((response: Response)=> response.json());
  }

  getcash(id){
    return this.http.post("http://etawakalchi.com/php/amano_up.php",id)
      .map(res=>res.json());
  }

  getcheck(id){
    return this.http.post("http://etawakalchi.com/php/amano_up.php",id)
      .map(res=>res.json());
  }

  singlecash(id){
    return this.http.post("http://etawakalchi.com/php/cash_single.php",id)
      .map(res=>res.json());
  }

  singlecheck(id){
    return this.http.post("http://etawakalchi.com/php/check_single.php",id)
      .map(res=>res.json());
  }

  updatecheck(info){
    return this.http.post("http://etawakalchi.com/php/check_up_update.php?",info)
      .map(()=>"");
  }

  updatecash(info){
    return this.http.post("http://etawakalchi.com/php/cash_up_update.php?",info)
      .map(()=>"");
  }

  delete_ca(info){
    return this.http.post("http://etawakalchi.com/php/cash_delete.php",info)
      .map(()=>"");
  }

  delete_ch(info){
    return this.http.post("http://etawakalchi.com/php/check_delete.php",info)
      .map(()=>"");
  }

  cash_total(info): Observable<any>{
    return this.http.post("http://etawakalchi.com/php/cash_total.php",info)
      .map((response: Response)=> response.json());
  }

  check_total(info): Observable<any>{
    return this.http.post("http://etawakalchi.com/php/check_total.php",info)
      .map((response: Response)=> response.json());
  }

  drop(info): Observable<any>{
    return this.http.post("http://etawakalchi.com/php/drop.php",info)
      .map((response: Response)=> response.json());
  }
}