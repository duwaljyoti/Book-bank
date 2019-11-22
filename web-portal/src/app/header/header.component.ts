import { Component, OnInit } from '@angular/core';
import {LoggedInuserDataService} from '../shared/loggedInuserData.service';

@Component({
  selector: '[angly-header]',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.scss']
})
export class HeaderComponent implements OnInit {

  loggedInEmail: string;
  constructor(private data: LoggedInuserDataService) {}

  ngOnInit() {
    this.data.loggedInEmail.subscribe(email => this.loggedInEmail = email);
  }

}
