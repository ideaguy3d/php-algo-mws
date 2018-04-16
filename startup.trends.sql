SELECT COUNT(*) AS 'total companies',
	SUM(valuation) AS 'total value',
  MAX(raised) AS 'most raised'
FROM startups;