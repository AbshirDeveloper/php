/* tslint:disable:no-unused-variable */
import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { By } from '@angular/platform-browser';
import { DebugElement } from '@angular/core';

import { AmanoTranComponent } from './amano-tran.component';

describe('AmanoTranComponent', () => {
  let component: AmanoTranComponent;
  let fixture: ComponentFixture<AmanoTranComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AmanoTranComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AmanoTranComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
