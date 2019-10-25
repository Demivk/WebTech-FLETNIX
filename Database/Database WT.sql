USE master
GO

-- Deleteing WT_FLETNIX if it exists
IF DB_ID('WT_FLETNIX') IS NOT NULL
BEGIN
	RAISERROR('Deleting database WT_FLETNIX', 0, 1) WITH NOWAIT
	ALTER DATABASE WT_FLETNIX SET SINGLE_USER WITH ROLLBACK IMMEDIATE
	DROP DATABASE WT_FLETNIX
END

-- Creating the database WT_FLETNIX
RAISERROR('Creating database WT_FLETNIX', 0, 1) WITH NOWAIT
CREATE DATABASE WT_FLETNIX
GO

USE WT_FLETNIX

CREATE TABLE Genre(
	genre			VARCHAR(50)		NOT NULL,

	CONSTRAINT pk_genre PRIMARY KEY (genre)
)

CREATE TABLE Movie(
	movie_id		INTEGER			NOT NULL,
	title			VARCHAR(255)	NOT NULL,
	[year]			INTEGER			NOT NULL,
	duration		INTEGER			NOT NULL,
	[description]	VARCHAR(500)	NOT NULL,
	img_name		VARCHAR(255)	NOT NULL,
	[url]			VARCHAR(50)		NOT NULL,

	CONSTRAINT pk_movie PRIMARY KEY (movie_id),
	/*CONSTRAINT ak_movie UNIQUE (movie_id, title, [year]),*/
	CONSTRAINT ck_movie_duration CHECK (duration > 0),
	CONSTRAINT ck_movie_year CHECK ([year] > 1800 AND [year] <= year(getdate()))
)

CREATE TABLE Person(
	person_id		INTEGER			NOT NULL,
	[name]			VARCHAR(100)	NOT NULL,

	CONSTRAINT pk_person PRIMARY KEY (person_id),
	CONSTRAINT ak_person UNIQUE (person_id, [name])
)

CREATE TABLE Movie_Genre(
	movie_id		INTEGER			NOT NULL,
	genre			VARCHAR(50)		NOT NULL,

	CONSTRAINT pk_movie_genre PRIMARY KEY (movie_id, genre),
	CONSTRAINT fk_movie_genre_movie FOREIGN KEY (movie_id) REFERENCES Movie(movie_id)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	CONSTRAINT fk_movie_genre_genre FOREIGN KEY (genre) REFERENCES Genre(genre)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)


CREATE TABLE Movie_Cast(
	movie_id		INTEGER			NOT NULL,
	person_id		INTEGER			NOT NULL,

	CONSTRAINT pk_movie_cast PRIMARY KEY (movie_id, person_id),
	CONSTRAINT fk_movie_cast_movie FOREIGN KEY (movie_id) REFERENCES Movie(movie_id)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	CONSTRAINT fk_movie_cast_person FOREIGN KEY (person_id) REFERENCES Person(person_id)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)

CREATE TABLE Movie_Directors(
	movie_id		INTEGER			NOT NULL,
	person_id		INTEGER			NOT NULL,

	CONSTRAINT pk_movie_director PRIMARY KEY (movie_id, person_id),
	CONSTRAINT fk_movie_director_person FOREIGN KEY (person_id) REFERENCES Person(person_id)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	CONSTRAINT fk_movie_director_movie FOREIGN KEY (movie_id) REFERENCES Movie(movie_id)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)

CREATE TABLE customer (
	firstname			VARCHAR(20)		NOT NULL,
	lastname			VARCHAR(30)		NOT NULL,
	gender				VARCHAR(6)		NULL,
	email				VARCHAR(100)	NOT NULL,
	birthday			DATE			NULL,
	country_name		VARCHAR(50)		NOT NULL,
	card_number			VARCHAR(30)		NOT NULL,
	username			VARCHAR(30)		NOT NULL,
	password			VARCHAR(30)		NOT NULL,
	subscription_type	VARCHAR(10)		NOT NULL,

	CONSTRAINT pk_customer PRIMARY KEY (email),
	CONSTRAINT ak_username_password UNIQUE (username, password)
)

PRINT('Database WT_FLETNIX has been created')