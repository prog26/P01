# 🚀 Prompt Repository

## 📌 Description

**Prompt Repository** est une application web développée en PHP/MySQL qui permet aux utilisateurs de gérer des *prompts* organisés par catégories.

Le projet inclut un système d’authentification sécurisé avec gestion des rôles :

* 👨‍💻 **Developer** : peut créer, modifier et supprimer ses prompts
* 👑 **Admin** : peut gérer les utilisateurs, les catégories et consulter tous les prompts

---

## 🎯 Objectifs

* Gérer des prompts de manière structurée
* Implémenter un système d’authentification sécurisé
* Séparer les rôles (admin / developer)
* Appliquer une architecture claire (MVC simplifiée)

---

## 🔁 Fonctionnement global

1. L’utilisateur accède à l’application (`index.php`)
2. Il est redirigé vers la page de connexion
3. Il entre ses identifiants
4. Le système vérifie les informations (via `authController.php`)
5. Une session est créée
6. Redirection selon le rôle :

   * Admin → `admin/dashboard.php`
   * Developer → `developer/dashboard.php`
7. L’utilisateur peut effectuer des actions (CRUD)
8. Déconnexion → destruction de la session

---

## 🧠 Architecture du projet

```
Prompt-Repository/
│
├── assets/
│   ├── css/
│   │   └── style.css              # 🎨 Design global
│   ├── images/
│   │   └── logo.png               # 🖼️ Logo
│
├── config/
│   └── db.php                    # 🔌 Connexion PDO à la base
│
├── database/
│   └── prompt.sql             # 🗄️ Script SQL (tables + données)
│
├── includes/
│   ├── header.php               # 🔝 Header dynamique (navbar)
│   ├── footer.php               # 🔻 Footer
│   └── auth.php                 # 🔐 Sécurité (sessions + rôles)
│
├── auth/                        # 🔐 Authentification
│   ├── login.php                # Connexion
│   ├── register.php             # Inscription
│   └── logout.php               # Déconnexion
│
├── developer/                   # 👨‍💻 Partie Developer
│   ├── dashboard.php           # Tableau de bord
│   ├── add_prompt.php          # Ajouter un prompt
│   ├── edit_prompt.php         # Modifier un prompt
│   ├── delete_prompt.php       # Supprimer un prompt
│   └── list_prompts.php        # Liste des prompts
│
├── admin/                       # 👑 Partie Admin
│   ├── dashboard.php           # Dashboard admin (stats)
│   ├── manage_categories.php   # Voir catégories
│   ├── add_category.php        # Ajouter catégorie
│   ├── edit_category.php       # Modifier catégorie
│   ├── delete_category.php     # Supprimer catégorie
│   └── manage_users.php        # Gestion utilisateurs
│
├── controllers/                # ⚙️ Logique métier (CRUD)
│   ├── authController.php      # Login / Register
│   ├── promptController.php    # CRUD prompts
│   ├── categoryController.php  # CRUD catégories
│   └── userController.php      # Gestion users
│
├── index.php                   # 🚪 Point d’entrée (redirection)
├── create_admin.php           # 👑 Création admin (optionnel)
│
└── README.md                  # 📘 Documentation
```

---

## 🗄️ Base de données

Le fichier `database/database.sql` contient :

* Table **users** → utilisateurs + rôles
* Table **categories** → catégories
* Table **prompts** → prompts liés aux utilisateurs

---

## ⚙️ Installation

### 1️⃣ Cloner le projet

```bash
git clone https://github.com/your-repo/prompt-repository.git
```

---

### 2️⃣ Importer la base de données

* Ouvrir **phpMyAdmin**
* Créer une base : `prompt_repository`
* Importer le fichier :

```plaintext
database/database.sql
```

---

### 3️⃣ Configurer la connexion

Modifier :

📄 `config/db.php`

```php
$host = 'localhost';
$dbname = 'prompt';
$user = 'root';
$password = '';
```

---

### 4️⃣ Lancer le projet

```plaintext
http://localhost/Prompt-Repository/
```

---

## 🔐 Sécurité

* Sessions PHP (`$_SESSION`)
* Protection des pages (`auth.php`)
* Vérification des rôles (admin / developer)
* Hachage des mots de passe (`password_hash`)

---

## 🎨 Design

* Un seul fichier CSS global (`style.css`)
* Design moderne type SaaS
* Responsive (mobile friendly)

---

## 🚀 Améliorations possibles

* 🔔 Notifications (success / error)
* 🌙 Mode sombre
* 📊 Graphiques statistiques
* ❤️ Système de favoris
* 🔍 Recherche avancée

---

## 👨‍💻 Auteur

Projet réalisé par **Hassan AFTAH** dans le cadre d’apprentissage du développement web (PHP / MySQL / MVC).

---

## 🏆 Conclusion

Prompt Repository est une application complète qui démontre :

* gestion des utilisateurs
* CRUD complet
* architecture claire
* sécurité basique
* interface moderne

👉 Projet idéal pour portfolio 💼
