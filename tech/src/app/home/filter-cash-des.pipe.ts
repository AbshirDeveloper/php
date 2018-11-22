import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'filterCashDes'
})
export class FilterCashDesPipe implements PipeTransform {

  transform(cash: any, one: any): any {
    if(one === null || one === undefined){
      return cash;
    } else {
      return cash.filter(function(x){
        return x.description.toUpperCase().includes(one.toUpperCase());
      })
    }
  }

}
