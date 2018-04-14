/* AS prac */
SELECT imdb_rating AS 'rate'
FROM movies
WHERE rate > 8;

/* DISTINCT prac */
SELECT DISTINCT genre
FROM movies;


/* LIKE practice */
SELECT * FROM movies
WHERE movie_name LIKE 'Se_en';

SELECT * FROM movies
WHERE movie_name LIKE '%man%';


/* is null */
SELECT name FROM movies
WHERE imdb_rating IS NULL;
