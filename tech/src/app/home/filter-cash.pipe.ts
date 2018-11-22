import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'filterCash'
})
export class FilterCashPipe implements PipeTransform {

  transform(cash: any, one: any): any {
    if(one === null || one === undefined || one === 'All'){
      return cash;
    } else {
      return cash.filter(function(x){
        return x.date > (Date.now()/1000) - 86400;
      })
    }
  }

}
