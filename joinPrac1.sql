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

