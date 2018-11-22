import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'amfilter'
})
export class AmfilterPipe implements PipeTransform {

  transform(amano: any, value: any): any {
    if(value === null || value === undefined || value === 'All'){
      return amano;
    } else {
      return amano.filter(function(x){
        return x.r_balance < 0;
      })
    }
  }

}
