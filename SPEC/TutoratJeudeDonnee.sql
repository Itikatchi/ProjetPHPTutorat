INSERT INTO Classe (classe_nom) VALUES 
('3CSI'), 
('4OLEN'), 
('5OLEN');

INSERT INTO Specialite (spe_nom) VALUES 
('Cybersécurité'), 
('Développement');

INSERT INTO Entreprise (ent_nom, ent_adr, ent_cp, ent_ville) 
VALUES 
('EDF', '1 rue val', '75001', 'Paris'),
('SNCF', '2 avenue des hall', '69001', 'Lyon'),
('Airbus', '5 chemin de linnovation', '31000', 'Toulouse'),
('Google', '10 Silicon Valley', '94301', 'Mountain View'),
('Amazon', '15 rue du Commerce', '75002', 'Paris'),
('Tesla', '12 avenue de la Batterie', '31001', 'Toulouse'),
('Microsoft', '9 boulevard Cloud', '69003', 'Lyon');

INSERT INTO MaitreApprentissage (maitre_appr_pre, maitre_appr_nom, maitre_appr_tel, maitre_appr_email, ent_id)
VALUES 
('Jean', 'Dupont', '0123456789', 'jean.dupont@example.com', 1),
('Claire', 'Martin', '0987654321', 'claire.martin@example.com', 2),
('Alice', 'Lemoine', '0765432189', 'alice.lemoine@example.com', 3),
('Luc', 'Bernard', '0654321987', 'luc.bernard@example.com', 4),
('Sophie', 'Durand', '0678123456', 'sophie.durand@example.com', 5),
('Jacques', 'Moreau', '0789123456', 'jacques.moreau@example.com', 6),
('Hélène', 'Fabre', '0798123456', 'helene.fabre@example.com', 7);

INSERT INTO Tuteur (tut_pre, tut_nom, tut_mdp, tut_tel, tut_email, tut_nb_etu_actu)
VALUES 
('Marie', 'Curie', 'password123', '0987654321', 'marie.curie@example.com', 1),
('Albert', 'Einstein', 'relativity', '0678901234', 'albert.einstein@example.com', 1),
('Isaac', 'Newton', 'gravity', '0567890123', 'isaac.newton@example.com', 1),
('Ada', 'Lovelace', 'enigma', '0456789012', 'ada.lovelace@example.com', 1),
('Henri', 'Poincaré', 'mathematics', '0654321987', 'henri.poincare@example.com', 1);

INSERT INTO Etudiant (etu_nom, etu_pre, etu_mdp, etu_tel, etu_email, etu_adr, etu_cp, etu_ville, spe_id, classe_id, tut_id, ent_id, maitre_appr_id)
VALUES 
('Durand', 'Paul', 'paul2023', '0654321987', 'paul.durand@example.com', '10 rue de Paris', '75001', 'Paris', 1, 1, 1, 1, 1),
('Martin', 'Julie', 'julie2023', '0754321098', 'julie.martin@example.com', '12 avenue de Lyon', '69001', 'Lyon', 2, 2, 2, 2, 2),
('Bernard', 'Lucie', 'lucie2023', '0643210987', 'lucie.bernard@example.com', '8 boulevard des Lilas', '75010', 'Paris', 1, 3, 3, 3, 3),
('Dupont', 'Thomas', 'thomas2023', '0532109876', 'thomas.dupont@example.com', '15 rue de la Lune', '31000', 'Toulouse', 2, 1, 4, 4, 4),
('Petit', 'Louis', 'louis2023', '0610987654', 'louis.petit@example.com', '3 rue de la Mer', '13000', 'Marseille', 1, 3, 3, 5, 5),
('Rousseau', 'Alice', 'alice2023', '0601234567', 'alice.rousseau@example.com', '5 chemin Vert', '75015', 'Paris', 2, 1, 1, 6, 6);

INSERT INTO Bilan1 (bil1_date_visite_ent, bil1_note_entreprise, bil1_note_dossier, bil1_note_oral, bil1_remarques, etu_id)
VALUES 
('2024-11-15', 15.5, 14.0, 16.0, 'Bon travail', 1),
('2024-11-16', 13.5, 12.0, 14.5, 'Quelques difficultés', 2),
('2024-11-17', 18.0, 17.5, 19.0, 'Excellent', 3),
('2024-11-18', 10.0, 11.0, 12.0, 'Doit s’améliorer', 4),
('2024-11-19', 16.5, 14.5, 15.5, 'Travail prometteur', 5),
('2024-11-20', 13.0, 12.5, 14.0, 'Bonne progression', 6);

INSERT INTO Bilan2 (bil2_date, bil2_note_dossier, bil2_note_oral, bil2_remarques, bil2_sujet_memoire, etu_id)
VALUES 
('2024-11-20', 14.5, 15.0, 'Mémoire intéressant', 'Les nouvelles technologies', 1),
('2024-11-21', 12.0, 13.0, 'Sujet pertinent mais présentation moyenne', 'L’intelligence artificielle', 2),
('2024-11-22', 19.0, 18.5, 'Excellent travail de recherche', 'La cybersécurité en entreprise', 3),
('2024-11-23', 9.0, 10.0, 'Doit approfondir le sujet', 'Optimisation des processus', 4),
('2024-11-24', 16.0, 15.5, 'Sujet solide, recherche approfondie', 'Blockchain et sécurité', 5),
('2024-11-25', 14.5, 14.0, 'Bon travail avec des pistes d’amélioration', 'Les architectures serverless', 6);

INSERT INTO Alerte (alerte_date_visite_entreprise, alerte_date_note_bilan1, alerte_date_sujet_memoire, alerte_date_note_bilan2)
VALUES 
('2024-11-10', '2024-11-25', '2024-11-30', '2024-12-15');

INSERT INTO Administrateur (adm_pre, adm_nom, adm_email, adm_mdp)
VALUES 
('System', 'Admin', 'sysadmin@example.com', 'syssecure'),
('Monsieur', 'Admin2', 'monadmin2@example.com', 'monadm2');

INSERT INTO Gerer (tut_id, classe_id, tuteur_nb_max_etu) 
VALUES 
(1, 1, 20), 
(1, 2, 15), 
(2, 3, 25),
(3, 1, 10),
(4, 2, 30);
