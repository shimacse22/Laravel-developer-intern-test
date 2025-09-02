# Laravel Developer Pre-Interview Test

This repository contains a **Laravel 11 CRUD application** built as part of a pre-interview test.  
The project implements **Country → State → City** management with **SQL relationships** and **AJAX-based CRUD operations**.

---

## 📌 Instructions from Test
- Fork or clone the given repository and complete the test.
- Use the provided HTML template (found in `public/html/`) for the frontend.
- Submit as a GitHub repository.
- Code must follow best practices, include comments, and be well-structured.

---

## 🛠️ Features
1. **Country-State-City CRUD**
   - A country can have multiple states.
   - A state can have multiple cities.
   - Proper **foreign key relationships** are used.
   - Cascade delete ensures associated states/cities are removed when a parent is deleted.

2. **AJAX Implementation**
   - All CRUD operations use AJAX (no page reloads).
   - Success/error messages are displayed dynamically.

3. **Validation**
   - Each AJAX form submission includes validation (e.g., required fields, format checks).

4. **Code Quality**
   - Laravel best practices followed.
   - Comments added for complex logic.

5. **Testing**
   - Basic tests included to verify CRUD operations.

---

## ⚙️ Tech Stack
- **Framework**: Laravel 11  
- **Database**: MySQL (with foreign key relationships)  
- **Frontend**: Bootstrap (provided HTML template) + AJAX (jQuery)
  
