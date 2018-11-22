import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'total'
})
export class TotalPipe implements PipeTransform {
  vice = 0;
  transform(check: any, value: any): any {
  if(value == null || value == undefined || value == 'All'){
    return check[0];
  } else if (value == 'Pending') {
    return check[1];
  } else if (value == 'Deposited'){
    return check[2];
  } else if (value == 'Approved'){
    return check[3];
  }
  }
}
