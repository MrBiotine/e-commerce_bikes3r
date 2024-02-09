SELECT c.number_order,c.date_order
FROM order_customer c
INNER JOIN user u
ON c.user_id = u.id
WHERE u.id = '2'