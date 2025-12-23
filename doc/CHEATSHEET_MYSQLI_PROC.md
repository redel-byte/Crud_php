# 📚 Aide-Mémoire MySQLi - Procédural

## 🔌 Connexion à la Base de Données
```php
$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Échec connexion: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8mb4");
```

---

## 📖 SELECT - Récupérer Plusieurs Lignes

```php
$sql = "SELECT * FROM users WHERE role = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $role);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

while ($user = mysqli_fetch_assoc($result)) {
    echo $user['email'];
}
mysqli_stmt_close($stmt);
```

---

## 📖 SELECT - Récupérer Une Ligne

```php
$sql = "SELECT * FROM articles WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $articleId);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$article = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);
```

---

## ➕ INSERT - Ajouter un Enregistrement

```php
$sql = "INSERT INTO comments (content, author_id, post_id) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sii", $content, $authorId, $postId);
mysqli_stmt_execute($stmt);
$newId = mysqli_insert_id($conn);
mysqli_stmt_close($stmt);
```

---

## ✏️ UPDATE - Modifier un Enregistrement

```php
$sql = "UPDATE categories SET name = ?, slug = ? WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ssi", $name, $slug, $catId);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
```

---

## 🗑️ DELETE - Supprimer un Enregistrement

```php
$sql = "DELETE FROM messages WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $msgId);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
```

---

## 🔤 Types de Données - mysqli_stmt_bind_param()

| Code | Type | Description |
|------|------|-------------|
| `i` | integer | Nombres entiers |
| `d` | double | Nombres décimaux |
| `s` | string | Chaînes de caractères |
| `b` | blob | Données binaires |

```php
// Exemple: string + double + integer
mysqli_stmt_bind_param($stmt, "sdi", $titre, $note, $categorie);
```

---

## 🔢 Compter et Vérifier

```php
// Nombre de lignes retournées
mysqli_num_rows($result)

// Lignes affectées (UPDATE/DELETE)
mysqli_stmt_affected_rows($stmt)

// Dernier ID inséré
mysqli_insert_id($conn)
```

---

## 🔄 SELECT sans Paramètres

```php
$result = mysqli_query($conn, "SELECT * FROM tags ORDER BY name ASC");

while ($tag = mysqli_fetch_assoc($result)) {
    echo $tag['name'];
}
```

---

## ⚠️ Gestion des Erreurs

```php
$stmt = mysqli_prepare($conn, $sql);
if (!$stmt) {
    die("Erreur prepare: " . mysqli_error($conn));
}

if (!mysqli_stmt_execute($stmt)) {
    die("Erreur execute: " . mysqli_stmt_error($stmt));
}
```

---

## 📋 Fonctions Essentielles

| Action | Syntaxe |
|--------|---------|
| Préparer | `mysqli_prepare($conn, $sql)` |
| Lier | `mysqli_stmt_bind_param($stmt, "types", ...)` |
| Exécuter | `mysqli_stmt_execute($stmt)` |
| Résultat | `mysqli_stmt_get_result($stmt)` |
| Lire ligne | `mysqli_fetch_assoc($result)` |
| Fermer | `mysqli_stmt_close($stmt)` |

---

## 🔄 Correspondance OOP ↔ Procédural

| OOP | Procédural |
|-----|------------|
| `$conn->prepare()` | `mysqli_prepare($conn, ...)` |
| `$stmt->bind_param()` | `mysqli_stmt_bind_param($stmt, ...)` |
| `$stmt->execute()` | `mysqli_stmt_execute($stmt)` |
| `$stmt->get_result()` | `mysqli_stmt_get_result($stmt)` |
| `$result->fetch_assoc()` | `mysqli_fetch_assoc($result)` |
| `$conn->insert_id` | `mysqli_insert_id($conn)` |