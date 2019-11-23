import { Component, OnInit } from '@angular/core';
import { PageTitleService } from '../../core/page-title/page-title.service';
import { ChkService } from '../../service/chk.service';
import {ActivatedRoute} from '@angular/router';
import {HttpClient} from '@angular/common/http';

@Component({
  selector: 'angly-product-detail',
  templateUrl: './productDetail.component.html',
  styleUrls: ['./productDetail.component.scss']
})
export class ProductDetailComponent implements OnInit {
	/* Variables */
	productdeatil    : any;
	relatedProducts  : any;
	bookDetail;
	currentBookId;
	bookStatus;

	constructor(
	  private pageTitleService: PageTitleService,
    private service:ChkService,
    private route: ActivatedRoute,
    private http: HttpClient
  ) {
		/* Page title */
	    this.pageTitleService.setTitle(" Product Detail ");

	    /* Page subTitle */
	    this.pageTitleService.setSubTitle(" 25% Off and Free global delivery for all products ");


		this.service.getRelatedProducts().
			subscribe(response => {this.relatedProducts = response},
				err    => console.log(err),
				()     => this.relatedProducts
			);
	}

  getBookDetail = (bookId) => this.http.get<Response>(`/book/${bookId}`);

  ngOnInit() {
    this.currentBookId = parseInt(this.route.snapshot.paramMap.get('bookId'), 10);
    this.getBookDetail(parseInt(this.route.snapshot.paramMap.get('bookId'), 10))
      .subscribe(result => {
        // @ts-ignore
        this.bookDetail = result;
        console.log(this.bookDetail);
      });

    this.getRelatedBooks();
    this.getBookStatus();
  }

  rent = (bookId) => {
    this.http.post<Response>('/borrow/rent', {
      rented_by: 1,
      book_id: bookId
    }).subscribe(result => {
      console.log(121, result);
    });
  }

  // todo
  acquire = (bookId) => {
    this.http.post<Response>(`/acquire_find/${localStorage.logged_in_user_id}/${bookId}`, {}).subscribe(result => {
      console.log(121, result);
      this.getBookStatus();
    });
  }

  localUser = () => localStorage;

  getBookStatus = () => {
    this.http.get<Response>(`/book_status/${this.currentBookId}`).subscribe(result => {
      this.bookStatus = result;
      console.log(this.bookStatus);
    });
  }

  getRelatedBooks = () => {
    const userId = localStorage.logged_in_user_id;
    if (userId) {
      this.http.get<Response>(`/user/${userId}/other-books/${this.currentBookId}`).subscribe(result => {
        this.relatedProducts = result.data;
      });
    }
  }
}
