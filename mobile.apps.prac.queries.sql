SELECT COUNT (*)
FROM fake_apps;

SELECT COUNT (*) FROM fake_apps
WHERE price = 0.00;

SELECT SUM (downloads) FROM fake_apps;

SELECT MAX (downloads) FROM  fake_apps;

SELECT MIN (downloads) FROM fake_apps;

SELECT MAX (price) FROM fake_apps;

SELECT AVG (downloads) FROM fake_apps;

SELECT AVG (price) FROM fake_apps;

SELECT `name`, ROUND (price, 0) FROM fake_apps;

SELECT ROUND (AVG(price), 2) FROM fake_apps;

SELECT price, COUNT (*) FROM fake_apps
GROUP BY price;

SELECT price, COUNT (*)
FROM fake_apps
WHERE downloads > 20000
GROUP BY price;

SELECT category, SUM (downloads)
FROM fake_apps
GROUP BY category; 