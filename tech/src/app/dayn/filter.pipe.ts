import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'filter_dayn'
})
export class FilterPipe_dayn implements PipeTransform {

  transform(all: any, value: any): any {
    if(value == null || value == undefined || value == 'All'){
      return all[0] * -1;
    } else {
      return all[1] * -1;
    }
  }

}
