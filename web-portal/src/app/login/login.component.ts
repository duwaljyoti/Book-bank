import { Component, OnInit } from '@angular/core';
import { GoogleLoginProvider, FacebookLoginProvider, AuthService } from 'angular-6-social-login';
import { SocialLoginModule, AuthServiceConfig } from 'angular-6-social-login';
import { Socialusers } from '../socialusers';
import { SocialLoginService } from '../social-login.service';
import { Router, ActivatedRoute, Params } from '@angular/router';
import {HttpClient} from '@angular/common/http';
import {LoggedInuserDataService} from "../shared/loggedInuserData.service";
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
    private httpClient: HttpClient,
    private loggedInEmailData: LoggedInuserDataService
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

  findUserApi = (user) => {
    return this.httpClient.get<Response>(`/users?email=${user.email}&name=${user.name}`);

  }

  Savesresponse(socialusers: Socialusers) {
    this.isLoggedIn = true;
    this.findUserApi(socialusers).subscribe(result => {
      // @ts-ignore
      localStorage.setItem('logged_in_user_id', result.data.id);
      localStorage.setItem('logged_in_user_email', socialusers.email);
      localStorage.setItem('loggedIn', 'true');
      this.loggedInEmailData.changeMessage(socialusers.email);

      this.router.navigate(['/home']);
    });
  }

  logOut() {
    this.isLoggedIn = false;
    localStorage.removeItem('logged_in_user_email');
  }
}
