import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'filter'
})
export class FilterPipe implements PipeTransform {

  transform(amano: any, phone: any): any {
    if(phone === undefined || phone === null){
      return amano;
    }

    return amano.filter(function(x){
      return x.phone.includes(phone);
    })

  

  }

}


