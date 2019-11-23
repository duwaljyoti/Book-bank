import {Component, OnInit} from '@angular/core';
import {PageTitleService} from '../core/page-title/page-title.service';
import {ChkService} from '../service/chk.service';
import {FormBuilder, FormGroup, Validators} from "@angular/forms";

@Component({
  selector: 'angly-request-book',
  templateUrl: './request-book.component.html',
  styleUrls: ['./request-book.component.scss']
})
export class RequestBookComponent implements OnInit {

  requestBook : FormGroup;
  isSubmitted = false;
  fileToUpload: any;
  categories = [
    {'name': 'art and music', 'value': 'art and music'},
    {'name': 'biographics', 'value': 'biographics'},
    {'name': 'business', 'value': 'business'},
    {'name': 'kids', 'value': 'kids'},
    {'name': 'comics', 'value': 'comics'},
    {'name': 'computer and techs', 'value': 'Computer and techs'},
    {'name': 'cooking', 'value': 'cooking'},
    {'name': 'hobbies and crafts', 'value': 'hobbies and crafts'},
    {'name': 'Educations and references', 'value': 'Educations and references'},
    {'name': 'health and fitness', 'value': 'health and fitness'},
    {'name': 'history', 'value': 'history'},
  ];
  constructor( private formBuilder : FormBuilder, private pageTitleService: PageTitleService, private service:ChkService) {

    /* Page title */
    this.pageTitleService.setTitle("Request or rent the book");

    /* Page subTitle */
    this.pageTitleService.setSubTitle("You can request a book or rent a book");

    this.requestBook = this.formBuilder.group({
      book_name : [null, [Validators.required] ],
      author_name  : [null, [Validators.required] ],
      category      : [null, [Validators.required] ],
      description   : [null, [Validators.required] ],
      type   : [null, [] ],
      image   : [null, [] ]
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
      this.requestBook.value.image = this.fileToUpload;
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

  handleFileInput(files: FileList) {
    this.fileToUpload = files.item(0);
  }

}
