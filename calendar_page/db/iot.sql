

CREATE TABLE `schedule` (
  `id` int(30) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `start_datetime` date NOT NULL,
  `end_datetime` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE user_schedule (
  id INT(30) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  schedule_id INT,
  user_id INT,
  FOREIGN KEY (user_id) REFERENCES user(id),
  FOREIGN KEY (schedule_id) REFERENCES schedule(id)
);


CREATE TABLE user_note (
    id INT PRIMARY KEY,
   user_id INT,
    note_id INT,
    FOREIGN KEY (user_id) REFERENCES user(id),
    FOREIGN KEY (note_id) REFERENCES note(id)
);