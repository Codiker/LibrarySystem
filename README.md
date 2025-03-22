# 📚 Library Management System

A simple **Library Management System** built with **PHP** to practice PHP syntax and core concepts. The system allows managing books, users, and loan operations.

## 🚀 Features

✅ Register and search books 📕🔍  
✅ Manage loans and returns ⏳🔄  
✅ Track book availability & users 👥📌  
✅ User-friendly interface using Bootstrap 🎨  

## 🛠️ Technologies Used

- **PHP** (Core logic)
- **Bootstrap, Js** (UI design)
- **Composer** (Dependency management)

## 📂 Project Structure

```
/library-system/
│-- public/            # Publicly accessible files (index.php, assets, templates)
│-- config/            # Database connection (Conection.php)
│-- app/
        |--controllers/       # Handles system logic
        │-- models/            # Data representation (Libro.php, Usuario.php)
        │-- views/             # UI templates (agregar.php, buscar.php)
│-- vendor/            # Composer dependencies
│-- README.md          # Project documentation
│-- composer.json      # Composer config file
```

## 🛠️ Installation & Setup

1. **Clone the repository:**
   ```sh
   git clone https://github.com/your-username/library-system.git
   cd library-system
   ```
2. **Install dependencies using Composer:**
   ```sh
   composer install
   ```
3. **Start a local PHP server:**
   ```sh
   php -S localhost:8000 -t public
   ```
4. **Open your browser and visit:**
   ```
   http://localhost:8000
   ```

## 📌 Contributing

Contributions and improvements are welcome! Feel free to fork the repo and submit a pull request.

## 📜 License

This project is licensed under the MIT License.

