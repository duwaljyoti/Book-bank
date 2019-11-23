import { Component, OnInit } from '@angular/core';
import { GoogleLoginProvider, FacebookLoginProvider, AuthService } from 'angular-6-social-login';
import { SocialLoginModule, AuthServiceConfig } from 'angular-6-social-login';
import { Socialusers } from '../socialusers';
import { SocialLoginService } from '../social-login.service';
import { Router, ActivatedRoute, Params } from '@angular/router';
@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
  response;
  socialusers = new Socialusers();
  constructor(
    public OAuth: AuthService,
    private SocialloginService: SocialLoginService,
    private router: Router
  ) { }
  ngOnInit() {
  }

  public socialSignIn(socialProvider: string) {
    let socialPlatformProvider;
    // todo later do with facebook.
    // reference article =.> https://dzone.com/articles/login-with-facebook-and-google-using-angular-8
    if (socialProvider === 'facebook') {
      socialPlatformProvider = FacebookLoginProvider.PROVIDER_ID;
    } else if (socialProvider === 'google') {
      socialPlatformProvider = GoogleLoginProvider.PROVIDER_ID;
    }
    this.OAuth.signIn(socialPlatformProvider).then(socialusers => {
      console.log(socialProvider, socialusers);
      console.log(socialusers);
      this.Savesresponse(socialusers);
    });
  }
  Savesresponse(socialusers: Socialusers) {
    console.log(12121, socialusers);
    // this.SocialloginService.Savesresponse(socialusers).subscribe((res: any) => {
    //   debugger;
    //   console.log(res);
    //   this.socialusers=res;
    //   this.response = res.userDetail;
    //   localStorage.setItem('socialusers', JSON.stringify( this.socialusers));
    //   console.log(localStorage.setItem('socialusers', JSON.stringify(this.socialusers)));
    //   this.router.navigate([`/Dashboard`]);
    // })
  }
}
