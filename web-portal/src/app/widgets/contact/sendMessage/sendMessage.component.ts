/*
 * Send message
 * Used in another component.
 */
import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import { FormControl, FormGroup, FormBuilder, Validators } from '@angular/forms';

@Component({
  selector: '[angly-sendMessage]',
  templateUrl: './sendMessage.component.html',
  styleUrls: ['./sendMessage.component.scss']
})
export class SendMessageComponent implements OnInit {

   sendMessageForm : FormGroup;
    isSubmitted = false;
   constructor( private formBuilder : FormBuilder) {

      this.sendMessageForm = this.formBuilder.group({
         first_name : [null, [Validators.required] ],
         last_name  : [null, [Validators.required] ],
         email      : [null, [Validators.required, Validators.email] ],
         message   : [null, [Validators.required] ]
      });
   }

   ngOnInit() {
   }

   /*
    * sendMessage
    */
   sendMessage(values:any)
   {
     this.isSubmitted = true;
     if(this.sendMessageForm.valid)
     {
       console.log(values);
     } else{
       console.log("Error!");
     }
   }

  hasError(control) {
    const formControl = this.sendMessageForm.controls[control];
    if (!formControl.touched &&  !this.isSubmitted) {
      return false;
    }
    return formControl.invalid;
  }


  checkFieldWithErrorType(control, errorType = 'required') {
    const formControl = this.sendMessageForm.controls[control];
    if (!formControl.touched &&  !this.isSubmitted) {
      return false;
    }
    if (formControl.hasError(errorType)) {
      return true;
    }
  }
}
