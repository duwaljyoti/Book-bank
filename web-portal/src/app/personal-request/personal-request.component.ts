import { Component, OnInit } from '@angular/core';
import {FormBuilder, FormGroup, Validators} from "@angular/forms";
import {PageTitleService} from "../core/page-title/page-title.service";
import {ChkService} from "../service/chk.service";
import {ToastrService} from 'ngx-toastr';

@Component({
  selector: 'app-personal-request',
  templateUrl: './personal-request.component.html',
  styleUrls: ['./personal-request.component.css']
})
export class PersonalRequestComponent implements OnInit {

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
      reason   : [null, [Validators.required] ],
      publication   : [null, [] ],
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
        this.toastr.error(err['error']['message']);
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
      data.is_mass = 0;
      this.service.submitMassRequest(data).subscribe(response => {
          if (response['status'] == 1) {
            this.toastr.show('successfully uploaded');
          }else{
            this.toastr.error('successfully uploaded');

          }
        },
        err => {
          this.toastr.error(err['error']['message']);
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
