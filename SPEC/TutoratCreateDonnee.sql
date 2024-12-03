CREATE TABLE Classe (
    classe_id INT AUTO_INCREMENT,
    classe_nom VARCHAR(50) NOT NULL,
    CONSTRAINT classe_pk PRIMARY KEY(classe_id)
)ENGINE=InnoDB;

CREATE TABLE Specialite (
    spe_id INT AUTO_INCREMENT,
    spe_nom VARCHAR(50) NOT NULL,
    CONSTRAINT specialite_pk PRIMARY KEY(spe_id)
)ENGINE=InnoDB;

CREATE TABLE Entreprise (
    ent_id INT AUTO_INCREMENT,
    ent_nom VARCHAR(100) NOT NULL,
    ent_adr VARCHAR(250) NOT NULL,
    ent_cp VARCHAR(10) NOT NULL,
    ent_ville VARCHAR(50) NOT NULL,
    CONSTRAINT entreprise_pk PRIMARY KEY(ent_id)
)ENGINE=InnoDB;

CREATE TABLE MaitreApprentissage (
    maitre_appr_id INT AUTO_INCREMENT,
    maitre_appr_pre VARCHAR(100) NOT NULL,
    maitre_appr_nom VARCHAR(100) NOT NULL,
    maitre_appr_tel VARCHAR(10) NOT NULL,
    maitre_appr_email VARCHAR(100) NOT NULL,
    ent_id INT NOT NULL,
    FOREIGN KEY (ent_id) REFERENCES Entreprise(ent_id),
    CONSTRAINT maitreApprentissage_pk PRIMARY KEY(maitre_appr_id)
)ENGINE=InnoDB;

CREATE TABLE Tuteur (
    tut_id INT AUTO_INCREMENT,
    tut_pre VARCHAR(50) NOT NULL,
    tut_nom VARCHAR(50) NOT NULL,
    tut_mdp VARCHAR(50) NOT NULL,
    tut_tel VARCHAR(10) NOT NULL,
    tut_email VARCHAR(100) NOT NULL,
    tut_nb_etu_actu INT NOT NULL,
    CONSTRAINT tuteur_pk PRIMARY KEY(tut_id)
)ENGINE=InnoDB;

CREATE TABLE Etudiant (
    etu_id INT AUTO_INCREMENT,
    etu_nom VARCHAR(50) NOT NULL,
    etu_pre VARCHAR(50) NOT NULL,
    etu_mdp VARCHAR(50) NOT NULL,
    etu_tel VARCHAR(10) NOT NULL,
    etu_email VARCHAR(100) NOT NULL,
    etu_adr VARCHAR(100) NOT NULL,
    etu_cp VARCHAR(100) NOT NULL,
    etu_ville VARCHAR(100) NOT NULL,
    spe_id INT,
    classe_id INT,
    tut_id INT,
    ent_id INT,
    maitre_appr_id INT,
    FOREIGN KEY (maitre_appr_id) REFERENCES MaitreApprentissage(maitre_appr_id),
    FOREIGN KEY (spe_id) REFERENCES Specialite(spe_id),
    FOREIGN KEY (classe_id) REFERENCES Classe(classe_id),
    FOREIGN KEY (tut_id) REFERENCES Tuteur(tut_id),
    FOREIGN KEY (ent_id) REFERENCES Entreprise(ent_id),
    CONSTRAINT etudiant_pk PRIMARY KEY(etu_id)
)ENGINE=InnoDB;

CREATE TABLE Bilan1 (
    bil1_id INT AUTO_INCREMENT,
    bil1_date_visite_ent DATE NOT NULL,
    bil1_note_entreprise FLOAT NOT NULL,
    bil1_note_dossier FLOAT NOT NULL,
    bil1_note_oral FLOAT NOT NULL,
    bil1_remarques VARCHAR(1000),
    etu_id INT NOT NULL,
    FOREIGN KEY (etu_id) REFERENCES Etudiant(etu_id),
    CONSTRAINT bilan1_pk PRIMARY KEY(bil1_id)
)ENGINE=InnoDB;

CREATE TABLE Bilan2 (
    bil2_id INT AUTO_INCREMENT,
    bil2_date DATE NOT NULL,
    bil2_note_dossier FLOAT NOT NULL,
    bil2_note_oral FLOAT NOT NULL,
    bil2_remarques VARCHAR(1000),
    bil2_sujet_memoire VARCHAR(1000),
    etu_id INT NOT NULL,
    FOREIGN KEY (etu_id) REFERENCES Etudiant(etu_id),
    CONSTRAINT bilan2_pk PRIMARY KEY(bil2_id)
)ENGINE=InnoDB;

CREATE TABLE Alerte (
    alerte_id INT AUTO_INCREMENT,
    alerte_date_visite_entreprise DATE,
    alerte_date_note_bilan1 DATE,
    alerte_date_sujet_memoire DATE,
    alerte_date_note_bilan2 DATE,
    CONSTRAINT alerte_pk PRIMARY KEY(alerte_id)
)ENGINE=InnoDB;

CREATE TABLE Administrateur (
    adm_id INT AUTO_INCREMENT,
    adm_pre VARCHAR(50) NOT NULL,
    adm_nom VARCHAR(50) NOT NULL,
    adm_email VARCHAR(100) NOT NULL,
    adm_mdp VARCHAR(50) NOT NULL,
    CONSTRAINT administrateur_pk PRIMARY KEY(adm_id)
)ENGINE=InnoDB;

CREATE TABLE Gerer (
    tut_id INT NOT NULL,
    classe_id INT NOT NULL,
    tuteur_nb_max_etu INT,
    PRIMARY KEY (tut_id, classe_id),
    FOREIGN KEY (tut_id) REFERENCES Tuteur(tut_id),
    FOREIGN KEY (classe_id) REFERENCES Classe(classe_id)

)ENGINE=InnoDB;