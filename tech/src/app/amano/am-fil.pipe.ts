import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'amFil'
})
export class AmFilPipe implements PipeTransform {

  transform(all: any, value: any): any {
    if(value == null || value == undefined || value == 'All'){
      return all[0];
    } else {
      return all[1];
    }
  }

}
