import { TestBed } from '@angular/core/testing';

import { LoggedInuserDataService } from './loggedInuserData.service';

describe('DataService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: LoggedInuserDataService = TestBed.get(LoggedInuserDataService);
    expect(service).toBeTruthy();
  });
});
