DELIMITER |
CREATE PROCEDURE update_used_for_score()

BEGIN
	SET @num := 0, @user_id := 0, @type := '', @date := '';

	UPDATE history SET is_used_for_score = 1 WHERE history.id IN (
		SELECT history_id FROM (
			SELECT
				history.id AS history_id,
				action.limitPerDay AS limit_per_day,
				action.point,
				@num := IF(
					@type = action_id,
					IF(
						@date = CONCAT(YEAR(history.created_at), '-', MONTH(history.created_at), '-', DAY(history.created_at)),
						IF (
							@user_id = user_id,
							@num + 1,
							1
						),
						1
					),
					1
				) AS row_number,
				@user_id := user_id AS user_id,
				@type := action_id AS action_id,
				@date := CONCAT(YEAR(history.created_at), '-', MONTH(history.created_at), '-', DAY(history.created_at)) AS `date`
			FROM history
			LEFT JOIN `action` ON action.id = action_id
			HAVING (row_number <= limit_per_day) OR (limit_per_day IS NULL)
			ORDER BY history.created_at ASC, user_id, action_id
		) AS history_id_count_for_vote
	);
END|
