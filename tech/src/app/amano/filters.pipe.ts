import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'filters'
})
export class FiltersPipe implements PipeTransform {

  transform(amano: any, value: any): any {
    if(value === null || value === undefined || value === 'All'){
      return amano;
    } else {
      return amano.filter(function(x){
        return x.due_date < Date.now()/1000;
      })
    }
  }

}
