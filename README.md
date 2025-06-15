💊 Farmacy-X - Plateforme de Gestion de Pharmacie






🧾 Description
Farmacy-X est une application web moderne conçue pour faciliter la gestion des pharmacies. Elle permet aux clients de commander des médicaments en ligne et aux pharmaciens de gérer les stocks, les prescriptions, les commandes et la communication avec les patients.

🎯 Objectifs
Digitaliser la gestion des médicaments et des prescriptions.

Offrir aux clients une interface intuitive pour passer leurs commandes.

Aider les pharmaciens à suivre les stocks, traiter les prescriptions et gérer les commandes.

Intégrer des notifications automatiques et un système sécurisé.

🧩 Fonctionnalités Clés
Pour les Clients :
Rechercher et commander des médicaments.

Ajouter des médicaments au panier.

Télécharger une ordonnance.

Suivre le statut de leur commande.

Recevoir des notifications par email.

Pour les Pharmaciens :
Gérer le stock des médicaments (quantité, prix, dates).

Valider ou refuser les prescriptions.

Suivre les commandes des clients.

Être notifié automatiquement lors de changements de statut.

Pour les Administrateurs :
Gérer les comptes utilisateurs.

Superviser les prescriptions et les commandes.

Visualiser des statistiques globales.

🧠 Design Patterns Utilisés
Builder : Pour construire les objets Medicine via une interface fluide.

Repository : Pour centraliser la logique de données et séparer le contrôleur des modèles.

Strategy : Pour permettre des filtrages dynamiques (par prix, stock, etc.).

Command : Pour encapsuler les actions comme AddToCart ou CreateOrder.

Observer : Pour envoyer automatiquement un email au client lors d’un changement de statut de commande.

⚙️ Technologies Utilisées
Backend : Laravel (PHP)

Frontend : Blade + Tailwind CSS

Base de Données : MySQL

Versionning : Git, GitHub

Modélisation UML : Cas d’utilisation, classes, séquences

Prototypage : Figma

🚀 Installation et Lancement
Cloner le dépôt :

bash
Copy
Edit
git clone https://github.com/votre-utilisateur/farmacy-x.git
cd farmacy-x
Installer les dépendances PHP :

bash
Copy
Edit
composer install
Installer les dépendances frontend :

bash
Copy
Edit
npm install
npm run dev
Configurer l’environnement :

bash
Copy
Edit
cp .env.example .env
# Modifier les valeurs dans .env (DB_DATABASE, MAIL_, etc.)
Générer la clé d’application :

bash
Copy
Edit
php artisan key:generate
Lancer les migrations et les seeders :

bash
Copy
Edit
php artisan migrate --seed
Démarrer le serveur :

bash
Copy
Edit
php artisan serve
Accéder à l’application :
http://127.0.0.1:8000
