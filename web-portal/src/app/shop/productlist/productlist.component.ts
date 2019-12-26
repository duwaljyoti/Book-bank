import {Component, OnInit} from '@angular/core';
import {PageTitleService} from '../../core/page-title/page-title.service';
import {ChkService} from '../../service/chk.service';
import {Options} from 'ng5-slider';

@Component({
  selector: 'angly-productlist',
  templateUrl: './productlist.component.html',
  styleUrls: ['./productlist.component.scss']
})
export class ProductlistComponent implements OnInit {

  /* Variables */
  productlist: any;
  categories: any;
  popularPosts: any;
  books: any;

  minValue: number = 0;
  maxValue: number = 250;
  options: Options = {
    floor: 0,
    ceil: 250
  };

  constructor(private pageTitleService: PageTitleService, private service: ChkService) {

    /* Page title */
    // this.pageTitleService.setTitle(' Happy Shopping ');
    //
    // /* Page subTitle */
    // this.pageTitleService.setSubTitle(' 25% Off and Free global delivery for all products ');

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
  }

  ngOnInit() {
    console.log(1212);
    this.service.getBooks().subscribe(response => {
      this.books = response.data;
      console.log(this.books);
    });
  }

}
