# 📚 Aide-Mémoire MySQLi - Orienté Objet (OOP)

## 🔌 Connexion à la Base de Données
```php
$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Échec connexion: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");
```

---

## 📖 SELECT - Récupérer Plusieurs Lignes

```php
$sql = "SELECT * FROM users WHERE role = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $role);
$stmt->execute();
$result = $stmt->get_result();

while ($user = $result->fetch_assoc()) {
    echo $user['email'];
}
$stmt->close();
```

---

## 📖 SELECT - Récupérer Une Ligne

```php
$sql = "SELECT * FROM articles WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $articleId);
$stmt->execute();
$result = $stmt->get_result();
$article = $result->fetch_assoc();
$stmt->close();
```

---

## ➕ INSERT - Ajouter un Enregistrement

```php
$sql = "INSERT INTO comments (content, author_id, post_id) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sii", $content, $authorId, $postId);
$stmt->execute();
$newId = $conn->insert_id;
$stmt->close();
```

---

## ✏️ UPDATE - Modifier un Enregistrement

```php
$sql = "UPDATE categories SET name = ?, slug = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssi", $name, $slug, $catId);
$stmt->execute();
$stmt->close();
```

---

## 🗑️ DELETE - Supprimer un Enregistrement

```php
$sql = "DELETE FROM messages WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $msgId);
$stmt->execute();
$stmt->close();
```

---

## 🔤 Types de Données - bind_param()

| Code | Type | Description |
|------|------|-------------|
| `i` | integer | Nombres entiers |
| `d` | double | Nombres décimaux |
| `s` | string | Chaînes de caractères |
| `b` | blob | Données binaires |

```php
// Exemple: string + double + integer
$stmt->bind_param("sdi", $titre, $note, $categorie);
```

---

## 🔢 Compter et Vérifier

```php
// Nombre de lignes retournées
$result->num_rows

// Lignes affectées (UPDATE/DELETE)
$stmt->affected_rows

// Dernier ID inséré
$conn->insert_id
```

---

## 🔄 SELECT sans Paramètres

```php
$result = $conn->query("SELECT * FROM tags ORDER BY name ASC");

while ($tag = $result->fetch_assoc()) {
    echo $tag['name'];
}
```

---

## ⚠️ Gestion des Erreurs

```php
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Erreur prepare: " . $conn->error);
}

if (!$stmt->execute()) {
    die("Erreur execute: " . $stmt->error);
}
```

---

## 📋 Méthodes Essentielles

| Action | Syntaxe |
|--------|---------|
| Préparer | `$conn->prepare($sql)` |
| Lier | `$stmt->bind_param("types", ...)` |
| Exécuter | `$stmt->execute()` |
| Résultat | `$stmt->get_result()` |
| Lire ligne | `$result->fetch_assoc()` |
| Fermer | `$stmt->close()` |