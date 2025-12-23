<?php
/**
 * ============================================================
 * TODO 1: CONFIGURATION INITIALE
 * ============================================================
 * 
 * Instructions:
 * - Incluez le fichier de connexion à la base de données
 * - Initialisez les variables pour les messages ($error, $success)
 * - Initialisez les variables pour le formulaire ($editMode, $editProduct)
 * 
 * Code attendu:
 * - require_once 'db_mysqli.php';
 * - Variables d'état initialisées
 */

// Votre code ici...




/**
 * ============================================================
 * TODO 2: TRAITEMENT DE LA SUPPRESSION
 * ============================================================
 * 
 * Instructions:
 * - Vérifiez si l'action "delete" et un "id" sont dans $_GET
 * - Préparez une requête DELETE avec l'id
 * - Exécutez la requête
 * - Définissez un message de succès ou d'erreur
 * 
 * Rappel sécurité: Utilisez une requête préparée!
 * 
 * Déclencheur: ?action=delete&id=X dans l'URL
 */

// Votre code ici...




/**
 * ============================================================
 * TODO 3: TRAITEMENT DU FORMULAIRE (AJOUT / MODIFICATION)
 * ============================================================
 * 
 * Instructions:
 * - Vérifiez si le formulaire a été soumis ($_SERVER['REQUEST_METHOD'] === 'POST')
 * - Récupérez les données: name, description, price, quantity
 * - Validez les données (name et price sont obligatoires)
 * - Si un champ "id" existe dans POST → c'est une MODIFICATION (UPDATE)
 * - Sinon → c'est un AJOUT (INSERT)
 * - Exécutez la requête appropriée
 * - Définissez un message de succès ou d'erreur
 * 
 * Rappel: Utilisez des requêtes préparées!
 */

// Votre code ici...




/**
 * ============================================================
 * TODO 4: MODE ÉDITION - RÉCUPÉRER UN PRODUIT
 * ============================================================
 * 
 * Instructions:
 * - Vérifiez si "edit" et un "id" sont dans $_GET
 * - Préparez une requête SELECT pour récupérer le produit par son id
 * - Stockez le produit dans une variable ($editProduct)
 * - Activez le mode édition ($editMode = true)
 * 
 * Déclencheur: ?edit=1&id=X dans l'URL
 */

// Votre code ici...




/**
 * ============================================================
 * TODO 5: RÉCUPÉRER TOUS LES PRODUITS
 * ============================================================
 * 
 * Instructions:
 * - Exécutez une requête SELECT pour récupérer tous les produits
 * - Triez par date de création décroissante (ORDER BY created_at DESC)
 * - Stockez le résultat dans une variable ($products)
 * 
 * Note: Cette requête simple ne nécessite pas de paramètres,
 *       mais vous pouvez quand même utiliser prepare/execute
 */

// Votre code ici...


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f8f9fa; }
        .card { border: none; box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075); }
        .table th { background-color: #e9ecef; }
        .btn-action { padding: 0.25rem 0.5rem; font-size: 0.875rem; }
        .price { font-weight: 600; color: #198754; }
        .stock-low { color: #dc3545; }
        .stock-ok { color: #198754; }
    </style>
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-dark bg-primary mb-4">
        <div class="container">
            <span class="navbar-brand mb-0 h1">
                <i class="bi bi-box-seam"></i> Gestion des Produits
            </span>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <!-- Colonne Formulaire -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <i class="bi bi-plus-circle"></i>
                        <!-- TODO: Afficher "Modifier le produit" si en mode édition, sinon "Ajouter un produit" -->
                        Ajouter un produit
                    </div>
                    <div class="card-body">
                        
                        <!-- ============================================= -->
                        <!-- TODO 6: AFFICHER LES MESSAGES                 -->
                        <!-- ============================================= -->
                        <!-- 
                        Instructions:
                        - Si $error existe, affichez une alerte Bootstrap danger
                        - Si $success existe, affichez une alerte Bootstrap success
                        
                        Exemple:
                        <div class="alert alert-danger">Message d'erreur</div>
                        <div class="alert alert-success">Message de succès</div>
                        -->
                        
                        <!-- Votre code PHP ici... -->
                        
                        
                        <form method="POST" action="products.php">
                            <!-- ============================================= -->
                            <!-- TODO 7: CHAMP CACHÉ POUR L'ID EN MODE ÉDITION -->
                            <!-- ============================================= -->
                            <!-- 
                            Instructions:
                            - Si en mode édition ($editMode), ajoutez un input hidden avec l'id du produit
                            
                            Exemple:
                            <input type="hidden" name="id" value="<?php echo $editProduct['id']; ?>">
                            -->
                            
                            <!-- Votre code PHP ici... -->
                            
                            
                            <div class="mb-3">
                                <label for="name" class="form-label">
                                    Nom du produit <span class="text-danger">*</span>
                                </label>
                                <input type="text" 
                                       class="form-control" 
                                       id="name" 
                                       name="name" 
                                       placeholder="Ex: iPhone 15"
                                       value="<?php /* TODO: En mode édition, afficher $editProduct['name'] */ ?>"
                                       required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" 
                                          id="description" 
                                          name="description" 
                                          rows="3"
                                          placeholder="Description du produit..."><?php /* TODO: En mode édition, afficher $editProduct['description'] */ ?></textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label for="price" class="form-label">
                                    Prix (€) <span class="text-danger">*</span>
                                </label>
                                <input type="number" 
                                       class="form-control" 
                                       id="price" 
                                       name="price" 
                                       step="0.01" 
                                       min="0"
                                       placeholder="Ex: 99.99"
                                       value="<?php /* TODO: En mode édition, afficher $editProduct['price'] */ ?>"
                                       required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantité en stock</label>
                                <input type="number" 
                                       class="form-control" 
                                       id="quantity" 
                                       name="quantity" 
                                       min="0"
                                       placeholder="Ex: 50"
                                       value="<?php /* TODO: En mode édition, afficher $editProduct['quantity'], sinon 0 */ ?>">
                            </div>
                            
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-lg"></i>
                                    <!-- TODO: Afficher "Modifier" si en mode édition, sinon "Ajouter" -->
                                    Enregistrer
                                </button>
                                
                                <!-- TODO: En mode édition, afficher un bouton "Annuler" qui redirige vers products.php -->
                                <!-- 
                                <?php if ($editMode): ?>
                                <a href="products.php" class="btn btn-secondary">
                                    <i class="bi bi-x-lg"></i> Annuler
                                </a>
                                <?php endif; ?>
                                -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Colonne Liste des Produits -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-list-ul"></i> Liste des produits</span>
                        <span class="badge bg-primary">
                            <!-- TODO: Afficher le nombre total de produits -->
                            0 produits
                        </span>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Produit</th>
                                        <th>Prix</th>
                                        <th>Stock</th>
                                        <th>Date</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- ============================================= -->
                                    <!-- TODO 8: BOUCLE D'AFFICHAGE DES PRODUITS      -->
                                    <!-- ============================================= -->
                                    <!-- 
                                    Instructions:
                                    - Utilisez une boucle while ou foreach pour parcourir $products
                                    - Pour chaque produit, affichez une ligne <tr> avec les données
                                    - Le bouton Modifier doit avoir href="products.php?edit=1&id=X"
                                    - Le bouton Supprimer doit avoir href="products.php?action=delete&id=X"
                                    - Ajoutez onclick="return confirm(...)" sur le bouton Supprimer
                                    
                                    Si aucun produit, affichez un message "Aucun produit trouvé"
                                    -->
                                    
                                    <!-- EXEMPLE D'UNE LIGNE (à remplacer par la boucle PHP) -->
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <strong>iPhone 15</strong>
                                            <br>
                                            <small class="text-muted">Smartphone Apple dernière génération</small>
                                        </td>
                                        <td class="price">999.99 €</td>
                                        <td>
                                            <span class="stock-ok">
                                                <i class="bi bi-check-circle"></i> 25
                                            </span>
                                        </td>
                                        <td><small>2025-01-15</small></td>
                                        <td class="text-center">
                                            <a href="products.php?edit=1&id=1" 
                                               class="btn btn-warning btn-action">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <a href="products.php?action=delete&id=1" 
                                               class="btn btn-danger btn-action"
                                               onclick="return confirm('Supprimer ce produit ?')">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <!-- FIN DE L'EXEMPLE -->
                                    
                                    <!-- Votre boucle PHP ici... -->
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- Aide visuelle pour le stock -->
                <div class="mt-3 text-muted small">
                    <i class="bi bi-info-circle"></i> 
                    Légende stock: 
                    <span class="stock-ok"><i class="bi bi-check-circle"></i> > 10</span> | 
                    <span class="stock-low"><i class="bi bi-exclamation-circle"></i> ≤ 10</span>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
