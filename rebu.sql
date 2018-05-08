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









/* end of this SQL file */

