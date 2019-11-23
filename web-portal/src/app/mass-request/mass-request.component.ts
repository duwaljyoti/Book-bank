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
      category   : [null, [Validators.required] ],
    });
  }

  ngOnInit() {
    this.service.getCategories().subscribe(response => {
        if (response['status'] === 1) {
          this.categories = response.data;
        }else{
          this.toastr.error(response['message']);
        }
      },
      err => {
        this.toastr.error(err['error']['details']['message']);
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
      let data = this.requestBook.value;
      data.requested_by = localStorage.getItem('api_token');
      this.service.submitMassRequest(this.requestBook.value).subscribe(response => {
          if (response['status'] === 1) {
            this.toastr.show('successfully uploaded');
          }else{
            this.toastr.error('successfully uploaded');

          }
        },
        err => {
          this.toastr.error(err['error']['details']['message']);
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
