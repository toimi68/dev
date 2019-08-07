import { HeroEditComponent } from './hero-edit/hero-edit.component';
import { HeroesListComponent } from './heroes-list/heroes-list.component';
import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

const routes: Routes = [
  {
    path: "", //path c'est le chemin. Ici il est vide
    component: HeroesListComponent
  },
  {
    path: "edit/:id", // les deux points introduisent un paramètres.le root est casser pour le moment
    component: HeroEditComponent
  }
];


@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
