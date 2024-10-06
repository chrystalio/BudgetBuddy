# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.0.0] - 2024-10-06

### Added
- CRUD functionality for Categories and Transactions.
- Predefined Category data using seeders (e.g., Groceries, Utilities, etc.).
- Basic user authentication for managing personal budgets.
- Number formatting for Transaction amounts in the list view (e.g., 3.770.000).
- Validation for amount in transactions (minimum value enforced).

### Fixed
- Transaction amount not being formatted correctly in the list view.
- Corrected reactive Category selection based on Transaction Type (Expense/Income).
- Fixed label for category_id filter, showing `Category` instead of `category_id`.
