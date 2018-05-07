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
SELECT `name` FROM movies
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

/* ----------------------
   ---- commit point ----
   ---------------------- */

/* 'ORDER BY' prac */
SELECT `name`, `year` FROM movies
ORDER BY `name` ASC;

SELECT `name`, `year`, imdb_rating FROM movies
ORDER BY `year` DESC;

/* 'LIMIT' prac */
SELECT * FROM movies
ORDER BY imdb_rating LIMIT 3;

/* 'CASE' prac */
SELECT `name`,
	CASE
  	WHEN imdb_rating > 8 THEN "Spetacular movie!"
    WHEN imdb_rating > 6 THEN "Not that good."
    ELSE "A pretty awful movie"
  END AS 'zREVIEW'
FROM movies;

SELECT `name`,
  CASE
    WHEN `genre` = 'romance' THEN 'chill'
    WHEN `genre` = 'comedy' THEN 'chill'
    ELSE 'intense'
  END AS 'Mood'
FROM movies;

SELECT
	`amazon_order_id`,
  `product_name`,
	CASE
    	WHEN `item_price` > 10 THEN 'Expensive'
      WHEN `item_price` > 1 THEN 'Affordable'
      ELSE 'unknown'
  END AS 'economics'
FROM `majide_test1`;

UPDATE celebs_table
SET twitter_handle = '@realDonaldTrump'
WHERE id = 9825;

DELETE FROM celebs_table
WHERE age > 30;

SELECT * FROM movies_table
WHERE movie_title BETWEEN 'A' AND 'J';

SELECT * FROM orders
JOIN customers
ON orders.customer_id = customers.customer_id;











/* end of this SQL file */