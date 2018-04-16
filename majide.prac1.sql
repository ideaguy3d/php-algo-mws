/* sum up sales grouped by amazon_order_id */
SELECT `amazon_order_id`, SUM(`item_price`)
FROM `majide_test1`
GROUP BY `amazon_order_id`

SELECT `amazon_order_id`, `order_status`
  COUNT(*) AS 'total rows with this AOID',
  SUM(item_price) AS 'sum for this AOID',
FROM `majide_test1`
GROUP BY `amazon_order_id`;







/* end of this SQL file */