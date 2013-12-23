p4.dwa-uannipu.biz
==================
The site is designed for entering estimates for the work packages that the application has been assigned.

The work packages are dispatched by an admin and the assignment of the work packages to the users, is out of the scope of this application.

The work packages once, are in a user's queue, the user will be able to update and add estimates.

The users are being assigned with work packages via database scripts.

There are three major tables, work_pckg, work_pckg_estimates, estimates. The user is associated to work packages.
Multiple estimates can be associated to a particular work package.

The index page, lists all work packages related to a user and package details. Once the work package is clicked, a user is directed to either add estimates
screen or edit screen.
There is javascript on the edit screen , that calculates the total hours and total amounts.

Once the estimates are entered, they can be saved in the database via ajax call. The success message is displayed on the screen once the data is saved successfully.

The sign up and login features have been taken from P2. If you sign up as a new user, the user will not have any packages.

I created three users, user1, user2, user3. There are work packages associated to these users in the database.

login id : user1@gmail.com
pwd: user1

login id : user2@gmail.com
pwd: user2

login id : user3@gmail.com
pwd : user3

login id : uannipu@gmail.com
pwd: usha

Please use these users to test the features. For some packages, there are no estimates and you can add estimates. For some packages the estimates are already there , you can modify.
You can add more and remove the existing the ones and save the data to the database.






