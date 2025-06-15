# 💊 Farmacy-X - Plateforme de Gestion de Pharmacie

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)
![Figma](https://img.shields.io/badge/Figma-F24E1E?style=for-the-badge&logo=figma&logoColor=white)

---

## 🧾 Description

**Farmacy-X** est une application web moderne qui facilite la gestion des pharmacies. Elle permet aux pharmaciens de gérer leurs stocks, commandes, et prescriptions, tout en offrant aux clients un espace pour consulter et commander leurs médicaments de manière simple et sécurisée.

---

## 🎯 Objectifs

- Digitaliser la gestion quotidienne des pharmacies.
- Améliorer la relation entre pharmacien et client.
- Intégrer des notifications et automatiser les commandes.
- Utiliser des design patterns pour une architecture maintenable.

---

## ⚙️ Fonctionnalités Clés

### 👨‍⚕️ Côté Client :
- Rechercher et commander des médicaments.
- Suivre l’état des commandes.
- Télécharger et consulter les prescriptions.
- Recevoir des notifications par e-mail.

### 🧑‍💼 Côté Pharmacien :
- Gérer les stocks, médicaments et commandes.
- Valider les ordonnances.
- Être notifié des nouvelles commandes.
- Visualiser les rapports et statistiques.

---

## 🧠 Design Patterns Implémentés

- **Builder** : Pour la construction des objets `Medicine`.
- **Repository** : Pour l’abstraction de la couche d’accès aux données.
- **Strategy** : Pour le tri et le filtrage dynamiques des données.
- **Command** : Pour encapsuler les actions de commande.
- **Observer** : Pour notifier automatiquement les clients par mail.

---

## 🛠️ Technologies Utilisées

- **Backend** : Laravel (PHP)
- **Frontend** : Blade, Tailwind CSS, Alpine.js
- **Base de Données** : MySQL
- **Outils** : Git, GitHub

---

## 🚀 Installation et Lancement

1. **Cloner le dépôt :**

```bash
git clone https://github.com/ton-utilisateur/farmacy-x.git
cd farmacy-x
```

2. **Installer les dépendances :**

```bash
composer install
npm install
npm run dev
```

3. **Configurer l’environnement :**

```bash
cp .env.example .env
php artisan key:generate
```

> Mettre à jour `.env` avec vos infos MySQL et Mail.

4. **Migrer et peupler la base de données :**

```bash
php artisan migrate --seed
```

5. **Lancer le serveur local :**

```bash
php artisan serve
```

6. **Accéder à l’application :**

[http://127.0.0.1:8000](http://127.0.0.1:8000)

---

