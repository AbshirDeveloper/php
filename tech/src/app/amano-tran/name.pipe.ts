import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'name'
})
export class NamePipe implements PipeTransform {

  transform(all: any, id: any): any {
    return all.filter(function(x){
      return x.id.includes(id);
    })
  }
  }


