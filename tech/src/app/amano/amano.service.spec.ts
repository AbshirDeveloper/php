/* tslint:disable:no-unused-variable */

import { TestBed, async, inject } from '@angular/core/testing';
import { AmanoService } from './amano.service';

describe('AmanoService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [AmanoService]
    });
  });

  it('should ...', inject([AmanoService], (service: AmanoService) => {
    expect(service).toBeTruthy();
  }));
});
