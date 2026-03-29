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

## 🔐 Compte de test (Admin)

👉 Vous pouvez utiliser ce compte pour tester :

```plaintext
Email : admin@devgenius.com
Mot de passe : admin123
```

⚠️ **Important** : changer le mot de passe après connexion pour plus de sécurité.

---

## 🖼️ Aperçu de l'application

### 🔐 Page de connexion

<img width="1918" height="912" alt="image" src="https://github.com/user-attachments/assets/3138d89a-d8e3-4939-a047-c566d473e186" />


---

### 👑 Dashboard Admin
<img width="1918" height="921" alt="image" src="https://github.com/user-attachments/assets/0485d16d-0111-4701-aedd-710062424001" />





---

### 👨‍💻 Dashboard Developer

<img width="1918" height="917" alt="image" src="https://github.com/user-attachments/assets/ea0aee9b-3063-485b-b261-ae6ef36dd7e2" />


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
│   └── prompt.sql               # 🗄️ Script SQL
│
├── includes/
│   ├── header.php               # 🔝 Header dynamique
│   ├── footer.php               # 🔻 Footer
│   └── auth.php                 # 🔐 Sécurité
│
├── auth/                        # 🔐 Authentification
│   ├── login.php
│   ├── register.php
│   └── logout.php
│
├── developer/                   # 👨‍💻 Developer
│   ├── dashboard.php
│   ├── add_prompt.php
│   ├── edit_prompt.php
│   ├── delete_prompt.php
│   └── list_prompts.php
│
├── admin/                       # 👑 Admin
│   ├── dashboard.php
│   ├── manage_categories.php
│   ├── add_category.php
│   ├── edit_category.php
│   ├── delete_category.php
│   └── manage_users.php
│
├── controllers/                # ⚙️ Logique
│   ├── authController.php
│   ├── promptController.php
│   ├── categoryController.php
│   └── userController.php
│
├── index.php                   # 🚪 Entrée
├── create_admin.php            # 👑 Création admin
│
└── README.md                  # 📘 Documentation
```

---

## 🗄️ Base de données

Le fichier `database/prompt.sql` contient :

* Table **users** → utilisateurs + rôles
* Table **categories** → catégories
* Table **prompts** → prompts

---

## ⚙️ Installation

### 1️⃣ Cloner le projet

```bash
git clone https://github.com/prog26/Prompt_Repository_.git
```

---

### 2️⃣ Importer la base de données

* Ouvrir **phpMyAdmin**
* Créer une base : `prompt`
* Importer :

```plaintext
database/prompt.sql
```

---

### 3️⃣ Configurer la connexion

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
* Vérification des rôles
* Hachage des mots de passe

---

## 🎨 Design

* Un seul fichier CSS global
* Interface moderne (style SaaS)
* Responsive

---

## 🚀 Améliorations possibles

* 🔔 Notifications
* 🌙 Mode sombre
* 📊 Statistiques graphiques
* ❤️ Favoris
* 🔍 Recherche

---

## 👨‍💻 Auteur

Projet réalisé par **Hassan AFTAH** dans le cadre d’apprentissage du développement web.

---

## 🏆 Conclusion

Ce projet démontre :

✔️ Authentification sécurisée
✔️ Gestion des rôles
✔️ CRUD complet
✔️ Architecture propre
✔️ Interface moderne


