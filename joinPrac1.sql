SELECT *
FROM customers
JOIN orders
  ON customers.customer_id = orders.customer_id;

SELECT orders.order_id,
  customer.customer_name
FROM orders
JOIN customers
  ON orders.customer_id = customers.customer_id;

SELECT *
FROM orders
JOIN subscriptions
  ON orders.subscription_id = subscriptions.subscription_id
WHERE subscriptions.description = 'Fashion Magazine';

/****************/
/* commit point */
/****************/

SELECT COUNT(*) AS 'total newspaper subscribers'
FROM newspaper_subscribers_table;

SELECT COUNT(*) AS 'total online Fashion Magazine subscribers'
FROM online_suscribers_table
WHERE subscription_type = 'Fashion Magazine';

SELECT COUNT(*) AS 'total online & newspaper subscribers'
FROM online_subscribers_table
JOIN newspaper_subscribers_table
  ON online_subscribers_table.customer_id = newpaper_subscribers_table.customer_id;

SELECT *
FROM newspaper
LEFT JOIN online
  ON newspaper.id = online.id;

SELECT *
FROM newspaper
LEFT JOIN online
 ON newspaper.id = online.id
WHERE online.id IS NULL;

/* primary key to foreign key */
SELECT *
FROM classes
JOIN students
  ON classes.id = students.class_id;

/* This will get all the users from the month of march
 The 'WHERE' clause uses counter intuitive syntax to
 get only month '3' e.g. < >*/
SELECT COUNT(*) as 'Total subscribers in March'
FROM newspaper
WHERE month_start < 3 AND month_end > 3;










/* end of this SQL file */
