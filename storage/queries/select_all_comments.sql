
SELECT
	*
FROM
	comments A
	JOIN users B ON B.id = A.user_id
;

