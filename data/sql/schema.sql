CREATE TABLE ad_city (id INT, countrycode VARCHAR(2) DEFAULT 'ad', languagecode VARCHAR(2) DEFAULT 'es', latitude VARCHAR(100), longitude VARCHAR(100), name VARCHAR(150), nr_hotels INT, slug VARCHAR(255), UNIQUE INDEX ad_city_sluggable_idx (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci ENGINE = INNODB;
CREATE TABLE ad_hotel (id INT, name VARCHAR(150), address VARCHAR(250), chkin_from VARCHAR(10), chkin_to VARCHAR(10), chkout_from VARCHAR(10), chkout_to VARCHAR(10), city VARCHAR(150), city_id INT NOT NULL, class_and MEDIUMINT, class_is_estimated TINYINT(1), commission DOUBLE(18, 2), countrycode VARCHAR(2) DEFAULT 'ad', currencycode VARCHAR(5), district VARCHAR(100), hoteltype_id INT, is_closed TINYINT(1), latitude VARCHAR(150), longitude VARCHAR(150), max_persons_in_reservation SMALLINT, max_rooms_in_reservation SMALLINT, maxrate DOUBLE(18, 2), minrate DOUBLE(18, 2), nr_rooms SMALLINT, preferred TINYINT(1), ranking SMALLINT, review_nr SMALLINT, review_score VARCHAR(150), url VARCHAR(150), zip VARCHAR(150), small_photo VARCHAR(150), medium_photo VARCHAR(150), big_photo VARCHAR(150), slug VARCHAR(255), UNIQUE INDEX ad_hotel_sluggable_idx (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci ENGINE = INNODB;
CREATE TABLE ad_hotel_description (descriptiontype_id INT, hotel_id INT, description TEXT, languagecode VARCHAR(2) DEFAULT 'es', PRIMARY KEY(descriptiontype_id, hotel_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci ENGINE = INNODB;
CREATE TABLE ad_hotel_description_type (id INT, languagecode VARCHAR(2) DEFAULT 'es', name VARCHAR(150), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci ENGINE = INNODB;
CREATE TABLE ad_hotel_room_photo (id INT, hotel_id INT NOT NULL, room_id INT NOT NULL, small_photo VARCHAR(150), medium_photo VARCHAR(150), big_photo VARCHAR(150), INDEX hotel_id_idx (hotel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci ENGINE = INNODB;
ALTER TABLE ad_hotel_description ADD CONSTRAINT adai FOREIGN KEY (descriptiontype_id) REFERENCES ad_hotel_description_type(id);
ALTER TABLE ad_hotel_description ADD CONSTRAINT ad_hotel_description_hotel_id_ad_hotel_id FOREIGN KEY (hotel_id) REFERENCES ad_hotel(id);
ALTER TABLE ad_hotel_room_photo ADD CONSTRAINT ad_hotel_room_photo_hotel_id_ad_hotel_id FOREIGN KEY (hotel_id) REFERENCES ad_hotel(id);
