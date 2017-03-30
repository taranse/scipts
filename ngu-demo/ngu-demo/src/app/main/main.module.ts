import { NgModule, Component } from '@angular/core';
import { RouterModule } from '@angular/router';
import { MainRoutingModule } from './main-routing.module';
import { MainComponent } from './main.component';


@NgModule({
  imports: [
    MainRoutingModule
  ],
  declarations: [MainComponent]
})
export class MainModule { }
