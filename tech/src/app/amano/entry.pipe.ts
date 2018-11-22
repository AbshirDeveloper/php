import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'entry'
})
export class EntryPipe implements PipeTransform {

  transform(value: any, amano: any): any {
   if(value === 3124093514){
     alert('this is abshir phone')
   } 
  }

}
