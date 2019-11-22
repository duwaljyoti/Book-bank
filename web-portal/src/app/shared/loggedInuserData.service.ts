import { Injectable } from '@angular/core';
import { BehaviorSubject } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class LoggedInuserDataService {

  private loggedInEmailMessageSource = new BehaviorSubject(localStorage.getItem('email'));
  loggedInEmail = this.loggedInEmailMessageSource.asObservable();

  constructor() { }
  changeMessage(message: string) {
    this.loggedInEmailMessageSource.next(message);
  }
}
