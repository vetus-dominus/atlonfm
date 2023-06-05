CREATE TABLE construction (
    id int(10) PRIMARY KEY AUTO_INCREMENT,
    ctype_id int(10) NOT NULL,
    name varchar(255) NOT NULL,
    price int(10) DEFAULT 0,
    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE ctype (
    id int(10) PRIMARY KEY AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE renovation (
    id int(10) PRIMARY KEY AUTO_INCREMENT,
    room_id int(10),
    construction_id int(10) NOT NULL,
    progress int(10) DEFAULT 0,
    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE room (
    id int(10) PRIMARY KEY AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    math binary,
    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

ALTER TABLE construction ADD CONSTRAINT FKconstruc2ctype
    FOREIGN KEY (ctype_id) REFERENCES ctype (id);

ALTER TABLE renovation ADD CONSTRAINT FKrenovation2room
    FOREIGN KEY (room_id) REFERENCES room (id);

ALTER TABLE renovation ADD CONSTRAINT FKrenovation2construct
    FOREIGN KEY (construction_id) REFERENCES construction (id);
