import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { PersonalRequestComponent } from './mass-request.component';

describe('MassRequestComponent', () => {
  let component: PersonalRequestComponent;
  let fixture: ComponentFixture<PersonalRequestComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PersonalRequestComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PersonalRequestComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
