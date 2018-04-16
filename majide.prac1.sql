/* sum up sales grouped by amazon_order_id */
SELECT `amazon_order_id`, SUM(`item_price`)
FROM `majide_test1`
GROUP BY `amazon_order_id`

SELECT `amazon_order_id`, `order_status`
  COUNT(*) AS 'total rows with this AOID',
  SUM(item_price) AS 'sum for this AOID',
FROM `majide_test1`
GROUP BY `amazon_order_id`;

/* serious 1st attempt at least creating an aggregated
  table that doesn't have duplicates*/
SELECT amazon_order_id, order_status, asin, item_price,
  COUNT(amazon_order_id) AS 'total duplicates',
  COUNT(order_status) AS 'order status duplicates'
FROM majide_test1
GROUP BY amazon_order_id, order_status, asin, item_price
HAVING order_status != 'Cancelled'
  AND order_status != 'Pending';


SELECT amazon_order_id, order_status, asin, item_price,
  COUNT(amazon_order_id) AS 'id duplicates',
  COUNT(order_status) AS 'order status duplicates'
FROM majide_test1
GROUP BY amazon_order_id, order_status, asin, item_price
HAVING order_status = 'Shipped';





/* end of this SQL file */