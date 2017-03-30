import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { APP_BASE_HREF, CommonModule } from '@angular/common';
import { HttpModule } from '@angular/http';
import { RouterModule } from '@angular/router';
import { AppComponent } from './app.component';
import { HomeView } from './home/home-view.component';
import { TransferHttpModule } from '../modules/transfer-http/transfer-http.module';
import { MaterialModule } from '@angular/material';
import { FooterComponent } from './globals/footer/footer.component';


@NgModule({
	imports: [
    CommonModule,
    HttpModule,
    TransferHttpModule,
    MaterialModule,
    RouterModule.forRoot([
      { path: '', component: HomeView, pathMatch: 'full'},
      { path: 'lazy', loadChildren: './+lazy/lazy.module#LazyModule'},
      { path: 'main', loadChildren: './main/main.module#MainModule'}
    ])
	],
	declarations: [ AppComponent, HomeView, FooterComponent ],
  exports: [ AppComponent ]
})
export class AppModule {}
