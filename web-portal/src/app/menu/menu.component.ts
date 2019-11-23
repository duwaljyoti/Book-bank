import { Component, OnInit, HostListener, Inject, } from '@angular/core';
import { MenuItems } from '../core/menu/menu-items/menu-items';
import { Router } from '@angular/router';
import { ClickOutside } from '../core/directive/click-outside.directive';
import {LoggedInuserDataService} from "../shared/loggedInuserData.service";
declare var $: any;

@Component({
  selector: '[angly-menu]',
  templateUrl: './menu.component.html',
  styleUrls: ['./menu.component.scss']
})
export class MenuComponent implements OnInit {
  loggedInEmail: string;
  searchactive: boolean = false;

	constructor(public menuItems: MenuItems, public router: Router, private data: LoggedInuserDataService) { }

	ngOnInit() {
    this.data.loggedInEmail.subscribe(email => this.loggedInEmail = email);

  }

	searchActiveFunction(){
		this.searchactive = !this.searchactive;
	}

	onClickOutside(event:Object) {
    if(event && event['value'] === true) {
      this.searchactive = false;
    }
   }

	public removeCollapseInClass() {
      $("#navbarCollapse").removeClass('show');
   }

  logoutClick() {
     localStorage.removeItem('logged_in_user_id');
     localStorage.removeItem('logged_in_user_email');
     localStorage.removeItem('loggedIn');
     this.data.changeMessage('');
  }
}
