/* "AS" prac */
SELECT imdb_rating AS 'rate'
FROM movies
WHERE rate > 8;

/* "DISTINCT" prac */
SELECT DISTINCT genre
FROM movies;


/* "LIKE" prac */
SELECT * FROM movies
WHERE movie_name LIKE 'Se_en';

SELECT * FROM movies
WHERE movie_name LIKE '%man%';


/* "IS NULL" prac */
SELECT name FROM movies
WHERE imdb_rating IS NULL;


/* ----------------------
   ---- commit point ----
   ---------------------- */

/* 'BETWEEN' and 'AND' prac */
SELECT * FROM movies
WHERE name BETWEEN 'D' AND 'G';

SELECT * FROM movies
WHERE year BETWEEN 1970 AND 1979;

SELECT * FROM movies
WHERE `year` BETWEEN 1970 AND 1979
  AND imdb_rating > 8;

SELECT * FROM movies
WHERE `year` < 1985 AND imdb_rating > 8
  AND genre = 'horror';

/* 'OR' prac */
SELECT * FROM movies
WHERE `year` > 2014 OR genre = 'action';

SELECT * FROM  movies
WHERE genre = 'comedy' OR genre = 'romance';

SELECT * FROM  movies
WHERE genre = 'comedy' OR genre = 'romance'
ORDER BY -imdb_rating;

