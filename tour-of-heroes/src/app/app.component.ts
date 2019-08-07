import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  // export,est liée à typescript. on export le composant,forcèment on aura un import... c'est le mécanisme (export/import)

  name = '';
  heroToAdd= '';
}
   /* addHero() {
      // const heroName = 'Sylvain'; // ici la fonction est constante,elle est fixe
      // this.heroes.push(heroName); // this est l'objet qui a été créer à partir de cette class. une class sert à creer des objets. this est la variable hero de ma variable courante.

      // this.heroes.push(this.heroToAdd);
      if(this.heroToAdd !== ''){
      this.heroes.push(this.heroToAdd); // push sert à insérer un hero et pull à l'enlever
      this.heroToAdd ='';
      }// c'est pour afficher aucun hero si on n'affiche pas de caractère
        else{
          alert('le nom du heros ne doit pas être vide');
        }
     // if(this.heroToAdd.length >0){ ou encore if(this.heroToAdd.trim().lenght > 0 {
     //  this.heroes.push(this.heroToAdd.trim());

     //  this.heroes.push(this.heroToAdd); est une autre écrtiure qui aurait pu fonctionné aussi


  /*  si heroToAdd = ' coucou '
      alors heroToAdd.trim() = 'coucou'

      si heroToAdd = '  '
      alors heroToAdd.trim() = ''   */
//   }
// }
// FIN DE CLASS.app.components

