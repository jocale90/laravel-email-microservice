# 📧 Laravel Email Microservice

This microservice, built with Laravel 11, manages email sending using job queues with Redis and Amazon SQS. It allows dynamic email templates, logs sent emails, and provides monitoring through Laravel Horizon.

## 🚀 Features
✅ Asynchronous email sending with queues  
✅ Integration with Redis and Amazon SQS  
✅ Email logging in the database  
✅ Dynamic email templates  
✅ Monitoring with Laravel Horizon  
✅ Dockerized for easy deployment  

---

## 🛠️ Installation

### 1️⃣ Clone the repository
```bash
git clone https://github.com/your-username/laravel-email-microservice.git
cd laravel-email-microservice
```

### 2️⃣ Install dependencies
```bash
composer install
cp .env.example .env
php artisan key:generate
```

### 3️⃣ Configure `.env`
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=no-reply@yourdomain.com
MAIL_FROM_NAME="Email Microservice"

QUEUE_CONNECTION=redis  # Use 'sqs' for Amazon SQS

REDIS_HOST=127.0.0.1
REDIS_PORT=6379

AWS_ACCESS_KEY_ID=your-access-key
AWS_SECRET_ACCESS_KEY=your-secret-key
AWS_DEFAULT_REGION=us-east-1
SQS_QUEUE=https://sqs.us-east-1.amazonaws.com/your-id/your-queue
```

### 4️⃣ Run migrations
```bash
php artisan migrate
```

### 5️⃣ Start the application
```bash
php artisan serve
```

---

## 📬 API Usage

### ✉️ Send an email
```http
POST /api/send-email
```
#### **Request Body (`JSON`)**
```json
{
  "to": "recipient@example.com",
  "subject": "Email Subject",
  "message": "Email body content"
}
```

### 📜 View email logs
```http
GET /api/email-logs
```

---

## 🏗️ Setting Up Redis (Queues)
1. Install Redis on your machine:
   ```bash
   sudo apt update && sudo apt install redis-server
   ```
2. Verify Redis is running:
   ```bash
   redis-cli ping  # Should return PONG
   ```
3. Start Laravel queue workers:
   ```bash
   php artisan queue:work --queue=emails
   ```

---

## 🌩️ Setting Up Amazon SQS (Queues)
1. Sign up at [AWS SQS](https://aws.amazon.com/sqs/)
2. Configure your `.env` file with AWS credentials
3. Run the queue worker:
   ```bash
   php artisan queue:work --queue=emails
   ```

---

## 🐳 Running with Docker
```bash
docker-compose up -d
```

---

## 🛡️ Monitoring with Laravel Horizon
To monitor queue jobs using Laravel Horizon:
```bash
php artisan horizon
```
Access it at `http://localhost/horizon`

---

## 📄 License
This project is licensed under the MIT License.
