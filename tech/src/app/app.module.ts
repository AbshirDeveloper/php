import { BrowserModule } from '@angular/platform-browser';
import { CommonModule } from '@angular/common';  
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { HttpModule } from '@angular/http';
import { APP_ROUTES_PROVIDER } from './app.routes';
import { RouterLink } from '@angular/router';
import { RouterModule } from '@angular/router';


import { AppComponent } from './app.component';
import { InventoryComponent } from './inventory/inventory.component';
import { SalesComponent } from './sales/sales.component';
import { DaynComponent } from './dayn/dayn.component';
import { DayComponent } from './dayn/Daynroute';
import { AmanoComponent } from './amano/amano.component';
import { BalanceComponent } from './balance/balance.component';
import { ExtendedComponent } from './extended/extended.component';
import { InvoiceComponent } from './invoice/invoice.component';
import { CartComponent } from './cart/cart.component';
import { HomeComponent } from './home/home.component';
import { DaynService } from './dayn/dayn.service';
import { AmanoService } from './amano/amano.service';

import { PaymentComponent } from './payment/payment.component';
import { AmanoTranComponent } from './amano-tran/amano-tran.component';
import { AmanComponent } from './amano/rerout';
import { GetComponent } from './get/get.component';

import { FilterPipe } from './amano/filter.pipe';
import { FiltersPipe } from './amano/filters.pipe';
import { FiltPipe } from './amano/filt.pipe';
import { AmfilterPipe } from './amano/amfilter.pipe';
import { NamePipe } from './amano-tran/name.pipe';
import { UpdateComponent } from './amano/update/update.component';
import { EntryPipe } from './amano/entry.pipe';
import { UpComponent } from './home/up/up.component';
import { UpcheckComponent } from './home/upcheck/upcheck.component';
import { FilterCashPipe } from './home/filter-cash.pipe';
import { FilterCheckOnePipe } from './home/filter-check-one.pipe';
import { FilterCheckTwoPipe } from './home/filter-check-two.pipe';
import { FilterCashDesPipe } from './home/filter-cash-des.pipe';
import { TotalPipe } from './home/total.pipe';
import { FilPipe } from './home/fil.pipe';
import { AmFilPipe } from './amano/am-fil.pipe';
import { FilterPipe_dayn } from './dayn/filter.pipe';
import { HistoryComponent } from './history/history.component';
import { ComComponent } from './com/com.component';
import { LoginComponent } from './dayn/login/login.component';
import { HoComponent } from './home/rerouts';
import { CoComponent } from './com/reer';
import { LogComponent } from './log/log.component';
import { AuthService } from './auth.service';
import { AuthManager } from './authmanager.service';
import { HashLocationStrategy, LocationStrategy } from '@angular/common';



@NgModule({
  declarations: [
    AppComponent,
    CoComponent, HoComponent, FilterPipe_dayn, DayComponent, InventoryComponent, SalesComponent, DaynComponent, AmanoComponent, BalanceComponent, ExtendedComponent, InvoiceComponent, CartComponent, HomeComponent, PaymentComponent, AmanoTranComponent, AmanComponent, GetComponent, FilterPipe, FilterPipe, AmanComponent, FiltersPipe, FiltPipe, AmfilterPipe, NamePipe, UpdateComponent, EntryPipe, UpComponent, UpcheckComponent, FilterCashPipe, FilterCheckOnePipe, FilterCheckTwoPipe, FilterCashDesPipe, TotalPipe, FilPipe, AmFilPipe, FilterPipe, HistoryComponent, ComComponent, LoginComponent, LogComponent
  ],
  imports: [
    BrowserModule,
    FormsModule,
    HttpModule,
    APP_ROUTES_PROVIDER
  ],
  providers: [DaynService, AmanoService, AuthService, AuthManager, {provide: LocationStrategy, useClass:HashLocationStrategy}],
  bootstrap: [AppComponent]
})
export class AppModule { }
