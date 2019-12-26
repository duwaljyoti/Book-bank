import {Component, OnInit} from '@angular/core';
import {FormBuilder, FormGroup, Validators} from '@angular/forms';
import {PageTitleService} from '../core/page-title/page-title.service';
import {ChkService} from '../service/chk.service';
import {ToastrService} from 'ngx-toastr';

@Component({
  selector: 'app-add-book',
  templateUrl: './add-book.component.html',
  styleUrls: ['./add-book.component.css']
})

export class AddBookComponent implements OnInit {
  requestBook: FormGroup;
  isSubmitted = false;

  categories = [];

  constructor(private formBuilder: FormBuilder, private pageTitleService: PageTitleService, private service: ChkService,
              private toastr: ToastrService
  ) {

    /* Page title */
    this.pageTitleService.setTitle('Add Book');

    /* Page subTitle */
    // this.pageTitleService.setSubTitle('You can request number of books for social cause.');

    this.requestBook = this.formBuilder.group({
      name: [null, [Validators.required]],
      publication: [null, []],
      category_id: [null, [Validators.required]],
      author: [null, [Validators.required]],
      description: [null, [Validators.required]],
      price: [null, [Validators.required]],
      discounted_price: [null, [Validators.required]],
      is_for_sale: [null, [Validators.required]],
      is_for_rent: [null, [Validators.required]],
    });
  }

  ngOnInit() {
    this.service.getCategories().subscribe(response => {
        if (response['status'] == 1) {
          this.categories = response.data;
        } else {
          this.toastr.error(response['message']);
        }
      },
      err => {
        this.toastr.error(err.error);
      },
      () => {
      }
    );
  }

  /*
   * sendMessage
   */
  submit(values) {
    console.log(values);
    this.isSubmitted = true;
    if (this.requestBook.value.name) {
      this.service.storeBook(this.requestBook.value).subscribe(response => {
          if (response['status'] == 1) {
            this.toastr.show('successfully uploaded');
          } else {
            this.toastr.error('successfully uploadeagaind');
          }
        },
        err => this.toastr.error(err.error),
        () => {
        }
      );
    }
  }

  hasError(control) {
    const formControl = this.requestBook.controls[control];
    if (!formControl.touched && !this.isSubmitted) {
      return false;
    }
    return formControl.invalid;
  }


  checkFieldWithErrorType(control, errorType = 'required') {
    const formControl = this.requestBook.controls[control];
    if (!formControl.touched && !this.isSubmitted) {
      return false;
    }
    if (formControl.hasError(errorType)) {
      return true;
    }
  }
}

