select *
from purchases
order by id
limit 10;

select *
from gameplays
order by id
limit 10;

/* the daily revenue */
select
  date(created_at) as the_day,
  sum(price) as sales_for_day
from purchases
group by 1
order by 1;

/* same query as above but excluding refunds */
select
	date(created_at) as day,
	round(sum(price), 2) as daily_rev
from purchases
where refunded_at is not null
group by 1
order by 1;

select
  date(created_at) as day_played,
  count(distinct user_id) as dau
from gameplays
group by 1
order by 1;

select
  date(created_at) as date_played,
  platform,
  count(distinct user_id) as dau
group by 1, 2
order by 1, 2








/* end of this SQL file */