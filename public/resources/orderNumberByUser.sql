SELECT u.email, COUNT(b.id)
FROM user u
INNER JOIN order_customer c
ON u.id = c.user_id
inner JOIN order_bike b
ON c.user_id = b.id
GROUP BY (u.email)