# Construction POC

## Project Overview
Construction POC is a Laravel-based proof-of-concept (POC) application designed to manage **staff attendance** and **report generation** for a construction project. The application leverages **Filament** for an intuitive admin panel and provides **PDF export functionality** for attendance reports.

## Features
- **Staff Management**: Add, edit, and remove staff members.
- **Attendance Tracking**: Record and manage staff attendance.
- **Filament Admin Panel**: A modern, easy-to-use interface.
- **Report Generation**: Generate attendance reports for a given date range.
- **PDF Export**: Download attendance reports in PDF format.

## Technologies Used
- **Laravel** (PHP framework)
- **Filament** (Admin panel UI)
- **MySQL** (Database)
- **Docker** (Containerized development)
- **PDF Generation** (Laravel DOMPDF or Snappy)

---

## Installation & Setup

### **1. Clone the Repository**
```sh
git clone https://github.com/DetechDigitalSolutions-Development/construction-poc.git
cd construction-poc
```

### **2. Install Dependencies**
```sh
composer install
npm install && npm run build
```

### **3. Set Up Environment Variables**
Create a `.env` file by copying the example:
```sh
cp .env.example .env
```
Then update the database credentials in the `.env` file:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

### **4. Run Database Migrations**
```sh
php artisan migrate --seed
```
This will create the necessary tables and seed sample data.

### **5. Run the Application**
```sh
php artisan serve
```
Your application will be accessible at: `http://127.0.0.1:8000`

### **6. Access Filament Admin Panel**
```sh
php artisan make:filament-user
```
Then, log in to **Filament** at:
```
http://127.0.0.1:8000/admin
```

---

## Running in Docker

### **1. Build and Start Containers**
```sh
docker-compose up -d --build
```

### **2. Run Migrations Inside the Container**
```sh
docker-compose exec app php artisan migrate --seed
```

---

## Usage
- **Managing Staff**: Navigate to Filament Admin Panel (`/admin/staff`) to manage staff members.
- **Recording Attendance**: Use `/admin/attendances` to record attendance.
- **Generating Reports**: Navigate to `/admin/reports`, select a date range, and export to PDF.

---

## Troubleshooting
### **Common Issues & Solutions**
#### **1. "Nothing to migrate" error**
- Ensure your `.env` file is set up correctly and that the database is running.
- Try running:
  ```sh
  php artisan migrate:refresh --seed
  ```

#### **2. Internal Server Error (Class Not Found)**
- Run:
  ```sh
  composer dump-autoload
  ```
- Ensure you have imported all necessary classes in your controllers and resources.

#### **3. Filament User Login Issues**
- If you forget your admin credentials, create a new user:
  ```sh
  php artisan make:filament-user
  ```

---

## Contributing
1. Fork the repository
2. Create a new branch (`feature/your-feature`)
3. Commit your changes (`git commit -m "Added new feature"`)
4. Push to your branch (`git push origin feature/your-feature`)
5. Create a pull request

---

## License
This project is licensed to **Detech Digital Solutions** under a proprietary license. Unauthorized distribution or modification is strictly prohibited.

---

## Contact
For any inquiries or support, contact:
- **Company**: Detech Digital Solutions
- **GitHub**: [DetechDigitalSolutions-Development](https://github.com/DetechDigitalSolutions-Development)
- **Repository**: [Construction POC](https://github.com/DetechDigitalSolutions-Development/construction-poc)
- **Support Email**: support@detechdigitalsolutions.com

