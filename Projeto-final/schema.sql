CREATE DATABASE "poketmon";

CREATE TABLE "pokemon"(
    idpokemon serial,
    nome varchar (150) NOT NULL, 
    habilidade varchar (200) NOT NULL,
    nivel integer NOT NULL,
    idtipo int NOT NULL,
    CONSTRAINT "PokemonPK" PRIMARY KEY (idpokemon),
    CONSTRAINT "PokemonFK" FOREIGN KEY (idtipo)
        REFERENCES "tipo" (idtipo)
        ON DELETE SET NULL
        ON UPDATE CASCADE
);

CREATE TABLE "tipo"(
    idtipo serial,
    nome varchar (150) NOT NULL,
    descricao varchar (500),
    CONSTRAINT "PokemonTipoPK" PRIMARY KEY (idtipo)
);