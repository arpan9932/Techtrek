TECHTREK
# Blog Website using Laravel

This project is a simple blog website built using Laravel, where users can create accounts, write blog posts, comment on posts, and manage comments through an admin panel. It also includes authentication features to ensure that only authenticated users can post blogs and comment on others' posts. Additionally, the website provides a post reply system and a search option to search posts by category.

## Features

- User Authentication: Users can sign up, log in, and log out securely.
- Blog Post Management: Authenticated users can create, edit, and delete their blog posts.
- Comment System: Users can comment on blog posts, and admins can manage these comments through the admin panel.
- Reply System: Users can reply to comments on blog posts.
- Search Functionality: Users can search for posts by category.

## Installation

1. Clone the repository to your local machine:

```bash
git clone https://github.com/arpan9932/Techtrek.git
```

2. Navigate to the project directory:

```bash
cd Techtrek
```

3. Install dependencies:

```bash
composer install
```

4. Copy the `.env.example` file to `.env`:

```bash
cp .env.example .env
```


5. Configure your database connection in the `.env` file:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=techtrek
DB_USERNAME=root
DB_PASSWORD=
```

6. Migrate the database:

```bash
php artisan migrate
```

7. Start the development server:

```bash
php artisan serve
```

## Usage

1. Register a new account or log in with existing credentials.
2. Once authenticated, you can create a new blog post, comment on existing posts, and reply to comments.
3. Admins can access the admin panel to manage comments.

## Contributing

Contributions are welcome! Please feel free to submit a pull request or open an issue for any bugs, feature requests, or improvements.



---

Feel free to customize this README according to your project's specific details and requirements.
