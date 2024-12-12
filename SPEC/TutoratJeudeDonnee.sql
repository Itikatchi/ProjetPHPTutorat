    INSERT INTO Classe (classe_nom) VALUES
    ('3CSI'),
    ('4OLEN'),
    ('5OLEN');

    INSERT INTO Specialite (spe_nom) VALUES
    ('Cybersécurité'),
    ('Développement');


    INSERT INTO Entreprise (ent_nom, ent_adr, ent_cp, ent_ville)
    VALUES
        ('Apple', '1 Infinite Loop', '95014', 'Cupertino'),
        ('Samsung', '123 Innovation Blvd', '14000', 'Seoul'),
        ('Facebook', '1601 Willow Rd', '94025', 'Menlo Park'),
        ('Oracle', '500 Oracle Pkwy', '94065', 'Redwood City'),
        ('IBM', '1 New Orchard Rd', '10504', 'Armonk'),
        ('Cisco', '170 West Tasman Dr', '95134', 'San Jose'),
        ('Intel', '2200 Mission College Blvd', '95054', 'Santa Clara'),
        ('Netflix', '100 Winchester Cir', '95032', 'Los Gatos'),
        ('Adobe', '345 Park Ave', '95110', 'San Jose'),
        ('Salesforce', '415 Mission St', '94105', 'San Francisco'),
        ('Spotify', '150 Greenwich St', '10007', 'New York'),
        ('Uber', '1455 Market St', '94103', 'San Francisco'),
        ('Lyft', '185 Berry St', '94107', 'San Francisco'),
        ('HP', '1501 Page Mill Rd', '94304', 'Palo Alto'),
        ('Dell', '1 Dell Way', '78682', 'Round Rock'),
        ('Zoom', '55 Almaden Blvd', '95113', 'San Jose'),
        ('Slack', '500 Howard St', '94105', 'San Francisco'),
        ('LinkedIn', '1000 W Maude Ave', '94085', 'Sunnyvale'),
        ('Snapchat', '2772 Donald Douglas Loop N', '90405', 'Santa Monica'),
        ('Airbnb', '888 Brannan St', '94103', 'San Francisco'),
        ('TotalEnergies', '2 place Jean Millier', '92078', 'Paris La Défense'),
        ('Orange', '78 rue Olivier de Serres', '75015', 'Paris'),
        ('BNP Paribas', '16 boulevard des Italiens', '75009', 'Paris');


    INSERT INTO MaitreApprentissage (maitre_appr_pre, maitre_appr_nom, maitre_appr_tel, maitre_appr_email, ent_id)
    VALUES
        ('Jean', 'Dupont', '0123456789', 'jean.dupont@example.com', 1),
        ('Claire', 'Martin', '0987654321', 'claire.martin@example.com', 1),
        ('Alice', 'Lemoine', '0765432189', 'alice.lemoine@example.com', 2),
        ('Luc', 'Bernard', '0654321987', 'luc.bernard@example.com', 2),
        ('Sophie', 'Durand', '0678123456', 'sophie.durand@example.com', 3),
        ('Jacques', 'Moreau', '0789123456', 'jacques.moreau@example.com', 4),
        ('Hélène', 'Fabre', '0798123456', 'helene.fabre@example.com', 5),
        ('Marc', 'Olivier', '0609876543', 'marc.olivier@example.com', 6),
        ('Elon', 'Musk', '0700000000', 'elon.musk@example.com', 7),
        ('Bill', 'Gates', '0711111111', 'bill.gates@example.com', 8),
        ('Larry', 'Page', '0722222222', 'larry.page@example.com', 9),
        ('Sergey', 'Brin', '0733333333', 'sergey.brin@example.com', 9),
        ('Mark', 'Zuckerberg', '0744444444', 'mark.zuckerberg@example.com', 10),
        ('Reed', 'Hastings', '0755555555', 'reed.hastings@example.com', 11),
        ('Sheryl', 'Sandberg', '0766666666', 'sheryl.sandberg@example.com', 10),
        ('Susan', 'Wojcicki', '0777777777', 'susan.wojcicki@example.com', 12),
        ('Satya', 'Nadella', '0788888888', 'satya.nadella@example.com', 8),
        ('Tim', 'Cook', '0799999999', 'tim.cook@example.com', 13),
        ('Jeff', 'Bezos', '0701234567', 'jeff.bezos@example.com', 14),
        ('Sundar', 'Pichai', '0712345678', 'sundar.pichai@example.com', 15),
        ('Jack', 'Dorsey', '0723456789', 'jack.dorsey@example.com', 16),
        ('Evan', 'Spiegel', '0734567890', 'evan.spiegel@example.com', 17),
        ('Brian', 'Chesky', '0745678901', 'brian.chesky@example.com', 18),
        ('Travis', 'Kalanick', '0756789012', 'travis.kalanick@example.com', 19),
        ('Dara', 'Khosrowshahi', '0767890123', 'dara.khosrowshahi@example.com', 19),
        ('Whitney', 'Wolfe', '0778901234', 'whitney.wolfe@example.com', 20),
        ('Stewart', 'Butterfield', '0789012345', 'stewart.butterfield@example.com', 21),
        ('Michael', 'Dell', '0790123456', 'michael.dell@example.com', 22),
        ('Andy', 'Jassy', '0709876543', 'andy.jassy@example.com', 14),
        ('Kevin', 'Systrom', '0710987654', 'kevin.systrom@example.com', 23);


    INSERT INTO Tuteur (tut_pre, tut_nom, tut_mdp, tut_tel, tut_email, tut_nb_etu_actu)
    VALUES

    ('Marie', 'Curie', 'test', '0987654321', 'b@b', 3),
    ('Albert', 'Einstein', 'relativity', '0678901234', 'albert.einstein@example.com', 3),
    ('Isaac', 'Newton', 'gravity', '0567890123', 'isaac.newton@example.com', 1),
    ('Ada', 'Lovelace', 'enigma', '0456789012', 'ada.lovelace@example.com', 1),
    ('Henri', 'Poincaré', 'mathematics', '0654321987', 'henri.poincare@example.com', 1),
    ('Alan', 'Turing', 'crypto2023', '0754321987', 'alan.turing@example.com', 1),
    ('Grace', 'Hopper', 'coding2023', '0654321098', 'grace.hopper@example.com', 1),
    ('Carl', 'Gauss', 'maths2023', '0554321987', 'carl.gauss@example.com', 1),
    ('Katherine', 'Johnson', 'space2023', '0456781987', 'katherine.johnson@example.com', 2),
    ('Galileo', 'Galilei', 'stars2023', '0354321787', 'galileo.galilei@example.com', 1),
    ('Marie', 'Lavoisier', 'chemistry2023', '0254321987', 'marie.lavoisier@example.com', 1),
    ('Rosalind', 'Franklin', 'dna2023', '0154321987', 'rosalind.franklin@example.com', 4),
    ('Niels', 'Bohr', 'atom2023', '0654321988', 'niels.bohr@example.com', 3),
    ('Michael', 'Faraday', 'electricity2023', '0554321988', 'michael.faraday@example.com', 3),
    ('Max', 'Planck', 'quantum2023', '0454321988', 'max.planck@example.com', 3),
    ('Werner', 'Heisenberg', 'uncertainty2023', '0354321988', 'werner.heisenberg@example.com', 3);



    INSERT INTO Etudiant (etu_nom, etu_pre, etu_mdp, etu_tel, etu_email, etu_adr, etu_cp, etu_ville, spe_id, classe_id, tut_id, ent_id, maitre_appr_id)
    VALUES

    ('Durand', 'Paul', 'test', '0654321987', 'a@a', '10 rue de Paris', '75001', 'Paris', 1, 1, 1, 1, 1),
    ('Martin', 'Julie', 'julie2023', '0754321098', 'julie.martin@example.com', '12 avenue de Lyon', '69001', 'Lyon', 1, 1, 1, 1, 1),
    ('Bernard', 'Lucie', 'lucie2023', '0643210987', 'lucie.bernard@example.com', '8 boulevard des Lilas', '75010', 'Paris', 1, 1, 1, 1, 1),
    ('Petit', 'Louis', 'louis2023', '0610987654', 'louis.petit@example.com', '3 rue de la Mer', '13000', 'Marseille', 2, 2, 2, 2, 2),
    ('Dupont', 'Thomas', 'thomas2023', '0532109876', 'thomas.dupont@example.com', '15 rue de la Lune', '31000', 'Toulouse', 2, 2, 2, 2, 2),
    ('Rousseau', 'Alice', 'alice2023', '0601234567', 'alice.rousseau@example.com', '5 chemin Vert', '75015', 'Paris', 2, 2, 2, 3, 2),
    ('Smith', 'John', 'john2023', '0700001234', 'john.smith@example.com', '7 avenue Blue', '94301', 'Mountain View', 1, 3, 3, 4, 4),
    ('Brown', 'Emma', 'emma2023', '0712345678', 'emma.brown@example.com', '9 Green Lane', '94000', 'Créteil', 1, 3, 4, 4, 4),
    ('Taylor', 'Mike', 'mike2023', '0723456789', 'mike.taylor@example.com', '11 Market St', '31000', 'Toulouse', 1, 3, 5, 4, 4),
    ('Johnson', 'Emily', 'emily2023', '0734567890', 'emily.johnson@example.com', '5 Innovation Blvd', '75001', 'Paris', 1, 2, 1, 5, 5),
    ('Williams', 'Liam', 'liam2023', '0745678901', 'liam.williams@example.com', '10 Cloud Way', '69001', 'Lyon', 1, 3, 2, 6, 6),
    ('Jones', 'Sophia', 'sophia2023', '0756789012', 'sophia.jones@example.com', '15 Tech Ave', '94301', 'Mountain View', 1, 3, 3, 7, 7),
    ('Davis', 'Olivia', 'olivia2023', '0767890123', 'olivia.davis@example.com', '2 Mars Lane', '31000', 'Toulouse', 2, 1, 4, 8, 8),
    ('Miller', 'Ethan', 'ethan2023', '0778901234', 'ethan.miller@example.com', '18 Space St', '94000', 'Créteil', 2, 2, 5, 9, 9),
    ('Garcia', 'Chloe', 'chloe2023', '0789012345', 'chloe.garcia@example.com', '30 Star Blvd', '75001', 'Paris', 2, 3, 4, 10, 10),
    ('Lee', 'Evelyn', 'evelyn2023', '0600000001', 'evelyn.lee@example.com', '123 Road A', '69003', 'Lyon', 1, 3, 5, 8, 8),
    ('Clark', 'Benjamin', 'benjamin2023', '0600000002', 'benjamin.clark@example.com', '124 Road B', '75010', 'Paris', 1, 3, 5, 8, 8),
    ('Young', 'Amelia', 'amelia2023', '0600000003', 'amelia.young@example.com', '125 Road C', '13000', 'Marseille', 1, 3, 5, 8, 8),
    ('Harris', 'Lucas', 'lucas2023', '0600000004', 'lucas.harris@example.com', '126 Road D', '94301', 'Mountain View', 1, 3, 5, 8, 8),
    ('King', 'Ava', 'ava2023', '0600000005', 'ava.king@example.com', '127 Road E', '94000', 'Créteil', 2, 2, 6, 9, 9),
    ('Wright', 'Mia', 'mia2023', '0600000006', 'mia.wright@example.com', '128 Road F', '69001', 'Lyon', 2, 2, 6, 10, 10),
    ('Lopez', 'Noah', 'noah2023', '0600000007', 'noah.lopez@example.com', '129 Road G', '75001', 'Paris', 2, 2, 6, 11, 11),
    ('Hill', 'Ella', 'ella2023', '0600000008', 'ella.hill@example.com', '130 Road H', '31000', 'Toulouse', 2, 1, 7, 12, 12),
    ('Scott', 'James', 'james2023', '0600000009', 'james.scott@example.com', '131 Road I', '75001', 'Paris', 2, 1, 7, 13, 13),
    ('Green', 'Zoe', 'zoe2023', '0600000010', 'zoe.green@example.com', '132 Road J', '94301', 'Mountain View', 2, 1, 7, 14, 14);



    INSERT INTO Bilan1 (bil1_date_visite_ent, bil1_note_entreprise, bil1_note_dossier, bil1_note_oral, bil1_remarques, etu_id)
    VALUES
    ('2024-11-15', 15.5, 14.0, 16.0, 'Bon travail', 1),
    ('2024-11-16', 13.5, 12.0, 14.5, 'Quelques difficultés', 2),
    ('2024-11-17', 18.0, 17.5, 19.0, 'Excellent', 3),
    ('2024-11-18', 10.0, 11.0, 12.0, 'Doit s’améliorer', 4),
    ('2024-11-19', 16.5, 14.5, 15.5, 'Travail prometteur', 5),
    ('2024-11-20', 13.0, 12.5, 14.0, 'Bonne progression', 6),
    ('2024-11-21', 17.0, NULL, 16.0, 'Bonne présentation', 7),
    ('2024-11-22', NULL, 14.5, NULL, 'Dossier à améliorer', 8),
    ('2024-11-23', 11.0, 10.0, NULL, 'Présentation faible', 9),
    ('2024-11-24', NULL, NULL, NULL, 'Aucune donnée encore', 10),
    (NULL, NULL, NULL, NULL, NULL, 11),
    (NULL, NULL, NULL, NULL, NULL, 12),
    (NULL, NULL, NULL, NULL, NULL, 13),
    ('2024-11-25', 14.5, 15.0, 13.5, 'Bonne recherche', 14),
    ('2024-11-26', 19.0, 18.0, 17.0, 'Excellent travail', 15),
    ('2024-11-27', 10.5, 11.0, 12.5, 'Doit approfondir', 16),
    ('2024-11-28', 12.0, 13.5, 14.0, 'Progression notable', 17),
    ('2024-11-29', 16.0, 15.0, 14.5, 'Présentation solide', 18),
    ('2024-11-30', NULL, 13.0, 14.0, 'Manque dengagement', 19),
    ('2024-12-01', 15.0, NULL, 15.5, 'Bon potentiel', 20),
    (NULL, 14.0, 12.5, NULL, 'Dossier incomplet', 21),
    (NULL, NULL, NULL, NULL, NULL, 22),
    (NULL, NULL, NULL, NULL, NULL, 23),
    (NULL, NULL, NULL, NULL, NULL, 24),
    ('2024-12-02', 18.5, 17.0, 16.0, 'Excellente prestation', 25);


    INSERT INTO Bilan2 (bil2_date, bil2_note_dossier, bil2_note_oral, bil2_remarques, bil2_sujet_memoire, etu_id)
    VALUES
    -- Étudiants avec des bilans complets
    ('2024-12-10', 16.0, 15.0, 'Bon travail sur le sujet choisi', 'Les réseaux neuraux', 1),
    ('2024-12-11', 14.0, 13.5, 'Approche solide mais présentation moyenne', 'La cybersécurité en entreprise', 2),
    ('2024-12-12', 18.0, 17.5, 'Excellent mémoire et présentation', 'Blockchain et sécurité', 3),
    ('2024-12-13', 10.0, 11.0, 'Sujet faible, nécessite plus defforts', 'Optimisation des processus', 4),
    ('2024-12-14', 16.5, 15.5, 'Mémoire intéressant et bien présenté', 'Les technologies quantiques', 5),
    ('2024-12-15', 13.0, 12.5, 'Recherche prometteuse mais incomplète', 'Les architectures serverless', 6),
    ('2024-12-16', NULL, 14.0, 'Bonne présentation mais manque de contenu', 'Lintelligence artificielle', 7),
    ('2024-12-17', 15.0, NULL, 'Mémoire intéressant mais présentation manquante', 'La détection des anomalies', 8),
    ('2024-12-18', NULL, NULL, 'Sujet validé mais aucune progression', 'Les API modernes', 9),
    (NULL, NULL, NULL, NULL, NULL, 10),
    (NULL, NULL, NULL, NULL, NULL, 11),
    (NULL, NULL, NULL, NULL, NULL, 12),
    ('2024-12-19', 14.5, 14.0, 'Travail honnête mais améliorable', 'Les applications mobiles', 13),
    ('2024-12-20', 19.0, 18.5, 'Travail exceptionnel', 'Lénergie solaire et ses applications', 14),
    ('2024-12-21', 12.0, 11.5, 'Travail minimal', 'Les systèmes embarqués', 15),
    ('2024-12-22', 13.5, 13.0, 'Recherche solide mais présentation faible', 'Les bases de données NoSQL', 16),
    ('2024-12-23', 16.0, 15.5, 'Très bon travail dans lensemble', 'Les microservices', 17),
    ('2024-12-24', NULL, 13.0, 'Présentation correcte, sujet prometteur', 'Loptimisation des algorithmes', 18),
    ('2024-12-25', 15.5, NULL, 'Mémoire bien rédigé, présentation manquante', 'Les systèmes distribués', 19),
    (NULL, 14.0, 12.5, 'Recherche encore insuffisante', 'La sécurité des réseaux', 20),
    (NULL, NULL, NULL, NULL, NULL, 21),
    (NULL, NULL, NULL, NULL, NULL, 22),
    (NULL, NULL, NULL, NULL, NULL, 23),

    ('2024-12-26', 18.5, 17.0, 'Travail très bien documenté', 'Les systèmes temps réel', 24),
    ('2024-12-27', 13.0, 12.5, 'Sujet intéressant mais manque danalyse', 'Les protocoles réseau', 25);

    INSERT INTO Alerte (alerte_date_visite_entreprise, alerte_date_sujet_memoire, alerte_date_note_bilan2)
    VALUES
    ('2024-11-10', '2024-11-30', '2025-05-15');

    INSERT INTO Administrateur (adm_pre, adm_nom, adm_email, adm_mdp)
    VALUES
    ('System', 'Admin', 'sysadmin@example.com', 'syssecure'),
    ('Monsieur', 'Admin2', 'monadmin2@example.com', 'monadm2');

    INSERT INTO Gerer (tut_id, classe_id, tuteur_nb_max_etu)
    VALUES
    (1, 1, 10),
    (2, 2, 8),
    (3, 3, 5),
    (4, 1, 7),
    (5, 2, 6),
    (6, 1, 12),
    (7, 2, 10),
    (8, 3, 8),
    (9, 1, 15),
    (10, 2, 10),
    (11, 3, 8),
    (12, 1, 20),
    (13, 2, 15),
    (14, 1, 10),
    (15, 3, 5),
    (16, 2, 7);
