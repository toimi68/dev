import { HttpClient, HttpHeaders } from "@angular/common/http";
import { Hero } from "./types/hero.type";
import { Injectable } from "@angular/core";
import { Observable } from "rxjs";

const headers = new HttpHeaders({
  "content-Type": "application/json"
  // on déclare une constante header égale à newhttpHeaders (nouvelle objet,création d'objet).
  // on l'importe a angular.les parenthèses correspondent au constructeur d'objet. en php c'est la même notion
});
const httpOptions = { headers };

@Injectable({
  providedIn: "root"
})
export class HeroesService {
  private heroesUrl = "api/heroes";

  constructor(private http: HttpClient) {}

  // Observable<Hero[]> désigne un Observable qui reoturnera plus tard un tableau de Hero.
  // Le lien etre Observable et Hero[] est exprimé gràce à la généricité (la présence de chevrons <>).

  getHeroes(): Observable<Hero[]> {
    // la généricité permet aussi de dire à notre client http que nous lui demandons de
    // créer un observable qui nous renverra un tableau de héros
    return this.http.get<Hero[]>(this.heroesUrl);
  }
  createHero(name: string): Observable<Hero> {
    return this.http.post<Hero>(this.heroesUrl, { name }, httpOptions);
    //return{id: this.idToGenerate++, name }; // nom de propriété (name:) et valeur (name)    qui peut être écrit aussi par name
  }
  getHeroById(id: number): Observable<Hero> {
    return this.http.get<Hero>(this.heroesUrl + "/" + id);
    // elle prend notre tableau de héros,et find(methode) qui prend en paramètre

    // version javascript: return this.heroes.find(function(hero){
    // return hero.id === id;
    // }); fin javascript

    // version moins simplifié
    // for (const hero of this.heroes) {
    // const hero = this.heroes[1];
    // if (id === hero.id) {
    // return Hero; // return aura la propriété d'arrêter ma boucle
    // }
    // } // fin boucle For
    // return null; // en cas ou aucun id correspond à rien, on retourne rien.
  }
}
