import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'filt'
})
export class FiltPipe implements PipeTransform {

  transform(amano: any, value: any): any {
    if(value === null || value === undefined || value === 'All'){
      return amano;
    } else {
      return amano.filter(function(x){
        return x.balance < 0;
      })
    }
  }

}
