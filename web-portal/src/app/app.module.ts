import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { BrowserAnimationsModule} from '@angular/platform-browser/animations';
import { HttpClientModule, HTTP_INTERCEPTORS} from '@angular/common/http';
import { FormsModule, ReactiveFormsModule} from '@angular/forms';
import { SlickModule } from 'ngx-slick';
import { DirectivesModule } from './core/directive/directives.module';
import { AgmCoreModule } from '@agm/core';
import { Ng5SliderModule } from 'ng5-slider';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';

/* Routing */
import { AppRoutingModule } from './app-routing.module';

/* Service */
import { ChkService } from './service/chk.service';

/* components */
import { AppComponent } from './app.component';
import { MainComponent } from './main/main.component';
import { HomeComponent } from './home/home.component';
import { PricingComponent } from './pricing/pricing.component';
import { ContactComponent } from './contact/contact.component';
import { FooterComponent } from './footer/footer.component';
import { HeaderComponent } from './header/header.component';
import { MenuComponent } from './menu/menu.component';

import { MenuItems } from './core/menu/menu-items/menu-items';
import { MenuToggleModule } from './core/menu-toggle.module';
import { PageTitleService } from './core/page-title/page-title.service';
import { WidgetsModule } from './widgets/widgets.module';
import { FeaturesComponent } from './features/features.component';
import { AboutComponent } from './about/about.component';
import { SearchComponent } from './search/search.component';
import { SupportComponent } from './support/support.component';
import { sidebarWidgetsComponent } from './sidebarWidgets/sidebarWidgets.component';
import {ApiUrlInterceptor} from './shared/api-url-interceptor';
import {ToastrModule} from 'ngx-toastr';
import {RequestBookComponent} from "./request-book/request-book.component";
import {AuthService, AuthServiceConfig, GoogleLoginProvider} from 'angular-6-social-login';
import { LoginComponentComponent } from './login-component/login-component.component';
import { LoginComponent } from './login/login.component';
import { MassRequestComponent } from './mass-request/mass-request.component';


export function socialConfigs() {
  const config = new AuthServiceConfig(
    [
      {
        id: GoogleLoginProvider.PROVIDER_ID,
        provider: new GoogleLoginProvider('57087575981-q0srh877tatg513tu706pbbjl94hgd3k.apps.googleusercontent.com')
      }
    ]
  );
  return config;
}

@NgModule({
   declarations: [
      AppComponent,
      MainComponent,
      HomeComponent,
      PricingComponent,
      ContactComponent,
      FooterComponent,
      HeaderComponent,
      MenuComponent,
      FeaturesComponent,
      AboutComponent,
      SearchComponent,
      SupportComponent,
      sidebarWidgetsComponent,
      RequestBookComponent,
     // remove this loginComponentComponent
      LoginComponentComponent,
      LoginComponent,
      MassRequestComponent,
   ],
   imports: [
      BrowserModule,
      BrowserAnimationsModule,
      FormsModule,
      ReactiveFormsModule,
      HttpClientModule,
      AppRoutingModule,
      WidgetsModule,
      MenuToggleModule,
      DirectivesModule,
      Ng5SliderModule,
      SlickModule.forRoot(),
      AgmCoreModule.forRoot({
         apiKey: 'AIzaSyD4y2luRxfM8Q8yKHSLdOOdNpkiilVhD9k'
      }),
     NgbModule,
     ToastrModule.forRoot(),
   ],
   providers: [
      MenuItems,
      PageTitleService,
      ChkService,
     { provide: HTTP_INTERCEPTORS, useClass: ApiUrlInterceptor, multi: true },
     AuthService,
     {
       provide: AuthServiceConfig,
       useFactory: socialConfigs
     }
   ],
   bootstrap: [AppComponent]
})
export class AppModule { }
