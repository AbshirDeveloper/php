import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'fil'
})
export class FilPipe implements PipeTransform {

  transform(value: any, one: any): any {
    if(one == null || one == undefined || one == 'All' || one == 'In Hand'){
      return value[1];
    } else if (one == 'Approved') {
      return value[2]; 
    }
  }

}
