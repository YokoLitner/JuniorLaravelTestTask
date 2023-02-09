# This is my pet-project

The goal is to create a project, a mini CRM, for the management of companies and its employees.

What should be done:

  * Basic authorization should be implemented
  * Application of seeders (seeds) to create the first user with login data (email - admin@local.in and password password)
  * Create migrations for companies: name, email, phone, website, logo (minimum 100x100 pixels)
  * Create migrations for company employees: first name, last name, company (using a foreign key for communication (foreign)), email, phone
  * Create CRUD (Create, Read, Update, Delete) panels for Companies and Employees
  * Save company logos in the storage/app/public/companies folder, and make it accessible from the public folder
  * To create CRUDs, you need to apply Laravel resource routes
  * Use Request classes for validation
  * Use the built-in pagination, with the output of the last 15 created elements on the page
