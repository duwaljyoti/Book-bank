import { Component, OnInit } from '@angular/core';
import {FormBuilder, FormGroup, Validators} from "@angular/forms";
import {PageTitleService} from "../core/page-title/page-title.service";
import {ChkService} from "../service/chk.service";
import {ToastrService} from 'ngx-toastr';

@Component({
  selector: 'app-mass-request',
  templateUrl: './mass-request.component.html',
  styleUrls: ['./mass-request.component.css']
})
export class MassRequestComponent implements OnInit {

  requestBook : FormGroup;
  isSubmitted = false;

  categories = [
  ];

  constructor(private formBuilder: FormBuilder, private pageTitleService: PageTitleService, private service: ChkService,
              private toastr: ToastrService
  ) {

    /* Page title */
    this.pageTitleService.setTitle("Mass Book Request");

    /* Page subTitle */
    this.pageTitleService.setSubTitle("You can request number of books for social cause.");

    this.requestBook = this.formBuilder.group({
      name : [null, [Validators.required] ],
      number_of_books  : [null, [Validators.required] ],
      pan_no      : [null, [Validators.required] ],
      reason   : [null, [Validators.required] ],
      publication   : [null, [] ],
      organization_name   : [null, [Validators.required] ],
      category_id   : [null, [Validators.required] ],
      author   : [null, [Validators.required] ],
    });
  }

  ngOnInit() {
    this.service.getCategories().subscribe(response => {
        if (response['status'] == 1) {
          this.categories = response.data;
        }else{
          this.toastr.error(response['message']);
        }
      },
      err => {
        this.toastr.error(err.error);
      },
      () => {}
    );
  }

  /*
   * sendMessage
   */
  submit(values:any)
  {
    this.isSubmitted = true;
    if(this.requestBook.valid)
    {
      // let data = this.requestBook.value;
      // data.requested_by = localStorage.getItem('api_token');
      // data.is_mass = 1;
      // data.is_request = 1;

      let data = this.requestBook.value;
      data.requested={
        'requested_by' : localStorage.getItem('logged_in_user_id'),
        'reason' : this.requestBook.value.reason,
        'is_mass' : 1,
        'number_of_books':this.requestBook.value.number_of_books,
        'pan_no':this.requestBook.value.pan_no,
        'organization_name':this.requestBook.value.organization_name,
      }
      data.books=[{
        'name' : this.requestBook.value.name,
        'category_id' : this.requestBook.value.category_id,
        'author' : this.requestBook.value.author,
        'is_request' : 1,
        'publication' : this.requestBook.value.publication,
      }]
      // delete  data.name;
      // delete  data.category_id;
      // delete  data.author;
      // delete  data.is_request;
      this.service.submitMassRequest(data).subscribe(response => {
          if (response['status'] == 1) {
            this.toastr.show('successfully uploaded');
          }else{
            this.toastr.error('successfully uploaded');

          }
        },
        err => {
          this.toastr.error(err.error);
        },
        () => {}
      );

    }
  }

  hasError(control) {
    const formControl = this.requestBook.controls[control];
    if (!formControl.touched &&  !this.isSubmitted) {
      return false;
    }
    return formControl.invalid;
  }


  checkFieldWithErrorType(control, errorType = 'required') {
    const formControl = this.requestBook.controls[control];
    if (!formControl.touched &&  !this.isSubmitted) {
      return false;
    }
    if (formControl.hasError(errorType)) {
      return true;
    }
  }


}
