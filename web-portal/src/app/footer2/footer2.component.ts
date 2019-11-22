import { Component, Inject, OnInit, HostListener } from '@angular/core';
import { MenuItems } from '../core/menu/menu-items/menu-items';
import { Router } from '@angular/router';
import { ChkService } from '../service/chk.service';
declare var $ : any;

@Component({
  selector: '[angly-footer2]',
  templateUrl: './footer2.component.html',
  styleUrls: ['./footer2.component.scss']
})
export class Footer2Component implements OnInit {

   constructor(public menuItems: MenuItems,  private service:ChkService, public router: Router) { }

   ngOnInit() {
   }

}
