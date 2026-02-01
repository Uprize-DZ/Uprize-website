# Laravel Dual Authentication Guide for Beginners

## 📚 Table of Contents
1. [What Are We Building?](#what-are-we-building)
2. [Understanding Authentication](#understanding-authentication)
3. [The Two Systems](#the-two-systems)
4. [Complete Setup Guide](#complete-setup-guide)

5. [Real-World Examples](#real-world-examples)    هنا مثال بش تفهم كتر 
6. [Testing Your Setup](#testing-your-setup)
7. [Common Issues & Solutions](#common-issues--solutions)


اقرأ حتى سطر 150
---

## What Are We Building?

Imagine you're building a company website. You need:

### 🔧 Admin Panel
- Where **you** (the admin) manage content
- Add/edit/delete services, blog posts, products
- Traditional web interface (like WordPress admin)

### 🌐 Public Website
- What **visitors** see
- Modern, interactive experience
- Built with React (like modern web apps)

**The Challenge:** These two interfaces need different types of user login systems!

---

## Understanding Authentication

### What is Authentication?

Authentication = Proving you are who you say you are

**Real-life example:**
- You show your ID card to enter a building ➜ That's authentication
- The building gives you a visitor badge ➜ That's like getting a token/session

### Two Types of Web Authentication

#### 1. Session-Based (Cookie) Authentication 🍪

**How it works:**
```
You → Login Form → Server checks password
                    ↓
              Password correct!
                    ↓
         Server creates a "session"
                    ↓
    Server sends you a "cookie" (like a badge)
                    ↓
    Browser stores cookie automatically
                    ↓
    Every page you visit → Browser sends cookie
                    ↓
         Server: "I know you! Come in!"
```

**Simple explanation:**
- Like getting a wristband at an amusement park
- Once you have it, you can ride all the rides
- Security guards (server) just check your wristband

**Best for:**
- Traditional websites
- Admin panels
- Server-rendered pages (Blade, PHP)

---

#### 2. Token-Based Authentication 🎫

**How it works:**
```
You → Send email/password to API
                    ↓
           API checks password
                    ↓
         Password correct!
                    ↓
    API creates a "token" (random string)
                    ↓
    API sends token: "4|xK9sL2mN8pQ5r..."
                    ↓
    Your app saves token (in localStorage)
                    ↓
    Every API request → Include token in header
                    ↓
         API: "Valid token! Process request"
```

**Simple explanation:**
- Like having a ticket for each ride
- You must show your ticket every time
- Token = your ticket

**Best for:**
- Mobile apps
- React/Vue/Angular apps
- APIs (Application Programming Interfaces)

---

## The Two Systems

### Visual Overview

```
┌─────────────────────────────────────────────────────────────┐
│                      YOUR LARAVEL APP                        │
│                                                              │
│  ┌─────────────────────┐      ┌─────────────────────┐      │
│  │   ADMIN PANEL       │      │    PUBLIC API       │      │
│  │   (Blade/HTML)      │      │    (JSON Data)      │      │
│  │                     │      │                     │      │
│  │  Uses: COOKIES 🍪   │      │  Uses: TOKENS 🎫    │      │
│  │                     │      │                     │      │
│  │  Routes:            │      │  Routes:            │      │
│  │  /admin/login       │      │  /api/login         │      │
│  │  /admin/dashboard   │      │  /api/services      │      │
│  │  /admin/services    │      │  /api/user          │      │
│  └─────────────────────┘      └─────────────────────┘      │
│           │                              │                 │
│           └──────────┬───────────────────┘                 │
│                      │                                     │
│               ┌──────▼──────┐                              │
│               │  DATABASE   │                              │
│               │   (MySQL)   │                              │
│               │             │                               │
│               │ • users     │                               │
│               │ • services  │                               │
│               │ • tokens    │                               │
│               └─────────────┘                               │
└─────────────────────────────────────────────────────────────┘
                       │
                       │
        ┌──────────────┼──────────────┐
        │              │              │
        ▼              ▼              ▼
   ┌─────────┐   ┌──────────┐   ┌─────────┐
   │ ADMIN   │   │  REACT   │   │ MOBILE  │
   │ BROWSER │   │   APP    │   │   APP   │
   │         │   │          │   │         │
   │ Cookie  │   │  Token   │   │  Token  │
   └─────────┘   └──────────┘   └─────────┘
```

---

## Complete Setup Guide

### Step 1: Install Laravel Sanctum

**What is Sanctum?**
- A Laravel package for API authentication
- Handles token creation and validation
- Think of it as the "token manager"

**Command:**
```bash
composer require laravel/sanctum
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
php artisan migrate
```

**What this does:**
1. Downloads Sanctum code
2. Creates configuration file (`config/sanctum.php`)
3. Creates database table to store tokens

---

### Step 2: Update User Model

**File:** `app/Models/User.php`

**Before:**
```php
<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    
    // ... rest of code
}
```

**After:**
```php
<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens; // ← Add this

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens; // ← Add HasApiTokens
    
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // For admin/user distinction
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
```

**Why?**
- `HasApiTokens` gives User model the ability to create tokens
- Now you can do: `$user->createToken('my-token')`

---

### Step 3: Create API Auth Controller

**File:** `app/Http/Controllers/Api/AuthController.php`

```php
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Login user and create token
     */
    public function login(Request $request)
    {
        // 1. Validate the input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // 2. Check if credentials are correct
        if (!Auth::attempt($request->only('email', 'password'))) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        // 3. Get the authenticated user
        $user = Auth::user();
        
        // 4. Create a token for this user
        $token = $user->createToken('api-token')->plainTextToken;

        // 5. Return user data and token as JSON
        return response()->json([
            'user' => $user,
            'token' => $token,
            'message' => 'Login successful'
        ]);
    }

    /**
     * Register a new user
     */
    public function register(Request $request)
    {
        // 1. Validate the input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // 2. Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // 3. Create a token
        $token = $user->createToken('api-token')->plainTextToken;

        // 4. Return user and token
        return response()->json([
            'user' => $user,
            'token' => $token,
            'message' => 'Registration successful'
        ], 201);
    }

    /**
     * Logout user (delete current token)
     */
    public function logout(Request $request)
    {
        // Delete the token that was used to authenticate the current request
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logged out successfully'
        ]);
    }
}
```

**What each method does:**

1. **login()**: 
   - Checks if email/password is correct
   - Creates a token
   - Sends token back to user

2. **register()**: 
   - Creates new user account
   - Automatically logs them in with a token

3. **logout()**: 
   - Deletes the current token
   - User must login again to get new token

---

### Step 4: Set Up API Routes

**File:** `routes/api.php`

```php
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\HomeHeroController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\TrustedByController;
use App\Http\Controllers\WhoWeAreController;

// ============================================
// PUBLIC ROUTES (No authentication needed)
// ============================================

// Authentication endpoints
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// Public data - anyone can view
Route::get('/home-heroes', [HomeHeroController::class, 'index']);
Route::get('/services', [ServicesController::class, 'index']);
Route::get('/services/{slug}', [ServicesController::class, 'show']);
Route::get('/trusted-by', [TrustedByController::class, 'index']);
Route::get('/who-we-are', [WhoWeAreController::class, 'index']);

// ============================================
// PROTECTED ROUTES (Token required)
// ============================================

Route::middleware('auth:sanctum')->group(function () {
    // Get current user info
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    
    // Logout
    Route::post('/logout', [AuthController::class, 'logout']);
    
    // Add more protected routes here
    // Example: User profile, user settings, etc.
});
```

**Understanding Routes:**

```
PUBLIC ROUTES (No Token Needed)
├── POST /api/login          ➜ Get a token
├── POST /api/register       ➜ Create account & get token
├── GET  /api/services       ➜ View all services
└── GET  /api/services/web-design ➜ View specific service

PROTECTED ROUTES (Token Required)
├── GET  /api/user           ➜ Get logged-in user's info
└── POST /api/logout         ➜ Delete token (logout)
```

---

### Step 5: Update Controllers to Return JSON

**Why?** React can't read HTML. It needs JSON (data format).

**Example:** `app/Http/Controllers/ServicesController.php`

**Before (for Blade):**
```php
<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('services.index', ['services' => $services]);
        // ↑ This returns HTML page
    }
}
```

**After (for React):**
```php
<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return response()->json($services);
        // ↑ This returns JSON data
    }
    
    public function show($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        return response()->json($service);
    }
}
```

**What JSON looks like:**
```json
[
  {
    "id": 1,
    "name": "Website Design",
    "description": "Professional websites",
    "price": 2500,
    "slug": "website-design"
  },
  {
    "id": 2,
    "name": "Mobile App Development",
    "description": "iOS and Android apps",
    "price": 5000,
    "slug": "mobile-app-development"
  }
]
```

**Do the same for:**
- `HomeHeroController.php`
- `TrustedByController.php`
- `WhoWeAreController.php`

---

### Step 6: Configure CORS

**What is CORS?**
- Cross-Origin Resource Sharing
- Browser security feature
- Blocks requests from different domains by default

**The Problem:**
```
Your React app: http://localhost:3000
Your Laravel API: http://localhost:8000

Browser says: "Different domains! Request blocked! 🚫"
```

**The Solution:**
Tell Laravel: "It's okay to accept requests from localhost:3000"

**File:** `config/cors.php`

```php
<?php

return [
    // Which routes should allow CORS
    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    // Allow all HTTP methods (GET, POST, PUT, DELETE, etc.)
    'allowed_methods' => ['*'],

    // Which domains can make requests
    'allowed_origins' => [
        'http://localhost:3000',      // React default
        'http://localhost:5173',      // Vite default
        // Add your production URL here later:
        // 'https://mywebsite.com',
    ],

    'allowed_origins_patterns' => [],

    // Which headers can be sent
    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    // Important for cookies/sessions
    'supports_credentials' => true,
];
```

---

### Step 7: Update Environment Variables

**File:** `.env`

Add this line:
```env
SANCTUM_STATEFUL_DOMAINS=localhost:3000,localhost:5173
```

**What this does:**
- Tells Sanctum which domains are "trusted"
- These domains can use session-based features if needed

---

### Step 8: Set Up Admin Middleware

**What is Middleware?**
- Code that runs BEFORE your controller
- Like a security checkpoint

**File:** `app/Http/Middleware/AdminMiddleware.php`

```php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Check if user is an admin
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is logged in AND has admin role
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized access');
        }

        // User is admin, let them through
        return $next($request);
    }
}
```

**How it works:**
```
Request to /admin/dashboard
        ↓
   AdminMiddleware
        ↓
Is user logged in? → NO → ❌ Error 403
        ↓
       YES
        ↓
Is user role 'admin'? → NO → ❌ Error 403
        ↓
       YES
        ↓
   ✅ Allow access to dashboard
```

---

### Step 9: Register Admin Middleware

**File:** `bootstrap/app.php`

```php
<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Register admin middleware with a short name
        $middleware->alias([
            'admin' => \App\Http\Middleware\AdminMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
```

**Now you can use it in routes:**
```php
Route::middleware(['auth', 'admin'])->group(function () {
    // Only logged-in admins can access these
});
```

---

### Step 10: Set Up Web Routes (Admin Panel)

**File:** `routes/web.php`

```php
<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminHomeHeroController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\Admin\AdminTrustedByController;
use Illuminate\Support\Facades\Route;

// Public homepage
Route::get('/', function () {
    return view('welcome');
});

// Admin routes - Protected by auth and admin middleware
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Admin Dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    // Manage Home Heroes
    Route::resource('home-heroes', AdminHomeHeroController::class);
    
    // Manage Services
    Route::resource('services', AdminServiceController::class);
    
    // Manage Trusted By
    Route::resource('trusted-by', AdminTrustedByController::class);
});

// Laravel default auth routes (login, register, etc.)
require __DIR__ . '/auth.php';
```

**What `Route::resource()` creates:**

```
Route::resource('services', AdminServiceController::class)

Automatically creates these routes:
├── GET    /admin/services           ➜ index()   - List all
├── GET    /admin/services/create    ➜ create()  - Show create form
├── POST   /admin/services           ➜ store()   - Save new
├── GET    /admin/services/{id}      ➜ show()    - View one
├── GET    /admin/services/{id}/edit ➜ edit()    - Show edit form
├── PUT    /admin/services/{id}      ➜ update()  - Save changes
└── DELETE /admin/services/{id}      ➜ destroy() - Delete
```

---

## Real-World Examples

### Example 1: Admin Creates a Service

**Step-by-Step Flow:**

```
1. Admin opens browser
   ↓
2. Goes to: http://localhost:8000/admin/login
   ↓
3. Enters email & password
   ↓
4. Laravel checks credentials in database
   ↓
5. Credentials correct!
   ↓
6. Laravel creates session (saves in database)
   ↓
7. Laravel sends cookie to browser
   ↓
8. Browser automatically saves cookie
   ↓
9. Admin redirected to /admin/dashboard
   ↓
10. Admin clicks "Services" → "Add New"
    ↓
11. Fills form:
    Name: "E-commerce Development"
    Price: $3,500
    Description: "Custom online stores"
    ↓
12. Clicks "Save"
    ↓
13. Browser sends form data + cookie
    ↓
14. Laravel checks cookie → Admin authenticated ✓
    ↓
15. Laravel saves to database:
    INSERT INTO services (name, price, description, slug)
    ↓
16. Laravel redirects to /admin/services
    ↓
17. Admin sees: "✓ Service created successfully!"
```

---

### Example 2: User Views Services (React)

**React Component:**
```javascript
// ServicesPage.jsx
import { useState, useEffect } from 'react';

function ServicesPage() {
  const [services, setServices] = useState([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    // Fetch services when component loads
    fetchServices();
  }, []);

  const fetchServices = async () => {
    try {
      // Make GET request to API
      const response = await fetch('http://localhost:8000/api/services');
      
      // Convert response to JSON
      const data = await response.json();
      
      // Update state with services
      setServices(data);
      setLoading(false);
    } catch (error) {
      console.error('Error fetching services:', error);
      setLoading(false);
    }
  };

  if (loading) {
    return <div>Loading services...</div>;
  }

  return (
    <div className="services-page">
      <h1>Our Services</h1>
      <div className="services-grid">
        {services.map(service => (
          <div key={service.id} className="service-card">
            <h2>{service.name}</h2>
            <p>{service.description}</p>
            <p className="price">${service.price}</p>
            <button>Learn More</button>
          </div>
        ))}
      </div>
    </div>
  );
}

export default ServicesPage;
```

**What happens:**
```
1. User opens React app
   ↓
2. ServicesPage component loads
   ↓
3. useEffect runs → calls fetchServices()
   ↓
4. fetch() makes GET request to Laravel API
   ↓
5. Laravel receives request at /api/services
   ↓
6. No authentication needed (public route)
   ↓
7. Laravel queries database: SELECT * FROM services
   ↓
8. Laravel converts to JSON and sends back
   ↓
9. React receives JSON data
   ↓
10. React updates state with services
    ↓
11. React re-renders, showing all services
```

---

### Example 3: User Registration & Login (React)

**Registration Component:**
```javascript
// RegisterPage.jsx
import { useState } from 'react';
import { useNavigate } from 'react-router-dom';

function RegisterPage() {
  const [formData, setFormData] = useState({
    name: '',
    email: '',
    password: '',
    password_confirmation: ''
  });
  const [error, setError] = useState('');
  const navigate = useNavigate();

  const handleSubmit = async (e) => {
    e.preventDefault();
    
    try {
      const response = await fetch('http://localhost:8000/api/register', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(formData)
      });

      const data = await response.json();

      if (response.ok) {
        // Save token and user data
        localStorage.setItem('token', data.token);
        localStorage.setItem('user', JSON.stringify(data.user));
        
        // Redirect to homepage
        navigate('/');
      } else {
        setError(data.message || 'Registration failed');
      }
    } catch (error) {
      setError('Network error. Please try again.');
    }
  };

  return (
    <div className="register-page">
      <h1>Create Account</h1>
      {error && <div className="error">{error}</div>}
      
      <form onSubmit={handleSubmit}>
        <input
          type="text"
          placeholder="Full Name"
          value={formData.name}
          onChange={(e) => setFormData({...formData, name: e.target.value})}
        />
        
        <input
          type="email"
          placeholder="Email"
          value={formData.email}
          onChange={(e) => setFormData({...formData, email: e.target.value})}
        />
        
        <input
          type="password"
          placeholder="Password"
          value={formData.password}
          onChange={(e) => setFormData({...formData, password: e.target.value})}
        />
        
        <input
          type="password"
          placeholder="Confirm Password"
          value={formData.password_confirmation}
          onChange={(e) => setFormData({...formData, password_confirmation: e.target.value})}
        />
        
        <button type="submit">Sign Up</button>
      </form>
    </div>
  );
}

export default RegisterPage;
```

**Login Component:**
```javascript
// LoginPage.jsx
import { useState } from 'react';
import { useNavigate } from 'react-router-dom';

function LoginPage() {
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [error, setError] = useState('');
  const navigate = useNavigate();

  const handleLogin = async (e) => {
    e.preventDefault();
    
    try {
      const response = await fetch('http://localhost:8000/api/login', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ email, password })
      });

      const data = await response.json();

      if (response.ok) {
        // Save token
        localStorage.setItem('token', data.token);
        localStorage.setItem('user', JSON.stringify(data.user));
        
        // Redirect
        navigate('/');
      } else {
        setError('Invalid credentials');
      }
    } catch (error) {
      setError('Login failed. Please try again.');
    }
  };

  return (
    <div className="login-page">
      <h1>Login</h1>
      {error && <div className="error">{error}</div>}
      
      <form onSubmit={handleLogin}>
        <input
          type="email"
          placeholder="Email"
          value={email}
          onChange={(e) => setEmail(e.target.value)}
        />
        
        <input
          type="password"
          placeholder="Password"
          value={password}
          onChange={(e) => setPassword(e.target.value)}
        />
        
        <button type="submit">Login</button>
      </form>
    </div>
  );
}

export default LoginPage;
```

---

### Example 4: Making Authenticated Requests (React)

**API Helper:**
```javascript
// utils/api.js

const API_URL = 'http://localhost:8000/api';

// Helper function to get auth token
const getAuthHeaders = () => {
  const token = localStorage.getItem('token');
  return {
    'Content-Type': 'application/json',
    'Accept': 'application/json',
    ...(token && { 'Authorization': `Bearer ${token}` })
  };
};

// Get current user info (requires authentication)
export const getCurrentUser = async () => {
  const response = await fetch(`${API_URL}/user`, {
    headers: getAuthHeaders()
  });
  
  if (!response.ok) {
    throw new Error('Failed to fetch user');
  }
  
  return response.json();
};

// Logout (requires authentication)
export const logout = async () => {
  const response = await fetch(`${API_URL}/logout`, {
    method: 'POST',
    headers: getAuthHeaders()
  });
  
  if (response.ok) {
    localStorage.removeItem('token');
    localStorage.removeItem('user');
  }
  
  return response.json();
};

// Get all services (public - no auth needed)
export const getServices = async () => {
  const response = await fetch(`${API_URL}/services`);
  return response.json();
};
```

**Using the API Helper:**
```javascript
// ProfilePage.jsx
import { useState, useEffect } from 'react';
import { getCurrentUser, logout } from './utils/api';
import { useNavigate } from 'react-router-dom';

function ProfilePage() {
  const [user, setUser] = useState(null);
  const navigate = useNavigate();

  useEffect(() => {
    loadUser();
  }, []);

  const loadUser = async () => {
    try {
      const userData = await getCurrentUser();
      setUser(userData);
    } catch (error) {
      // Token invalid or expired
      navigate('/login');
    }
  };

  const handleLogout = async () => {
    try {
      await logout();
      navigate('/login');
    } catch (error) {
      console.error('Logout failed:', error);
    }
  };

  if (!user) {
    return <div>Loading...</div>;
  }

  return (
    <div className="profile-page">
      <h1>My Profile</h1>
      <p>Name: {user.name}</p>
      <p>Email: {user.email}</p>
      <button onClick={handleLogout}>Logout</button>
    </div>
  );
}

export default ProfilePage;
```

---

## Testing Your Setup

### Test 1: Admin Login (Session Auth)

1. Start Laravel server:
```bash
php artisan serve
```

2. Open browser: `http://localhost:8000/admin/login`

3. Login with admin credentials

4. Check browser developer tools (F12) → Application → Cookies

5. You should see a cookie named `laravel_session`

**Success:** You can access `/admin/dashboard` and other admin pages

---

### Test 2: API Registration (Token Auth)

Use a tool like **Postman**, **Thunder Client**, or **curl**:

**Request:**
```
POST http://localhost:8000/api/register
Content-Type: application/json

{
  "name": "Test User",
  "email": "test@example.com",
  "password": "password123",
  "password_confirmation": "password123"
}
```

**Expected Response:**
```json
{
  "user": {
    "id": 5,
    "name": "Test User",
    "email": "test@example.com",
    "role": "user"
  },
  "token": "4|xK9sL2mN8pQ5rT7vW1zA3bC6dE9fG2hJ4kL5mN6pQ7r",
  "message": "Registration successful"
}
```

**Success:** You received a token!

---

### Test 3: API Login

**Request:**
```
POST http://localhost:8000/api/login
Content-Type: application/json

{
  "email": "test@example.com",
  "password": "password123"
}
```

**Expected Response:**
```json
{
  "user": {
    "id": 5,
    "name": "Test User",
    "email": "test@example.com"
  },
  "token": "5|aB1cD2eF3gH4iJ5kL6mN7oP8qR9sT0uV1wX2yZ3",
  "message": "Login successful"
}
```

---

### Test 4: Public API Endpoint (No Auth)

**Request:**
```
GET http://localhost:8000/api/services
```

**Expected Response:**
```json
[
  {
    "id": 1,
    "name": "Website Design",
    "description": "Professional websites",
    "price": 2500,
    "slug": "website-design"
  },
  {
    "id": 2,
    "name": "Mobile App Development",
    "description": "iOS and Android apps",
    "price": 5000,
    "slug": "mobile-app-development"
  }
]
```

**Success:** You got data without needing a token!

---

### Test 5: Protected API Endpoint (With Token)

**Request:**
```
GET http://localhost:8000/api/user
Authorization: Bearer 5|aB1cD2eF3gH4iJ5kL6mN7oP8qR9sT0uV1wX2yZ3
```

**Expected Response:**
```json
{
  "id": 5,
  "name": "Test User",
  "email": "test@example.com",
  "role": "user"
}
```

**Success:** Token was validated and you got user data!

---

### Test 6: Protected Endpoint Without Token

**Request:**
```
GET http://localhost:8000/api/user
(No Authorization header)
```

**Expected Response:**
```json
{
  "message": "Unauthenticated."
}
```

**Success:** Endpoint is properly protected!

---

## Common Issues & Solutions

### Issue 1: CORS Error in React

**Error:**
```
Access to fetch at 'http://localhost:8000/api/services' from origin 
'http://localhost:3000' has been blocked by CORS policy
```

**Solution:**
1. Check `config/cors.php` includes your React URL
2. Make sure `'supports_credentials' => true`
3. Clear Laravel config cache:
```bash
php artisan config:clear
```

---

### Issue 2: Token Not Working

**Error:**
```json
{
  "message": "Unauthenticated."
}
```

**Checklist:**
- [ ] Did you add `HasApiTokens` to User model?
- [ ] Did you run migrations for Sanctum?
- [ ] Are you sending token in Authorization header?
- [ ] Is the token format correct? `Bearer TOKEN_HERE`

**Test token validity:**
```bash
php artisan tinker
>>> $user = User::find(1);
>>> $token = $user->createToken('test')->plainTextToken;
>>> echo $token;
```

---

### Issue 3: Admin Middleware Not Working

**Error:**
```
403 Unauthorized access
```

**Checklist:**
- [ ] Did you register middleware in `bootstrap/app.php`?
- [ ] Does the user have `role = 'admin'` in database?
- [ ] Is user logged in with session?

**Check user role:**
```bash
php artisan tinker
>>> $user = User::where('email', 'admin@example.com')->first();
>>> echo $user->role;  // Should be 'admin'
```

---

### Issue 4: Session Not Persisting (Admin Panel)

**Symptoms:** Login works but redirects to login page again

**Solutions:**

1. Check `.env` session configuration:
```env
SESSION_DRIVER=file
SESSION_LIFETIME=120
```

2. Clear config and cache:
```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```

3. Make sure `storage/framework/sessions` is writable:
```bash
chmod -R 775 storage
```

---

### Issue 5: JSON Not Returning from Controllers

**Symptom:** API returns HTML instead of JSON

**Solution:** Make sure controllers return `response()->json()`:

```php
// ❌ Wrong (returns HTML)
public function index()
{
    return view('services.index');
}

// ✅ Correct (returns JSON)
public function index()
{
    return response()->json(Service::all());
}
```

---

## Summary Checklist

### Backend Setup ✓
- [ ] Laravel Sanctum installed
- [ ] User model has `HasApiTokens`
- [ ] API AuthController created
- [ ] API routes defined in `routes/api.php`
- [ ] Web routes defined in `routes/web.php`
- [ ] Controllers return JSON for API
- [ ] CORS configured
- [ ] Admin middleware registered
- [ ] `.env` has `SANCTUM_STATEFUL_DOMAINS`

### Frontend Setup (React) ✓
- [ ] API helper functions created
- [ ] Login/Register components working
- [ ] Token stored in localStorage
- [ ] Token sent in Authorization header
- [ ] Protected routes check for token
- [ ] Logout removes token

### Database ✓
- [ ] Users table has `role` column
- [ ] At least one admin user exists
- [ ] Sanctum migrations run
- [ ] All content tables created

---

## Quick Reference

### Common Commands

```bash
# Start Laravel server
php artisan serve

# Clear cache
php artisan config:clear
php artisan cache:clear

# Create migration
php artisan make:migration create_table_name

# Run migrations
php artisan migrate

# Create controller
php artisan make:controller ControllerName

# Create model
php artisan make:model ModelName

# Create admin user
php artisan tinker
>>> User::create(['name'=>'Admin','email'=>'admin@test.com','password'=>Hash::make('password'),'role'=>'admin']);
```

### Important Files

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── Api/
│   │   │   └── AuthController.php      ← API authentication
│   │   ├── Admin/
│   │   │   └── AdminServiceController.php  ← Admin panel controllers
│   │   └── ServicesController.php       ← API data controllers
│   └── Middleware/
│       └── AdminMiddleware.php          ← Admin access control
│
├── Models/
│   └── User.php                         ← Add HasApiTokens here
│
routes/
├── api.php                               ← API routes (token auth)
└── web.php                               ← Web routes (session auth)

config/
├── cors.php                              ← CORS configuration
└── sanctum.php                           ← Sanctum configuration
```

---

## Final Architecture Diagram

```
┌─────────────────────────────────────────────────────────────────┐
│                         YOUR APPLICATION                         │
└─────────────────────────────────────────────────────────────────┘
                              │
                              │
        ┌─────────────────────┴─────────────────────┐
        │                                           │
        ▼                                           ▼
┌──────────────────┐                    ┌──────────────────────┐
│  ADMIN BROWSER   │                    │     REACT APP        │
│  (Traditional)   │                    │   (Modern SPA)       │
└──────────────────┘                    └──────────────────────┘
        │                                           │
        │ Visits /admin/login                      │ Visits /
        │                                           │
        ▼                                           ▼
┌──────────────────┐                    ┌──────────────────────┐
│  Login Form      │                    │  Homepage Loads      │
│  (Blade HTML)    │                    │  (React Component)   │
└──────────────────┘                    └──────────────────────┘
        │                                           │
        │ POST /admin/login                        │ fetch('/api/services')
        │ { email, password }                      │
        ▼                                           ▼
┌──────────────────────────────────────────────────────────────────┐
│                      LARAVEL BACKEND                              │
│                                                                   │
│  ┌──────────────────┐              ┌──────────────────────┐     │
│  │  Session Auth    │              │    Token Auth        │     │
│  │  (web.php)       │              │    (api.php)         │     │
│  │                  │              │                      │     │
│  │  Check cookie ✓  │              │  No token needed     │     │
│  │  Create session  │              │  for public data     │     │
│  └──────────────────┘              └──────────────────────┘     │
│          │                                      │                │
│          │                                      │                │
│          └───────────┬──────────────────────────┘               │
│                      │                                           │
│               ┌──────▼─────────┐                                │
│               │   DATABASE     │                                │
│               │                │                                │
│               │  • users       │                                │
│               │  • services    │                                │
│               │  • tokens      │                                │
│               └────────────────┘                                │
└──────────────────────────────────────────────────────────────────┘
        │                                           │
        │                                           │
        ▼                                           ▼
┌──────────────────┐                    ┌──────────────────────┐
│ Session Cookie   │                    │  JSON Response       │
│ Set automatically│                    │  [{id:1, name:...}]  │
└──────────────────┘                    └──────────────────────┘
        │                                           │
        │                                           │
        ▼                                           ▼
┌──────────────────┐                    ┌──────────────────────┐
│ Redirect to      │                    │  React Renders       │
│ /admin/dashboard │                    │  Services List       │
└──────────────────┘                    └──────────────────────┘
```

---

## Congratulations! 🎉

You now have a complete understanding of:
- How session-based authentication works (cookies)
- How token-based authentication works (API tokens)
- Why you need both for modern web applications
- How to implement dual authentication in Laravel
- How to connect React to your Laravel API

**Next Steps:**
1. Build your React components
2. Create admin Blade views
3. Add more features (file uploads, pagination, etc.)
4. Deploy to production

