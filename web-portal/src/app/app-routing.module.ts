import {NgModule} from '@angular/core';
import {CommonModule} from '@angular/common';
import {Routes, RouterModule} from '@angular/router';

import {MainComponent} from './main/main.component';
import {AboutComponent} from './about/about.component';
import {SearchComponent} from './search/search.component';
import {SupportComponent} from './support/support.component';
import {sidebarWidgetsComponent} from './sidebarWidgets/sidebarWidgets.component';
import {LoginComponent} from './login/login.component';
import {ContactComponent} from './contact/contact.component';
import {RequestBookComponent} from './request-book/request-book.component';
import {MassRequestComponent} from './mass-request/mass-request.component';
import {PersonalRequestComponent} from './personal-request/personal-request.component';
import {RentRequestComponent} from './rent-request/rent-request.component';
import {ProductlistComponent} from './shop/productlist/productlist.component';
import {ProductDetailComponent} from './shop/productDetail/productDetail.component';
import {AddBookComponent} from './add-book/add-book.component';

export const AppRoutes: Routes = [{
  path: '',
  component: MainComponent,
  children: [
    {
      path: '',
      component: ProductlistComponent
    },{
      path: 'home',
      component: ProductlistComponent
    }, {
      path: 'request-book',
      component: RequestBookComponent
    },
    {
      path: 'borrow-book',
      component: RentRequestComponent
    },
    {
      path: 'mass-request',
      component: MassRequestComponent
    },
    {
      path: 'personal-request',
      component: PersonalRequestComponent
    },
    {
      path: 'book-list',
      component: ProductlistComponent
    },
    {
      path: 'book-detail/:bookId',
      component: ProductDetailComponent
    },
    {
      path: 'product-detail',
      component: ProductDetailComponent
    },
    {
      path: 'about',
      component: AboutComponent
    },
    {
      path: 'contact',
      component: ContactComponent
    }, {
      path: 'search',
      component: SearchComponent
    },
    {
      path: 'support',
      component: SupportComponent
    },
    {
      path: 'login',
      component: LoginComponent
    },
    {
      path: 'books-add',
      component: AddBookComponent
    },
    {
      path: '',
      loadChildren: () => import('./portfolio/portfolio.module').then(m => m.PortfolioModule)
    }, {
      path: '',
      loadChildren: () => import('./testimonial/testimonial.module').then(m => m.TestimonialModule)
    }, {
      path: 'sidebar-widgets',
      component: sidebarWidgetsComponent
    }, {
      path: '',
      loadChildren: () => import('./session/session.module').then(m => m.SessionModule)
    }, {
      path: '',
      loadChildren: () => import('./shop/shop.module').then(m => m.ShopModule)
    }, {
      path: 'about/:keyword', component: AboutComponent
    }
  ]
}];

@NgModule({
  imports: [
    CommonModule,
    RouterModule.forRoot(AppRoutes)
  ],
  exports: [RouterModule],
  declarations: []
})
export class AppRoutingModule {
}

