export class Employee {
    // constructor(
    //     public name: string,
    //     public position: string,
    //     public department: string,
    //     public salary: string
    // ){}
    id:number;
    firstname: string;
    lastname: string;
    phone: number;
    balance:number;
    amount:number;
    type:any;
    due:any;
    paid:number;
}

export class dayn_add {
    name:string;
    phone_number:number;
    amount:number;
    days:number;
}

export class bal {
    id:number;
    des:string;
    amount:number;
    
}

export class cashs {
    id:number;
    description:string;
    amount:number;
    status:string;
}

export class checks {
    id:number;
    status:string;
    name:string;
    amount:number;
    phone:any;
}

export class paid {
    id:number;
    paid:number;
}

export interface history {
  id:number;
  time:string;
  pertain:string;
  status:string;
  transaction:number;
  new_balance:number;  
}

export class auths {
    email:any;
    password:any;
    first_name:any;
    last_name:any;
    company_name:any;
    address:any;
    city:any;
    zip_code:any;
    phone:any;
    business:any;
    status:any;
    reset:any;
    initial:any;
    id_unique:any;

  }

export class note {
    name:string;
    message:string;
}

export class com {
    name:string;
    phone:any;
}

export class cred {
    username:string;
    password:string;
}