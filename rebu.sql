/* simple inner join */
SELECT *
FROM trips
INNER JOIN cars
  ON trips.car_id = cars.id;

/* simple left join */
SELECT *
FROM trips
LEFT JOIN riders
	ON trips.rider_id = riders.id;

/* if there are 4 rows in each table, a
 simple CROSS JOIN will create 16 rows (4x4) */
SELECT *
FROM trips
CROSS JOIN riders;

SELECT * FROM riders
UNION
SELECT * FROM riders2;

SELECT AVG(cost) as averageCostOfAllTrips
FROM trips;

SELECT *
FROM riders
WHERE total_trips < 500;

SELECT *
FROM cars
WHERE status = 'active';

SELECT COUNT(*) as 'Total Active Cars'
FROM cars
WHERE status = 'active';

SELECT *
FROM cars
ORDER BY trips_completed DESC
LIMIT 2;

/* random SQL prac */
select
	case name
  	when 'kale-smoothie'    then 'smoothie'
    when 'banana-smoothie'  then 'smoothie'
    when 'orange-juice'     then 'drink'
    when 'soda'             then 'drink'
    when 'blt'              then 'sandwich'
    when 'grilled-cheese'   then 'sandwich'
    when 'tikka-masala'     then 'dinner'
    when 'chicken-parm'     then 'dinner'
    else 'other'
  end as category,
  round(1.0 * sum(amount_paid) /
        (select sum(amount_paid) from order_items) * 100.0, 2) as pct
from order_items
group by category
order by pct desc;











/* end of this SQL file */

