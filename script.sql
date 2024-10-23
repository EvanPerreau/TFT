CREATE TABLE UNIT (
  id VARCHAR(255) PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  cost INT NOT NULL,
  origin VARCHAR(255) NOT NULL,
  url_img VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO UNIT (id, name, cost, origin, url_img) VALUES ('1', 'Swordman', 1, 'Barracks', 'https://vignette.wikia.nocookie.net/ageofempires/images/4/4b/SwordsmanDE.png/revision/latest/scale-to-width-down/340?cb=20200820183157');
INSERT INTO UNIT (id, name, cost, origin, url_img) VALUES ('2', 'Archer', 2, 'Archery Range', 'https://vignette.wikia.nocookie.net/ageofempires/images/4/4b/SwordsmanDE.png/revision/latest/scale-to-width-down/340?cb=20200820183157');