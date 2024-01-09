-- User
CREATE TABLE users (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    name_user VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL,
    role ENUM('author', 'admin') NOT NULL DEFAULT 'author'
);

-- Categories
CREATE TABLE categories (
    id_categorie INT AUTO_INCREMENT PRIMARY KEY,
    nom_categorie VARCHAR(50) NOT NULL
);

-- Tags
CREATE TABLE tags (
    id_tag INT AUTO_INCREMENT PRIMARY KEY,
    nom_tag VARCHAR(50) NOT NULL
);

-- Wikis
CREATE TABLE wikis (
    id_wiki INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(100) NOT NULL,
    contenu TEXT NOT NULL,
    image_url VARCHAR(255),
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    id_author INT,
    id_categorie INT,
    FOREIGN KEY (id_author) REFERENCES users(id_user),
    FOREIGN KEY (id_categorie) REFERENCES categories(id_categorie)
);

-- Wiki Tags
CREATE TABLE wiki_tags (
    id_wiki INT,
    id_tag INT,
    PRIMARY KEY (id_wiki, id_tag),
    FOREIGN KEY (id_wiki) REFERENCES wikis(id_wiki),
    FOREIGN KEY (id_tag) REFERENCES tags(id_tag)
);
