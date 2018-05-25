/* query orders by date */
SELECT
	DATE(ordered_at) AS the_date,
	COUNT(1) AS orders
FROM orders
GROUP BY 1
ORDER BY 1
LIMIT 10;

SELECT *
FROM orders
LIMIT 10;

/* get daily revenue of kale smoothie product */
SELECT
	DATE(ordered_at) AS the_day,
	ROUND(SUM(amount_paid), 2) AS revenue_for_day
FROM orders
	INNER JOIN order_items
  ON orders.id = order_items.order_id
WHERE name = 'kale-smoothie'
GROUP BY 1
ORDER BY 1
LIMIT 10;


/* look at data real quick */
SELECT *
FROM orders
LIMIT 10;
SELECT *
FROM order_items
LIMIT 10;