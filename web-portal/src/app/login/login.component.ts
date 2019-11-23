import { Component, OnInit } from '@angular/core';
import { GoogleLoginProvider, FacebookLoginProvider, AuthService } from 'angular-6-social-login';
import { SocialLoginModule, AuthServiceConfig } from 'angular-6-social-login';
import { Socialusers } from '../socialusers';
import { SocialLoginService } from '../social-login.service';
import { Router, ActivatedRoute, Params } from '@angular/router';
import {HttpClient} from '@angular/common/http';
@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
  response;
  socialusers = new Socialusers();
  isLoggedIn = false;
  constructor(
    public OAuth: AuthService,
    private SocialloginService: SocialLoginService,
    private router: Router,
    private httpClient: HttpClient
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
      this.Savesresponse(socialusers);
    });
  }

  findUserApi = (userEmail) => {
    return this.httpClient.get<Response>(`/api/users?email=${userEmail}`);
  }

  Savesresponse(socialusers: Socialusers) {
    console.log('saves response');
    this.isLoggedIn = true;
    this.findUserApi(socialusers.email).subscribe(result => {
      // @ts-ignore
      localStorage.setItem('logged_in_user_id', result.data.id);
      localStorage.setItem('logged_in_user_email', socialusers.email);
      localStorage.setItem('loggedIn', 'true');
    });
  }

  logOut() {
    this.isLoggedIn = false;
    localStorage.removeItem('logged_in_user_email');
  }
}
