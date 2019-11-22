import {Injectable} from '@angular/core';
import {HttpEvent, HttpHandler, HttpInterceptor, HttpRequest} from '@angular/common/http';
import {Observable} from 'rxjs';
import {environment} from '../../environments/environment';

/**
 * Prepend API URL to the API request only if
 * the API request is not to local data service file
 */

@Injectable()
export class ApiUrlInterceptor implements HttpInterceptor {
  intercept(
    req: HttpRequest<any>, next: HttpHandler
  ): Observable<HttpEvent<any>> {
    const apiUrl = req.url;
    let fullApiURL;
    if (apiUrl.includes('.json')) {
      fullApiURL = req.clone({url: `${req.url}`});
    } else {
      const baseUrl = environment.apiUrl;
      fullApiURL = req.clone({ url: `${baseUrl}${req.url}` });
    }
    return next.handle(fullApiURL);
  }
}
