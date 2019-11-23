import {Component, OnInit} from '@angular/core';
import {ChkService} from '../service/chk.service';
declare var $: any;
import {FormControl, FormGroup, Validators} from '@angular/forms';
import {Router} from '@angular/router';
import { ToastrService } from 'ngx-toastr';
import {PageTitleService} from '../core/page-title/page-title.service';

@Component({
  selector: 'angly-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent implements OnInit {

  /* Variables */
  homeContent: any;
  services: any;
  projectGallary: any;
  posts: any;
  team: any;
  pricingContent: any;
  contact: any;
  videoContent: any;
  mobileFeatured: any;
  testimonial: any;

  productlist: any;
  categories: any;
  popularPosts: any;
  productsList: any;


  constructor(private pageTitleService: PageTitleService, private service: ChkService,
              private route: Router, private toastr: ToastrService) {
    this.pageTitleService.setTitle("Excited to rent or borrow book");
    /* Page subTitle */
    this.pageTitleService.setSubTitle("Let's get started!");

    this.service.getcategories().subscribe(response => {
        this.categories = response;
      },
      err => console.log(err),
      () => this.categories
    );
    this.service.getPopularPosts().subscribe(response => {
        this.popularPosts = response;
      },
      err => console.log(err),
      () => this.popularPosts
    );

    this.service.getProductsList().subscribe(response => {
        this.productsList = response;
      },
      err => console.log(err),
      () => this.productsList
    );
  }

  ngOnInit() {
  }


  /*
   * getContent is used for get the home page content.
   * Used variables is videoContent and mobileFeatured.
   */
  getContent(content) {
    this.videoContent = content.video_content;
    this.mobileFeatured = content.mobile_featured;
  }

  subscribeFormClasses: any = {rowClass: 'row', fieldClass: 'col-sm-12 col-md-6'};
}
