# Youcommunity

**Youcommunity** is a community events management platform built with Laravel. It enables users to create, discover, and join events within their community. Users can comment on events, reserve spots, and manage their event attendance seamlessly.

## Features

- **Event Management**: Create, edit, and delete events with ease
- **Event Discovery**: Browse and explore upcoming community events
- **Event Comments**: Engage with other community members through event comments
- **RSVP System**: Reserve spots for events and manage your attendance
- **User Profiles**: Manage your profile and view your attended events
- **My Events**: Track events you've created and events you plan to attend
- **Authentication**: Secure user authentication with email verification

## Tech Stack

- **Framework**: Laravel (Blade templating)
- **Database**: MySQL/PostgreSQL
- **Frontend**: Blade Templates
- **Authentication**: Laravel Sanctum / Built-in Auth

## Project Structure

```
Youcommunity/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── EventController.php      # Event management
│   │   │   ├── CommentController.php    # Event comments
│   │   │   ├── RspvController.php       # Event reservations
│   │   │   ├── MyEventsController.php   # User's events
│   │   │   ├── ProfileController.php    # User profile
│   │   │   ├── HomeController.php       # Home page
│   │   │   └── Auth/                    # Authentication
│   │   └── Requests/                    # Form requests
│   ├── Models/
│   │   ├── User.php                     # User model
│   │   ├── Event.php                    # Event model
│   │   └── Comment.php                  # Comment model
│   ├── Mail/                            # Mailing classes
│   ├── Providers/                       # Service providers
│   └── View/Components/                 # View components
├── database/
│   └── migrations/                      # Database migrations
├── routes/
│   ├── web.php                          # Web routes
│   └── auth.php                         # Auth routes
└── resources/                           # Views and assets
```

## Routes

### Public Routes
- `GET /` - Home page
- `GET /details/{id}` - View event details

### Authenticated Routes
- `GET /dashboard` - View all events
- `POST /dashboard` - Create a new event
- `DELETE /dashboard/{id}` - Delete an event
- `GET /edit/{id}` - Edit event form
- `PUT /edit/{id}` - Update event
- `POST /details/{id}` - Add comment to event
- `DELETE /details/{id}` - Delete comment
- `POST /details/reserve/{id}` - Reserve spot (RSVP)
- `GET /events` - View my events and reservations
- `DELETE /events` - Cancel event reservation
- `GET /profile` - Edit profile
- `PATCH /profile` - Update profile
- `DELETE /profile` - Delete account

## Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/nabil-el-allaouii/Youcommunity.git
   cd Youcommunity
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Setup environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure database**
   - Update `.env` with your database credentials
   - Run migrations: `php artisan migrate`

5. **Build assets**
   ```bash
   npm run dev
   ```

6. **Start the development server**
   ```bash
   php artisan serve
   ```

Access the application at `http://localhost:8000`

## Database Models

### User
- id, name, email, email_verified_at, password, created_at, updated_at

### Event
- id, title, description, date, location, capacity, creator_id, created_at, updated_at

### Comment
- id, content, user_id, event_id, created_at, updated_at

### RSVP (Implicit via pivot/relationship)
- Tracks user attendance to events

## Usage

1. **Sign up** and verify your email
2. **Create an event** by navigating to the dashboard
3. **Browse events** on the home page
4. **Reserve a spot** on events you want to attend
5. **Comment** on events to engage with the community
6. **Manage your events** through "My Events" section

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

This project is open-source and available under the MIT License.

## Author

**Nabil El allaouii**
- GitHub: [@nabil-el-allaouii](https://github.com/nabil-el-allaouii)
- Email: nabil@example.com

---

**Built with ❤️ using Laravel**
