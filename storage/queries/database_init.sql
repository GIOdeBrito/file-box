

CREATE TABLE users (
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  name TEXT NOT NULL,
  secret TEXT NOT NULL,
  isadmin INTEGER NULL
);


INSERT INTO users (name, secret, isadmin) VALUES ('admin', 'admin', 1);


CREATE TABLE comments (
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  content TEXT NOT NULL,
  user_id INTEGER NOT NULL,
  created_at DATE NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(id)
);


INSERT INTO comments (content, user_id, created_at) VALUES ('Know O Prince, that between the years when the Oceans drank Atlantis...', 1, datetime('now'));

