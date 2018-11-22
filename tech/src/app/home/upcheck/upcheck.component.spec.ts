/* tslint:disable:no-unused-variable */
import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { By } from '@angular/platform-browser';
import { DebugElement } from '@angular/core';

import { UpcheckComponent } from './upcheck.component';

describe('UpcheckComponent', () => {
  let component: UpcheckComponent;
  let fixture: ComponentFixture<UpcheckComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ UpcheckComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(UpcheckComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
