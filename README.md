# 🛒 Examen Pratique PHP - Gestion de Produits

## 🎯 Objectif
Créer une application CRUD (Create, Read, Update, Delete) en PHP procédural pour gérer des produits.

**Durée:** 1 heure

## 📋 Consignes

- Vous devez compléter **uniquement** le fichier `products.php`
- Le fichier `db_mysqli.php` contient la connexion à la base de données (déjà fait)
- Consultez les **aide-mémoires** fournis pour la syntaxe MySQLi
- Utilisez **MySQLi OOP** ou **MySQLi Procédural** selon votre préférence
- Toutes les requêtes doivent être des **requêtes préparées**

## 🗂️ Structure du Projet

```
.
├── db_mysqli.php              # Connexion BDD (COMPLET - NE PAS MODIFIER)
├── products.php               # Page CRUD (À COMPLÉTER)
├── schema.sql                 # Script SQL pour créer la BDD
├── CHEATSHEET_MYSQLI_OOP.md   # Aide-mémoire MySQLi Orienté Objet
├── CHEATSHEET_MYSQLI_PROC.md  # Aide-mémoire MySQLi Procédural
└── README.md                  # Ce fichier
```

## 🚀 Installation

1. Exécutez le script `schema.sql` dans phpMyAdmin
2. Vérifiez que la base `shop_db` et la table `products` sont créées
3. Ouvrez `products.php` dans votre navigateur

## ✅ Fonctionnalités à Implémenter

| Fonctionnalité | Points |
|----------------|--------|
| Afficher la liste des produits | /4 |
| Ajouter un nouveau produit | /4 |
| Modifier un produit existant | /4 |
| Supprimer un produit | /4 |
| Validation des données | /2 |
| Messages de succès/erreur | /2 |

**Total:** /20 points

## 🧪 Données de Test

La base de données contient déjà 5 produits de test pour vérifier l'affichage.

## 💡 Conseils

1. Commencez par l'affichage (SELECT)
2. Puis l'ajout (INSERT)
3. Puis la suppression (DELETE)
4. Terminez par la modification (UPDATE)
5. **Testez après chaque fonctionnalité!**

## ⚠️ Critères d'Évaluation

- ✅ Code fonctionnel
- ✅ Requêtes préparées (sécurité SQL injection)
- ✅ Validation des données côté serveur
- ✅ Messages utilisateur clairs
- ✅ Code propre et commenté

---

**Bon courage! 🚀**
