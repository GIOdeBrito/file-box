

CREATE TABLE users (
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  name TEXT NOT NULL,
  secret TEXT NOT NULL,
  isadmin INTEGER NULL
);


INSERT INTO users (name, secret, isadmin) VALUES ('admin', 'admin', 1);

--- SELECT * FROM users;

CREATE TABLE comments (
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  content TEXT NOT NULL,
  user_id INTEGER NOT NULL,
  created_at DATE NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(id)
);


INSERT INTO
	comments (content, user_id, created_at)
VALUES (
	'KNOW, oh prince, that between the years when the oceans drank Atlantis and
	the gleaming cities, and the years of the rise of the Sons of Aryas, there
	was an Age undreamed of, when shining kingdoms lay spread across the world
	like blue mantles beneath the stars...',
	1,
	datetime('now')
);

