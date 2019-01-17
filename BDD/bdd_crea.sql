#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: service
#------------------------------------------------------------

CREATE TABLE service(
        Id_service  Int  Auto_increment  NOT NULL ,
        Nom_service Varchar (250) NOT NULL
	,CONSTRAINT service_PK PRIMARY KEY (Id_service)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: client
#------------------------------------------------------------

CREATE TABLE client(
        Id_client              Int  Auto_increment  NOT NULL ,
        Nom_client             Varchar (100) NOT NULL ,
        Prenom_client          Varchar (100) NOT NULL ,
        Adresse_intervention   Varchar (150) NOT NULL ,
        Tel_client             Varchar (10) NOT NULL ,
        Mail_client            Varchar (100) NOT NULL ,
        Description_sup        Varchar (250) NOT NULL ,
        Date_proposition       Datetime NOT NULL ,
        Date_realisation_debut Datetime NOT NULL ,
        Date_realisation_fin   Datetime NOT NULL ,
        Etat_avancement        Varchar (250) NOT NULL ,
        Liste_id_artisan       Varchar (400) NOT NULL ,
        Id_service             Int NOT NULL
	,CONSTRAINT client_PK PRIMARY KEY (Id_client)

	,CONSTRAINT client_service_FK FOREIGN KEY (Id_service) REFERENCES service(Id_service)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: formules
#------------------------------------------------------------

CREATE TABLE formules(
        Id_formule  Int  Auto_increment  NOT NULL ,
        Nom_formule Varchar (100) NOT NULL
	,CONSTRAINT formules_PK PRIMARY KEY (Id_formule)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: artisan
#------------------------------------------------------------

CREATE TABLE artisan(
        Id_artisan                 Int  Auto_increment  NOT NULL ,
        Nom                        Varchar (100) NOT NULL ,
        Raison_sociale             Varchar (150) NOT NULL ,
        SIREN                      Varchar (20) NOT NULL ,
        Tel                        Varchar (16) NOT NULL ,
        Mail                       Varchar (100) NOT NULL ,
        Description                Varchar (250) NOT NULL ,
        Motdepasse                 Varchar (150) NOT NULL ,
        Num_assurance              Varchar (20) NOT NULL ,
        Date_inscription           Date NOT NULL ,
        Credit                     Int NOT NULL ,
        Devis_max                  Int NOT NULL ,
        Joursemaine                Int NOT NULL ,
        Horaires                   Int NOT NULL ,
        Date_debut_arret_reception Datetime NOT NULL ,
        Date_fin_arret_reception   Datetime NOT NULL ,
        Date_fin_engagement        Datetime NOT NULL ,
        Avantage                   Int NOT NULL ,
        Id_formule                 Int NOT NULL
	,CONSTRAINT artisan_PK PRIMARY KEY (Id_artisan)

	,CONSTRAINT artisan_formules_FK FOREIGN KEY (Id_formule) REFERENCES formules(Id_formule)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: devis
#------------------------------------------------------------

CREATE TABLE devis(
        Id_devis      Int  Auto_increment  NOT NULL ,
        Nom_devis     Varchar (100) NOT NULL ,
        Date_envoie   Datetime NOT NULL ,
        Fichier_joint Varchar (100) NOT NULL ,
        Id_artisan    Int NOT NULL ,
        Id_client     Int NOT NULL
	,CONSTRAINT devis_PK PRIMARY KEY (Id_devis)

	,CONSTRAINT devis_artisan_FK FOREIGN KEY (Id_artisan) REFERENCES artisan(Id_artisan)
	,CONSTRAINT devis_client0_FK FOREIGN KEY (Id_client) REFERENCES client(Id_client)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: admin
#------------------------------------------------------------

CREATE TABLE admin(
        Id_admin         Int  Auto_increment  NOT NULL ,
        Mail_admin       Varchar (100) NOT NULL ,
        Motdepasse_admin Varchar (100) NOT NULL
	,CONSTRAINT admin_PK PRIMARY KEY (Id_admin)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: commercial
#------------------------------------------------------------

CREATE TABLE commercial(
        Id_commercial         Int  Auto_increment  NOT NULL ,
        Mail_commercial       Varchar (100) NOT NULL ,
        Motdepasse_commercial Varchar (100) NOT NULL
	,CONSTRAINT commercial_PK PRIMARY KEY (Id_commercial)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: parametre
#------------------------------------------------------------

CREATE TABLE parametre(
        Id_parametre               Int  Auto_increment  NOT NULL ,
        Periode_gratuite           Int NOT NULL ,
        Prix_demande_prestation    Int NOT NULL ,
        Prix_validation_prestation Int NOT NULL
	,CONSTRAINT parametre_PK PRIMARY KEY (Id_parametre)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: appartient
#------------------------------------------------------------

CREATE TABLE appartient(
        Id_artisan Int NOT NULL ,
        Id_service Int NOT NULL
	,CONSTRAINT appartient_PK PRIMARY KEY (Id_artisan,Id_service)

	,CONSTRAINT appartient_artisan_FK FOREIGN KEY (Id_artisan) REFERENCES artisan(Id_artisan)
	,CONSTRAINT appartient_service0_FK FOREIGN KEY (Id_service) REFERENCES service(Id_service)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: visualise
#------------------------------------------------------------

CREATE TABLE visualise(
        Id_client  Int NOT NULL ,
        Id_artisan Int NOT NULL ,
        visualiser Bool NOT NULL
	,CONSTRAINT visualise_PK PRIMARY KEY (Id_client,Id_artisan)

	,CONSTRAINT visualise_client_FK FOREIGN KEY (Id_client) REFERENCES client(Id_client)




	=======================================================================
	   Désolé, il faut activer cette version pour voir la suite du script ! 
	=======================================================================
