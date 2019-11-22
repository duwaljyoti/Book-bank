/*
 * Home contact
 * Used in another component.
 */
import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import {DomSanitizer} from "@angular/platform-browser";

@Component({
  selector: '[angly-homeContact]',
  templateUrl: './homeContact.component.html',
  styleUrls: ['./homeContact.component.scss']
})
export class HomeContactComponent implements OnInit {

   @Input() contact : any;
  address ='Insight workshop Nepal';
  mapURL: any;

  constructor(public sanitizer: DomSanitizer) { }

   ngOnInit() {
     this.mapURL = encodeURI('https://maps.google.com/maps?q=' +
       this.address +
       '&t=&z=17&ie=UTF8&iwloc=&output=embed');
     this.mapURL = this.sanitizer.bypassSecurityTrustResourceUrl(this.mapURL);
   }

}
