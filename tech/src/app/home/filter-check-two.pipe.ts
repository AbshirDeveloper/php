import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'filterCheckTwo'
})
export class FilterCheckTwoPipe implements PipeTransform {

  transform(check: any, one: any): any {
    if(one === null || one === undefined){
      return check;
    } else {
      return check.filter(function(x){
        return x.customer.toUpperCase().includes(one.toUpperCase());
      })
    }
  }

}
