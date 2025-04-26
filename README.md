# 📦 Gestion de Stock & Fournisseurs

Bienvenue sur ce projet d'application web de **gestion de stock et de fournisseurs** en PHP/MySQL !  
Gérez facilement vos produits, fournisseurs, seuils et quantités via une interface simple et moderne.

---

## ✨ Fonctionnalités

- ➕ **Ajout de produits** avec sélection du fournisseur
- 📜 **Consultation de l'historique** des produits en stock
- 🟦 **Affichage des produits dont la quantité est le double du seuil**
- ✏️ **Modification** et 🗑️ **suppression** de produits
- 🧑‍💼 **Affichage des détails d'un fournisseur**
- 🎨 **Interface utilisateur moderne** (CSS custom)
- 🛡️ **Sécurité améliorée** (prévention XSS, redirection après action)

---

## 🗂️ Structure du projet
"""
/ (racine)
│
├── conexion.php # Connexion à la base de données
├── form.php # Formulaire d'ajout de produit
├── hist.php # Historique des produits (listing, suppression)
├── double.php # Produits dont la quantité = 2 × seuil
├── modif.php # Modification d'un produit
├── detail.php # Détail d'un fournisseur
├── style.css # Feuille de style
├── insea1a.sql # Script SQL de la base de données
├── help.jpg # Favicon
├── README.md # Ce fichier
└── .gitignore # Fichiers/dossiers ignorés par git
"""


## 🚀 Installation rapide

1. **Cloner le dépôt**  
   ```bash
   git clone <url_du_repo>
   cd <nom_du_dossier>
   ```

2. **Importer la base de données**  
   - Ouvre **phpMyAdmin** ou un autre outil MySQL.
   - Crée une base nommée `insea1a`.
   - Importe le fichier `insea1a.sql`.

3. **Configurer la connexion**  
   - Vérifie les paramètres dans `conexion.php` (serveur, utilisateur, mot de passe, nom de la base).

4. **Lancer le projet**  
   - Place le dossier dans le répertoire de ton serveur web local (ex : `htdocs` pour XAMPP).
   - Accède à `form.php` via ton navigateur.

---

## 🛠️ Utilisation

- ➕ **Ajouter un produit** : via `form.php`
- 📜 **Voir l'historique** : via `hist.php`
- 🟦 **Voir les produits au double du seuil** : via `double.php`
- ✏️/🗑️ **Modifier/Supprimer** : depuis l'historique
- 🧑‍💼 **Voir un fournisseur** : lien "details fournisseur" dans l'historique

---

## 🔒 Sécurité & Bonnes pratiques

- Les champs de formulaires sont **échappés** pour éviter les failles XSS.
- **Redirection** après suppression/modification pour éviter le repost de formulaire.
- Prévois d'ajouter une **protection CSRF** pour les actions critiques si le projet évolue.




