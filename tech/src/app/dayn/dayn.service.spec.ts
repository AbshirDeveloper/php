/* tslint:disable:no-unused-variable */

import { TestBed, async, inject } from '@angular/core/testing';
import { DaynService } from './dayn.service';

describe('DaynService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [DaynService]
    });
  });

  it('should ...', inject([DaynService], (service: DaynService) => {
    expect(service).toBeTruthy();
  }));
});
