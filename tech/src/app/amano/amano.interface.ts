export interface amano {
   id:number;
   firstname:string;
   lastname:string;
   phone:number;
   balance:number;
   debit:number;
   deposit:number;
   date:any; 
   type:any;
}

export interface check {
    id:number;
    date:string;
    customer:string;
    status:string;
    amount:number;
}

export interface cash {
    id:number;
    date:string;
    description:string;
    amount:number;
    status:any;
}

export interface amanoBalance {
    balance:number;
    id:number;
    first_name:string;
    last_name:string;
    phone:number;
    debit:number;
    deposit:number;
    date:any; 
 }

 export interface mid {
     total:number;
     id:number;
     firstname:string;
     lastname:string;
     phone:number;
     balance:number;
     debit:number;
     deposit:number;
     date:any; 
 }

 export class creds {
     password:string;
     confirm_password:string;
     id:any;
 }

