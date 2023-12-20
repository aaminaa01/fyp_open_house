# OpenHouse Management Platform

## Overview
This project aims to meet the requirements of NUST-SEECS' annual open house event, where Final Year students showcase their projects to industry and academia guests. The goal is to create a comprehensive management platform that efficiently assigns projects to evaluators based on their preferences and specialty areas.

## Features
### User Accounts
- **Guests (Evaluators)**
  - Each evaluator has a dedicated account where they can set preferences, including preferred project categories and specialty areas.
- **FYP Groups**
  - Final Year Project groups are provided with accounts to manage their project details, including assigning keywords.
- **Admin Account**
  - The admin account has the authority to set the physical location of each FYP project on the demonstration floor.

### Project Assignment
- Projects are randomly assigned to guests based on matching keywords and evaluator preferences.
- Each evaluator is assigned to evaluate between 3-5 projects.

### Evaluation Process
- Evaluators are shown the location of their assigned projects.
- They can rate each project on a scale of 1-10, and the evaluation results are visible only to the admin.

### Student Access
- Students can view the number of evaluators who have assessed their project but do not have access to individual evaluator scores.

## Technical Considerations
### Server-Side Development
- The platform is developed using Laravel on the server side.

### Client-Side Development
- Any language or framework can be used on the client side.

### User Authentication
- User authentication is implemented for guests, FYP groups, and admins.

### Database
- A secure database is used to store project details, evaluator preferences, and evaluation scores.

## Implementation
The project is successfully implemented, providing a seamless experience for both evaluators and students during the open house event. The combination of Laravel for the server side and flexibility in choosing the client-side language or framework allows for efficient development and customization.

## Setting up the platform
1. Place the assignment folder in the XAMPP/htdocs/ directory to host the web application on the localhost.
2. Run `php artisan serve` to start the server.
3. Run the following command in the terminal where you have placed the assignment folder:
   ```bash
   php artisan migrate:refresh --seed
4. Search the following URL in the browser to open the web application:
   ```bash
   http://localhost/<folder_name>/login
   
