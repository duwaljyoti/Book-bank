import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { MassRequestComponent } from './mass-request.component';

describe('MassRequestComponent', () => {
  let component: MassRequestComponent;
  let fixture: ComponentFixture<MassRequestComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ MassRequestComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(MassRequestComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
