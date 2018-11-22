import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'filterCheckOne'
})
export class FilterCheckOnePipe implements PipeTransform {

  transform(check: any, labo: any): any {
    if(labo === null || labo === undefined || labo === 'All'){
      return check;
    }else {
      return check.filter(function(x){
        return x.status == labo;
      })


  }
  }
}
