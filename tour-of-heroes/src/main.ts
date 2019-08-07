import { enableProdMode } from '@angular/core';
import { platformBrowserDynamic } from '@angular/platform-browser-dynamic';

import { AppModule } from './app/app.module';
import { environment } from './environments/environment';

if (environment.production) {
  enableProdMode();
}

platformBrowserDynamic().bootstrapModule(AppModule)
  .catch(err => console.error(err)); //ceci est une closure,en javascrip on l'écrit
  
  // catch(function(err) {
  //  console.error(err);
  // });  fonction fléché en typescript

  
