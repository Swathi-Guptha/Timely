Timely – The Road Taken!
Timely is a web portal used in delivery centre.
The aim of the portal is to:
•	Minimize the manual work done by the delivery centre.
•	Deliver the orders in the shortest time frame.
•	Establish communication between the customers and the delivery centre.
Table of Contents:
	General Information
	Setup
	Getting Started
	Problem
	Requirements
	Roadmap
General Information:
The portal decreases the ratio of orders missed by delivery boys due to the lack of proper communication between them and customers. Customers are allowed to choose the date of delivery and availability slot, thereby ensuring that proper communication is maintained. Depending on the response from the customers, the algorithm of the portal clusters the orders based on distance from the centre and radius of area to be covered, and generates the shortest routes possible which are given to delivery boys to complete their orders in the best timeframe possible.
  
Setup:

•	Xampp and MySql are needed for accessing the server and the database. 




  Getting Started:
	
•	Clone the project and store it in htdocs of xampp folder with a folder name (ex:timely).

•	Create the database tables in MySQL from database folder of the downloaded project.


•	Start apache and MySQL in the Xampp control.

•	Open the web browser and enter in url as  localhost/project_name/Login_php
(Ex: localhost/timely/Login.php)

•	For logging into the portal enter any random data.
•	The home page would be shown through which all the features of the portal could be accessed.

•	The features are:

1)	Home: It would contain the current delivery details.
2)	Resources: Details about the number of delivery boys and vehicle available.
3)	Contact customers(Mail, WhatsApp and SMS)
4)	Upload (Excel sheet from e-commerce)
5)	Trip planning: Generating shortest route for responded deliveries.
Note: Trip planning webpage may not be accessible due to the trial api key used.
Problems:
The portal will fail if the customers don’t respond to the message sent for choosing the respectable availability slot.
Requirements:
The portal requires Google maps API for generating the shortest route, which requires a billable account for accessing all its services. As a trial account is used, access to all the services isn’t provided. Therefore few parts of the algorithm had to be hard-coded.
There is a possibility that while running the project, access to use Google maps would be denied due to exceeding of the limit of accessing the API through a trial account.
Road Map:

The delivery centre can use the portal to simplify its day to day activities, whose features can be enhanced with time depending upon the customer response. 

