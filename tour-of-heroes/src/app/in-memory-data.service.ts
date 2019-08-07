import { Hero } from "./types/hero.type";
import { Injectable } from "@angular/core";
import { InMemoryDbService } from "angular-in-memory-web-api";

@Injectable({
  providedIn: "root"
})
export class InMemoryDataService implements InMemoryDbService {
  constructor() {}

  createDb() {
    const heroes = [
      { id: 11, name: "Batman" },
      { id: 12, name: "Superman" },
      { id: 13, name: "Catwoman" },
      { id: 14, name: "Ironman" },
      { id: 15, name: "Prettywoman" },
      { id: 16, name: "Gentleman" },
      { id: 17, name: "Megaman" },
      { id: 18, name: "Magneto" },
      { id: 19, name: "Adama" },
      { id: 20, name: "Wolverine" }
    ];

    return { heroes };
  }

  genId(heroes: Hero[]): number {
    return heroes.length + 11;
  }
}
