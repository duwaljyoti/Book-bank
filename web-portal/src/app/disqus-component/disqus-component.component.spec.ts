import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { DisqusComponentComponent } from './disqus-component.component';

describe('DisqusComponentComponent', () => {
  let component: DisqusComponentComponent;
  let fixture: ComponentFixture<DisqusComponentComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ DisqusComponentComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(DisqusComponentComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
