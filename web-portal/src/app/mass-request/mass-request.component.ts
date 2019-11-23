import { Component, OnInit } from '@angular/core';
import {FormBuilder, FormGroup, Validators} from "@angular/forms";
import {PageTitleService} from "../core/page-title/page-title.service";
import {ChkService} from "../service/chk.service";

@Component({
  selector: 'app-mass-request',
  templateUrl: './mass-request.component.html',
  styleUrls: ['./mass-request.component.css']
})
export class MassRequestComponent implements OnInit {

  requestBook : FormGroup;
  isSubmitted = false;
  constructor( private formBuilder : FormBuilder, private pageTitleService: PageTitleService, private service:ChkService) {

    /* Page title */
    this.pageTitleService.setTitle("Request or rent the book");

    /* Page subTitle */
    this.pageTitleService.setSubTitle("You can request a book or rent a book");

    this.requestBook = this.formBuilder.group({
      name : [null, [Validators.required] ],
      no_of_books  : [null, [Validators.required] ],
      pan_number      : [null, [Validators.required] ],
      reason   : [null, [Validators.required] ],
      publication   : [null, [] ],
    });
  }

  ngOnInit() {
  }

  /*
   * sendMessage
   */
  submit(values:any)
  {
    this.isSubmitted = true;
    if(this.requestBook.valid)
    {
      console.log(this.requestBook.value);

    } else{
      console.log("Error!");
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
