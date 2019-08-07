import { Hero } from './../types/hero.type';
import { HeroesService } from './../heroes.service';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-heroes-list',
  templateUrl: './heroes-list.component.html',
  styleUrls: ['./heroes-list.component.css']
})
export class HeroesListComponent implements OnInit {
  heroes: Hero[] = []; // c'est pour dire que c'est un tableau de hero
  heroToAdd = '';
  selectedHero: Hero;

  constructor(private heroesService: HeroesService) {

  }

    //  heroesService sera stocké dans la class,comme champs, c'est le nom de l'objet. Le deuxième prend des majuscules au début,c'est le  type qui correspond au nom de la class.

  ngOnInit() {
    this.heroesService.getHeroes().subscribe(
    // function(Hero[] {return this.heroes = heroes; }
      (heroes: Hero[]) => this.heroes = heroes
    );
  }

  selectHero(hero: Hero) {
    this.selectedHero = hero;
  }

  addHero() {
    // si heroToAdd = '    coucou   '
    // alors heroToAdd.trim() = 'coucou'
    // donc si heroToAdd ='      '
    // alors heroToAdd.trim() = ''

    if (this.heroToAdd.trim().length > 0) {
      // const hero = { id: this.idToGenerate++, name: this.heroToAdd.trim() };
      //  pour que il affiche le heros suivi du numero attribué,on peut écrire a la place de '5' 'this.heroes.lenght+1'  et rajouter la class dans export class ou 'this.idToGenerate++ (++ est une incrémentation) this représente le héros qui se trouve dans la class AppComponent

     this.heroesService.createHero(this.heroToAdd).subscribe(
       (hero: Hero) => this.heroes.push(hero)
     );
      this.heroToAdd = ''; // c'est pour afficher aucun hero si on n'affiche pas de caractère
    } else {
      alert("le nom du heros ne doit pas être vide");
    }
  }
}
