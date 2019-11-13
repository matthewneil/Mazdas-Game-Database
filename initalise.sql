DROP TABLE ps4;
DROP TABLE ps3;
DROP TABLE xboxone;
DROP TABLE xbox360;
DROP TABLE pc;
DROP TABLE game;

CREATE TABLE game (
    gameID int NOT NULL,
    title varchar(100) NOT NULL,
    physical bit,
    story bit,
    complete bit,
    platform varchar(10),
	PRIMARY KEY (gameID)
);

INSERT INTO game VALUES(0, 'ignore', 0, 0, 0, 'ignore');

CREATE TABLE ps4 (
    gID int NOT NULL,
    platTrophy bit,
    proEnhanced bit,
	PRIMARY KEY (gID),
    FOREIGN KEY (gID) REFERENCES game(gameID)
);

CREATE TABLE ps3 (
    gID int,
    platTrophy bit,
	PRIMARY KEY (gID),
    FOREIGN KEY (gID) REFERENCES game(gameID)
);

CREATE TABLE xboxone (
    gID int,
    xEnhanced bit,
    achievements bit,
	PRIMARY KEY (gID),
    FOREIGN KEY (gID) REFERENCES game(gameID)
);

CREATE TABLE xbox360 (
    gID int,
    achievements bit,
	PRIMARY KEY (gID),
    FOREIGN KEY (gID) REFERENCES game(gameID)
);

CREATE TABLE pc (
    gID int,
	achievements bit,
	PRIMARY KEY (gID),
    FOREIGN KEY (gID) REFERENCES game(gameID)
);
