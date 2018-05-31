SELECT *
FROM new_products
LIMIT 10;

SELECT *
FROM legacy_products
LIMIT 10;

SELECT brand FROM legacy_products
UNION
SELECT brand FROM new_products;

