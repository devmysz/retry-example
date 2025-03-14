# Symfony HTTP Retry Test

Related to the issue: https://github.com/symfony/symfony/issues/59883

## Requirements
- PHP 8.1+
- Composer

## Installation
1. Clone the repository:
   ```bash
   git clone git@github.com:devmysz/retry-example.git
   cd retry-example
   ```

2. Install dependencies:
   ```bash
   composer install
   ```

3. Start the Symfony server:
   ```bash
   php -S 127.0.0.1:8000 -t public
   ```

## Testing HTTP Client Retry
1. Run the test command:
   ```bash
   php bin/console app:test-retry
   ```
2. Check the application logs (`var/log/dev.log`) to see retry attempts:
   ```bash
   tail -f var/log/dev.log
   ```

## HttpClient Configuration
The retry configuration is set in `config/packages/framework.yaml`

## Endpoints
- `http://127.0.0.1:8000/sleeping-endpoint` - simulates delayed responses
- `php bin/console app:test-retry` - command testing retry behavior
