CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    name VARCHAR(255)
);

INSERT INTO users (username, email, name) VALUES ('alex', 'alex@codecourse.com', 'Alex');
INSERT INTO users (username, email, name) VALUES ('dale', 'dale@codecourse.com', 'Dale');
