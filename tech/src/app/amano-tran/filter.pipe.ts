import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'filter'
})
export class FilterPipe implements PipeTransform {

  transform(amano: any, id: any): any {

    return amano.filter(function(x){
      return x.customer_id.includes(id);
    })
      
    }
  }
