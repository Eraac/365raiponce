CREATE OR REPLACE VIEW scoreboard AS
SELECT
	user.username AS username,
    SUM(action.point) AS score
FROM history
LEFT JOIN `user` ON user.id = history.user_id
LEFT JOIN `action` ON action.id = history.action_id
WHERE
	history.is_used_for_score = 1
GROUP BY user.id
ORDER BY score DESC;
