# Web-Based Timesheet Application

## **Description**
---
The web app is a basic implemenation of a timesheet where users are able to input timesheet entries with a description, date, time, and rate; as well as have automated calculations of total time and cost. These timesheet entries are stored in a PostgreSQL database so that their timesheet entries can be saved.

## **Usage**
---
The timesheet web app is deployed using Heroku so that users are able to access the app without need for installation.
The web app can be found by visiting the site <a href="https://https://zawaung-timesheet.herokuapp.com/" target="_blank">here</a>.

Upon reaching the website, users are greeted with a blank timesheet entry that they can begin filling out. After filling out all of the required areas, clicking on the "Insert Entry" button will store the data in the PostgreSQL database. The previous timesheet entries are accessed upon loading the website and are shown in the gray rows above the bottom empty row.

To the right of the timesheet entries are the calculations for the total time and cost that get updated with each new entry.

Clicking on the "Delete All" button removes all previous data entries from the database and resets the timesheet as a clean slate.

## **Technologies Used**
---
- Visual Studio Code
- HTML5
- CSS3
- PHP
- Heroku
- PostgreSQL
