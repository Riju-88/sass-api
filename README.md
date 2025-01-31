# API Marketplace(SaaS)

A modern API Marketplace built using the TALL stack (Tailwind CSS, Alpine.js, Laravel, and Livewire). This platform allows developers to discover, subscribe, and integrate APIs seamlessly.

## Tech Stack

This project was built using the **TALL stack** (Tailwind CSS, Alpine.js, Laravel, and Livewire)

**Frontend:** Livewire, Blade, Alpine.js, Tailwind CSS

**Backend:** Laravel, PHP

**Database:** MySQL, Eloquent ORM

## Installation

### Clone the repository:

```bash
git clone https://github.com/Riju-88/sass-api.git
cd your-repo-name
```

### Install dependencies:

```bash
composer install
npm install
```

### Set up environment variables:

```bash
.env.example to .env and update the database credentials, Razorpay keys, and other settings.
```

Generate application key:

```bash
php artisan key:generate
```

### Run migrations:

```bash
php artisan migrate --seed
```

### Compile assets:

```bash
npm run dev
```

### Start the development server:

```bash
php artisan serve
```

## Usage/Examples

### For Users:

Sign up, browse APIs, subscribe, and integrate them into your projects.

### For API Providers:

Register as a provider, list your APIs, and manage subscriptions.

## License

[MIT](https://choosealicense.com/licenses/mit/)

## Features

**API Integration:** Easy-to-use endpoints and documentation for integrating APIs.

**User Dashboard:** Manage API subscriptions, usage, and billing.

**API Discovery:** Browse and search for APIs by category, popularity, or pricing.

**Admin Panel:** Manage APIs, users, and transactions.

**Secure Payments:** Integrated Razorpay payment gateway for seamless transactions.

**SaaS Structure:** Managed by the Soulbscription package for subscription-based functionality.

**Google Authentication:** Planned integration for easy user sign-up and login.

**Responsive Design:** Built with Tailwind CSS for a mobile-friendly experience.

## Screenshots

![App Homepage](screenshots/home%20page.png)
![API Login demo](screenshots/api%20login.png)
![API List](screenshots/api%20list.png)
![API Plan List](screenshots/saas%20plans.png)
![Plans dashboard admin](screenshots/admin%20plans.png)
![Admin api manage](screenshots/admin%20api%20demo.png)
![API details page](screenshots/api%20playground%20demo.png)
![API travel demo](screenshots/api%20travel.png)
