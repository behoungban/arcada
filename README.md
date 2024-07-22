README.md
Projet Zoo Arcadia
Ce projet a été réalisé dans le cadre de l'évaluation TP - Développeur Web et Web Mobile. Il s'agit d'une application web pour le Zoo Arcadia, permettant aux visiteurs de visualiser les animaux, leurs états, les services et les horaires du zoo. L'application comprend également des espaces dédiés pour les administrateurs, employés et vétérinaires.

Fonctionnalités
US 1 : Page d’accueil
Présentation du zoo avec des images.
Mention des différents habitats, services et animaux.
Affichage des avis du zoo.
US 2 : Menu de l’application
Retour vers la page d’accueil.
Accès aux services, habitats, contact, et connexion.
US 3 : Vue globale des services
Affichage de tous les services du zoo avec nom et description.
Configuration des services depuis l'espace administrateur.
US 4 : Vue globale des habitats
Affichage de tous les habitats avec image et nom.
Détail des animaux et description de l'habitat au clic.
US 5 : Avis
Les visiteurs peuvent laisser un commentaire.
Validation des avis par un employé.
US 6 : Espace Administrateur
Création et gestion des comptes employés et vétérinaires.
Modification des services, horaires, habitats et animaux.
Visualisation des comptes rendus des vétérinaires.
US 7 : Espace Employé
Validation et invalidation des avis.
Gestion de l'alimentation quotidienne des animaux.
US 8 : Espace Vétérinaire
Remplissage des comptes rendus par animaux.
Ajout de commentaires sur les habitats.
Visualisation des consommations alimentaires par animal.
US 9 : Connexion
Connexion pour les administrateurs, vétérinaires et employés.
US 10 : Contact
Formulaire de contact pour les visiteurs.
US 11 : Statistiques sur la consultation des habitats
Incrémentation des consultations des animaux.
Visualisation des statistiques dans le Dashboard administrateur.
Installation en local
Prérequis
Composer
Symfony CLI
Node.js
Serveur local (XAMPP, WAMP, etc.)
Étapes d'installation
Cloner le dépôt
https://github.com/behoungban/arcada.git
cd zoo 
Installer les dépendances
composer install
npm install
npm run dev
Configurer la base de données
Créez un fichier .env.local à la racine du projet et configurez la variable 
DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/zoo_arcada"
Créer la base de données et exécuter les migrations
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
Charger les fixtures
php bin/console doctrine:fixtures:load
symfony server:start
Accéder à l'application
Ouvrez votre navigateur et allez à l'adresse http://localhost:8000
Login et mot de passe administrateur : arcada@example.com / adminpassword
Utilisation
Phase 1 : Créer les premières données du site
Accerdez à la page /create-admin pour créer l'admin 

Accédez à la page /login.
Connectez-vous en tant qu'administrateur.
Ajoutez des habitats, des services, des animaux, des horaires et des avis.
Déconnectez-vous.
Phase 2 : Créer les premières données visiteurs
Laissez un avis.
Envoyez un message via le formulaire de contact.
Filtrez les animaux et les services.
Phase 3 : Voir les nouvelles données visiteurs dans l'espace dédié aux employés
Connectez-vous avec le compte employé.
Ajoutez une alimentation quotidienne pour les animaux.
Consultez les demandes de contact.
Gérez les avis.
Contributions
Les contributions sont les bienvenues. Veuillez soumettre une pull request pour toute amélioration ou correction de bug.