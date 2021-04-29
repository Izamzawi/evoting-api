This repository contains the source code of an e-voting API. The API was built with Laravel. The site of this app is https://evoting-api.herokuapp.com/.


## API Contents

This application contains two major data that can be accessed, users (voters) and candidates. 


### Users data
The users data contains the identity of each user who is already registered to the e-voting app.

Available routes:
1. Retrieve all registered users (GET)<br>
This route is available for public use. This route can be accessed via https://evoting-api.herokuapp.com/api/users and requested with the GET method on Postman. This route will return the ‘firstname’ and ‘lastname’ of every registered user.

2. Register a new user (POST)<br>
This route can only be accessed on Postman with the POST method on https://evoting-api.herokuapp.com/api/users. The data of the new voter can be sent with a raw JSON form.
This is the correct JSON to send new voter data:
```
{
    "user_id" : "",
    "firstname" : "",
    "lastname" : "",
    "password" : "",
    "role_id" : "",
    "organizer_id" : "",
    "election_id" : ""
}
```

Note:<br>
-user_id can only consisted of alphabet (lowercase and uppercase) and numbers.<br>
-firstname and lastname can only contains alphabet with uppercase for the first letter. lastname are not required.<br>
-password have a minimum of 8 characters.<br>
-role_id, organizer_id, and election_id can only receive a single number.<br>
-Available input for role_id: 1 (voter role).<br>
-Available input for organizer_id: 1 (BEM UI).<br>
-Available input for election_id: 1 (Pemira UI).<br>
-There will be another input number for organizer_id and eletion_id in the future.<br>


3. Retrieve a voter's identity (GET/{user_id})<br>
Access a voter's identity is provided by user_id. Each user should only know their user_id. Therefore, accessing the user's identity can only be achieved after accessing the 'login' route.

4. Login route (LOGIN)<br>
This login route provides a secure way to access the user's identity since each user should only know their user_id and password. This route can be accessed via the POST method on http://evoting-api.herokuapp.com/api/login. The login form sent via raw JSON with the format available below:
```
{
    "user_id" : "",
    "password" : ""
}
```

5. Update user identity (PUT/{user_id})<br>
User can also edit their stored identity by accessing the PUT method on http://evoting-api.herokuapp.com/api/users/{your user_id}. Edit method is available but limited since the user can't edit their password and role_id (role_id only accept '1' as input.). And also, there is no other alternative input for organizer_id and election_id. The correct JSON format to send updated data is:
```
{
    "user_id" : "",
    "firstname" : "",
    "lastname" : "",
    "organizer_id" : "",
    "election_id" : ""
}
```

6. Delete an existing user (DELETE/{user_id})<br>
Since only each user knows their user_id, deleting a user can only be achieved by themselves. This route is accessed with the DELETE method on http://evoting-api.herokuapp.com/api/users/{your user_id}.


### Candidates data
This data section contains all available information about candidates listed for election.

Available routes:
1. Retrieve all available candidates (GET)<br>
This route is available for public use. This route can be accessed via https://evoting-api.herokuapp.com/api/candidates and requested with the GET method and return all candidates listed on every election.

2. Input a new candidate (POST)<br>
This route can only be accessed on Postman with the POST method on https://evoting-api.herokuapp.com/api/candidates. The data of the new voter can be sent with a raw JSON form.
This is the correct JSON to send new voter data:
```
{
    "name" : "",
    "order_no" : "",
    "vision" : "",
    "election_id" : ""
}
```

Note:<br>
-name can only consisted of alphabet (lowercase and uppercase).<br>
-order_no can only receive a single digit number.<br>
-vision can receive alphabet and numbers.<br>
-election_id can only receive a single number. Available input for election_id: 1 (Pemira UI).<br>

3. Retrieve a voter's identity (GET/{id})<br>
Each candidate's data can be accessed by writing the correct id of each candidate. This can be achieved by the GET method on https://evoting-api.herokuapp.com/api/candidates/{id} on Postman or web browser.

4. Update user identity (PUT/{id})<br>
While storing a candidate's data, an error on typing may accidentally occur. Editing a candidate's data is available via the PUT method on https://evoting-api.herokuapp.com/api/candidates/{id} on Postman. The updated data can be sent via raw JSON with the format as below:
```
{
    "name" : "",
    "order_no" : "",
    "vision" : "",
}
```

Note:
-eletion_id is not available for editing since it is considered "easy to write" and thus not a common source of a typing error. If the error occurs, only the web administrator can fix it.

5. Delete a candidate from the list<br>
There is no route for deleting a candidate. Candidate deletion (because of wrong data input) can be requested by to web administrator.


## Testing

To test the API, you can:
1. Register a new user with the correct requirement.<br>
This way, you can test all the possible routes from the user section. You can:<br>
   1. Register a new user,<br>
   2. try to login with your password,<br>
   3. edit the registered data, and/or<br>
   4. delete your newly created user <br>

2. Use the available user data for test purposes.<br>
Available user data:
```
{
    "user_id" : "voter1234",
    "firstname" : "New",
    "lastname" : "Voter",
    "password" : "voterbaru",
    "role_id" : "1",
    "organizer_id" : "1",
    "election_id" : "1"
}
```

