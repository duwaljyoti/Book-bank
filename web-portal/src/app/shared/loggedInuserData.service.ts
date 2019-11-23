import { Injectable } from '@angular/core';
import { BehaviorSubject } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class LoggedInuserDataService {

  private loggedInEmailMessageSource = new BehaviorSubject(localStorage.getItem('logged_in_user_email'));
  loggedInEmail = this.loggedInEmailMessageSource.asObservable();

  constructor() { }
  changeMessage(message: string) {
    this.loggedInEmailMessageSource.next(message);
  }
}
