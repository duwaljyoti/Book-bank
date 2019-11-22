import { Component, OnInit } from '@angular/core';
import { PageTitleService } from '../core/page-title/page-title.service';
import { ChkService } from '../service/chk.service';
import {DomSanitizer} from "@angular/platform-browser";

@Component({
  selector: 'angly-contact',
  templateUrl: './contact.component.html',
  styleUrls: ['./contact.component.scss']
})
export class ContactComponent implements OnInit {

  /* Variables */
  contact : any = {};
  address ='Insight workshop Nepal';
  mapURL: any;

  constructor( private pageTitleService: PageTitleService, private service:ChkService, public sanitizer: DomSanitizer ) {
    /* Page title */
    this.pageTitleService.setTitle(" Lets Get In Touch ");

    /* Page subTitle */
    this.pageTitleService.setSubTitle(" Our latest news and learning articles. ");

    this.service.getContactContent().
      subscribe(response => {this.contact = response},
                err      => console.log(err),
                ()       => this.contact
            );
  }

  ngOnInit() {
    this.mapURL = encodeURI('https://maps.google.com/maps?q=' +
      this.address +
      '&t=&z=17&ie=UTF8&iwloc=&output=embed');
    this.mapURL = this.sanitizer.bypassSecurityTrustResourceUrl(this.mapURL);
  }

}
