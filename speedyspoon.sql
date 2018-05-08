SELECT *
FROM orders
ORDER BY id
LIMIT 100;

SELECT *
FROM order_items
ORDER BY id
LIMIT 100;

SELECT date(ordered_at) as dateOrdered
FROM orders_table
ORDER BY 1
LIMIT 100;

/* group rows by 'order_at' column
  and count how many orders there were
  for each date */
SELECT DATE(ordered_at), 1,
FROM orders_table
GROUP BY 1
ORDER BY 1 ASC
limit 100;

select
	date(ordered_at) as dateOrdered,
  count(1) as totalOrders
from orders
group by 1
order by 1 asc
limit 100;

/* sum the daily order amount
 by INNER JOIN ing two tables */
SELECT
  date(ordered_at) as 'order date',
  round(sum(amount_paid), 2) as 'total sales'
FROM orders
JOIN order_items
  ON orders.id = order_items.order_id
GROUP BY 1
ORDER BY 1;