import { RouterModule, Routes } from '@angular/router';
import { ModuleWithProviders } from '@angular/core';
import { UpdateComponent } from './amano/update/update.component';
import { AmanoComponent } from './amano/amano.component';
import { BalanceComponent } from './balance/balance.component';
import { CartComponent } from './cart/cart.component';
import { DaynComponent } from './dayn/dayn.component';
import { DayComponent } from './dayn/Daynroute';
import { ExtendedComponent } from './extended/extended.component';
import { InventoryComponent } from './inventory/inventory.component';
import { InvoiceComponent } from './invoice/invoice.component';
import { SalesComponent } from './sales/sales.component';
import { HomeComponent} from './home/home.component';
import { PaymentComponent} from './payment/payment.component';
import { AmanoTranComponent } from './amano-tran/amano-tran.component';
import { AmanComponent } from './amano/rerout';
import { GetComponent } from './get/get.component';
import { UpComponent } from './home/up/up.component';
import { UpcheckComponent } from './home/upcheck/upcheck.component';
import { HistoryComponent } from './history/history.component';
import { ComComponent } from './com/com.component';
import { LoginComponent } from './dayn/login/login.component';
import { HoComponent } from './home/rerouts';
import { CoComponent } from './com/reer';
import {AuthManager} from './authmanager.service';
import { LogComponent } from './log/log.component';
import { AppComponent } from './app.component';

const APP_ROUTES: Routes = [
    {path: 'log', component: LogComponent},
    {path:'real', component: AppComponent, canActivate: [AuthManager]},
    {path: 'log/:id', component: LogComponent, canActivate: [AuthManager]},
    {path: '', component: HomeComponent, canActivate: [AuthManager]},
    {path: 'amano/0', component: AmanoComponent, canActivate: [AuthManager]},
    {path: 'office', component: GetComponent, canActivate: [AuthManager]},
    {path: 'rerout', component: AmanComponent, canActivate: [AuthManager]},
    {path: 'Daynrout', component: DayComponent, canActivate: [AuthManager]},
    {path: 'payment', component: PaymentComponent, canActivate: [AuthManager]},
    {path: 'home', children: [
        {
            path: '' , component: HomeComponent, canActivate: [AuthManager]
        },
        {
           path: 'up/:id', component: UpComponent, canActivate: [AuthManager]
        },
        {
            path: 'up_check/:id', component: UpcheckComponent, canActivate: [AuthManager]
         }  
       ]},
    {path: 'amano', children: [
     {
         path: '' , component: AmanoComponent, canActivate: [AuthManager]
     },
     {
        path: 'transaction/:id', component: AmanoTranComponent, canActivate: [AuthManager]
     } 
    ]},
    {
        path: 'update/:id', component: UpdateComponent, canActivate: [AuthManager]
     }, 
    {path: 'balance', component: BalanceComponent, canActivate: [AuthManager]},
    {path: 'cart', component: CartComponent, canActivate: [AuthManager]},
    {path: 'dayn', children: [
        {
            path: '', component: DaynComponent, canActivate: [AuthManager]
        },
        {
            path: 'payment/:id', component: PaymentComponent, canActivate: [AuthManager]
        }
    ]},
    {path: 'extended', component: ExtendedComponent, canActivate: [AuthManager]},
    {path: 'inventory', component: InventoryComponent, canActivate: [AuthManager]},
    {path: 'invoice', component: InvoiceComponent, canActivate: [AuthManager]},
    {path: 'sales', component: SalesComponent, canActivate: [AuthManager]},
    {path: 'history', component: HistoryComponent, canActivate: [AuthManager]},
    {path: 'comm', component: ComComponent, canActivate: [AuthManager]},
    {path: 'login', component: LoginComponent, canActivate: [AuthManager]},
    {path: 'rer', component: HoComponent, canActivate: [AuthManager]},
    {path: 'reer', component: CoComponent, canActivate: [AuthManager]}
];

export const APP_ROUTES_PROVIDER: ModuleWithProviders = RouterModule.forRoot(APP_ROUTES);


